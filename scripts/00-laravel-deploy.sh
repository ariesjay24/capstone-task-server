#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force

echo "Running seeders..."
php artisan db:seed --force
php artisan db:seed --class=ProjectSeeder --force
php artisan db:seed --class=ProjectProgressSeeder --force
php artisan db:seed --class=TaskSeeder --force