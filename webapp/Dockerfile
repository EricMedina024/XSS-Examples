FROM php:8.1.3-apache

COPY src /var/www/html/
COPY config.ini /usr/local/config.ini
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo_mysql