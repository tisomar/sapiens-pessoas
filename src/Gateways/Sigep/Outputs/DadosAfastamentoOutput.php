<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosAfastamentoOutput
{
    public function __construct(
        public ?\stdClass $dadosAfastamentoPorCPF,
        public array $afastamentosPorMatricula = [],
        public array $ocorrencias = [],

    )
    {
    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosAfastamentoPorMatricula':
                $this->setAfastamentos($value);
                break;
        }
    }

    private function setOcorrencias($dadosOcorrencias)
    {
        dd($dadosOcorrencias);
    }

    private function setAfastamentos($dadosAfastamentoPorMatricula  )
    {
        if (empty($dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula)) {
            $this->afastamentosPorMatricula = [];
            return;
        }
//        if(is_object($dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula)) {
//            $ferias = $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->ferias;
//            $arrInfoFerias = [];
//            $this->afastamentosPorMatricula[] = new AfastamentoOutput(
//                $arrInfoFerias,
//                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->grMatricula,
//                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->lpa,
//                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->ocorrencias,
//                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->reclusao,
//            );
//            return;
//        }

        if (is_array($dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula)){

            foreach ($dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula as $afastamento) {
                #dd($afastamento->ferias->DadosFerias);
                if(!$afastamento->ferias){
                    $this->afastamentosPorMatricula[] = new AfastamentoOutput(
                        [],
                        $afastamento->grMatricula,
                        $afastamento->lpa,
                        $afastamento->ocorrencias,
                        $afastamento->reclusao
                    );
                    continue;
                }
                $arrDadosFerias = $afastamento->ferias->DadosFerias;
                $arrInfoFerias = [];

                if (is_array($arrDadosFerias)){
                    foreach ($arrDadosFerias as $ferias) {

                        $arrInfoFerias[] = new InfoFeriasOutput(
                            $ferias->adiantamentoSalarioFerias,
                            $ferias->anoExercicio,
                            $ferias->dataFim,
                            $ferias->dataFimAquisicao,
                            $ferias->dataIni,
                            $ferias->dataInicioAquisicao,
                            $ferias->dataInicioFeriasInterrompidas,
                            $ferias->diasRestantes,
                            $ferias->gratificacaoNatalina,
                            $ferias->numeroDaParcela,
                            $ferias->parcelaContinuacaoInterrupcao,
                            $ferias->parcelaInterrompida,
                            $ferias->qtdeDias
                        );
                    }
                }else{
                    $arrInfoFerias[] = new InfoFeriasOutput(
                        $arrDadosFerias->adiantamentoSalarioFerias,
                        $arrDadosFerias->anoExercicio,
                        $arrDadosFerias->dataFim,
                        $arrDadosFerias->dataFimAquisicao,
                        $arrDadosFerias->dataIni,
                        $arrDadosFerias->dataInicioAquisicao,
                        $arrDadosFerias->dataInicioFeriasInterrompidas,
                        $arrDadosFerias->diasRestantes,
                        $arrDadosFerias->gratificacaoNatalina,
                        $arrDadosFerias->numeroDaParcela,
                        $arrDadosFerias->parcelaContinuacaoInterrupcao,
                        $arrDadosFerias->parcelaInterrompida,
                        $arrDadosFerias->qtdeDias
                    );
                }
                $this->afastamentosPorMatricula[] = new AfastamentoOutput(
                    $arrInfoFerias,
                    $afastamento->grMatricula,
                    $afastamento->lpa,
                    $afastamento->ocorrencias,
                    $afastamento->reclusao
                );
            }
        }else{
            $arrDadosFerias = $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->ferias->DadosFerias;
            $arrInfoFerias = [];
            foreach ($arrDadosFerias as $ferias) {
                $arrInfoFerias[] = new InfoFeriasOutput(
                    $ferias->adiantamentoSalarioFerias,
                    $ferias->anoExercicio,
                    $ferias->dataFim,
                    $ferias->dataFimAquisicao,
                    $ferias->dataIni,
                    $ferias->dataInicioAquisicao,
                    $ferias->dataInicioFeriasInterrompidas,
                    $ferias->diasRestantes,
                    $ferias->gratificacaoNatalina,
                    $ferias->numeroDaParcela,
                    $ferias->parcelaContinuacaoInterrupcao,
                    $ferias->parcelaInterrompida,
                    $ferias->qtdeDias
                );
            }

            $this->afastamentosPorMatricula[] = new AfastamentoOutput(
                $arrInfoFerias,
                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->grMatricula,
                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->lpa,
                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->ocorrencias,
                $dadosAfastamentoPorMatricula->DadosAfastamentoPorMatricula->reclusao
            );
        }

    }


}