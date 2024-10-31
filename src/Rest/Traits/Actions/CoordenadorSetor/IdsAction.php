<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Rest\Traits\Actions\CoordenadorSetor;

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
 * Trait to add 'idsAction' for REST controllers for 'ROLE_COORDENADOR_SETOR' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\IdsMethod for detailed documents.
 *
 * @author Felipe Pena <felipe.pena@datainfo.inf.br>
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
    #[Security("is_granted('ROLE_COORDENADOR_SETOR')")]
    #[RestApiDoc]
    public function idsAction(Request $request): Response
    {
        return $this->idsMethod($request);
    }
}
