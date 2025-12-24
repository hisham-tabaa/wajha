#!/bin/bash
set -e

if [ ! -f ".env" ]; then
    echo "Creating .env file from .env.docker"
    cp .env.docker .env
fi

if [ -z "$APP_KEY" ]; then
    echo "Generating application key..."
    php artisan key:generate --force
fi

echo "Waiting for database to be ready..."
max_tries=30
counter=0
until php artisan db:show 2>/dev/null | grep -q "Database"; do
    counter=$((counter + 1))
    if [ $counter -gt $max_tries ]; then
        echo "Database connection failed after $max_tries attempts"
        exit 1
    fi
    echo "Database is not ready yet. Waiting... (attempt $counter/$max_tries)"
    sleep 2
done
echo "Database connection established!"

echo "Running database migrations..."
php artisan migrate --force

echo "Clearing caches..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Creating storage link..."
php artisan storage:link || true

echo "Setting permissions..."
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

echo "Starting PHP-FPM..."
exec "$@"
