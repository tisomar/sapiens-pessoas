<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use AguPessoas\Backend\Api\V2\Service\SuperSapiens\SuperSapiensService;
use AguPessoas\Backend\Api\V2\Resource\SuperSapiensResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Rest\Traits\Actions;

/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method SuperSapiensController getResource()
 */
#[Route(path: '/v2/integracao-super-sapiens')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'IntegracaoSuperSapiens')]
class SuperSapiensController extends Controller
{
    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    private SuperSapiensService $superSapiensService;

    public function __construct(
        SuperSapiensService  $superSapiensService,
        SuperSapiensResource $resource,
        ResponseHandler                         $responseHandler,
    )
    {
        $this->superSapiensService = $superSapiensService;
        $this->init($resource, $responseHandler);
    }

    #[Route(path: '/criar-etapa-processo/{etapa}/{processo}', methods: ['POST'])]
    public function createAction(string $etapa, Request $request, string $processo = null): JsonResponse
    {
        if (!in_array($etapa, [
            'processo',
            'buscar_processo',
            'buscar_tarefa',
            'tarefa',
            'assunto',
            'interessado',
            'componente_digital',
            'compartilhamento',
            'atividade',
            'arquivar'
        ])) {
            throw new BadRequestHttpException('Etapa inválida');
        }


        $data = $request->toArray();
        try {
            $response = $this->superSapiensService->sendPostRequest($etapa, $data, $processo);
            return new JsonResponse($response, Response::HTTP_CREATED);
        } catch (\Exception $e) {
            throw new \RuntimeException('Erro ao criar ' . $etapa, 500, $e->getMessage());
        }
    }
}