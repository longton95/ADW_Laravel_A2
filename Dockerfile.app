FROM php:7.1.16-fpm

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client git zip unzip libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

COPY ./composer.json .
RUN composer install --no-dev --no-scripts --no-autoloader

COPY . .
RUN cp .env.example .env
RUN composer dump-autoload --optimize
RUN php artisan key:generate

RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache



