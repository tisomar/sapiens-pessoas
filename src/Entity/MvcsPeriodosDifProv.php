<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsPeriodosDifProv
 */
#[ORM\Table(name: 'MVCS_PERIODOS_DIF_PROV')]
#[ORM\Entity]
class MvcsPeriodosDifProv
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: true)]
    private $nmServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_LOTACAO_EXERCICIO', type: 'integer', nullable: true)]
    private $idLotacaoExercicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_MOVIMENTACAO', type: 'date', nullable: true)]
    private $dtInicioMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FINAL_MOVIMENTACAO', type: 'date', nullable: true)]
    private $dtFinalMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'INIC_AJUSTADO', type: 'date', nullable: true)]
    private $inicAjustado;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'FIM_AJUSTADO', type: 'date', nullable: true)]
    private $fimAjustado;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_DIAS', type: 'integer', nullable: true)]
    private $qtdDias;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_LOTACAO', type: 'string', length: 30, nullable: true)]
    private $sgLotacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LOTACAO', type: 'string', length: 200, nullable: true)]
    private $dsLotacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_PERIODOS_DIF_PROV_ID_TABL', allocationSize: 1, initialValue: 1)]
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
    public function getNmServidor(): ?string
    {
        return $this->nmServidor;
    }

    /**
     * @param string|null $nmServidor
     */
    public function setNmServidor(?string $nmServidor): void
    {
        $this->nmServidor = $nmServidor;
    }

    /**
     * @return int|null
     */
    public function getIdLotacaoExercicio(): ?int
    {
        return $this->idLotacaoExercicio;
    }

    /**
     * @param int|null $idLotacaoExercicio
     */
    public function setIdLotacaoExercicio(?int $idLotacaoExercicio): void
    {
        $this->idLotacaoExercicio = $idLotacaoExercicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioMovimentacao(): ?\DateTime
    {
        return $this->dtInicioMovimentacao;
    }

    /**
     * @param DateTime|null $dtInicioMovimentacao
     */
    public function setDtInicioMovimentacao(?\DateTime $dtInicioMovimentacao): void
    {
        $this->dtInicioMovimentacao = $dtInicioMovimentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFinalMovimentacao(): ?\DateTime
    {
        return $this->dtFinalMovimentacao;
    }

    /**
     * @param DateTime|null $dtFinalMovimentacao
     */
    public function setDtFinalMovimentacao(?\DateTime $dtFinalMovimentacao): void
    {
        $this->dtFinalMovimentacao = $dtFinalMovimentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getInicAjustado(): ?\DateTime
    {
        return $this->inicAjustado;
    }

    /**
     * @param DateTime|null $inicAjustado
     */
    public function setInicAjustado(?\DateTime $inicAjustado): void
    {
        $this->inicAjustado = $inicAjustado;
    }

    /**
     * @return DateTime|null
     */
    public function getFimAjustado(): ?\DateTime
    {
        return $this->fimAjustado;
    }

    /**
     * @param DateTime|null $fimAjustado
     */
    public function setFimAjustado(?\DateTime $fimAjustado): void
    {
        $this->fimAjustado = $fimAjustado;
    }

    /**
     * @return int|null
     */
    public function getQtdDias(): ?int
    {
        return $this->qtdDias;
    }

    /**
     * @param int|null $qtdDias
     */
    public function setQtdDias(?int $qtdDias): void
    {
        $this->qtdDias = $qtdDias;
    }

    /**
     * @return string|null
     */
    public function getSgLotacao(): ?string
    {
        return $this->sgLotacao;
    }

    /**
     * @param string|null $sgLotacao
     */
    public function setSgLotacao(?string $sgLotacao): void
    {
        $this->sgLotacao = $sgLotacao;
    }

    /**
     * @return string|null
     */
    public function getDsLotacao(): ?string
    {
        return $this->dsLotacao;
    }

    /**
     * @param string|null $dsLotacao
     */
    public function setDsLotacao(?string $dsLotacao): void
    {
        $this->dsLotacao = $dsLotacao;
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
