<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\Resource\DocumentacaoResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;


/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method DocumentacaoResource getResource()
 */
#[Route(path: '/v2/documentacao')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'SPSigepeDocumentação')]
class DocumentacaoController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        DocumentacaoResource $resource,
        ResponseHandler  $responseHandler,
    )
    {
        $this->init($resource, $responseHandler);
    }

}
