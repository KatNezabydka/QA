FROM php:7.4.4-fpm-alpine3.11

# Install Postgresql extension
RUN set -ex \
        && apk --no-cache add postgresql-libs postgresql-dev \
        && docker-php-ext-install pgsql pdo_pgsql sockets \
        && apk del postgresql-dev

WORKDIR /var/www/html

EXPOSE 9000

COPY . /var/www/html

CMD ["php-fpm", "--nodaemonize"]