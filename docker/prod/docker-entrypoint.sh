#!/bin/bash
set -e

service supervisor start

mkdir -p /var/www/html/var/cache
mkdir -p /var/www/html/var/log

php /var/www/html/bin/console assets:install --symlink --relative --no-interaction --env=prod --no-debug
chown -R www-data /var/www/html/var

crontab /etc/crontab
cron

php-fpm -D
nginx -g "daemon off;"

tail -f /dev/null

exec "$@"
