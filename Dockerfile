FROM php:8.3-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    libicu-dev \
    zip \
    unzip \
    nodejs \
    npm

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip intl

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Install dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction --prefer-dist
RUN npm install
RUN npm run build

# Set proper permissions
RUN chown -R www-data:www-data /var/www

# Expose port 8000 for Laravel
EXPOSE 8000

# Copy startup script and make it executable
COPY start.sh /var/www/start.sh
RUN chmod +x /var/www/start.sh

# Start the application
CMD ["/var/www/start.sh"] 