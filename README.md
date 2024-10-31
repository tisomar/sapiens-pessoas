# Aplicação Sapiens Pessoas (sapiens-pessoas-backend)
## Versionamento
O ciclo de versionamento da aplicação segue a convenção abaixo. A versão é definida no ``composer.json`` e será utilizada para build e provisionamento dos artefatos pelas pipelines de CI/CD.

| Fase                            | Versão            | Exemplo   |
|---------------------------------|-------------------|-----------|
| Desenvolvimento (``develop``)       | ``<version>-dev`` | 1.6.13-dev |
| Homologação (``staging``)           | ``<version>-rc``  | 1.6.12-rc  |
| Executando em produção (``master``) | ``<version>``     | 1.6.11    |


1. Enquanto a aplicação está no ciclo de desenvolvimento (brancho develop/feature/issues...) dentro a versão deve ser mantida com o sufixo ``dev``. As branchs de features, issues e similares devem ao final serem mergeadas na develop.

2. Quando a versão for fechada e liberada para avaliação do PO, deve-se mudar para o sufixo ``rc`` e aplicar o merge da develop para a branch staging. Após o merge, é importante incrementar a versão e voltar a versão para ``dev`` na branch develop. Sempre deixar a develop com a próxima release "aberta".

3. Quando for gerada uma nova versão para produção, deve-se ``remover o sufixo``, aplicar o merge na branch master e **criar a tag** correspondente à versão ``vX.Y.Z ou X.Y.Z``. Um boa prática é sempre deixar a develop como "próxima release em aberto". Por exemplo, se acabou de liberar a versão 1.6.12-rc em staging, já deixa a versão 1.6.13-dev em develop aberta versionada.

Pode acontecer de uma versão ``rc`` não ser aprovada pelo PO. Neste caso deve-se continuar incrementando a versão. Não "voltar" a versão para dev.

## Instalação do ambiente dev no docker

****** Instalação no ubuntu 20.04 **************

- git clone https://gitlab.agu.gov.br/supp-agu/sapiens-pessoas-backend.git

- antes de instalar adicione as credencias de acesso ao GIT.LAB no arquivo auth.json

- sudo apt-get update
- sudo apt-get install docker.io
- sudo apt-get install docker-compose

Dentro do diretorio sapiens-pessoas-backend:

1) Execute os comandos abaixo:
 ```shell
 docker-compose up
 ```
2) acesse o container web executando o seguinte comando:
```shell
docker exec -it web bash
 ```
3) faça o carregamento do usuário de teste admin@email.com senha 123456:
```shell
php bin/console doctrine:fixtures:load --append
 ```
4) crie as chaves para a biblioteca JWT:
```shell
php bin/console lexik:jwt:generate-keypair
 ```
