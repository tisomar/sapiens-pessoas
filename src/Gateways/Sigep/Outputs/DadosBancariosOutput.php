<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosBancariosOutput
{
    public function __construct(
        public array $contas = [],
    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'dadosBancarios':
                $this->setContas($value);
                break;
        }
    }

    private function setContas($dadosBancarios)
    {
        if(empty($dadosBancarios->DadosBancarios)) {
            $this->contas = [];
            return;
        }

        if(is_object($dadosBancarios->DadosBancarios)) {
            $this->contas[] = new ContaBancariaOutput(
                $dadosBancarios->DadosBancarios->agencia,
                $dadosBancarios->DadosBancarios->agenciaOutrosPagtos,
                $dadosBancarios->DadosBancarios->banco,
                $dadosBancarios->DadosBancarios->bancoOutrosPagtos,
                $dadosBancarios->DadosBancarios->codOrgao,
                $dadosBancarios->DadosBancarios->contaCorrente,
                $dadosBancarios->DadosBancarios->contaCorrenteOutrosPagtos,
                $dadosBancarios->DadosBancarios->matricula
            );
            return;
        }

        foreach ($dadosBancarios->DadosBancarios as $conta){
            $this->contas[] = new ContaBancariaOutput(
                $conta->agencia,
                $conta->agenciaOutrosPagtos,
                $conta->banco,
                $conta->bancoOutrosPagtos,
                $conta->codOrgao,
                $conta->contaCorrente,
                $conta->contaCorrenteOutrosPagtos,
                $conta->matricula
            );
        }

    }


}