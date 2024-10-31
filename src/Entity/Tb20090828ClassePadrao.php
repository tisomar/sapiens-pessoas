<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb20090828ClassePadrao
 */
#[ORM\Table(name: 'TB_20090828_CLASSE_PADRAO')]
#[ORM\Entity]
class Tb20090828ClassePadrao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CLASSE_PADRAO', type: 'integer', nullable: false)]
    private $idClassePadrao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA', type: 'integer', nullable: true)]
    private $idNorma;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_PROVIMENTO', type: 'integer', nullable: false)]
    private $idTipoProvimento;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CARGO_EFETIVO', type: 'integer', nullable: false)]
    private $idCargoEfetivo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_PADRAO', type: 'integer', nullable: false)]
    private $idTipoPadrao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_PADRAO', type: 'date', nullable: true)]
    private $dtClassePadrao;

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
    #[ORM\SequenceGenerator(sequenceName: 'TB_20090828_CLASSE_PADRAO_ID_T', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdClassePadrao(): int
    {
        return $this->idClassePadrao;
    }

    /**
     * @param int $idClassePadrao
     */
    public function setIdClassePadrao(int $idClassePadrao): void
    {
        $this->idClassePadrao = $idClassePadrao;
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
    public function getIdTipoProvimento(): int
    {
        return $this->idTipoProvimento;
    }

    /**
     * @param int $idTipoProvimento
     */
    public function setIdTipoProvimento(int $idTipoProvimento): void
    {
        $this->idTipoProvimento = $idTipoProvimento;
    }

    /**
     * @return int
     */
    public function getIdCargoEfetivo(): int
    {
        return $this->idCargoEfetivo;
    }

    /**
     * @param int $idCargoEfetivo
     */
    public function setIdCargoEfetivo(int $idCargoEfetivo): void
    {
        $this->idCargoEfetivo = $idCargoEfetivo;
    }

    /**
     * @return int
     */
    public function getIdTipoPadrao(): int
    {
        return $this->idTipoPadrao;
    }

    /**
     * @param int $idTipoPadrao
     */
    public function setIdTipoPadrao(int $idTipoPadrao): void
    {
        $this->idTipoPadrao = $idTipoPadrao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtClassePadrao(): ?\DateTime
    {
        return $this->dtClassePadrao;
    }

    /**
     * @param DateTime|null $dtClassePadrao
     */
    public function setDtClassePadrao(?\DateTime $dtClassePadrao): void
    {
        $this->dtClassePadrao = $dtClassePadrao;
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
