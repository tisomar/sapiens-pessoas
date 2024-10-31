<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosEscolaresOutput
{
    public function __construct(
        public string $codEscolaridade = '',
        public string $nomeEscolaridade = '',
        public array $cursos = [],
        public array $titulacoes = [],

    )
    {

    }

    public function __set(string $name, $value): void
    {
        switch ($name){
            case 'arrayCursos':
                $this->setCursos($value);
                break;
            case 'arrayTitulacao':
                $this->setTitulacoes($value);
                break;
        }
    }

    private function setCursos($dadosCurso)
    {
        if(empty($dadosCurso->DadosCurso)) {
            $this->cursos = [];
            return;
        }

        if(is_object($dadosCurso->DadosCurso)) {
            $this->cursos[] = new DadosCursoOutput($dadosCurso->DadosCurso->codCurso, $dadosCurso->DadosCurso->nomeCurso);
            return;
        }

        foreach ($dadosCurso->DadosCurso as $curso){
            $this->cursos[] = new DadosCursoOutput($curso->codCurso, $curso->nomeCurso);
        }

    }

    private function setTitulacoes($dadosTitulacao)
    {
        if(empty($dadosTitulacao->DadosTitulacao)) {
            $this->titulacoes = [];
            return;
        }

        if(is_object($dadosTitulacao->DadosTitulacao)) {
            $this->titulacoes[] = new DadosTitulacaoOutput(
                $dadosTitulacao->DadosTitulacao->codMatricula,
                $dadosTitulacao->DadosTitulacao->codOrgao,
                $dadosTitulacao->DadosTitulacao->codTitulacao,
                $dadosTitulacao->DadosTitulacao->nomeTitulacao,
            );
            return;
        }

        foreach ($dadosTitulacao->DadosTitulacao as $titulacao){
            $this->titulacoes[] = new DadosTitulacaoOutput(
                $titulacao->codMatricula,
                $titulacao->codOrgao,
                $titulacao->codTitulacao,
                $titulacao->nomeTitulacao,
            );
        }

    }
}