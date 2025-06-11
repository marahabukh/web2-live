# Use official PHP CLI image
FROM php:8.2-cli

# Install system dependencies and PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl libzip-dev zip libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Install Laravel dependencies
RUN composer install

# Generate Laravel app key
RUN php artisan key:generate

# Expose port for Railway (uses env var ${PORT})
EXPOSE 8080

# Start Laravel's dev server on Railway's dynamic port
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
