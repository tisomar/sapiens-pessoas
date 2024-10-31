<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/Root/UndeleteAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits\Actions\Root;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\UndeleteMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait UndeleteAction.
 *
 * Trait to add 'undeleteAction' for REST controllers for 'ROLE_ROOT' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\UndeleteMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait UndeleteAction
{
    // Traits
    use UndeleteMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(
        path: '/{id}/undelete',
        requirements: [
            'id' => '\d+',
        ],
        methods: ['PATCH']
    )]
    #[Security("is_granted('ROLE_ROOT')")]
    #[RestApiDoc]
    public function undeleteAction(Request $request, int $id): Response
    {
        return $this->undeleteMethod($request, $id);
    }
}
