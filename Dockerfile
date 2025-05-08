FROM php:8.2-apache

# Install necessary packages and PHP extensions
#RUN apt-get update && apt-get install -y \
  #  libzip-dev \
   # unzip \
    #&& docker-php-ext-install pdo_mysql mysqli
RUN apt-get update && apt-get install -y \
    && docker-php-ext-install pdo_mysql mysqli
    
# Copy your PHP code into the container
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional, for REST-style URLs)
RUN a2enmod rewrite

# Set permissions (optional for security)
#RUN chown -R www-data:www-data /var/www/html



