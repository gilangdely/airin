FROM php:8.4-apache

# COPY 000-default.conf /etc/apache2/sites-available/000-default.conf

RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    git \
    curl \
    libzip-dev \
    libicu-dev \
    ca-certificates \
    lsb-release \
    gnupg \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql intl zip

RUN a2enmod rewrite

COPY . /var/www/html

WORKDIR /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN git config --global --add safe.directory /var/www/html
RUN composer install --no-interaction

RUN chown -R www-data:www-data /var/www/html
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 80