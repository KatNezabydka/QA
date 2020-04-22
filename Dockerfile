FROM php:7.4.4-fpm-alpine3.11

# Install Postgresql extension
RUN set -ex \
        && apk --no-cache add postgresql-libs postgresql-dev \
        && docker-php-ext-install pgsql pdo_pgsql sockets \
        && apk del postgresql-dev

WORKDIR /var/www/html

EXPOSE 9000

COPY . /var/www/html

RUN apk --update --no-cache add autoconf g++ make && \
    pecl install -f xdebug && \
    docker-php-ext-enable xdebug && \
    apk del --purge autoconf g++ make

COPY docker/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

COPY docker/99-overrides.ini /usr/local/etc/php/conf.d/99-overrides.ini

CMD ["php-fpm", "--nodaemonize"]