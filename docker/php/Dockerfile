FROM php:7.4-fpm


RUN apt-get update \
    && docker-php-ext-install pdo_mysql 
RUN apt-get install -y sendmail sendmail-cf mailutils
