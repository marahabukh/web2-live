# Use official PHP image with Apache
FROM php:8.2-apache

# Install required PHP extensions and system packages
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy project files
COPY . .

# Install PHP dependencies using Composer
RUN composer install

# Set correct permissions
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html

# Laravel setup (optional: can be moved to entrypoint)
RUN php artisan key:generate
# RUN php artisan migrate --force  # You can run this at runtime instead if safer

# Expose port for Laravel's PHP server or Apache (default 80)
EXPOSE 80

# Start Apache (or use CMD for php artisan serve)
CMD ["apache2-foreground"]
