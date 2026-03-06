# docker/php/Dockerfile
FROM php:8.2-apache

# Install MySQL extensions (requires internet only once during build)
RUN docker-php-ext-install pdo_mysql mysqli

# Enable Apache mod_rewrite for clean URLs if needed
RUN a2enmod rewrite

# Optional: Install MySQL client for debugging (comment out if not needed)
RUN apt-get update && apt-get install -y default-mysql-client && apt-get clean