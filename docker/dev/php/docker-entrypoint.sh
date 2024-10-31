#!/bin/bash
set -e

rm -rf composer.lock
echo "info composer: Caso trave, ajustar grupo/permissoes na pasta do projeto"
composer -V
composer install --ansi --no-interaction

service supervisor start

crontab /etc/crontab
cron

php -v
php -S 0.0.0.0:8000 -t public/


