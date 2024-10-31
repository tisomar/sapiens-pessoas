<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Exceptions;

class ProcessoInvalidoException extends \Exception
{
    public function __construct($message = "Processo inválido.", $code = 0, \Exception $previous = null)
    {
        parent::__construct($message, $code, $previous);
    }
}
