<?php

namespace AguPessoas\Backend\Command\Token;

use AguPessoas\Backend\Api\V1\Controller\TokenController;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

class SaveSapiensTokenCommand extends Command
{
    protected static $defaultName = 'app:save-sapiens-token';

    private $tokenController;
    private $requestStack;

    public function __construct(TokenController $tokenController, RequestStack $requestStack)
    {
        parent::__construct();
        $this->tokenController = $tokenController;
        $this->requestStack = $requestStack;
    }

    protected function configure()
    {
        $this
            ->setDescription('Invoca o método saveSapiensToken.')
            ->addArgument('token', InputArgument::REQUIRED, 'O token a ser salvo.');
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $token = $input->getArgument('token');

        $request = new Request([], ['token' => $token]);
        $this->requestStack->push($request);

        $response = $this->tokenController->saveSapiensToken($request);

        $output->writeln($response->getContent());

        return Command::SUCCESS;
    }
}