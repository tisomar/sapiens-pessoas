<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class PensionistaOutput
{
    public function __construct(
        public ?string $bairro,
        public ?string $cep,
        public ?string $cidade,
        public ?string $faixaEtaria,
        public ?string $logradouro,
        public ?string $matriculaBeneficiario,
        public ?string $nome,
        public ?string $numero,
        public ?string $sexo,
        public ?string $uf,
        public ?\stdClass $orgao,
        public ?\stdClass $upag,
    )
    {
    }

}