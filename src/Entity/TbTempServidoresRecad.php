<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbTempServidoresRecad
 */
#[ORM\Table(name: 'TB_TEMP_SERVIDORES_RECAD')]
#[ORM\Entity]
class TbTempServidoresRecad
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $cpf;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_TEMP_SERVIDORES_RECAD_ID_TA', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int|null
     */
    public function getIdServidor(): ?int
    {
        return $this->idServidor;
    }

    /**
     * @param int|null $idServidor
     */
    public function setIdServidor(?int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     */
    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
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
