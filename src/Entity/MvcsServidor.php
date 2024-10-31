<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsServidor
 */
#[ORM\Table(name: 'MVCS_SERVIDOR')]
#[ORM\Entity]
class MvcsServidor
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true])]
    private $nrCpfOperador;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: false)]
    private $nrDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_MATRICULA_SIAPE', type: 'string', length: 15, nullable: true)]
    private $cdMatriculaSiape;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false)]
    private $nmServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_TIPO_SERVIDOR', type: 'string', length: 100, nullable: false)]
    private $dsTipoServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_CARGO_RH', type: 'string', length: 10, nullable: true)]
    private $cdCargoRh;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_RH', type: 'string', length: 100, nullable: true)]
    private $dsCargoRh;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_NIVEL', type: 'string', length: 100, nullable: true)]
    private $dsNivel;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_SERVIDOR', type: 'date', nullable: true)]
    private $dtIngressoServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CONCURSO', type: 'string', length: 10, nullable: true)]
    private $nrConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ANO_CONCURSO', type: 'integer', nullable: true)]
    private $nrAnoConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO_CONCURSO', type: 'integer', nullable: true)]
    private $nrClassificacaoConcurso;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TIPO_CLASSE', type: 'string', length: 100, nullable: true)]
    private $dsTipoClasse;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_TIPO_PADRAO', type: 'string', length: 10, nullable: true)]
    private $cdTipoPadrao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TIPO_PADRAO', type: 'string', length: 100, nullable: true)]
    private $dsTipoPadrao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_PADRAO', type: 'date', nullable: true)]
    private $dtClassePadrao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_CARGO_FUNCAO', type: 'string', length: 10, nullable: true)]
    private $cdCargoFuncao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_FUNCAO', type: 'string', length: 100, nullable: true)]
    private $dsCargoFuncao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_FUNCAO_GRATIFICADA', type: 'string', length: 10, nullable: true)]
    private $cdFuncaoGratificada;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERCICIO', type: 'date', nullable: true)]
    private $dtExercicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXONERACAO', type: 'date', nullable: true)]
    private $dtExoneracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'UNIDADE_EXERCICIO', type: 'string', length: 200, nullable: true)]
    private $unidadeExercicio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'UNIDADE_LOTACAO', type: 'string', length: 200, nullable: true)]
    private $unidadeLotacao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: false)]
    private $dtNascimento;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'IDADE_DIAS', type: 'integer', nullable: true)]
    private $idadeDias;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_STATUS_SERVIDOR', type: 'string', length: 1, nullable: false, options: ['fixed' => true])]
    private $inStatusServidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_REFERENCIA', type: 'date', nullable: true)]
    private $dtReferencia;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_SERVIDOR_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
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
     * @return string
     */
    public function getNrDocumentacao(): string
    {
        return $this->nrDocumentacao;
    }

    /**
     * @param string $nrDocumentacao
     */
    public function setNrDocumentacao(string $nrDocumentacao): void
    {
        $this->nrDocumentacao = $nrDocumentacao;
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
     * @return string
     */
    public function getNmServidor(): string
    {
        return $this->nmServidor;
    }

    /**
     * @param string $nmServidor
     */
    public function setNmServidor(string $nmServidor): void
    {
        $this->nmServidor = $nmServidor;
    }

    /**
     * @return string
     */
    public function getDsTipoServidor(): string
    {
        return $this->dsTipoServidor;
    }

    /**
     * @param string $dsTipoServidor
     */
    public function setDsTipoServidor(string $dsTipoServidor): void
    {
        $this->dsTipoServidor = $dsTipoServidor;
    }

    /**
     * @return string|null
     */
    public function getCdCargoRh(): ?string
    {
        return $this->cdCargoRh;
    }

    /**
     * @param string|null $cdCargoRh
     */
    public function setCdCargoRh(?string $cdCargoRh): void
    {
        $this->cdCargoRh = $cdCargoRh;
    }

    /**
     * @return string|null
     */
    public function getDsCargoRh(): ?string
    {
        return $this->dsCargoRh;
    }

    /**
     * @param string|null $dsCargoRh
     */
    public function setDsCargoRh(?string $dsCargoRh): void
    {
        $this->dsCargoRh = $dsCargoRh;
    }

    /**
     * @return string|null
     */
    public function getDsNivel(): ?string
    {
        return $this->dsNivel;
    }

    /**
     * @param string|null $dsNivel
     */
    public function setDsNivel(?string $dsNivel): void
    {
        $this->dsNivel = $dsNivel;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoServidor(): ?\DateTime
    {
        return $this->dtIngressoServidor;
    }

    /**
     * @param DateTime|null $dtIngressoServidor
     */
    public function setDtIngressoServidor(?\DateTime $dtIngressoServidor): void
    {
        $this->dtIngressoServidor = $dtIngressoServidor;
    }

    /**
     * @return string|null
     */
    public function getNrConcurso(): ?string
    {
        return $this->nrConcurso;
    }

    /**
     * @param string|null $nrConcurso
     */
    public function setNrConcurso(?string $nrConcurso): void
    {
        $this->nrConcurso = $nrConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrAnoConcurso(): ?int
    {
        return $this->nrAnoConcurso;
    }

    /**
     * @param int|null $nrAnoConcurso
     */
    public function setNrAnoConcurso(?int $nrAnoConcurso): void
    {
        $this->nrAnoConcurso = $nrAnoConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrClassificacaoConcurso(): ?int
    {
        return $this->nrClassificacaoConcurso;
    }

    /**
     * @param int|null $nrClassificacaoConcurso
     */
    public function setNrClassificacaoConcurso(?int $nrClassificacaoConcurso): void
    {
        $this->nrClassificacaoConcurso = $nrClassificacaoConcurso;
    }

    /**
     * @return string|null
     */
    public function getDsTipoClasse(): ?string
    {
        return $this->dsTipoClasse;
    }

    /**
     * @param string|null $dsTipoClasse
     */
    public function setDsTipoClasse(?string $dsTipoClasse): void
    {
        $this->dsTipoClasse = $dsTipoClasse;
    }

    /**
     * @return string|null
     */
    public function getCdTipoPadrao(): ?string
    {
        return $this->cdTipoPadrao;
    }

    /**
     * @param string|null $cdTipoPadrao
     */
    public function setCdTipoPadrao(?string $cdTipoPadrao): void
    {
        $this->cdTipoPadrao = $cdTipoPadrao;
    }

    /**
     * @return string|null
     */
    public function getDsTipoPadrao(): ?string
    {
        return $this->dsTipoPadrao;
    }

    /**
     * @param string|null $dsTipoPadrao
     */
    public function setDsTipoPadrao(?string $dsTipoPadrao): void
    {
        $this->dsTipoPadrao = $dsTipoPadrao;
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
    public function getCdCargoFuncao(): ?string
    {
        return $this->cdCargoFuncao;
    }

    /**
     * @param string|null $cdCargoFuncao
     */
    public function setCdCargoFuncao(?string $cdCargoFuncao): void
    {
        $this->cdCargoFuncao = $cdCargoFuncao;
    }

    /**
     * @return string|null
     */
    public function getDsCargoFuncao(): ?string
    {
        return $this->dsCargoFuncao;
    }

    /**
     * @param string|null $dsCargoFuncao
     */
    public function setDsCargoFuncao(?string $dsCargoFuncao): void
    {
        $this->dsCargoFuncao = $dsCargoFuncao;
    }

    /**
     * @return string|null
     */
    public function getCdFuncaoGratificada(): ?string
    {
        return $this->cdFuncaoGratificada;
    }

    /**
     * @param string|null $cdFuncaoGratificada
     */
    public function setCdFuncaoGratificada(?string $cdFuncaoGratificada): void
    {
        $this->cdFuncaoGratificada = $cdFuncaoGratificada;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExercicio(): ?\DateTime
    {
        return $this->dtExercicio;
    }

    /**
     * @param DateTime|null $dtExercicio
     */
    public function setDtExercicio(?\DateTime $dtExercicio): void
    {
        $this->dtExercicio = $dtExercicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExoneracao(): ?\DateTime
    {
        return $this->dtExoneracao;
    }

    /**
     * @param DateTime|null $dtExoneracao
     */
    public function setDtExoneracao(?\DateTime $dtExoneracao): void
    {
        $this->dtExoneracao = $dtExoneracao;
    }

    /**
     * @return string|null
     */
    public function getUnidadeExercicio(): ?string
    {
        return $this->unidadeExercicio;
    }

    /**
     * @param string|null $unidadeExercicio
     */
    public function setUnidadeExercicio(?string $unidadeExercicio): void
    {
        $this->unidadeExercicio = $unidadeExercicio;
    }

    /**
     * @return string|null
     */
    public function getUnidadeLotacao(): ?string
    {
        return $this->unidadeLotacao;
    }

    /**
     * @param string|null $unidadeLotacao
     */
    public function setUnidadeLotacao(?string $unidadeLotacao): void
    {
        $this->unidadeLotacao = $unidadeLotacao;
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
     * @return int|null
     */
    public function getIdadeDias(): ?int
    {
        return $this->idadeDias;
    }

    /**
     * @param int|null $idadeDias
     */
    public function setIdadeDias(?int $idadeDias): void
    {
        $this->idadeDias = $idadeDias;
    }

    /**
     * @return string
     */
    public function getInStatusServidor(): string
    {
        return $this->inStatusServidor;
    }

    /**
     * @param string $inStatusServidor
     */
    public function setInStatusServidor(string $inStatusServidor): void
    {
        $this->inStatusServidor = $inStatusServidor;
    }

    /**
     * @return DateTime|null
     */
    public function getDtReferencia(): ?\DateTime
    {
        return $this->dtReferencia;
    }

    /**
     * @param DateTime|null $dtReferencia
     */
    public function setDtReferencia(?\DateTime $dtReferencia): void
    {
        $this->dtReferencia = $dtReferencia;
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
