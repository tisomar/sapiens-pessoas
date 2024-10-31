<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb47318AtualizaTel
 */
#[ORM\Table(name: 'TB_47318_ATUALIZA_TEL')]
#[ORM\Entity]
class Tb47318AtualizaTel
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TELEFONE', type: 'integer', nullable: true)]
    private $idTelefone;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_TELEFONE', type: 'integer', nullable: true)]
    private $idTipoTelefone;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DDD', type: 'string', length: 2, nullable: true, options: ['fixed' => true])]
    private $ddd;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TELEFONE', type: 'string', length: 30, nullable: true)]
    private $telefone;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'OBSERVACAO', type: 'string', length: 100, nullable: true)]
    private $observacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_47318_ATUALIZA_TEL_ID_TABLE', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int|null
     */
    public function getIdTelefone(): ?int
    {
        return $this->idTelefone;
    }

    /**
     * @param int|null $idTelefone
     */
    public function setIdTelefone(?int $idTelefone): void
    {
        $this->idTelefone = $idTelefone;
    }

    /**
     * @return int|null
     */
    public function getIdTipoTelefone(): ?int
    {
        return $this->idTipoTelefone;
    }

    /**
     * @param int|null $idTipoTelefone
     */
    public function setIdTipoTelefone(?int $idTipoTelefone): void
    {
        $this->idTipoTelefone = $idTipoTelefone;
    }

    /**
     * @return string|null
     */
    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    /**
     * @param string|null $ddd
     */
    public function setDdd(?string $ddd): void
    {
        $this->ddd = $ddd;
    }

    /**
     * @return string|null
     */
    public function getTelefone(): ?string
    {
        return $this->telefone;
    }

    /**
     * @param string|null $telefone
     */
    public function setTelefone(?string $telefone): void
    {
        $this->telefone = $telefone;
    }

    /**
     * @return string|null
     */
    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    /**
     * @param string|null $observacao
     */
    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
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
