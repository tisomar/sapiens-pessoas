<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class InfoFeriasOutput
{
    public function __construct(
        public ?string $adiantamentoSalarioFerias,
        public ?string $anoExercicio,
        public ?string $dataFim,
        public ?string $dataFimAquisicao,
        public ?string $dataIni,
        public ?string $dataInicioAquisicao,
        public ?string $dataInicioFeriasInterrompidas,
        public ?string $diasRestantes,
        public ?string $gratificacaoNatalina,
        public ?string $numeroDaParcela,
        public ?string $parcelaContinuacaoInterrupcao,
        public ?string $parcelaInterrompida,
        public ?string $qtdeDias,

    )
    {
    }
}