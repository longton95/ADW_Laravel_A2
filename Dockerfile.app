FROM php:7.1.16-fpm

WORKDIR /tmp/project

RUN apt-get update && apt-get install -y libmcrypt-dev \
    mysql-client libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt pdo_mysql

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer --version

COPY ./composer.json .
RUN composer install --no-scripts --no-autoloader

ADD . .
RUN composer dump-autoload --optimize
RUN php artisan key:generate



