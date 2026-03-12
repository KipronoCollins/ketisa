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

# Create storage/tmp and force PHP to use it globally
RUN mkdir -p storage/tmp \
    && chmod -R 777 storage/tmp storage bootstrap/cache public \
    && echo "sys_temp_dir=/var/www/html/storage/tmp" >> /usr/local/etc/php/conf.d/tmpdir.ini \
    && echo "upload_tmp_dir=/var/www/html/storage/tmp" >> /usr/local/etc/php/conf.d/tmpdir.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

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