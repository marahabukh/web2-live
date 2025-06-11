# ✅ Use PHP 8.2 with CLI (includes PHP)
FROM php:8.2-cli

# ✅ Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    git unzip curl zip libzip-dev libpng-dev libonig-dev libxml2-dev \
    && docker-php-ext-install pdo pdo_mysql zip

# ✅ Install Composer (latest official way)
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# ✅ Set working directory
WORKDIR /app

# ✅ Copy project files
COPY . .

# ✅ Install PHP dependencies
RUN composer install

# ✅ Generate Laravel app key
RUN php artisan key:generate

# ✅ EXPOSE the port Laravel will use
EXPOSE 8080

# ✅ Start Laravel on the port Railway gives us
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=${PORT}"]
