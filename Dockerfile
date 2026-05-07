FROM php:8.4-apache

RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    sqlite3 \
    libsqlite3-dev \
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /app

COPY . .

RUN composer install --no-dev --optimize-autoloader

# Create database folder and sqlite file
RUN mkdir -p /app/database
RUN touch /app/database/database.sqlite

# Permissions
RUN chmod -R 777 storage bootstrap/cache /app/database

RUN php artisan migrate --force

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
