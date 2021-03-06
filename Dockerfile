FROM php:7.4

RUN apt-get update && apt-get upgrade -y && apt-get install -y git zip unzip vim \
    && php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
    && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
    && rm composer-setup.php \
    && docker-php-ext-install bcmath exif

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug