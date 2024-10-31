<?php

namespace AguPessoas\Backend\Api\V1\Controller;

use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\Resource\ServidorResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use AguPessoas\Backend\Api\V1\Service\RelatorioServidorService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;
use AguPessoas\Backend\Api\V1\Enums\TipoPDFServidor;

/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method ServidorResource getResource()
 */
#[Route(path: '/v1/servidor')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'Servidor')]
class ServidorController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        ServidorResource                 $resource,
        ResponseHandler                  $responseHandler,
        private RelatorioServidorService $relatorioService

    )
    {
        $this->init($resource, $responseHandler);
    }

    #[Route(path: '/dados-pdf/{idServidor}', methods: ['GET'])]
    public function getPdf($idServidor, Request $request): Response
    {
        $tipos = json_decode($request->get('tipo'));

        $relatorio = $this->relatorioService;
        $relatorio->setServidor($idServidor);

        foreach (TipoPDFServidor::cases() as $tipo) {
            if (in_array($tipo->value, $tipos)) {
                $relatorio->addTipo($tipo);
            }
        }

        return $relatorio->gerar();

    }
}
