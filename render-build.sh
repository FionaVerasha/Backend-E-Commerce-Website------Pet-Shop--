#!/usr/bin/env bash
# exit on error
set -o errexit

# Install PHP dependencies
composer install --no-dev --optimize-autoloader

# Install Node dependencies and build assets
npm install
npm run build

# Run migrations (This runs during every deploy)
# Use --force because it's in production
php artisan migrate --force

# Caching for production
php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Link storage
php artisan storage:link
