FROM php:8.0-fpm
# https://github.com/mlocati/docker-php-extension-installer
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/

RUN apt update && apt -y install zip unzip git \
    && install-php-extensions xdebug \
    && install-php-extensions @composer-2 \
    && mkdir /.composer && chmod ugo+w /.composer \
    && apt clean \
    && cp /usr/local/etc/php/php.ini-development /usr/local/etc/php/php.ini

COPY 99-xdebug.ini /usr/local/etc/php/conf.d/99-xdebug.ini

WORKDIR /app