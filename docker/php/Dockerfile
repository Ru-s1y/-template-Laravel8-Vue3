FROM php:8.0-fpm

COPY php.ini /usr/local/etc/php/
WORKDIR /var/www/html

RUN apt-get update
RUN apt-get install -y vim
RUN apt-get install -y git curl
RUN apt-get install -y zip unzip
RUN docker-php-ext-install pdo_mysql

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN apt-get install -y npm