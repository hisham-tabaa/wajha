#!/bin/bash
set -e

echo "🔍 Checking database connection..."
php artisan db:show || echo "⚠️ Database connection check failed, but continuing..."

echo "🚀 Running migrations..."
php artisan migrate --force --verbose

echo "✅ Migrations completed!"

