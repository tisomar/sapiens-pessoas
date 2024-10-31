<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsAfastCarrAtualFiCons
 */
#[ORM\Table(name: 'MVCS_AFAST_CARR_ATUAL_FI_CONS')]
#[ORM\Entity]
class MvcsAfastCarrAtualFiCons
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'TOTAL_AFAST_CONSIDERADO', type: 'integer', nullable: true)]
    private $totalAfastConsiderado;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_AFAST_CARR_ATUAL_FI_CONS_', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdServidor(): int
    {
        return $this->idServidor;
    }

    /**
     * @param int $idServidor
     */
    public function setIdServidor(int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return int|null
     */
    public function getTotalAfastConsiderado(): ?int
    {
        return $this->totalAfastConsiderado;
    }

    /**
     * @param int|null $totalAfastConsiderado
     */
    public function setTotalAfastConsiderado(?int $totalAfastConsiderado): void
    {
        $this->totalAfastConsiderado = $totalAfastConsiderado;
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
