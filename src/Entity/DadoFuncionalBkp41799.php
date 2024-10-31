<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DadoFuncionalBkp41799
 */
#[ORM\Table(name: 'DADO_FUNCIONAL_BKP#41799')]
#[ORM\Entity]
class DadoFuncionalBkp41799
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_RESCISAO_RAIS', type: 'integer', nullable: true)]
    private $idRescisaoRais;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_ADMISSAO', type: 'integer', nullable: true)]
    private $idTipoAdmissao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SITUACAO_RAIS', type: 'integer', nullable: true)]
    private $idSituacaoRais;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_SALARIO', type: 'integer', nullable: true)]
    private $idTipoSalario;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_VINCULO_RAIS', type: 'integer', nullable: true)]
    private $idVinculoRais;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_REGIME_JURIDICO', type: 'integer', nullable: false)]
    private $idRegimeJuridico;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_AREA_ATUACAO', type: 'integer', nullable: true)]
    private $idAreaAtuacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_ORGAO', type: 'date', nullable: true)]
    private $dtIngressoOrgao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_MATRICULA_SIAPE', type: 'string', length: 15, nullable: true)]
    private $cdMatriculaSiape;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_REGIME_JURIDICO', type: 'date', nullable: true)]
    private $dtIngressoRegimeJuridico;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true)]
    private $dsObservacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_RESCISAO', type: 'date', nullable: true)]
    private $dtRescisao;

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
     * @var int|null
     */
    #[ORM\Column(name: 'ID_DADO_FUNCIONAL', type: 'integer', nullable: true)]
    private $idDadoFuncional;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_RH', type: 'integer', nullable: false)]
    private $idRh;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true)]
    private $dtOperacaoExclusao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_SERVICO_PUBLICO', type: 'date', nullable: true)]
    private $dtIngressoServicoPublico;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DADO_FUNCIONAL_BKP#41799_ID_TA', allocationSize: 1, initialValue: 1)]
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
    public function getIdRescisaoRais(): ?int
    {
        return $this->idRescisaoRais;
    }

    /**
     * @param int|null $idRescisaoRais
     */
    public function setIdRescisaoRais(?int $idRescisaoRais): void
    {
        $this->idRescisaoRais = $idRescisaoRais;
    }

    /**
     * @return int|null
     */
    public function getIdTipoAdmissao(): ?int
    {
        return $this->idTipoAdmissao;
    }

    /**
     * @param int|null $idTipoAdmissao
     */
    public function setIdTipoAdmissao(?int $idTipoAdmissao): void
    {
        $this->idTipoAdmissao = $idTipoAdmissao;
    }

    /**
     * @return int|null
     */
    public function getIdSituacaoRais(): ?int
    {
        return $this->idSituacaoRais;
    }

    /**
     * @param int|null $idSituacaoRais
     */
    public function setIdSituacaoRais(?int $idSituacaoRais): void
    {
        $this->idSituacaoRais = $idSituacaoRais;
    }

    /**
     * @return int|null
     */
    public function getIdTipoSalario(): ?int
    {
        return $this->idTipoSalario;
    }

    /**
     * @param int|null $idTipoSalario
     */
    public function setIdTipoSalario(?int $idTipoSalario): void
    {
        $this->idTipoSalario = $idTipoSalario;
    }

    /**
     * @return int|null
     */
    public function getIdVinculoRais(): ?int
    {
        return $this->idVinculoRais;
    }

    /**
     * @param int|null $idVinculoRais
     */
    public function setIdVinculoRais(?int $idVinculoRais): void
    {
        $this->idVinculoRais = $idVinculoRais;
    }

    /**
     * @return int
     */
    public function getIdRegimeJuridico(): int
    {
        return $this->idRegimeJuridico;
    }

    /**
     * @param int $idRegimeJuridico
     */
    public function setIdRegimeJuridico(int $idRegimeJuridico): void
    {
        $this->idRegimeJuridico = $idRegimeJuridico;
    }

    /**
     * @return int|null
     */
    public function getIdAreaAtuacao(): ?int
    {
        return $this->idAreaAtuacao;
    }

    /**
     * @param int|null $idAreaAtuacao
     */
    public function setIdAreaAtuacao(?int $idAreaAtuacao): void
    {
        $this->idAreaAtuacao = $idAreaAtuacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoOrgao(): ?\DateTime
    {
        return $this->dtIngressoOrgao;
    }

    /**
     * @param DateTime|null $dtIngressoOrgao
     */
    public function setDtIngressoOrgao(?\DateTime $dtIngressoOrgao): void
    {
        $this->dtIngressoOrgao = $dtIngressoOrgao;
    }

    /**
     * @return string|null
     */
    public function getCdMatriculaSiape(): ?string
    {
        return $this->cdMatriculaSiape;
    }

    /**
     * @param string|null $cdMatriculaSiape
     */
    public function setCdMatriculaSiape(?string $cdMatriculaSiape): void
    {
        $this->cdMatriculaSiape = $cdMatriculaSiape;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoRegimeJuridico(): ?\DateTime
    {
        return $this->dtIngressoRegimeJuridico;
    }

    /**
     * @param DateTime|null $dtIngressoRegimeJuridico
     */
    public function setDtIngressoRegimeJuridico(?\DateTime $dtIngressoRegimeJuridico): void
    {
        $this->dtIngressoRegimeJuridico = $dtIngressoRegimeJuridico;
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
     * @return DateTime|null
     */
    public function getDtRescisao(): ?\DateTime
    {
        return $this->dtRescisao;
    }

    /**
     * @param DateTime|null $dtRescisao
     */
    public function setDtRescisao(?\DateTime $dtRescisao): void
    {
        $this->dtRescisao = $dtRescisao;
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
     * @return int|null
     */
    public function getIdDadoFuncional(): ?int
    {
        return $this->idDadoFuncional;
    }

    /**
     * @param int|null $idDadoFuncional
     */
    public function setIdDadoFuncional(?int $idDadoFuncional): void
    {
        $this->idDadoFuncional = $idDadoFuncional;
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
     * @return DateTime|null
     */
    public function getDtIngressoServicoPublico(): ?\DateTime
    {
        return $this->dtIngressoServicoPublico;
    }

    /**
     * @param DateTime|null $dtIngressoServicoPublico
     */
    public function setDtIngressoServicoPublico(?\DateTime $dtIngressoServicoPublico): void
    {
        $this->dtIngressoServicoPublico = $dtIngressoServicoPublico;
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
