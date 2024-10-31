<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens\Interface;

interface SuperSapiensGatewayInterface
{
    public function postRequest(string $endpoint, string $etapa, array $data, string $method = null): object;
}