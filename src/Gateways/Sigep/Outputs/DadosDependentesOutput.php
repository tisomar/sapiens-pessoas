<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosDependentesOutput
{
    public function __construct(
        public array $dados = [],

    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosDependentes':
                $this->setDadosDependentes($value);
                break;
        }
    }

    private function setDadosDependentes($dadosDependentes)
    {
        if(empty($dadosDependentes->DadosDependentes)) {
            $this->dados = [];
            return;
        }

        if(is_object($dadosDependentes->DadosDependentes)) {
            $this->dados[] =  new DependenteOutput(
                $this->setBeneficios($dadosDependentes->DadosDependentes->arrayBeneficios),
                $dadosDependentes->DadosDependentes->codCondicao,
                $dadosDependentes->DadosDependentes->codGrauParentesco,
                $dadosDependentes->DadosDependentes->codOrgao,
                $dadosDependentes->DadosDependentes->cpf,
                $dadosDependentes->DadosDependentes->matricula,
                $dadosDependentes->DadosDependentes->nome,
                $dadosDependentes->DadosDependentes->nomeCondicao,
                $dadosDependentes->DadosDependentes->nomeGrauParentesco,
            );
            return;
        }

        foreach ($dadosDependentes->DadosDependentes as $dependente){
//            echo "<pre>";
//            print_r($dependente);
//            echo "</pre>";
            $this->dados[] = new DependenteOutput(
                $this->setBeneficios($dependente->arrayBeneficios),
                $dependente->codCondicao,
                $dependente->codGrauParentesco,
                $dependente->codOrgao,
                $dependente->cpf,
                $dependente->matricula,
                $dependente->nome,
                $dependente->nomeCondicao,
                $dependente->nomeGrauParentesco,
            );
        }

    }

    private function setBeneficios($arrayDadosBeneficios): array
    {
        $arrBeneficios = [];

        if(empty($arrayDadosBeneficios->Beneficio)) {
            return $arrBeneficios;
        }

        if(is_object($arrayDadosBeneficios->Beneficio)) {
            $arrBeneficios[] = new BeneficioDependenteOutput(
                $arrayDadosBeneficios->Beneficio->codBeneficio,
                $arrayDadosBeneficios->Beneficio->dataFim,
                $arrayDadosBeneficios->Beneficio->dataInicio,
                $arrayDadosBeneficios->Beneficio->nomeBeneficio,
            );

            return $arrBeneficios;
        }

        foreach ($arrayDadosBeneficios->Beneficio as $beneficio) {
            $arrBeneficios[] = new BeneficioDependenteOutput(
                $beneficio->codBeneficio,
                $beneficio->dataFim,
                $beneficio->dataInicio,
                $beneficio->nomeBeneficio,
            );
        }

        return $arrBeneficios;

    }
}