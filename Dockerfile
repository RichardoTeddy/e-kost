FROM php:8.1-apache

# Install extensions and tools
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libonig-dev \
    libzip-dev \
    unzip \
    git \
 && docker-php-ext-install pdo pdo_mysql mbstring zip gd

# Enable Apache mods
RUN a2enmod rewrite

# Copy application
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Ensure public is the document root
RUN sed -ri "s!/var/www/html!/var/www/html/public!g" /etc/apache2/sites-available/000-default.conf

# Set permissions for writable folders
RUN mkdir -p /var/www/html/writable && chown -R www-data:www-data /var/www/html/writable

EXPOSE 8080

CMD ["apache2-foreground"]
