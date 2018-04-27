FROM php:7.1.16-fpm

# Installs default PHP 7.1.16-fpm image and binaries for running PHP

RUN apt-get update && apt-get install -y libmcrypt-dev \
      git zip unzip libmagickwand-dev --no-install-recommends \
    && pecl install imagick \
    && docker-php-ext-enable imagick \
    && docker-php-ext-install mcrypt

# Installs mongodb PHP driver and enables it

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb \
    && docker-php-ext-configure gd \
    --with-freetype-dir=/usr/lib/x86_64-linux-gnu/ \
    --with-jpeg-dir=/usr/lib/x86_64-linux-gnu/ \
    && docker-php-ext-install gd

# Copy composer image and put in in the bin folder

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set the work directory for the rest of the tasks

WORKDIR /var/www

# Copy the composer file to the work dir

COPY ./composer.json .

# Run the composer install

RUN composer install --no-dev --no-scripts --no-autoloader

# Copy the rest of my site

COPY . .

# Create the ENV file from the example

RUN cp .env.example .env

# Optimizes this line is kind of irelevant but causes no harm

RUN composer dump-autoload --optimize

# Generate new key

RUN php artisan key:generate

# Make folders

RUN chown -R www-data:www-data \
        /var/www/storage \
        /var/www/bootstrap/cache



