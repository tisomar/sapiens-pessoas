<?php

namespace AguPessoas\Backend\Message\Event;

use AguPessoas\Backend\Entity\SPSigepeServidor;

class ServidorCriadoEvent
{
    public function __construct(private SPSigepeServidor $servidor)
    {

    }

    public function getServidor(): SPSigepeServidor
    {
        return $this->servidor;
    }
}