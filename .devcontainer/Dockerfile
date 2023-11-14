FROM php:8.1-fpm

COPY ./php/php.ini /usr/local/etc/php/php.ini-production
COPY ./php/php.ini /usr/local/etc/php/php.ini-development
COPY ./php/php.ini /usr/local/etc/php/php.ini

USER root

RUN echo 'root:pass' | chpasswd

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql
RUN apt-get install -y --no-install-recommends supervisor

RUN docker-php-ext-install pcntl
RUN apt-get update -y && apt-get install -y libpng-dev libfreetype6-dev libjpeg62-turbo-dev libgd-dev
RUN docker-php-ext-configure gd \
    --with-jpeg=/usr/include/ \
    --with-freetype=/usr/include/
RUN docker-php-ext-install gd
RUN apt-get update && apt-get install -y \
    zlib1g-dev \
    libzip-dev
RUN docker-php-ext-install zip
RUN docker-php-ext-install sockets

RUN apt-get -y update && apt-get -y install nginx

RUN apt install redis -y
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && apt-get install -y nodejs
RUN npm install -g yarn


COPY --from=composer /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html/

ENV APACHE_RUN_USER=www-data \
    APACHE_RUN_GROUP=www-data \
    APACHE_DOCUMENT_ROOT=/var/www/html/ \
    ABSOLUTE_APACHE_DOCUMENT_ROOT=/var/www/html

