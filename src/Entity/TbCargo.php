<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbCargo
 */
#[ORM\Table(name: 'TBCARGO')]
#[ORM\Entity]
class TbCargo
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CARGO', type: 'string', length: 55, nullable: true)]
    private $cargo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBCARGO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getCargo(): ?string
    {
        return $this->cargo;
    }

    /**
     * @param string|null $cargo
     */
    public function setCargo(?string $cargo): void
    {
        $this->cargo = $cargo;
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
