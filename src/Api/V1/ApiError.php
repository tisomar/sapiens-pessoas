<?php

namespace AguPessoas\Backend\Api\V1;

class ApiError
{
    public function __construct(public $type, public string $description, public array $erros)
    {
    }
}