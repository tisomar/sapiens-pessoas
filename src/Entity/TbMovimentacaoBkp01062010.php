<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbMovimentacaoBkp01062010
 */
#[ORM\Table(name: 'TB_MOVIMENTACAO_BKP_01062010')]
#[ORM\Entity]
class TbMovimentacaoBkp01062010
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MOVIMENTACAO', type: 'integer', nullable: false)]
    private $idMovimentacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_ORGAO_MOVIMENTACAO', type: 'integer', nullable: false)]
    private $idOrgaoMovimentacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_MOVIMENTACAO', type: 'integer', nullable: false)]
    private $idTipoMovimentacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA', type: 'integer', nullable: true)]
    private $idNorma;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOTACAO_ORIGEM', type: 'integer', nullable: false)]
    private $idLotacaoOrigem;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOTACAO_EXERCICIO', type: 'integer', nullable: false)]
    private $idLotacaoExercicio;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INICIO_MOVIMENTACAO', type: 'date', nullable: false)]
    private $dtInicioMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FINAL_MOVIMENTACAO', type: 'date', nullable: true)]
    private $dtFinalMovimentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true)]
    private $dsObservacao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false)]
    private $dtOperacaoInclusao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false)]
    private $dtOperacaoAlteracao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true)]
    private $dtOperacaoExclusao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_RH', type: 'integer', nullable: false)]
    private $idRh;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_MOVIMENTACAO_BKP_01062010_I', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdMovimentacao(): int
    {
        return $this->idMovimentacao;
    }

    /**
     * @param int $idMovimentacao
     */
    public function setIdMovimentacao(int $idMovimentacao): void
    {
        $this->idMovimentacao = $idMovimentacao;
    }

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
     * @return int
     */
    public function getIdOrgaoMovimentacao(): int
    {
        return $this->idOrgaoMovimentacao;
    }

    /**
     * @param int $idOrgaoMovimentacao
     */
    public function setIdOrgaoMovimentacao(int $idOrgaoMovimentacao): void
    {
        $this->idOrgaoMovimentacao = $idOrgaoMovimentacao;
    }

    /**
     * @return int
     */
    public function getIdTipoMovimentacao(): int
    {
        return $this->idTipoMovimentacao;
    }

    /**
     * @param int $idTipoMovimentacao
     */
    public function setIdTipoMovimentacao(int $idTipoMovimentacao): void
    {
        $this->idTipoMovimentacao = $idTipoMovimentacao;
    }

    /**
     * @return int|null
     */
    public function getIdNorma(): ?int
    {
        return $this->idNorma;
    }

    /**
     * @param int|null $idNorma
     */
    public function setIdNorma(?int $idNorma): void
    {
        $this->idNorma = $idNorma;
    }

    /**
     * @return int
     */
    public function getIdLotacaoOrigem(): int
    {
        return $this->idLotacaoOrigem;
    }

    /**
     * @param int $idLotacaoOrigem
     */
    public function setIdLotacaoOrigem(int $idLotacaoOrigem): void
    {
        $this->idLotacaoOrigem = $idLotacaoOrigem;
    }

    /**
     * @return int
     */
    public function getIdLotacaoExercicio(): int
    {
        return $this->idLotacaoExercicio;
    }

    /**
     * @param int $idLotacaoExercicio
     */
    public function setIdLotacaoExercicio(int $idLotacaoExercicio): void
    {
        $this->idLotacaoExercicio = $idLotacaoExercicio;
    }

    /**
     * @return DateTime
     */
    public function getDtInicioMovimentacao(): \DateTime
    {
        return $this->dtInicioMovimentacao;
    }

    /**
     * @param DateTime $dtInicioMovimentacao
     */
    public function setDtInicioMovimentacao(\DateTime $dtInicioMovimentacao): void
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
     * @return string|null
     */
    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    /**
     * @param string|null $dsObservacao
     */
    public function setDsObservacao(?string $dsObservacao): void
    {
        $this->dsObservacao = $dsObservacao;
    }

    /**
     * @return DateTime
     */
    public function getDtOperacaoInclusao(): \DateTime
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return DateTime
     */
    public function getDtOperacaoAlteracao(): \DateTime
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
    }

    /**
     * @return string
     */
    public function getNrCpfOperador(): string
    {
        return $this->nrCpfOperador;
    }

    /**
     * @param string $nrCpfOperador
     */
    public function setNrCpfOperador(string $nrCpfOperador): void
    {
        $this->nrCpfOperador = $nrCpfOperador;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoExclusao(): ?\DateTime
    {
        return $this->dtOperacaoExclusao;
    }

    /**
     * @param DateTime|null $dtOperacaoExclusao
     */
    public function setDtOperacaoExclusao(?\DateTime $dtOperacaoExclusao): void
    {
        $this->dtOperacaoExclusao = $dtOperacaoExclusao;
    }

    /**
     * @return int
     */
    public function getIdRh(): int
    {
        return $this->idRh;
    }

    /**
     * @param int $idRh
     */
    public function setIdRh(int $idRh): void
    {
        $this->idRh = $idRh;
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
