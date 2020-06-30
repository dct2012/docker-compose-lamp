FROM php:7.4-apache

COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/bin/

RUN apt-get update && install-php-extensions pdo_mysql