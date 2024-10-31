<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use AguPessoas\Backend\Api\V2\Resource\SPSigepeTipoOcorrenciaAfastamentoResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use OpenApi\Attributes as OA;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method SPSigepeTipoOcorrenciaAfastamentoController getResource()
 */
#[Route(path: '/v2/tipo_ocorrencia_afastamento')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'SP Sigepe Tipo Ococorrência Afastamento')]
class SPSigepeTipoOcorrenciaAfastamentoController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
//    use Actions\Authenticated\CreateAction;
//    use Actions\Authenticated\UpdateAction;
//    use Actions\Authenticated\PatchAction;
//    use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        SPSigepeTipoOcorrenciaAfastamentoResource $resource,
        ResponseHandler $responseHandler
    ) {
        $this->init($resource, $responseHandler);
    }
}
