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
    libpq-dev \
    nodejs \
    npm \
    && docker-php-ext-install \
    pdo \
    pdo_pgsql \
    pgsql \
    mbstring \
    exif \
    pcntl \
    bcmath \
    gd \
    zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy project files
COPY . .

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Install Node dependencies
RUN npm ci

# Build frontend assets
RUN npm run build

# Laravel permissions
RUN chmod -R 775 storage bootstrap/cache

# Laravel storage link
RUN php artisan storage:link || true

# Nginx config
COPY nginx/default.conf /etc/nginx/sites-available/default

# Expose Render port
EXPOSE 10000

# Start services
CMD php artisan migrate --force && \
    php-fpm -D && \
    nginx -g 'daemon off;'