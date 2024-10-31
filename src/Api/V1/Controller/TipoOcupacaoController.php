<?php

namespace AguPessoas\Backend\Api\V1\Controller;

use AguPessoas\Backend\Api\V1\Resource\TipoOcupacaoResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;


#[Route(path: '/v1/tipo_ocupacao')]
#[OA\Tag(name: 'Tipo Ocupação')]
class TipoOcupacaoController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    use Actions\Authenticated\CreateAction;
    use Actions\Authenticated\UpdateAction;
    use Actions\Authenticated\PatchAction;
    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        TipoOcupacaoResource $resource,
        \AguPessoas\Backend\Rest\ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }
}
