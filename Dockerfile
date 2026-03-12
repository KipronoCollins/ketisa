# PHP 8.3 with Apache
FROM php:8.3-apache

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    libpq-dev \
    unzip \
    git \
    curl \
    && docker-php-ext-install zip pdo_pgsql \
    && rm -rf /var/lib/apt/lists/*

# Enable Apache rewrite
RUN a2enmod rewrite

# Copy Laravel app
COPY . .

# Create temp directory and set permissions
RUN mkdir -p storage/tmp \
    && chmod -R 777 storage bootstrap/cache public

# Configure PHP temp directory
RUN echo "sys_temp_dir=/var/www/html/storage/tmp" >> /usr/local/etc/php/conf.d/tmpdir.ini \
    && echo "upload_tmp_dir=/var/www/html/storage/tmp" >> /usr/local/etc/php/conf.d/tmpdir.ini

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/local/bin \
    --filename=composer

# Install Laravel dependencies
RUN composer install --no-dev --optimize-autoloader

# Set Apache document root to Laravel public folder
ENV APACHE_DOCUMENT_ROOT /var/www/html/public

RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy startup script
COPY start.sh /start.sh
RUN chmod +x /start.sh

# Render port
EXPOSE 10000

# Start container
CMD ["/start.sh"]