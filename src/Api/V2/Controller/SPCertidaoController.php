<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use AguPessoas\Backend\Api\V2\Enums\Certidao;
use AguPessoas\Backend\Api\V2\Resource\SigepeServidorResource;
use AguPessoas\Backend\Api\V2\Resource\SPCertidaoResource;
use AguPessoas\Backend\Api\V2\Resource\SPTipoCertidaoResource;
use AguPessoas\Backend\Api\V2\Service\SPCertidaoService;
use AguPessoas\Backend\Entity\SPTipoCertidao;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Exception;
use OpenApi\Attributes as OA;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\DecodingExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use AguPessoas\Backend\Api\V2\Service\SuperSapiens\SuperSapiensService;
use Symfony\Component\Security\Core\Security as Sec;


/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method SPCertidaoController getResource()
 */
#[Route(path: '/v2/certidao')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'SPCertidao')]
class SPCertidaoController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    private $certidao;
    private $tipoCertidao;
    private $processo;
    private $assunto;
    private $tarefa;
    private $juntada;
    private $sigepeServidor;

    private SuperSapiensService $superSapiensService;
    private ?UserInterface $usuarioAtual;

    public function __construct(
        private readonly SPCertidaoService      $spCertidaoService,
        private readonly SPTipoCertidaoResource $spTipoCertidaoResource,
        private readonly SigepeServidorResource $sigepeServidorResource,
        SPCertidaoResource                      $resource,
        ResponseHandler                         $responseHandler,
        SuperSapiensService                     $superSapiensService,
        private readonly TokenStorageInterface  $tokenStorage
    )
    {
        $this->init($resource, $responseHandler);
        $this->superSapiensService = $superSapiensService;
        $token = $this->tokenStorage->getToken();
        $this->usuarioAtual = $token?->getUser();
    }

    /**
     * @throws Exception
     */
    #[Route(path: '/gerar-solicitacao-certidao', methods: ['POST'])]
    public function gerarSolicitacaoCertidao(Request $request): Response
    {
        try {
            $this->sigepeServidor = $this->buscarServidorAtual();
            if (!$this->sigepeServidor) {
                throw new Exception('Servidor não encontrado.');
            }

            $idServidor = $this->sigepeServidor->getServidor()->getIdServidorAguPessoas();

            $dadosRequisicaoCertidao = $request->request->all();
            if (in_array($dadosRequisicaoCertidao['tipoCertidao'], [1, 4, 5])) {
                return $this->gerarPdf($request, $idServidor, null);
            }

            $spCertidaoService = $this->spCertidaoService;
            $spCertidaoService->setSPServidor($idServidor);

            $this->processo = $this->criarProcesso();
            $this->assunto = $this->criarAssunto($this->processo->processoId);
            $this->tarefa = $this->criarTarefa($this->processo->processoId);

            $dadosSolicitacaoCertidao = $spCertidaoService->salvaSolicitacaoCertidaoServidor(
                $request,
                $this->processo->NUP,
                $this->processo->processoId,
                $this->tarefa->tarefaId,
                new \DateTime($this->tarefa->criadoEm)
            );

            $certidao = json_decode($dadosSolicitacaoCertidao->getContent())->response;
            $this->certidao = $this->buscarCertidaoPorId($certidao->id);

            return $dadosSolicitacaoCertidao;
        } catch (Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     */
    #[Route(path: '/gerar-solicitacao-certidao-area-gestora/{idServidor}/{idCertidao?}', methods: ['PUT'])]
    public function gerarSolicitacaoCertidaoAreaGestora($idServidor, Request $request, $idCertidao = null): Response
    {
        try {
            $dadosRequisicaoCertidao = $request->request->all();

            $spCertidaoService = $this->spCertidaoService;
            $spCertidaoService->setSPServidor($idServidor);

            $statusCriacaoTarefa = $dadosRequisicaoCertidao['statusCriacaoTarefa'];
            $spCertidaoService->setCertidao($idCertidao);

            if (empty($idCertidao)) {
                if (in_array($dadosRequisicaoCertidao['tipoCertidao'], [4, 5])) {
                    if ($statusCriacaoTarefa === 'AP') {
                        return $this->gerarPdf($request, $idServidor, null);
                    } else {
                        return new Response('Solicitação atualizada com sucesso.', Response::HTTP_OK);
                    }
                } else {
                    throw new Exception('Tipo de certidão inválido para criação.');
                }
            } else {
                $this->certidao = $this->buscarCertidaoPorId($idCertidao);

                if (!$this->certidao) {
                    throw new Exception('Certidão não encontrada.');
                }

                $dadosSolicitacaoCertidao = $spCertidaoService->atualizaSolicitacaoCertidao(
                    $this->certidao,
                    $request
                );

                if ($statusCriacaoTarefa === 'AP') {
                    return $this->gerarPdf($request, $idServidor, $dadosSolicitacaoCertidao);
                } else {
                    return new Response('Solicitação não aprovada.', Response::HTTP_OK);
                }
            }
        } catch (Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }


    #[Route(path: '/lista-certidao-servidor/sigepeServidor/{sigepeServidor}/status/{status}', methods: ['GET'])]
    public function listarCertidaoServidor($sigepeServidor, $status): Response
    {
        $certidaoService = $this->spCertidaoService;
        return $certidaoService->listaCertidaoServidor($sigepeServidor, $status);

    }

    /**
     * @param Request $request
     * @param $idServidor
     * @param Response|null $dadosSolicitacaoCertidao
     * @return Response
     */
    private function gerarPdf(Request $request, $idServidor, Response $dadosSolicitacaoCertidao = null): Response
    {
        try {
            $dadosRequisicaoCertidao = $request->request->all();
            $this->tipoCertidao = $this->buscarTipoCertidao($dadosRequisicaoCertidao['tipoCertidao']);

            if (!$this->tipoCertidao) {
                throw new Exception('Tipo de certidão não encontrado.');
            }

            $arrTipoCertidao = [$this->tipoCertidao->getDescricao()];

            $certidaoService = $this->spCertidaoService;
            $certidaoService->setSPServidor($idServidor);

            foreach (Certidao::cases() as $tipo) {
                if (in_array($tipo->value, $arrTipoCertidao)) {
                    $certidaoService->addCertidao($tipo);
                }
            }

            $pdfGerado = $certidaoService->gerar($dadosRequisicaoCertidao);

            if ($pdfGerado->getContent()) {
                if ($this->tipoCertidao->getId() != 1) {
                    $nup = isset($this->certidao) ? $this->certidao->getNup() : $dadosRequisicaoCertidao['NUP'];

                    $processo = $this->buscarProcesso($nup);
                    $tarefa = $this->buscarTarefa($processo->entities[0]->processoId);
                    $this->juntada = $this->criarJuntada($processo->entities[0]->processoId, $pdfGerado->getContent());
                    $this->encerrarTarefa($tarefa->entities[0]->tarefaId);
                    $spCertidaoService = $this->spCertidaoService;
                    if (isset($this->certidao)) {
                        $spCertidaoService->atualizaSolicitacaoCertidao(
                            $this->certidao,
                            $request,
                            new \DateTime($this->juntada->criadoEm)
                        );
                    }

                    $this->arquivar($processo->entities[0]->processoId);

                    return new Response(json_encode($processo), 200, [
                        'Content-Type' => 'application/json'
                    ]);
                } else {
                    return new Response($pdfGerado->getContent(), 200, [
                        'Content-Type' => 'application/pdf',
                        'Content-Disposition' => 'inline; filename="' . $this->tipoCertidao->getDescricao() . '.pdf"'
                    ]);
                }
            } else {
                throw new Exception("Erro ao gerar o PDF.");
            }
        } catch (Exception $e) {
            return new Response($e->getMessage(), Response::HTTP_INTERNAL_SERVER_ERROR);
        }
    }

    /**
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws Exception
     */
    private function criarProcesso(): object
    {
        $acao = 'processo';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                    "processoOrigem": null,
                    "unidadeArquivistica": 1,
                    "tipoProtocolo": 1,
                    "descricao": null,
                    "lembreteArquivista": null,
                    "valorEconomico": null,
                    "semValorEconomico": null,
                    "NUP": null,
                    "especieProcesso": 1,
                    "visibilidadeExterna": null,
                    "dataHoraAbertura": null,
                    "dataHoraDesarquivamento": null,
                    "dataHoraPrazoResposta": null,
                    "titulo": "SOLICITAÇÃO DE DECLARAÇÃO",
                    "outroNumero": null,
                    "modalidadeMeio": 2,
                    "modalidadeFase": null,
                    "classificacao": 11,
                    "procedencia": null,
                    "localizador": null,
                    "setorAtual": 47650,
                    "setorInicial": null,
                    "requerimento": null,
                    "protocoloEletronico": null,
                    "emTramitacaoExterna": null,
                    "configuracaoNup": null,
                    "validaNup": null,
                    "alterarChave": null,
                    "dadosRequerimento": null,
                    "hasFundamentacaoRestricao": null,
                    "temProcessoOrigem": false,
                    "processoOrigemIncluirDocumentos": null,
                    "nupInvalido": null,
                    "token" : "' . $token . '"
                }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true));
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function buscarProcesso($nup): object
    {
        $acao = 'buscar_processo';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                    "token" : "' . $token . '"
                 }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), null, $nup);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function criarTarefa($processo): object
    {
        $acao = 'tarefa';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                   "postIt":null,
                   "urgente":null,
                   "observacao":null,
                   "localEvento":null,
                   "dataHoraInicioPrazo":"2024-09-05T10:35:04",
                   "dataHoraFinalPrazo":"2024-09-10T20:00:00",
                   "dataHoraLeitura":null,
                   "dataHoraDistribuicao":null,
                   "processo":' . $processo . ',
                   "especieTarefa":10,
                   "usuarioResponsavel":null,
                   "setorOrigem":135883,
                   "setorResponsavel":47650,
                   "distribuicaoAutomatica":true,
                   "folder":null,
                   "isRelevante":null,
                   "diasUteis":null,
                   "prazoDias":5,
                   "blocoProcessos":null,
                   "processos":null,
                   "blocoResponsaveis":null,
                   "grupoContato":null,
                   "usuarios":null,
                   "setores":null,
                   "token" : "' . $token . '"
                }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), $processo);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function criarJuntada($processo, $anexo): object
    {
        $acao = 'componente_digital';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                   "fileName":"Certidão.pdf",
                   "hash":null,
                   "numeracaoSequencial":null,
                   "conteudo":"data:application/pdf;base64,' . $anexo . '",
                   "tamanho":763647,
                   "nivelComposicao":null,
                   "softwareCriacao":null,
                   "chaveInibidor":null,
                   "dataHoraSoftwareCriacao":null,
                   "versaoSoftwareCriacao":null,
                   "mimetype":"application/pdf",
                   "dataHoraLockEdicao":null,
                   "usernameLockEdicao":null,
                   "extensao":null,
                   "processoOrigem":' . $processo . ',
                   "documentoOrigem":null,
                   "tarefaOrigem":null,
                   "documentoAvulsoOrigem":null,
                   "editavel":null,
                   "convertidoPdf":null,
                   "modalidadeAlvoInibidor":null,
                   "modalidadeTipoInibidor":null,
                   "componenteDigitalOrigem":null,
                   "modelo":null,
                   "documento":null,
                   "tipoDocumento":null,
                   "tarefaOrigemBloco":null,
                   "documentoAvulsoOrigemBloco":null,
                   "token" : "' . $token . '"
                }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true));
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function arquivar($processo): object
    {
        $acao = 'arquivar';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                   "params":{
                      "updates":null,
                      "cloneFrom":null,
                      "encoder":{
                         
                      },
                      "map":{
                         
                      }
                   },
                   "token" : "' . $token . '"
                }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), $processo);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function criarAssunto($processo): object
    {
        $acao = 'assunto';
        $token = $this->getTokenSuperSapiens();
        $data = '{
               "assuntoAdministrativo":19933,
               "principal":null,
               "processo":' . $processo . ',
               "token" : "' . $token . '"
            }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), $processo);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function encerrarTarefa($tarefa): object
    {
        $acao = 'atividade';
        $token = $this->getTokenSuperSapiens();
        $idUsuarioAtual = $this->getId();
        $data = '{
                   "dataHoraConclusao":"2024-09-05T10:47:30",
                   "observacao":null,
                   "encerraTarefa":true,
                   "destinacaoMinutas":"juntar",
                   "especieAtividade":3922,
                   "setor":null,
                   "usuario":' . $idUsuarioAtual . ',
                   "usuarioAprovacao":null,
                   "setorAprovacao":null,
                   "tarefa":' . $tarefa . ',
                   "documentos":[
                      
                   ],
                   "respostaDocumentoAvulso":null,
                   "documento":null,                   
                   "token" : "' . $token . '"
                }';

        $processo = null;

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), $processo);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    /**
     * @throws Exception
     */
    private function buscarTarefa($processo): object
    {
        $acao = 'buscar_tarefa';
        $token = $this->getTokenSuperSapiens();
        $data = '{
                   "token" : "' . $token . '"
                }';

        try {
            return $this->superSapiensService->sendPostRequest($acao, json_decode($data, true), $processo);
        } catch (\Throwable $e) {
            $this->tratamentoExcecao($e);
        }
    }

    private function buscarServidorAtual(): ?\AguPessoas\Backend\Entity\SPSigepeServidor
    {
        $criteria = ['cpf' => $this->getCPF()];
        return $this->sigepeServidorResource->getRepository()->findOneBy($criteria);
    }

    private function buscarCertidaoPorId($idCertidao)
    {
        $criteria = ['id' => $idCertidao];
        return $this->resource->getRepository()->findOneBy($criteria);
    }

    private function buscarTipoCertidao($idTipoCertidao): ?SPTipoCertidao
    {
        $criteria = ['id' => $idTipoCertidao];
        return $this->spTipoCertidaoResource->getRepository()->findOneBy($criteria);
    }

    /**
     * @throws Exception
     */
    private function getTokenSuperSapiens(): string
    {
        if ($this->usuarioAtual instanceof UserInterface && method_exists($this->usuarioAtual, 'getTokenSuperSapiens')) {
            return $this->usuarioAtual->getTokenSuperSapiens();
        }

        throw new Exception('Usuário atual não possui um método getTokenSuperSapiens.');
    }

    /**
     * @throws Exception
     */
    private function getId(): string
    {
        if ($this->usuarioAtual instanceof UserInterface && method_exists($this->usuarioAtual, 'getId')) {
            return $this->usuarioAtual->getId();
        }

        throw new Exception('Usuário atual não possui um método getId.');
    }

    /**
     * @throws Exception
     */
    private function getCPF(): string
    {
        if ($this->usuarioAtual instanceof UserInterface && method_exists($this->usuarioAtual, 'getCPF')) {
            return $this->usuarioAtual->getCPF();
        }

        throw new Exception('Usuário atual não possui um método getCPF.');
    }

    private function tratamentoExcecao(\Throwable $e): void
    {
        if ($e instanceof ClientExceptionInterface) {
            throw new Exception('Erro de cliente: ' . $e->getMessage());
        } elseif ($e instanceof DecodingExceptionInterface) {
            throw new Exception('Erro de decodificação: ' . $e->getMessage());
        } elseif ($e instanceof RedirectionExceptionInterface) {
            throw new Exception('Erro de redirecionamento: ' . $e->getMessage());
        } elseif ($e instanceof ServerExceptionInterface) {
            throw new Exception('Erro de servidor: ' . $e->getMessage());
        } elseif ($e instanceof TransportExceptionInterface) {
            throw new Exception('Erro de transporte: ' . $e->getMessage());
        } else {
            throw new Exception('Erro geral: ' . $e->getMessage());
        }
    }
}
