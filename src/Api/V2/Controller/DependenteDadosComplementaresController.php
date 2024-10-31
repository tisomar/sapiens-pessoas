<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\Resource\DependenteDadosComplementaresResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;


/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method DependenteDadosComplementaresResource getResource()
 */
#[Route(path: '/v2/dependente/dados_complementares')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'SPDependenteDadosComplementares')]
class DependenteDadosComplementaresController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        DependenteDadosComplementaresResource $resource,
        ResponseHandler  $responseHandler,
    )
    {
        $this->init($resource, $responseHandler);
    }

}
