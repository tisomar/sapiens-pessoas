# pulled from ubuntu
FROM php:8.1-fpm

#Diretório da aplicação
WORKDIR /var/www/html

# Instalar dependências do oci8
RUN apt-get update && \
    apt-get install -y libaio1 unzip libldap2-dev libxml2-dev libssl-dev librabbitmq-dev nginx supervisor nano htop cron && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*z && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
    docker-php-ext-configure soap --enable-soap && \
    docker-php-ext-install ldap soap

RUN docker-php-ext-install pdo

#Instalar ext redis
RUN pecl install redis amqp && docker-php-ext-enable redis amqp

ADD docker/dev/oracle/instantclient-basic-linux.x64-19.19.0.0.0dbru.zip /tmp/
ADD docker/dev/oracle/instantclient-sdk-linux.x64-19.19.0.0.0dbru.zip /tmp/
RUN unzip /tmp/instantclient-basic-linux.x64-19.19.0.0.0dbru.zip -d /usr/local/
RUN unzip /tmp/instantclient-sdk-linux.x64-19.19.0.0.0dbru.zip -d /usr/local/
RUN mv /usr/local/instantclient_19_19 /usr/local/instantclient
RUN ln -sf /usr/local/instantclient/libclntsh.so.19.1 /usr/local/instantclient/libclntsh.so
RUN ln -sf /usr/local/instantclient/libocci.so.19.1 /usr/local/instantclient/libocci.so
RUN rm /tmp/instantclient-basic-linux.x64-19.19.0.0.0dbru.zip
RUN rm /tmp/instantclient-sdk-linux.x64-19.19.0.0.0dbru.zip

# Configurar variáveis de ambiente do Instant Client
ENV LD_LIBRARY_PATH /usr/local/instantclient
ENV ORACLE_HOME /usr/local/instantclient

RUN ldconfig

# Instalar oci8
RUN echo 'instantclient,/usr/local/instantclient' | pecl install oci8-3.2.0

# Habilitar o módulo oci8 no PHP
RUN echo 'extension=oci8.so' > /usr/local/etc/php/conf.d/oci8.ini

# Instalação das dependências do Symfony
RUN curl -sS https://getcomposer.org/installer | php -- --version=2.5.4 --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer
RUN composer config --global process-timeout 1000

# Instalação wkhtmltopdf e dependencias
RUN apt-get install -y \
    libxrender1 \
    libfontconfig1 \
    libx11-dev \
    libjpeg62 \
    libxtst6 \
    wget \
    && wget https://github.com/h4cc/wkhtmltopdf-amd64/blob/master/bin/wkhtmltopdf-amd64?raw=true -O /usr/local/bin/wkhtmltopdf \
    && chmod +x /usr/local/bin/wkhtmltopdf

COPY /docker/prod/php-fpm.ini /etc/php/8.1/fpm/php.ini
COPY /docker/prod/php-cli.ini /etc/php/8.1/cli/php.ini
COPY /docker/prod/default.conf /etc/nginx/conf.d/default.conf
COPY /docker/prod/nginx.conf /etc/nginx/nginx.conf
COPY /docker/prod/www.conf /etc/php/8.1/fpm/pool.d/www.conf
COPY /docker/prod/supervisord.conf /etc/supervisor/conf.d/supervisord.conf
COPY /docker/prod/crontab.txt /etc/crontab

RUN chmod 0644 /etc/crontab

# install composer
RUN echo no-cache
RUN curl -sS https://getcomposer.org/installer | php -- --version=2.5.4 --install-dir=/usr/local/bin --filename=composer
RUN chmod +x /usr/local/bin/composer
RUN composer config --global process-timeout 2000

# copy source files
COPY --chown=www-data:www-data . /var/www/html/
COPY /docker/prod/workers-control.sh /var/www/html/workers-control.sh

RUN chmod +x /var/www/html/workers-control.sh

ENV SECRET_KEY=config/jwt/private.pem
ENV PUBLIC_KEY=config/jwt/public.pem
ENV JWT_PASSPHRASE=agu1234

# estamos usando uma chave fixa
#RUN make generate-jwt-keys

RUN composer install --no-scripts --no-interaction --optimize-autoloader --classmap-authoritative

EXPOSE 8000

ENTRYPOINT ["/var/www/html/docker/prod/docker-entrypoint.sh"]
