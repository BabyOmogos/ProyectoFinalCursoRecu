#!/usr/bin/env bash
set -e

bash /var/www/html/docker/00-laravel-deploy.sh

PORT="${PORT:-10000}"
echo "Starting Laravel on port ${PORT}..."
exec php artisan serve --host=0.0.0.0 --port="${PORT}"
