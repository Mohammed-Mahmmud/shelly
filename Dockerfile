# Use PHP 7.3 with Apache as the base image
FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Install required PHP extensions and other dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    libpng-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libgmp-dev \
    libicu-dev \
    protobuf-compiler \
    && docker-php-ext-install gd zip pdo_mysql bcmath gd intl pdo  \
    && docker-php-ext-enable gd zip pdo_mysql  bcmath gd intl pdo \
    && docker-php-ext-configure gd \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Configure Apache Document Root
ENV APACHE_DOCUMENT_ROOT /var/www/html

# Update Apache configuration with the correct document root
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

USER root

COPY . .

# Run composer install
RUN composer install --ignore-platform-req=ext-exif

# Set permissions for storage and cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
    && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

RUN php artisan key:generate --force \
    && php artisan optimize:clear

# Copy custom php.ini to the container
COPY php.ini /usr/local/etc/php/


# Expose port 80 for Apache
EXPOSE 80

# Start Apache server
CMD ["apache2-foreground"]
