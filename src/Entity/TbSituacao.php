<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbSituacao
 */
#[ORM\Table(name: 'TBSITUACAO')]
#[ORM\Entity]
class TbSituacao
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SITUACOES', type: 'string', length: 80, nullable: true)]
    private $situacoes;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBSITUACAO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getSituacoes(): ?string
    {
        return $this->situacoes;
    }

    /**
     * @param string|null $situacoes
     */
    public function setSituacoes(?string $situacoes): void
    {
        $this->situacoes = $situacoes;
    }

    /**
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable): void
    {
        $this->idTable = $idTable;
    }


}
