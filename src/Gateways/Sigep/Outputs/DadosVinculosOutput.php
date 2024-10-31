<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosVinculosOutput
{
    public function __construct(
        public array $vinculos = [],
    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosVinculos':
                $this->setVinculos($value);
                break;
        }
    }

    private function setVinculos($dadosVinculos)
    {
        if(empty($dadosVinculos->DadosVinculo)) {
            $this->vinculos = [];
            return;
        }

        if(is_object($dadosVinculos->DadosVinculo)) {
            $this->vinculos[] = new VinculoOutput(
                $dadosVinculos->DadosVinculo->codAtivFun,
                $dadosVinculos->DadosVinculo->codCargo,
                $dadosVinculos->DadosVinculo->codClasse,
                $dadosVinculos->DadosVinculo->codFuncao,
                $dadosVinculos->DadosVinculo->codJornada,
                $dadosVinculos->DadosVinculo->codNovaFuncao,
                $dadosVinculos->DadosVinculo->codOcorrAposentadoria,
                $dadosVinculos->DadosVinculo->codOcorrExclusao,
                $dadosVinculos->DadosVinculo->codOcorrIngressoOrgao,
                $dadosVinculos->DadosVinculo->codOcorrIngressoServPublico,
                $dadosVinculos->DadosVinculo->codOcorrIsencaoIR,
                $dadosVinculos->DadosVinculo->codOcorrPSS,
                $dadosVinculos->DadosVinculo->codOrgao,
                $dadosVinculos->DadosVinculo->codPadrao,
                $dadosVinculos->DadosVinculo->codSitFuncional,
                $dadosVinculos->DadosVinculo->codUorgExercicio,
                $dadosVinculos->DadosVinculo->codUorgLotacao,
                $dadosVinculos->DadosVinculo->codUpag,
                $dadosVinculos->DadosVinculo->codValeTransporte,
                $dadosVinculos->DadosVinculo->dataFimOcorrIsencaoIR,
                $dadosVinculos->DadosVinculo->dataFimOcorrPSS,
                $dadosVinculos->DadosVinculo->dataFimValeAR,
                $dadosVinculos->DadosVinculo->dataIngressoFuncao,
                $dadosVinculos->DadosVinculo->dataIngressoNovaFuncao,
                $dadosVinculos->DadosVinculo->dataIniOcorrIsencaoIR,
                $dadosVinculos->DadosVinculo->dataIniOcorrPSS,
                $dadosVinculos->DadosVinculo->dataIniValeAR,
                $dadosVinculos->DadosVinculo->dataOcorrAposentadoria,
                $dadosVinculos->DadosVinculo->dataOcorrExclusao,
                $dadosVinculos->DadosVinculo->dataOcorrIngressoOrgao,
                $dadosVinculos->DadosVinculo->dataOcorrIngressoServPublico,
                $dadosVinculos->DadosVinculo->identUnica,
                $dadosVinculos->DadosVinculo->matriculaSiape,
                $dadosVinculos->DadosVinculo->nomeAtivFun,
                $dadosVinculos->DadosVinculo->nomeCargo,
                $dadosVinculos->DadosVinculo->nomeChefeUorg,
                $dadosVinculos->DadosVinculo->nomeClasse,
                $dadosVinculos->DadosVinculo->nomeFuncao,
                $dadosVinculos->DadosVinculo->nomeJornada,
                $dadosVinculos->DadosVinculo->nomeNovaFuncao,
                $dadosVinculos->DadosVinculo->nomeOcorrAposentadoria,
                $dadosVinculos->DadosVinculo->nomeOcorrExclusao,
                $dadosVinculos->DadosVinculo->nomeOcorrIngressoOrgao,
                $dadosVinculos->DadosVinculo->nomeOcorrIngressoServPublico,
                $dadosVinculos->DadosVinculo->nomeOcorrIsencaoIR,
                $dadosVinculos->DadosVinculo->nomeOcorrPSS,
                $dadosVinculos->DadosVinculo->nomeOrgao,
                $dadosVinculos->DadosVinculo->nomeRegimeJuridico,
                $dadosVinculos->DadosVinculo->nomeSitFuncional,
                $dadosVinculos->DadosVinculo->nomeUorgExercicio,
                $dadosVinculos->DadosVinculo->nomeUorgLotacao,
                $dadosVinculos->DadosVinculo->nomeUpag,
                $dadosVinculos->DadosVinculo->percentualTS,
                $dadosVinculos->DadosVinculo->pontuacaoDesempenho,
                $dadosVinculos->DadosVinculo->siglaNivelCargo,
                $dadosVinculos->DadosVinculo->siglaOrgao,
                $dadosVinculos->DadosVinculo->siglaRegimeJuridico,
                $dadosVinculos->DadosVinculo->siglaUorgExercicio,
                $dadosVinculos->DadosVinculo->siglaUorgLotacao,
                $dadosVinculos->DadosVinculo->siglaUpag,
                $dadosVinculos->DadosVinculo->tipoValeAR,
                $dadosVinculos->DadosVinculo->valorValeTransporte,
            );
            return;
        }

        foreach ($dadosVinculos->DadosVinculo as $vinculo){
            $this->vinculos[] = new VinculoOutput(
                $vinculo->codAtivFun,
                $vinculo->codCargo,
                $vinculo->codClasse,
                $vinculo->codFuncao,
                $vinculo->codJornada,
                $vinculo->codNovaFuncao,
                $vinculo->codOcorrAposentadoria,
                $vinculo->codOcorrExclusao,
                $vinculo->codOcorrIngressoOrgao,
                $vinculo->codOcorrIngressoServPublico,
                $vinculo->codOcorrIsencaoIR,
                $vinculo->codOcorrPSS,
                $vinculo->codOrgao,
                $vinculo->codPadrao,
                $vinculo->codSitFuncional,
                $vinculo->codUorgExercicio,
                $vinculo->codUorgLotacao,
                $vinculo->codUpag,
                $vinculo->codValeTransporte,
                $vinculo->dataFimOcorrIsencaoIR,
                $vinculo->dataFimOcorrPSS,
                $vinculo->dataFimValeAR,
                $vinculo->dataIngressoFuncao,
                $vinculo->dataIngressoNovaFuncao,
                $vinculo->dataIniOcorrIsencaoIR,
                $vinculo->dataIniOcorrPSS,
                $vinculo->dataIniValeAR,
                $vinculo->dataOcorrAposentadoria,
                $vinculo->dataOcorrExclusao,
                $vinculo->dataOcorrIngressoOrgao,
                $vinculo->dataOcorrIngressoServPublico,
                $vinculo->identUnica,
                $vinculo->matriculaSiape,
                $vinculo->nomeAtivFun,
                $vinculo->nomeCargo,
                $vinculo->nomeChefeUorg,
                $vinculo->nomeClasse,
                $vinculo->nomeFuncao,
                $vinculo->nomeJornada,
                $vinculo->nomeNovaFuncao,
                $vinculo->nomeOcorrAposentadoria,
                $vinculo->nomeOcorrExclusao,
                $vinculo->nomeOcorrIngressoOrgao,
                $vinculo->nomeOcorrIngressoServPublico,
                $vinculo->nomeOcorrIsencaoIR,
                $vinculo->nomeOcorrPSS,
                $vinculo->nomeOrgao,
                $vinculo->nomeRegimeJuridico,
                $vinculo->nomeSitFuncional,
                $vinculo->nomeUorgExercicio,
                $vinculo->nomeUorgLotacao,
                $vinculo->nomeUpag,
                $vinculo->percentualTS,
                $vinculo->pontuacaoDesempenho,
                $vinculo->siglaNivelCargo,
                $vinculo->siglaOrgao,
                $vinculo->siglaRegimeJuridico,
                $vinculo->siglaUorgExercicio,
                $vinculo->siglaUorgLotacao,
                $vinculo->siglaUpag,
                $vinculo->tipoValeAR,
                $vinculo->valorValeTransporte,

            );
        }

    }


}