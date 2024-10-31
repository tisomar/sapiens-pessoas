# Imagem base do PHP 8.1
FROM php:8.1-cli

# Diretório da aplicação
WORKDIR /app

# Instalar dependências do oci8
RUN apt-get update && \
    apt-get install -y libaio1 unzip libldap2-dev libxml2-dev libssl-dev librabbitmq-dev supervisor nano htop cron && \
    apt-get clean && \
    rm -rf /var/lib/apt/lists/*z && \
    docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ && \
    docker-php-ext-configure soap --enable-soap && \
    docker-php-ext-install ldap soap

RUN docker-php-ext-install mysqli pdo pdo_mysql sockets
#Instalar ext redis
RUN pecl install redis amqp && docker-php-ext-enable redis amqp

# Baixar a última versão do Xdebug
RUN pecl install xdebug

# Configurar xdebug no php.ini
RUN echo "xdebug.mode=debug" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.client_port=9000" >> /usr/local/etc/php/php.ini
RUN echo "xdebug.idekey=docker" >> /usr/local/etc/php/php.ini

# Utilizar esta linha quando for utilizar no WSL
#RUN echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/php.ini
# Alterar esta linha para linux quando for utilizar no WSL
RUN echo "xdebug.client_host=192.168.1.5" >> /usr/local/etc/php/php.ini

COPY /docker/dev/php/crontab.txt /etc/crontab

RUN chmod 0644 /etc/crontab

# Habilitar o Xdebug
#RUN docker-php-ext-enable xdebug

# Descompactar o Instant Client
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

COPY /docker/dev/php/supervisord.conf /etc/supervisor/conf.d/supervisord.conf

# Exposição da porta 8000
EXPOSE 8000

# Comando de entrada do contêiner
ENTRYPOINT ["sh", "/app/docker/dev/php/docker-entrypoint.sh"]
