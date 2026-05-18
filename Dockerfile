FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    zip \
    unzip \
    nginx \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    nodejs \
    npm \
    default-mysql-client \
    && docker-php-ext-install pdo pdo_mysql mbstring exif pcntl bcmath gd zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Install Node dependencies
RUN npm install

# Build Vite assets
RUN npm run build

# Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

# Nginx config
COPY nginx/default.conf /etc/nginx/sites-available/default

# Expose port
EXPOSE 10000

# Start services
CMD php artisan config:cache && \
    php artisan route:cache && \
    php artisan view:cache && \
    php-fpm -D && \
    nginx -g 'daemon off;'