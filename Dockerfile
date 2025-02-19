# Dockerfile
FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    curl \
    zip \
    unzip \
    git \
    libonig-dev \
    libzip-dev \
    && docker-php-ext-install pdo pdo_mysql zip mbstring

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]