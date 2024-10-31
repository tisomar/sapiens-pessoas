<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbMovimentacaoDif
 */
#[ORM\Table(name: 'TB_MOVIMENTACAO_DIF')]
#[ORM\Entity]
class TbMovimentacaoDif
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'string', length: 255, nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ID_MOVIMENTACAO', type: 'string', length: 255, nullable: true)]
    private $idMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO', type: 'date', nullable: true)]
    private $dtInicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM', type: 'date', nullable: true)]
    private $dtFim;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_MOVIMENTACAO_DIF_ID_TABLE_s', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getIdServidor(): ?string
    {
        return $this->idServidor;
    }

    /**
     * @param string|null $idServidor
     */
    public function setIdServidor(?string $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return string|null
     */
    public function getIdMovimentacao(): ?string
    {
        return $this->idMovimentacao;
    }

    /**
     * @param string|null $idMovimentacao
     */
    public function setIdMovimentacao(?string $idMovimentacao): void
    {
        $this->idMovimentacao = $idMovimentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicio(): ?\DateTime
    {
        return $this->dtInicio;
    }

    /**
     * @param DateTime|null $dtInicio
     */
    public function setDtInicio(?\DateTime $dtInicio): void
    {
        $this->dtInicio = $dtInicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFim(): ?\DateTime
    {
        return $this->dtFim;
    }

    /**
     * @param DateTime|null $dtFim
     */
    public function setDtFim(?\DateTime $dtFim): void
    {
        $this->dtFim = $dtFim;
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
