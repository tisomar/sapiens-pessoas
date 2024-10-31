<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DocumentacaoOutput
{
    public function __construct(
        public string $categoriaCarteiraMotorista = '',
        public string $dataCarteiraIdentidade = '',
        public string $dataComprovanteMilitar = '',
        public string $dataExpedicaoCarteiraMotorista = '',
        public string $dataPrimExpedCarteiraMotorista = '',
        public string $dataTituloEleitor = '',
        public string $dataValidadeCarteiraMotorista = '',
        public string $numCPF = '',
        public string $numPisPasep = '',
        public string $numeroCarteiraIdentidade = '',
        public string $numeroCarteiraMotorista = '',
        public string $numeroCarteiraTrabalho = '',
        public string $numeroComprovanteMilitar = '',
        public string $numeroTituloEleitor = '',
        public string $orgaoCarteiraIdentidade = '',
        public string $orgaoComprovanteMilitar = '',
        public string $passaporte = '',
        public string $registroCarteiraMotorista = '',
        public string $secaoTituloEleitor = '',
        public string $serieCarteiraTrabalho = '',
        public string $serieComprovanteMilitar = '',
        public string $ufCarteiraIdentidade = '',
        public string $ufCarteiraMotorista = '',
        public string $ufCarteiraTrabalho = '',
        public string $ufTituloEleitor = '',
        public string $zonaTituloEleitor = ''
    )
    {
    }
}