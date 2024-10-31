<?php

namespace AguPessoas\Backend\Gateways\SuperSapiens;

use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\AcompanhamentoOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\ArquivarProcessoOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\AssuntoOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\BuscarProcessoOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\BuscarTarefaOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\ComponenteDigitalOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\EncerrarTarefaOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\InteressadoOutput;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use AguPessoas\Backend\Gateways\SuperSapiens\Interface\SuperSapiensGatewayInterface;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\ProcessoOutput;
use AguPessoas\Backend\Gateways\SuperSapiens\Outputs\TarefaOutput;

class SuperSapiensGateway implements SuperSapiensGatewayInterface
{
    private HttpClientInterface $client;

    public function __construct(HttpClientInterface $client)
    {
        $this->client = $client;
    }


    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function postRequest(string $endpoint, string $etapa, array $data, string $method = null): object
    {
        $token = $data['token'] ?? '';

        $response = $this->client->request($method, $endpoint, [
            'json' => $data,
            'headers' => [
                'Authorization' => 'Bearer ' . $token,
            ],
        ]);

        $responseData = $response->toArray();

        $outputClass = match ($etapa) {
            'processo' => ProcessoOutput::class,
            'tarefa' => TarefaOutput::class,
            'buscar_processo' => BuscarProcessoOutput::class,
            'buscar_tarefa' => BuscarTarefaOutput::class,
            'interessado' => InteressadoOutput::class,
            'assunto' => AssuntoOutput::class,
            'componente_digital' => ComponenteDigitalOutput::class,
            'compartilhamento' => AcompanhamentoOutput::class,
            'atividade' => EncerrarTarefaOutput::class,
            'arquivar' => ArquivarProcessoOutput::class,
            default => throw new \InvalidArgumentException("Etapa inválida: $etapa"),
        };

        return new $outputClass($responseData);
    }
}

