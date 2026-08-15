FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

RUN a2enmod rewrite

ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

RUN mkdir -p /var/www/html/storage/temp /var/www/html/storage/upload

RUN chown -R www-data:www-data /var/www/html/storage

EXPOSE 80
