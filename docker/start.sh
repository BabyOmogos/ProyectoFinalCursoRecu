#!/usr/bin/env bash
set -e

bash /var/www/html/docker/00-laravel-deploy.sh

PORT="${PORT:-10000}"
sed -i "s/listen 8080/listen ${PORT}/" /etc/nginx/sites-available/default

php-fpm -D
nginx -g 'daemon off;'
