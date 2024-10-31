<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class AfastamentoOutput
{
    public function __construct(
        public ?array  $arrFerias,
        public ?string $grMatricula,
        public ?string $lpa,
        public ?\stdClass $ocorrencias,
        public ?string $reclusao = ''
    )
    {
    }

}