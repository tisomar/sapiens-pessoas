#!/bin/bash

if [ "$1" == "cadastro_servidor_sigepe" ]
then
    exec php /var/www/html/bin/console messenger:consume fila_cadastro_servidor_sigepe --time-limit=3600 --env=prod --limit=10
fi

if [ "$1" == "atualizacao_servidor_sigepe" ]
then
    exec php /var/www/html/bin/console messenger:consume fila_atualizacao_servidor_sigepe --time-limit=3600 --env=prod --limit=10
fi

exit 1
