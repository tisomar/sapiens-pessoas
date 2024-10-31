<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class BeneficioDependenteOutput
{
    public function __construct(
        public string $codBeneficio = '',
        public string $dataFim = '',
        public string $dataInicio = '',
        public string $nomeBeneficio = '',
    )
    {
    }
}