<?php

namespace AguPessoas\Backend\MessageHandler\Event;

use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Message\Command\AtualizarDadosServidor;
use AguPessoas\Backend\Message\Event\ServidorCriadoEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\MessageBusInterface;

#[AsMessageHandler]
class ServidorCriadoHandler
{
    public function __construct(private MessageBusInterface $eventBus) { }

    public function __invoke(ServidorCriadoEvent $event)
    {
        foreach (EtapasImportacaoSigepe::cases() as $etapa) {
            $this->eventBus->dispatch(new AtualizarDadosServidor($event->getServidor()->getCpf(), $etapa->value));
        }
    }
}