FROM php:8.2-apache

# Copy project files
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional, for REST-style URLs)
RUN a2enmod rewrite

# Set permissions (optional for security)
RUN chown -R www-data:www-data /var/www/html

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    libpq-dev \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install pdo pdo_mysql mysqli

