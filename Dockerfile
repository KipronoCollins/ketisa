# Use official PHP 8.3 with Apache
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions needed by Laravel (no DB)
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install zip \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite module
RUN a2enmod rewrite

# Copy the full Laravel app into the container
COPY . .

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Ensure storage, cache, and public folders are writable
RUN mkdir -p storage/framework/sessions storage/tmp \
    && chmod -R 775 storage bootstrap/cache storage/tmp public

# Set a temp folder for Laravel and PHP
ENV TMPDIR=/var/www/html/storage/tmp

# Set Apache document root to public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose port 10000 for Render
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]