<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosFuncionaisOutput
{
    public function __construct(
        public array $dados = [],

    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosFuncionais':
                $this->setDadosFuncional($value);
                break;
        }
    }

    private function setDadosFuncional($dadosFuncional)
    {
        if(empty($dadosFuncional->DadosFuncionais)) {
            $this->dados = [];
            return;
        }

//        if(is_object($dadosFuncional->DadosFuncionais)) {
//            $this->dados[] = new DadosTitulacaoOutput(
//                $dadosTitulacao->DadosTitulacao->codMatricula,
//                $dadosTitulacao->DadosTitulacao->codOrgao,
//                $dadosTitulacao->DadosTitulacao->codTitulacao,
//                $dadosTitulacao->DadosTitulacao->nomeTitulacao,
//            );
//            return;
//        }

        foreach ($dadosFuncional->DadosFuncionais as $funcao){
            $this->dados[] = new FuncaoOutput(
                $funcao->codAtivFun,
                $funcao->codCargo,
                $funcao->codClasse,
                $funcao->codFuncao,
                $funcao->codJornada,
                $funcao->codNovaFuncao,
                $funcao->codOcorrAposentadoria,
                $funcao->codOcorrExclusao,
                $funcao->codOcorrIngressoOrgao,
                $funcao->codOcorrIngressoOrgao,
                $funcao->codOcorrIsencaoIR,
                $funcao->codOcorrPSS,
                $funcao->codOrgao,
                $funcao->codPadrao,
                $funcao->codSitFuncional,
                $funcao->codUorgExercicio,
                $funcao->codUorgLotacao,
                $funcao->codUpag,
                $funcao->codValeTransporte,
                $funcao->codigoOrgaoOrigem,
                $funcao->cpfChefiaImediata,
                $funcao->dataExercicioNoOrgao,
                $funcao->dataFimOcorrIsencaoIR,
                $funcao->dataFimOcorrPSS,
                $funcao->dataFimValeAR,
                $funcao->dataIngressoFuncao,
                $funcao->dataIngressoNovaFuncao,
                $funcao->dataIniOcorrIsencaoIR,
                $funcao->dataIniOcorrPSS,
                $funcao->dataIniValeAR,
                $funcao->dataOcorrAposentadoria,
                $funcao->dataOcorrExclusao,
                $funcao->dataOcorrIngressoOrgao,
                $funcao->dataOcorrIngressoServPublico,
                $funcao->emailChefiaImediata,
                $funcao->emailInstitucional,
                $funcao->emailServidor,
                $funcao->identUnica,
                $funcao->matriculaSiape,
                $funcao->nomeAtivFun,
                $funcao->nomeCargo,
                $funcao->nomeChefeUorg,
                $funcao->nomeClasse,
                $funcao->nomeFuncao,
                $funcao->nomeJornada,
                $funcao->nomeNovaFuncao,
                $funcao->nomeOcorrAposentadoria,
                $funcao->nomeOcorrExclusao,
                $funcao->nomeOcorrIngressoOrgao,
                $funcao->nomeOcorrIngressoServPublico,
                $funcao->nomeOcorrIsencaoIR,
                $funcao->nomeOcorrPSS,
                $funcao->nomeOrgao,
                $funcao->nomeRegimeJuridico,
                $funcao->nomeSitFuncional,
                $funcao->nomeUorgExercicio,
                $funcao->nomeUorgLotacao,
                $funcao->nomeUpag,
                $funcao->percentualTS,
                $funcao->pontuacaoDesempenho,
                $funcao->siglaNivelCargo,
                $funcao->siglaOrgao,
                $funcao->siglaOrgaoOrigem,
                $funcao->siglaRegimeJuridico,
                $funcao->siglaUorgExercicio,
                $funcao->siglaUorgLotacao,
                $funcao->siglaUorgLotacao,
                $funcao->tipoValeAR,
                $funcao->valorValeTransporte,
            );
        }

    }
}