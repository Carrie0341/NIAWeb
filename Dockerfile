# Use an official PHP runtime as a parent image
FROM php:7.1-apache

# Enable Apache Rewrite Module
RUN a2enmod rewrite

# Install dependencies
RUN apt-get update && apt-get install -y libzip-dev zip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql zip

ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy the application files to the container
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer update
RUN composer install

# Copy over the example environment file and generate a key
RUN cp .env.example .env
RUN php artisan key:generate

# Change ownership of our applications
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# 啟動 Apache
# CMD ["apache2-foreground"]
