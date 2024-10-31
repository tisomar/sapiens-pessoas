<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb47502DependenteBkp
 */
#[ORM\Table(name: 'TB47502_DEPENDENTE_BKP')]
#[ORM\Entity]
class Tb47502DependenteBkp
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DEPENDENTE', type: 'integer', nullable: false)]
    private $idDependente;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_MUNICIPIO_CERTIDAO', type: 'integer', nullable: true)]
    private $idMunicipioCertidao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_SANGUINEO', type: 'integer', nullable: true)]
    private $idTipoSanguineo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_PARENTESCO', type: 'integer', nullable: false)]
    private $idTipoParentesco;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_DEPENDENTE', type: 'string', length: 70, nullable: false)]
    private $nmDependente;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: false)]
    private $dtNascimento;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CD_SEXO', type: 'string', length: 1, nullable: false)]
    private $cdSexo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $nrCpf;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CASAMENTO', type: 'date', nullable: true)]
    private $dtCasamento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_PAI_DEPENDENTE', type: 'string', length: 70, nullable: true)]
    private $nmPaiDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_MAE_DEPENDENTE', type: 'string', length: 70, nullable: true)]
    private $nmMaeDependente;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_DEPENDENTE', type: 'date', nullable: true)]
    private $dtInicioDependente;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_DEPENDENTE', type: 'date', nullable: true)]
    private $dtFimDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_MOTIVO', type: 'string', length: 100, nullable: true)]
    private $dsMotivo;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CERTIDAO_NASCIMENTO', type: 'date', nullable: true)]
    private $dtCertidaoNascimento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CERTIDAO_NASCIMENTO', type: 'string', length: 50, nullable: true)]
    private $nrCertidaoNascimento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LIVRO_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $dsLivroCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_FOLHA_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $dsFolhaCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARTORIO_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $dsCartorioCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true)]
    private $dsObservacao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false)]
    private $dtOperacaoAlteracao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false)]
    private $dtOperacaoInclusao;

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
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB47502_DEPENDENTE_BKP_ID_TABL', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdDependente(): int
    {
        return $this->idDependente;
    }

    /**
     * @param int $idDependente
     */
    public function setIdDependente(int $idDependente): void
    {
        $this->idDependente = $idDependente;
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
     * @return int|null
     */
    public function getIdMunicipioCertidao(): ?int
    {
        return $this->idMunicipioCertidao;
    }

    /**
     * @param int|null $idMunicipioCertidao
     */
    public function setIdMunicipioCertidao(?int $idMunicipioCertidao): void
    {
        $this->idMunicipioCertidao = $idMunicipioCertidao;
    }

    /**
     * @return int|null
     */
    public function getIdTipoSanguineo(): ?int
    {
        return $this->idTipoSanguineo;
    }

    /**
     * @param int|null $idTipoSanguineo
     */
    public function setIdTipoSanguineo(?int $idTipoSanguineo): void
    {
        $this->idTipoSanguineo = $idTipoSanguineo;
    }

    /**
     * @return int
     */
    public function getIdTipoParentesco(): int
    {
        return $this->idTipoParentesco;
    }

    /**
     * @param int $idTipoParentesco
     */
    public function setIdTipoParentesco(int $idTipoParentesco): void
    {
        $this->idTipoParentesco = $idTipoParentesco;
    }

    /**
     * @return string
     */
    public function getNmDependente(): string
    {
        return $this->nmDependente;
    }

    /**
     * @param string $nmDependente
     */
    public function setNmDependente(string $nmDependente): void
    {
        $this->nmDependente = $nmDependente;
    }

    /**
     * @return DateTime
     */
    public function getDtNascimento(): \DateTime
    {
        return $this->dtNascimento;
    }

    /**
     * @param DateTime $dtNascimento
     */
    public function setDtNascimento(\DateTime $dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    /**
     * @return string
     */
    public function getCdSexo(): string
    {
        return $this->cdSexo;
    }

    /**
     * @param string $cdSexo
     */
    public function setCdSexo(string $cdSexo): void
    {
        $this->cdSexo = $cdSexo;
    }

    /**
     * @return string|null
     */
    public function getNrCpf(): ?string
    {
        return $this->nrCpf;
    }

    /**
     * @param string|null $nrCpf
     */
    public function setNrCpf(?string $nrCpf): void
    {
        $this->nrCpf = $nrCpf;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCasamento(): ?\DateTime
    {
        return $this->dtCasamento;
    }

    /**
     * @param DateTime|null $dtCasamento
     */
    public function setDtCasamento(?\DateTime $dtCasamento): void
    {
        $this->dtCasamento = $dtCasamento;
    }

    /**
     * @return string|null
     */
    public function getNmPaiDependente(): ?string
    {
        return $this->nmPaiDependente;
    }

    /**
     * @param string|null $nmPaiDependente
     */
    public function setNmPaiDependente(?string $nmPaiDependente): void
    {
        $this->nmPaiDependente = $nmPaiDependente;
    }

    /**
     * @return string|null
     */
    public function getNmMaeDependente(): ?string
    {
        return $this->nmMaeDependente;
    }

    /**
     * @param string|null $nmMaeDependente
     */
    public function setNmMaeDependente(?string $nmMaeDependente): void
    {
        $this->nmMaeDependente = $nmMaeDependente;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioDependente(): ?\DateTime
    {
        return $this->dtInicioDependente;
    }

    /**
     * @param DateTime|null $dtInicioDependente
     */
    public function setDtInicioDependente(?\DateTime $dtInicioDependente): void
    {
        $this->dtInicioDependente = $dtInicioDependente;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimDependente(): ?\DateTime
    {
        return $this->dtFimDependente;
    }

    /**
     * @param DateTime|null $dtFimDependente
     */
    public function setDtFimDependente(?\DateTime $dtFimDependente): void
    {
        $this->dtFimDependente = $dtFimDependente;
    }

    /**
     * @return string|null
     */
    public function getDsMotivo(): ?string
    {
        return $this->dsMotivo;
    }

    /**
     * @param string|null $dsMotivo
     */
    public function setDsMotivo(?string $dsMotivo): void
    {
        $this->dsMotivo = $dsMotivo;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCertidaoNascimento(): ?\DateTime
    {
        return $this->dtCertidaoNascimento;
    }

    /**
     * @param DateTime|null $dtCertidaoNascimento
     */
    public function setDtCertidaoNascimento(?\DateTime $dtCertidaoNascimento): void
    {
        $this->dtCertidaoNascimento = $dtCertidaoNascimento;
    }

    /**
     * @return string|null
     */
    public function getNrCertidaoNascimento(): ?string
    {
        return $this->nrCertidaoNascimento;
    }

    /**
     * @param string|null $nrCertidaoNascimento
     */
    public function setNrCertidaoNascimento(?string $nrCertidaoNascimento): void
    {
        $this->nrCertidaoNascimento = $nrCertidaoNascimento;
    }

    /**
     * @return string|null
     */
    public function getDsLivroCertidao(): ?string
    {
        return $this->dsLivroCertidao;
    }

    /**
     * @param string|null $dsLivroCertidao
     */
    public function setDsLivroCertidao(?string $dsLivroCertidao): void
    {
        $this->dsLivroCertidao = $dsLivroCertidao;
    }

    /**
     * @return string|null
     */
    public function getDsFolhaCertidao(): ?string
    {
        return $this->dsFolhaCertidao;
    }

    /**
     * @param string|null $dsFolhaCertidao
     */
    public function setDsFolhaCertidao(?string $dsFolhaCertidao): void
    {
        $this->dsFolhaCertidao = $dsFolhaCertidao;
    }

    /**
     * @return string|null
     */
    public function getDsCartorioCertidao(): ?string
    {
        return $this->dsCartorioCertidao;
    }

    /**
     * @param string|null $dsCartorioCertidao
     */
    public function setDsCartorioCertidao(?string $dsCartorioCertidao): void
    {
        $this->dsCartorioCertidao = $dsCartorioCertidao;
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
