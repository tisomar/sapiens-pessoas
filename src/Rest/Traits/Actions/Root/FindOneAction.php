<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/Root/FindOneAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits\Actions\Root;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\FindOneMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait FindOneAction.
 *
 * Trait to add 'findOneAction' for REST controllers for 'ROLE_ROOT' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\FindOneMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait FindOneAction
{
    // Traits
    use FindOneMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(
        path: '/{id}',
        requirements: [
            'id' => '\d+',
        ],
        methods: ['GET']
    )]
    #[Security("is_granted('ROLE_ROOT')")]
    #[RestApiDoc]
    public function findOneAction(Request $request, int $id): Response
    {
        return $this->findOneMethod($request, $id);
    }
}
