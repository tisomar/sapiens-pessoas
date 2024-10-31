<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Outputs;

class BuscarTarefaOutput
{
    public array $entities;
    public int $total;

    public function __construct(array $data)
    {

        $this->entities = array_map(function ($entity) {
            return new TarefaOutput($entity);
        }, $data['entities']);
        $this->total = $data['total'];
    }
}