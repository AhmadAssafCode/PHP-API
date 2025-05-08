FROM php:8.2-apache

# Copy project files
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional, for REST-style URLs)
RUN a2enmod rewrite

# Set permissions (optional for security)
RUN chown -R www-data:www-data /var/www/html



