<?php

namespace AguPessoas\Backend\MessageHandler\Command;

use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Api\V2\Resource\SigepeServidorResource;
use AguPessoas\Backend\Api\V2\Service\ImportSigepe\ImportSigepe;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Message\Command\CadastrarServidor;
use AguPessoas\Backend\Message\Event\ServidorCriadoEvent;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class CadastrarServidorHandler
{
    public function __construct(private SigepeServidorResource $resource,
                                private EntityManagerInterface $entityManager,
                                private MessageBusInterface $eventBus
    ){ }

    public function __invoke(CadastrarServidor $acao)
    {
        if(empty($acao->getCpf())){
            throw new \DomainException('Nenhum CPF informado!', 001);
        }

        $qtdRegistroLocal = $this->resource->count(['cpf' => 'eq:'.$acao->getCpf()]);

        if($qtdRegistroLocal){
            throw new \DomainException('Servidor já cadastrado!', 002);
        }

        $servidor = new SPSigepeServidor();
        $servidor->setCpf($acao->getCpf());

        try{
            $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DADOS_PESSOAIS, $servidor, $this->entityManager);
            $result = $objImportSigepe->importar();

            $this->eventBus->dispatch(new ServidorCriadoEvent($result));
        }catch (\Exception $e){
            throw $e;
        }



    }
}