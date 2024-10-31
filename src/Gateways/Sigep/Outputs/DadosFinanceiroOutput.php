<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosFinanceiroOutput
{
    public function __construct(
        public ?string $codigoOrgao = '',
        public ?string $matricula = '',
        public string $mesAnoPagamento = '',
        public array $lancamentos = [],

    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosFinanceiros':
                $this->setLancamentos($value);
                break;
        }
    }

    private function setLancamentos($dadosFinanceiro)
    {
        if(empty($dadosFinanceiro->DadosFinanceiros)) {
            $this->lancamentos = [];
            return;
        }

        if(is_object($dadosFinanceiro->DadosFinanceiros)) {
            $this->lancamentos[] = new LancamentoFinanceiroOutput(
                $dadosFinanceiro->DadosFinanceiros->codRubrica,
                $dadosFinanceiro->DadosFinanceiros->dataAnoMesRubrica,
                $dadosFinanceiro->DadosFinanceiros->indicadorMovSupl,
                $dadosFinanceiro->DadosFinanceiros->indicadorRD,
                $dadosFinanceiro->DadosFinanceiros->nomeRubrica,
                $dadosFinanceiro->DadosFinanceiros->numeroSeq,
                $dadosFinanceiro->DadosFinanceiros->peRubrica,
                $dadosFinanceiro->DadosFinanceiros->pzRubrica,
                $dadosFinanceiro->DadosFinanceiros->valorRubrica
            );
            return;
        }

        foreach ($dadosFinanceiro->DadosFinanceiros as $lancamento){
            $this->lancamentos[] = new LancamentoFinanceiroOutput(
                $lancamento->codRubrica,
                $lancamento->dataAnoMesRubrica,
                $lancamento->indicadorMovSupl,
                $lancamento->indicadorRD,
                $lancamento->nomeRubrica,
                $lancamento->numeroSeq,
                $lancamento->peRubrica,
                $lancamento->pzRubrica,
                $lancamento->valorRubrica
            );
        }

    }


}