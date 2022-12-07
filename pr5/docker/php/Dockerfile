FROM php:8.0-fpm

RUN apt-get update
RUN docker-php-ext-install mysqli && \
    pecl install -o -f redis && \
    rm -rf /tmp/pear && \
    docker-php-ext-enable redis
    