<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\Resource\DadoFuncionalDadosComplementaresResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;


/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method DadoFuncionalDadosComplementaresResource getResource()
 */
#[Route(path: '/v2/dado_funcional/dados_complementares')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'DadoFuncional - DadosComplementares')]
class DadoFuncionalDadosComplementaresController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    #use Actions\Authenticated\UpdateAction;
    #use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        DadoFuncionalDadosComplementaresResource $resource,
        ResponseHandler  $responseHandler,
    )
    {
        $this->init($resource, $responseHandler);
    }

}
