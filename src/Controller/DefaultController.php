<?php

namespace AguPessoas\Backend\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController
{
    #[Route(path: '/healthz', methods: ['GET'])]
    #[OA\Tag(name: 'Default')]
    #[OA\Response(
        response: 200,
        description: 'success',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'timestamp', type: 'string'),
                ],
                type: 'object',
                example: [
                    'timestamp' => '2018-01-01T13:08:05+00:00',
                ]
            )
        )
    )]
    public function healthzAction(): Response {
        return new JsonResponse(
            [
                'timestamp' => new \DateTime(),
            ]
        );
    }
}