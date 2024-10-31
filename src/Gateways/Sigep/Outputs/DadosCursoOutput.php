<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosCursoOutput
{
    public function __construct(

        public string $codCurso = '',
        public string $nomeCurso = '',
    )
    {
    }
}