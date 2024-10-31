<?php

namespace AguPessoas\Backend\MessageHandler\Command;

use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Api\V2\Service\ImportSigepe\ImportSigepe;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Message\Command\AtualizarDadosServidor;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;

#[AsMessageHandler]
class AtualizarServidorHandler
{
    public function __construct(private readonly EntityManagerInterface $entityManager) { }

    public function __invoke(AtualizarDadosServidor $acao)
    {
        $tipoDeDado = EtapasImportacaoSigepe::from($acao->getTipoDeDados());

        echo "| AtualizarServidorHandle__invoke" . PHP_EOL;
        echo "| TIPO: ". $tipoDeDado->name . PHP_EOL;
        echo "| CPF SERVIDOR: ".$acao->getCpf() . PHP_EOL;
        echo "+-----------------------------------" . PHP_EOL;

        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $acao->getCpf()]);

        if (!$servidor) {
            throw new \DomainException('Servidor ainda não cadastrado!', 004);
        }

        try {
            $objImportSigepe = new ImportSigepe($tipoDeDado, $servidor, $this->entityManager);
            $objImportSigepe->importar();
        } catch (SemRegistrosParaOCPFException $e) {
            echo "Sem registro de dependentes para este servidor!" . PHP_EOL;
        } catch (\Exception $e) {
            throw $e;
        }
    }
}