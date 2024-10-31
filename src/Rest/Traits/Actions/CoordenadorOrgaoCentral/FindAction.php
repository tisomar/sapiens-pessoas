<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Rest\Traits\Actions\CoordenadorOrgaoCentral;

use LogicException;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Rest\Traits\Methods\FindMethod;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Routing\Annotation\Route;
use Throwable;

/**
 * Trait FindAction.
 *
 * Trait to add 'findAction' for REST controllers for 'ROLE_COORDENADOR_ORGAO_CENTRAL' users.
 *
 * @see \AguPessoas\Backend\Rest\Traits\Methods\FindMethod for detailed documents.
 *
 * @author Felipe Pena <felipe.pena@datainfo.inf.br>
 */
trait FindAction
{
    // Traits
    use FindMethod;

    /**
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    #[Route(path: '', methods: ['GET'])]
    #[Security("is_granted('ROLE_COORDENADOR_ORGAO_CENTRAL')")]
    #[RestApiDoc]
    public function findAction(Request $request): Response
    {
        return $this->findMethod($request);
    }
}
