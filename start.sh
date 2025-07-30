#!/bin/bash

# Set error handling
set -e

echo "Starting Silbele application..."

# Check if we're in the right directory
pwd
ls -la

# Check PHP version
php --version

# Check if Laravel is installed
if [ ! -f "artisan" ]; then
    echo "Error: artisan file not found!"
    exit 1
fi

# Clear any cached configs that might cause issues
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Run migrations if needed (with error handling)
echo "Running migrations..."
php artisan migrate --force || echo "Migration failed, continuing..."

# Start the application
echo "Starting Laravel server on port ${PORT:-8000}..."
php artisan serve --host=0.0.0.0 --port ${PORT:-8000} 