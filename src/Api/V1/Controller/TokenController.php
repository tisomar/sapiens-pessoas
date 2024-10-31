<?php

namespace AguPessoas\Backend\Api\V1\Controller;

use AguPessoas\Backend\Entity\User;
use AguPessoas\Backend\Repository\UserRepository;
use AguPessoas\Backend\Transaction\TransactionManager;
use Lexik\Bundle\JWTAuthenticationBundle\Services\JWTTokenManagerInterface;
use OpenApi\Attributes as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\HttpClient\Exception\ClientExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\RedirectionExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\ServerExceptionInterface;
use Symfony\Contracts\HttpClient\Exception\TransportExceptionInterface;
use Symfony\Contracts\HttpClient\HttpClientInterface;

#[Route(path: '/v1/token')]
#[OA\Tag(name: 'Token')]
class TokenController extends AbstractController
{

    public function __construct(
        protected RequestStack              $requestStack,
        protected HttpClientInterface       $httpClient,
        protected \Redis                    $redis,
        protected JWTTokenManagerInterface  $JWTManager,
        protected UserRepository            $userRepository,
        protected TransactionManager        $transactionManager,
        private readonly UserPasswordHasherInterface $encoder
    )
    {
    }

    /**
     * @throws TransportExceptionInterface
     * @throws \RedisException
     * @throws ServerExceptionInterface
     * @throws RedirectionExceptionInterface
     * @throws ClientExceptionInterface
     * @throws \Exception
     */
    #[Route(path: '/login', methods: ['POST'])]
    public function saveSapiensToken(Request $request): Response|RedirectResponse
    {
        $token = $request->get('token');
        $urlSuperSapiens = $this->getParameter('url_super_sapiens').'/profile';

        $response = $this->httpClient
            ->withOptions([
                'headers' => [
                    'Host' => parse_url($urlSuperSapiens, PHP_URL_HOST),
                    'Authorization' => "Bearer $token"
                ]
            ])
            ->request('GET', $urlSuperSapiens);

        if ($response->getStatusCode() === Response::HTTP_OK) {

            $profile = json_decode($response->getContent());

            $user = $this->userRepository->findOneBy(['email' => $profile->email]);

            if (empty($user)) {
                $user = new User();
            }
            $this->setUser($user, $profile, $token);

            $token = $this->JWTManager->create($user);
            $this->redis->set($profile->email, $token);

            if ($urlFrontend = $this->getParameter('url_frontend')) {
                return new JsonResponse(['url' => "$urlFrontend?email=$profile->email"], Response::HTTP_OK);
            }
        }

        return new Response('', Response::HTTP_OK);
    }

    #[Route(path: '/recupera', methods: ['GET'])]
    public function recuperaToken(Request $request): JsonResponse
    {
        $email = $request->query->get('email');

        $jwtToken = $this->redis->get($email);

        $user = $this->userRepository->findOneBy(['email' => $email]);
        $this->redis->del($email);

        $data = [
            'jwtToken' => $jwtToken,
            'user' => $user->toArray()
        ];

        return new JsonResponse($data, Response::HTTP_OK);
    }

    /**
     * @param User $user
     * @param mixed $profile
     * @param mixed $token
     * @return void
     * @throws \Exception
     */
    private function setUser(User $user, mixed $profile, mixed $token): void
    {
        $user->setName($profile->nome);
        $user->setCpf($profile->username);
        $user->setEmail($profile->email);
        $user->setPassword($this->encoder->hashPassword($user, '123456'));
        $user->setTokenSuperSapiens($token);
        $transactionId = $this->transactionManager->begin();
        $this->userRepository->save($user, $transactionId);
        $this->transactionManager->commit($transactionId);
    }


}