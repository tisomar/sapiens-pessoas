<?php

namespace AguPessoas\Backend\Service;

use Doctrine\DBAL\Connection;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class OracleSessionInit implements EventSubscriberInterface
{
    private $connection;

    public function __construct(Connection $connection)
    {
        $this->connection = $connection;
    }

    public function postConnect(KernelEvent $event)
    {
        #$dateformat = 'YYYY-MM-DD HH24:MI:SS';
        //$this->connection->executeQuery('ALTER SESSION SET NLS_DATE_FORMAT = \''.$dateformat.'\'');
        $this->connection->executeQuery("ALTER SESSION SET NLS_TIME_FORMAT = 'HH24:MI:SS' NLS_DATE_FORMAT = 'YYYY-MM-DD HH24:MI:SS' NLS_TIMESTAMP_FORMAT = 'YYYY-MM-DD HH24:MI:SS' NLS_TIMESTAMP_TZ_FORMAT = 'YYYY-MM-DD HH24:MI:SS TZH:TZM'");
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => 'postConnect'
        ];
    }

}