# PHP 8.3 with Apache
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

# Copy full Laravel app
COPY . .

# Create storage/tmp for temp files
RUN mkdir -p storage/tmp \
    && chmod -R 775 storage bootstrap/cache storage/tmp public

# Set TMPDIR for PHP/Laravel
ENV TMPDIR=/var/www/html/storage/tmp
RUN echo "upload_tmp_dir=/var/www/html/storage/tmp" >> /usr/local/etc/php/conf.d/uploads.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Expose Render web port
EXPOSE 10000

# Start Apache in foreground
CMD ["apache2-foreground"]