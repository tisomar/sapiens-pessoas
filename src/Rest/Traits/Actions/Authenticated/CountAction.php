<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/Authenticated/CountAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits\Actions\Authenticated;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\CountMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait CountAction.
 *
 * Trait to add 'countAction' for REST controllers for authenticated users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\CountMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait CountAction
{
    // Traits
    use CountMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(path: '/count', methods: ['GET'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    public function countAction(Request $request): Response
    {
        return $this->countMethod($request);
    }
}
