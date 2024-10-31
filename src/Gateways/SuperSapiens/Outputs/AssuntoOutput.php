<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class AssuntoOutput
{
    public string $type;
    public string $id;
    public string $context;
    public bool $principal;
    public int $assuntoId;
    public string $uuid;
    public string $criadoEm;
    public string $atualizadoEm;

    public function __construct(array $data)
    {
        $this->type = $data['@type'];
        $this->id = $data['@id'];
        $this->context = $data['@context'];
        $this->principal = $data['principal'];
        $this->assuntoId = $data['id'];
        $this->uuid = $data['uuid'];
        $this->criadoEm = $data['criadoEm'];
        $this->atualizadoEm = $data['atualizadoEm'];
    }
}
