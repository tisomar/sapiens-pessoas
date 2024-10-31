<?php

namespace AguPessoas\Backend\Api\V2\Service\SuperSapiens;

use AguPessoas\Backend\Gateways\SuperSapiens\SuperSapiensGateway;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;

class SuperSapiensService extends AbstractController
{
    private SuperSapiensGateway $superSapiensGateway;

    public function __construct(SuperSapiensGateway $superSapiensGateway)
    {
        $this->superSapiensGateway = $superSapiensGateway;
    }


    /**
     * @throws TransportExceptionInterface
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws DecodingExceptionInterface
     * @throws ClientExceptionInterface
     */
    public function sendPostRequest(
        string $acao,
        array $data,
        string $processo = null,
               $nup = null
    ): object {
        $urlSuperSapiens = $this->getParameter('url_super_sapiens');
        $method = 'POST';
        $endpoint = $urlSuperSapiens . '/v1/administrativo/';

        switch ($acao) {
            case 'arquivar':
                $endpoint .= 'processo/' . $processo . '/' . $acao;
                $method = 'PATCH';
                break;
            case 'buscar_processo':
                $endpoint .= 'processo?where={"andX":[{"NUP":"like:' . $nup . '%"}]}&limit=1';
                $method = 'GET';
                break;
            case 'atividade':
                $endpoint .= 'atividade?populate=["tarefa","tarefa.vinculacaoWorkflow","tarefa.processo"]&context={}';
                break;
            case 'buscar_tarefa':
                $endpoint .= 'tarefa?where={"processo.id":"eq:' . $processo . '"}&limit=10&offset=0&order={"id":"DESC"}&populate=["colaborador.usuario","usuarioResponsavel","usuarioResponsavel.colaborador","setorResponsavel","setorResponsavel.unidade"]&context={}';
                $method = 'GET';
                break;
            default:
                $endpoint .= $acao;
                break;
        }

        return $this->superSapiensGateway->postRequest($endpoint, $acao, $data, $method);
    }




}