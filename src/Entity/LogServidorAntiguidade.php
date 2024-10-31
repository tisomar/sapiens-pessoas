<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

/**
 * Class LogServidorAntiguidade.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'log_servidor_antiguidade')]
class LogServidorAntiguidade
{
    #[ORM\Id]
    #[ORM\Column('id_log_servidor_antiguidade')]
    #[GeneratedValue]
    private int $id;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }
}