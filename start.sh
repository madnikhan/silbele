#!/bin/bash

# Wait for database to be ready (if using external database)
echo "Starting Silbele application..."

# Run migrations if needed
php artisan migrate --force

# Start the application
php artisan serve --host=0.0.0.0 --port $PORT 