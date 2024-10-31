<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Actions/User/DeleteAction.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits\Actions\Colaborador;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\DeleteMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait DeleteAction.
 *
 * Trait to add 'deleteAction' for REST controllers for 'ROLE_COLABORADOR' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\DeleteMethod for detailed documents.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait DeleteAction
{
    // Traits
    use DeleteMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(path: '/{id}', requirements: ['id' => '\d+'], methods: ['DELETE'])]
    #[Security("is_granted('ROLE_COLABORADOR') or is_granted('ROLE_ADMIN')")]
    #[RestApiDoc]
    public function deleteAction(Request $request, int $id): Response
    {
        return $this->deleteMethod($request, $id);
    }
}