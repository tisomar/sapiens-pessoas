<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class LancamentoFinanceiroOutput
{
    public function __construct(
        public string $codRubrica = '',
        public string $dataAnoMesRubrica = '',
        public string $indicadorMovSupl = '',
        public string $indicadorRD = '',
        public string $nomeRubrica = '',
        public string $numeroSeq = '',
        public string $peRubrica = '',
        public string $pzRubrica = '',
        public string $valorRubrica = ''
    )
    {
    }
}