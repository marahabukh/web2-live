# Use PHP CLI with Composer
FROM php:8.2-cli

# Install system packages and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy all files to container
COPY . .

# Install PHP dependencies
RUN composer install

# Generate app key
RUN php artisan key:generate

# Optional: run DB migrations here or during container start
# RUN php artisan migrate --force

# Expose port for Laravel dev server
EXPOSE 8080

# Start Laravel on Railway-assigned port
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
