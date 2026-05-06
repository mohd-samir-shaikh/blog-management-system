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

RUN touch database/database.sqlite

RUN mkdir -p storage/framework/sessions
RUN mkdir -p storage/framework/views
RUN mkdir -p storage/framework/cache

RUN chmod -R 777 storage bootstrap/cache database

ENV DB_CONNECTION=sqlite

EXPOSE 10000

RUN php artisan migrate --force
RUN php artisan config:clear
RUN php artisan cache:clear
RUN php artisan view:clear

CMD php artisan serve --host=0.0.0.0 --port=10000
