<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class BuscarProcessoOutput
{
    public array $entities;
    public int $total;

    public function __construct(array $data)
    {
        $this->entities = array_map(function ($entity) {
            return new ProcessoOutput($entity);
        }, $data['entities']);
        $this->total = $data['total'];
    }
}