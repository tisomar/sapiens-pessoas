#!/bin/bash
set -e

if [ "$NGINX" == "true" ]
then
    nginx -g "daemon off;"
fi

if [ "$WORKER" == "true" ]
then
    supervisord
fi
