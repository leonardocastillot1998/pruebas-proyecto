#!/bin/sh
set -e

mkdir -p \
    /var/www/html/bootstrap/cache \
    /var/www/html/storage/framework/cache/data \
    /var/www/html/storage/framework/sessions \
    /var/www/html/storage/framework/testing \
    /var/www/html/storage/framework/views \
    /var/www/html/storage/logs

chown -R www-data:www-data /var/www/html/bootstrap/cache /var/www/html/storage
chmod -R ug+rwx /var/www/html/bootstrap/cache /var/www/html/storage

exec "$@"
