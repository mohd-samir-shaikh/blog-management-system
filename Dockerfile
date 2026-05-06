FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    sqlite3 \
    libsqlite3-dev \
    zip \
    && docker-php-ext-install pdo pdo_sqlite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Create SQLite database
RUN mkdir -p database
RUN touch database/database.sqlite

# Permissions
RUN chmod -R 777 storage bootstrap/cache database

# Environment
ENV DB_CONNECTION=sqlite
ENV DB_DATABASE=/app/database/database.sqlite

EXPOSE 10000

# Laravel setup
RUN php artisan key:generate
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan migrate --force

CMD php artisan serve --host=0.0.0.0 --port=10000
