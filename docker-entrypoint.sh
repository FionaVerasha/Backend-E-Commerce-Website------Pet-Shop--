#!/bin/bash

# Ensure storage and cache directories are writable
chmod -R 775 storage bootstrap/cache

# Create symbolic link for storage if it doesn't exist
php artisan storage:link --force

# Run migrations (crucial for students to show DB connection)
echo "Running migrations..."
php artisan migrate --force

# Seed products
echo "Seeding products..."
php artisan db:seed --force

# Caching for production
echo "Optimizing Laravel for production..."
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Start Apache in the foreground
echo "Starting Apache..."
apache2-foreground
