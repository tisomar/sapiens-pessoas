<?php

namespace AguPessoas\Backend\Api\V1\Controller;

use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\Resource\DadoFinanceiroResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method DadoFinanceiroResource getResource()
 */
#[Route(path: '/v1/dado_financeiro')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'Dado Financeiro')]
class DadoFinanceiroController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        DadoFinanceiroResource $resource,
        ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }
}
