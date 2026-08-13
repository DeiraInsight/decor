FROM php:8.2-apache

# Install ekstensi database
RUN apt-get update && apt-get install -y \
    libpq-dev \
    git \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_pgsql

# Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# Arahkan web server langsung ke folder public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/conf-available/*.conf

# Masukkan Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html
COPY . /var/www/html

# Beri izin agar folder storage bisa ditulisi oleh sistem
RUN chown -R www-data:www-data /var/www/html/storage

EXPOSE 80
