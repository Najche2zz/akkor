FROM php:7.3-apache
# FROM php:7.2-apache

RUN apt-get update && apt-get install -y \
    libfreetype-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    && docker-php-ext-install -j$(nproc) gd

RUN docker-php-ext-install pdo_mysql

RUN a2enmod rewrite

#COPY ./start.sh /usr/local/bin

#RUN chmod +x /usr/local/bin/start.sh

RUN mv "$PHP_INI_DIR/php.ini-production" "$PHP_INI_DIR/php.ini"

RUN sed -ri -e 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

EXPOSE 80 443

#ENTRYPOINT [ "start.sh" ]