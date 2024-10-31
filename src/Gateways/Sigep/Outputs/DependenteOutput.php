<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DependenteOutput
{
    public function __construct(
        public array $beneficios = [],
        public string $codCondicao = '',
        public string $codGrauParentesco = '',
        public string $codOrgao = '',
        public string $cpf = '',
        public string $matricula = '',
        public string $nome = '',
        public string $nomeCondicao = '',
        public string $nomeGrauParentesco = '',
    )
    {
    }
}