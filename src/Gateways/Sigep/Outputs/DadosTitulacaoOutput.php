<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosTitulacaoOutput
{
    public function __construct(

        public string $codMatricula = '',
        public string $codOrgao = '',
        public string $codTitulacao = '',
        public string $nomeTitulacao = '',
    )
    {
    }
}