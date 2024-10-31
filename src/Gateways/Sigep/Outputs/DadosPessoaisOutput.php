<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosPessoaisOutput
{
    public function __construct(
        public string $codCor = '',
        public string $codDefFisica = '',
        public string $codEstadoCivil = '',
        public string $codNacionalidade = '',
        public string $codSexo = '',
        public string $dataChegBrasil = '',
        public string $dataNascimento = '',
        public string $grupoSanguineo = '',
        public string $nome = '',
        public string $nomeCor = '',
        public string $nomeDefFisica = '',
        public string $nomeEstadoCivil = '',
        public string $nomeMae = '',
        public string $nomeMunicipNasc = '',
        public string $nomeNacionalidade = '',
        public string $nomePai = '',
        public string $nomePais = '',
        public string $nomeSexo = '',
        public string $numPisPasep = '',
        public string $ufNascimento = '',
    )
    {
    }
}