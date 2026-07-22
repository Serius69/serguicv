#!/usr/bin/env bash
# deploy.sh — Run this on your server after git pull
# Usage: bash deploy.sh

set -e

echo "🚀 Starting deploy..."

# Ensure we're in the project root
cd "$(dirname "$0")"

# Install/update PHP deps (no dev, optimized)
echo "📦 Installing dependencies..."
composer install --no-dev --optimize-autoloader --no-interaction --quiet

# Cache everything for production
echo "⚡ Caching config, routes, views..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

# Clear application cache (fresh start after deploy)
php artisan cache:clear

# Ensure correct permissions
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache 2>/dev/null || true

echo "✅ Deploy complete at $(date)"
echo "   Serving: $(php artisan env | grep APP_URL || echo 'check APP_URL in .env')"
