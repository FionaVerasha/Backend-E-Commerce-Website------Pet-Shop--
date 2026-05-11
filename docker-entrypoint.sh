#!/bin/bash

echo "Setting permissions..."
chmod -R 775 storage bootstrap/cache

echo "Creating storage link..."
php artisan storage:link || true

echo "Running migrations..."
php artisan migrate --force || true

echo "Seeding database..."
php artisan db:seed --force || true

echo "Caching Laravel config..."
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

echo "Starting Apache..."
apache2-foreground
