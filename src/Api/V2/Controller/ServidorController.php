<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\Resource\ServidorResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;


/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method ServidorResource getResource()
 */
#[Route(path: '/v2/servidor')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'Servidor')]
class ServidorController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    //use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    //use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        ServidorResource $resource,
        ResponseHandler  $responseHandler,
    )
    {
        $this->init($resource, $responseHandler);
    }

}
