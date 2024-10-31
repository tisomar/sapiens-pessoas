<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/User/IdsAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits\Actions\User;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\IdsMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait IdsAction.
 *
 * Trait to add 'idsAction' for REST controllers for 'ROLE_USER' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\IdsMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait IdsAction
{
    // Traits
    use IdsMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(path: '/ids', methods: ['GET'])]
    #[Security("is_granted('ROLE_USER')")]
    #[RestApiDoc]
    public function idsAction(Request $request): Response
    {
        return $this->idsMethod($request);
    }
}