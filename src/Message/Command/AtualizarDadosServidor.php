<?php

namespace AguPessoas\Backend\Message\Command;

class AtualizarDadosServidor
{
    public function __construct(private readonly string $cpf, private readonly string $tipoDeDados) { }

    public function getCpf(): string
    {
        return $this->cpf;
    }

    public function getTipoDeDados(): string
    {
        return $this->tipoDeDados;
    }
}