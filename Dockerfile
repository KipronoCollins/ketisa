# Use official PHP 8.3 with Apache (simpler for static files)
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Install PHP extensions Laravel needs (no database)
RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl \
    && docker-php-ext-install zip

# Copy composer and install dependencies
COPY composer.json composer.lock ./
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer install --no-dev --optimize-autoloader

# Copy full app
COPY . .

# Ensure permissions for storage & bootstrap/cache
RUN chmod -R 775 storage bootstrap/cache

# Enable Apache mod_rewrite for clean URLs
RUN a2enmod rewrite

# Ensure Apache serves public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# If using PHP built-in server (optional, simpler)
# CMD ["php", "-S", "0.0.0.0:10000", "-t", "public"]

# Expose port 10000 for Render
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]