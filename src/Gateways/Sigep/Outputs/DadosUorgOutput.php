<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosUorgOutput
{
    public function __construct(
        public array $dados = [],

    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'uorgs':
                $this->setDadosUorg($value);
                break;
        }
    }

    private function setDadosUorg($uorgs)
    {
        if(empty($uorgs->DadosUorg)) {
            $this->dados = [];
            return;
        }

        if(is_object($uorgs->DadosUorg)) {
            $this->dados[] = new UorgOutput(
                $uorgs->DadosUorg->bairroUorg,
                $uorgs->DadosUorg->cepUorg,
                $uorgs->DadosUorg->codMatricula,
                $uorgs->DadosUorg->codMunicipioUorg,
                $uorgs->DadosUorg->codOrgao,
                $uorgs->DadosUorg->codOrgaoUorg,
                $uorgs->DadosUorg->complementoUorg,
                $uorgs->DadosUorg->emailUorg,
                $uorgs->DadosUorg->endUorg,
                $uorgs->DadosUorg->logradouroUorg,
                $uorgs->DadosUorg->nomeMunicipioUorg,
                $uorgs->DadosUorg->nomeUorg,
                $uorgs->DadosUorg->numFaxUorg,
                $uorgs->DadosUorg->numTelefoneUorg,
                $uorgs->DadosUorg->numeroUorg,
                $uorgs->DadosUorg->siglaUorg,
                $uorgs->DadosUorg->ufUorg,
            );
            return;
        }

        foreach ($uorgs->DadosUorg as $uorg){
            $this->dados[] = new UorgOutput(
                $uorg->bairroUorg,
                $uorg->cepUorg,
                $uorg->codMatricula,
                $uorg->codMunicipioUorg,
                $uorg->codOrgao,
                $uorg->codOrgaoUorg,
                $uorg->complementoUorg,
                $uorg->emailUorg,
                $uorg->endUorg,
                $uorg->logradouroUorg,
                $uorg->nomeMunicipioUorg,
                $uorg->nomeUorg,
                $uorg->numFaxUorg,
                $uorg->numTelefoneUorg,
                $uorg->numeroUorg,
                $uorg->siglaUorg,
                $uorg->ufUorg,
            );
        }

    }
}