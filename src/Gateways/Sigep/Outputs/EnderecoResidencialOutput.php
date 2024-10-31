<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class EnderecoResidencialOutput
{
    public function __construct(

        public string $cep = '',
        public string $logradouro = '',
        public string $numero = '',
        public string $complemento = '',
        public string $bairro = '',
        public string $codMunicipio = '',
        public string $nomeMunicipio = '',
        public string $uf = '',
        public string $dddTelefone = '',
        public string $numTelefone = '',
    )
    {
    }
}