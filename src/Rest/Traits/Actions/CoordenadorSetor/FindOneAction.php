<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Rest\Traits\Actions\CoordenadorSetor;

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
 * Trait to add 'findOneAction' for REST controllers for 'ROLE_COORDENADOR_SETOR' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\FindOneMethod for detailed documents.
 *
 * @author Felipe Pena <felipe.pena@datainfo.inf.br>
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
    #[Security("is_granted('ROLE_COORDENADOR_SETOR')")]
    #[RestApiDoc]
    public function findOneAction(Request $request, int $id): Response
    {
        return $this->findOneMethod($request, $id);
    }
}
