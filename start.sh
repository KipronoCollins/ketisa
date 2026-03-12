#!/bin/bash

echo "Container starting..."

# Wait for database
sleep 5

echo "Running Laravel migrations..."
php artisan migrate --force || true

echo "Caching configs..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Apache..."
apache2-foreground