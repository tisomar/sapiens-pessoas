<?php

namespace AguPessoas\Backend\Message\Command;

class CadastrarServidor
{
    public function __construct(private string $cpfServidor){
        #echo "COMMAND CadastrarServidor instanciado... <br/>";
    }

    public function getCpf(): string
    {
        return $this->cpfServidor;
    }
}