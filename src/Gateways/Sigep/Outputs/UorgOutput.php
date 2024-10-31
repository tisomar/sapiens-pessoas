<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class UorgOutput
{
    public function __construct(
        public string $bairroUorg = '',
        public string $cepUorg = '',
        public string $codMatricula = '',
        public string $codMunicipioUorg = '',
        public string $codOrgao = '',
        public string $codOrgaoUorg = '',
        public string $complementoUorg = '',
        public string $emailUorg = '',
        public string $endUorg = '',
        public string $logradouroUorg = '',
        public string $nomeMunicipioUorg = '',
        public string $nomeUorg = '',
        public string $numFaxUorg = '',
        public string $numTelefoneUorg = '',
        public string $numeroUorg = '',
        public string $siglaUorg = '',
        public string $ufUorg = '',
    )
    {
    }
}