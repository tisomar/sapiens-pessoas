<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class ContaBancariaOutput
{
    public function __construct(
        public string $agencia = '',
        public string $agenciaOutrosPagtos = '',
        public string $banco = '',
        public string $bancoOutrosPagtos = '',
        public string $codOrgao = '',
        public string $contaCorrente = '',
        public string $contaCorrenteOutrosPagtos = '',
        public string $matricula = ''
    )
    {
    }
}