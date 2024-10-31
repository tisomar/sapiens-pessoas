<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbFuncaoComissionadaSubstOld
 */
#[ORM\Table(name: 'TBFUNCAO_COMISSIONADASUBST_OLD')]
#[ORM\Entity]
class TbFuncaoComissionadaSubstOld
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_FUNCAO_COMISSIONADA_SUBST', type: 'integer', nullable: false)]
    private $idFuncaoComissionadaSubst;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CARGO_FUNCAO', type: 'integer', nullable: false)]
    private $idCargoFuncao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR_SUBSTITUTO', type: 'integer', nullable: false)]
    private $idServidorSubstituto;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_OCUPACAO', type: 'integer', nullable: false)]
    private $idTipoOcupacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA_INICIO_SUBST', type: 'integer', nullable: true)]
    private $idNormaInicioSubst;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA_FIM_SUBST', type: 'integer', nullable: true)]
    private $idNormaFimSubst;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INICIO_SUBSTITUICAO', type: 'date', nullable: false)]
    private $dtInicioSubstituicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FINAL_SUBSTITUICAO', type: 'date', nullable: true)]
    private $dtFinalSubstituicao;

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
    #[ORM\SequenceGenerator(sequenceName: 'TBFUNCAO_COMISSIONADASUBST_OLD', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdFuncaoComissionadaSubst(): int
    {
        return $this->idFuncaoComissionadaSubst;
    }

    /**
     * @param int $idFuncaoComissionadaSubst
     */
    public function setIdFuncaoComissionadaSubst(int $idFuncaoComissionadaSubst): void
    {
        $this->idFuncaoComissionadaSubst = $idFuncaoComissionadaSubst;
    }

    /**
     * @return int
     */
    public function getIdCargoFuncao(): int
    {
        return $this->idCargoFuncao;
    }

    /**
     * @param int $idCargoFuncao
     */
    public function setIdCargoFuncao(int $idCargoFuncao): void
    {
        $this->idCargoFuncao = $idCargoFuncao;
    }

    /**
     * @return int
     */
    public function getIdServidorSubstituto(): int
    {
        return $this->idServidorSubstituto;
    }

    /**
     * @param int $idServidorSubstituto
     */
    public function setIdServidorSubstituto(int $idServidorSubstituto): void
    {
        $this->idServidorSubstituto = $idServidorSubstituto;
    }

    /**
     * @return int
     */
    public function getIdTipoOcupacao(): int
    {
        return $this->idTipoOcupacao;
    }

    /**
     * @param int $idTipoOcupacao
     */
    public function setIdTipoOcupacao(int $idTipoOcupacao): void
    {
        $this->idTipoOcupacao = $idTipoOcupacao;
    }

    /**
     * @return int|null
     */
    public function getIdNormaInicioSubst(): ?int
    {
        return $this->idNormaInicioSubst;
    }

    /**
     * @param int|null $idNormaInicioSubst
     */
    public function setIdNormaInicioSubst(?int $idNormaInicioSubst): void
    {
        $this->idNormaInicioSubst = $idNormaInicioSubst;
    }

    /**
     * @return int|null
     */
    public function getIdNormaFimSubst(): ?int
    {
        return $this->idNormaFimSubst;
    }

    /**
     * @param int|null $idNormaFimSubst
     */
    public function setIdNormaFimSubst(?int $idNormaFimSubst): void
    {
        $this->idNormaFimSubst = $idNormaFimSubst;
    }

    /**
     * @return DateTime
     */
    public function getDtInicioSubstituicao(): \DateTime
    {
        return $this->dtInicioSubstituicao;
    }

    /**
     * @param DateTime $dtInicioSubstituicao
     */
    public function setDtInicioSubstituicao(\DateTime $dtInicioSubstituicao): void
    {
        $this->dtInicioSubstituicao = $dtInicioSubstituicao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFinalSubstituicao(): ?\DateTime
    {
        return $this->dtFinalSubstituicao;
    }

    /**
     * @param DateTime|null $dtFinalSubstituicao
     */
    public function setDtFinalSubstituicao(?\DateTime $dtFinalSubstituicao): void
    {
        $this->dtFinalSubstituicao = $dtFinalSubstituicao;
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
