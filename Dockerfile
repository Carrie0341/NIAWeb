# Use an official PHP runtime as a parent image
FROM php:7.1

# Install system dependencies for Composer and Git
RUN apt-get update && apt-get install -y git unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set the working directory in the container
WORKDIR /app

# Copy the application files to the container
COPY . /app

# Install PHP dependencies
RUN composer update
RUN composer install

# Copy over the example environment file and generate a key
RUN cp .env.example .env
RUN php artisan key:generate

# Command to run the application
CMD ["php", "artisan", "serve", "--host=0.0.0.0"]
