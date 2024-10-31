<?php

namespace AguPessoas\Backend\Gateways\Sigep\Outputs;

class DadosCurriculoOutput
{
    public function __construct(
        public string $cpf,
        public string $identificUnica,
        public \stdClass $listaCurso,
        public \stdClass $listaExperienciaProfissional,
        public \stdClass $listaFormacaoAcademica,
        public \stdClass $listaIdiomas,
        public \stdClass $listaParticipacaoComissoes
    ) {

    }
}