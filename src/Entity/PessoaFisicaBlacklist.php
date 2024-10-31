<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

/**
 * Class PessoaFisicaBlacklist.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'pessoa_fisica_blacklist')]
class PessoaFisicaBlacklist
{
    #[ORM\Id]
    #[ORM\Column('id_pessoa_fisica_blacklist')]
    private int $id;

    #[ManyToOne(targetEntity: Servidor::class)]
    #[JoinColumn(name: 'id_servidor', referencedColumnName: 'id')]
    private Servidor|null $servidor = null;

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

    /**
     * @return Servidor|null
     */
    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    /**
     * @param Servidor|null $servidor
     */
    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }
}