<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TmpCargaPgf05092011
 */
#[ORM\Table(name: 'TMP_CARGA_PGF_05092011')]
#[ORM\Entity]
class TmpCargaPgf05092011
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME', type: 'string', length: 100, nullable: true)]
    private $nome;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SIAPE', type: 'string', length: 20, nullable: true)]
    private $siape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 14, nullable: true, options: ['fixed' => true])]
    private $cpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'OBS_CARGO', type: 'string', length: 30, nullable: true)]
    private $obsCargo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CLASSIFICACAO', type: 'string', length: 10, nullable: true)]
    private $classificacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TIPO_PADRAO', type: 'string', length: 100, nullable: true)]
    private $tipoPadrao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'MOTIVO_EVOLUCAO', type: 'string', length: 100, nullable: true)]
    private $motivoEvolucao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EFEITO', type: 'date', nullable: true)]
    private $dtEfeito;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'FINALIDADE', type: 'string', length: 100, nullable: true)]
    private $finalidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'AUTORIDADE', type: 'string', length: 100, nullable: true)]
    private $autoridade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TIPO_DOC', type: 'string', length: 100, nullable: true)]
    private $tipoDoc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_DOC', type: 'string', length: 20, nullable: true)]
    private $nrDoc;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_DOC', type: 'date', nullable: true)]
    private $dtDoc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_PUBLICACAO', type: 'string', length: 100, nullable: true)]
    private $dsPublicacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_PUBLICACAO', type: 'string', length: 20, nullable: true)]
    private $nrPublicacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PUBLICACAO', type: 'date', nullable: true)]
    private $dtPublicacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 200, nullable: true)]
    private $dsObservacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'QT_REGISTROS', type: 'string', length: 20, nullable: true)]
    private $qtRegistros;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'CD_OBS_CARGO', type: 'integer', nullable: true)]
    private $cdObsCargo;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'CD_CLASSIFICACAO', type: 'integer', nullable: true)]
    private $cdClassificacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'CD_TIPO_PADRAO', type: 'integer', nullable: true)]
    private $cdTipoPadrao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'CD_MOTIVO_EVOLUCAO', type: 'integer', nullable: true)]
    private $cdMotivoEvolucao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA', type: 'integer', nullable: true)]
    private $idNorma;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CONCURSO', type: 'string', length: 10, nullable: true)]
    private $nrConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_CARGO_EFETIVO', type: 'integer', nullable: true)]
    private $idCargoEfetivo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TMP_CARGA_PGF_05092011_ID_TABL', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string|null
     */
    public function getSiape(): ?string
    {
        return $this->siape;
    }

    /**
     * @param string|null $siape
     */
    public function setSiape(?string $siape): void
    {
        $this->siape = $siape;
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
     * @return string|null
     */
    public function getObsCargo(): ?string
    {
        return $this->obsCargo;
    }

    /**
     * @param string|null $obsCargo
     */
    public function setObsCargo(?string $obsCargo): void
    {
        $this->obsCargo = $obsCargo;
    }

    /**
     * @return string|null
     */
    public function getClassificacao(): ?string
    {
        return $this->classificacao;
    }

    /**
     * @param string|null $classificacao
     */
    public function setClassificacao(?string $classificacao): void
    {
        $this->classificacao = $classificacao;
    }

    /**
     * @return string|null
     */
    public function getTipoPadrao(): ?string
    {
        return $this->tipoPadrao;
    }

    /**
     * @param string|null $tipoPadrao
     */
    public function setTipoPadrao(?string $tipoPadrao): void
    {
        $this->tipoPadrao = $tipoPadrao;
    }

    /**
     * @return string|null
     */
    public function getMotivoEvolucao(): ?string
    {
        return $this->motivoEvolucao;
    }

    /**
     * @param string|null $motivoEvolucao
     */
    public function setMotivoEvolucao(?string $motivoEvolucao): void
    {
        $this->motivoEvolucao = $motivoEvolucao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtEfeito(): ?\DateTime
    {
        return $this->dtEfeito;
    }

    /**
     * @param DateTime|null $dtEfeito
     */
    public function setDtEfeito(?\DateTime $dtEfeito): void
    {
        $this->dtEfeito = $dtEfeito;
    }

    /**
     * @return string|null
     */
    public function getFinalidade(): ?string
    {
        return $this->finalidade;
    }

    /**
     * @param string|null $finalidade
     */
    public function setFinalidade(?string $finalidade): void
    {
        $this->finalidade = $finalidade;
    }

    /**
     * @return string|null
     */
    public function getAutoridade(): ?string
    {
        return $this->autoridade;
    }

    /**
     * @param string|null $autoridade
     */
    public function setAutoridade(?string $autoridade): void
    {
        $this->autoridade = $autoridade;
    }

    /**
     * @return string|null
     */
    public function getTipoDoc(): ?string
    {
        return $this->tipoDoc;
    }

    /**
     * @param string|null $tipoDoc
     */
    public function setTipoDoc(?string $tipoDoc): void
    {
        $this->tipoDoc = $tipoDoc;
    }

    /**
     * @return string|null
     */
    public function getNrDoc(): ?string
    {
        return $this->nrDoc;
    }

    /**
     * @param string|null $nrDoc
     */
    public function setNrDoc(?string $nrDoc): void
    {
        $this->nrDoc = $nrDoc;
    }

    /**
     * @return DateTime|null
     */
    public function getDtDoc(): ?\DateTime
    {
        return $this->dtDoc;
    }

    /**
     * @param DateTime|null $dtDoc
     */
    public function setDtDoc(?\DateTime $dtDoc): void
    {
        $this->dtDoc = $dtDoc;
    }

    /**
     * @return string|null
     */
    public function getDsPublicacao(): ?string
    {
        return $this->dsPublicacao;
    }

    /**
     * @param string|null $dsPublicacao
     */
    public function setDsPublicacao(?string $dsPublicacao): void
    {
        $this->dsPublicacao = $dsPublicacao;
    }

    /**
     * @return string|null
     */
    public function getNrPublicacao(): ?string
    {
        return $this->nrPublicacao;
    }

    /**
     * @param string|null $nrPublicacao
     */
    public function setNrPublicacao(?string $nrPublicacao): void
    {
        $this->nrPublicacao = $nrPublicacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPublicacao(): ?\DateTime
    {
        return $this->dtPublicacao;
    }

    /**
     * @param DateTime|null $dtPublicacao
     */
    public function setDtPublicacao(?\DateTime $dtPublicacao): void
    {
        $this->dtPublicacao = $dtPublicacao;
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
     * @return string|null
     */
    public function getQtRegistros(): ?string
    {
        return $this->qtRegistros;
    }

    /**
     * @param string|null $qtRegistros
     */
    public function setQtRegistros(?string $qtRegistros): void
    {
        $this->qtRegistros = $qtRegistros;
    }

    /**
     * @return int|null
     */
    public function getCdObsCargo(): ?int
    {
        return $this->cdObsCargo;
    }

    /**
     * @param int|null $cdObsCargo
     */
    public function setCdObsCargo(?int $cdObsCargo): void
    {
        $this->cdObsCargo = $cdObsCargo;
    }

    /**
     * @return int|null
     */
    public function getCdClassificacao(): ?int
    {
        return $this->cdClassificacao;
    }

    /**
     * @param int|null $cdClassificacao
     */
    public function setCdClassificacao(?int $cdClassificacao): void
    {
        $this->cdClassificacao = $cdClassificacao;
    }

    /**
     * @return int|null
     */
    public function getCdTipoPadrao(): ?int
    {
        return $this->cdTipoPadrao;
    }

    /**
     * @param int|null $cdTipoPadrao
     */
    public function setCdTipoPadrao(?int $cdTipoPadrao): void
    {
        $this->cdTipoPadrao = $cdTipoPadrao;
    }

    /**
     * @return int|null
     */
    public function getCdMotivoEvolucao(): ?int
    {
        return $this->cdMotivoEvolucao;
    }

    /**
     * @param int|null $cdMotivoEvolucao
     */
    public function setCdMotivoEvolucao(?int $cdMotivoEvolucao): void
    {
        $this->cdMotivoEvolucao = $cdMotivoEvolucao;
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
     * @return int|null
     */
    public function getIdCargoEfetivo(): ?int
    {
        return $this->idCargoEfetivo;
    }

    /**
     * @param int|null $idCargoEfetivo
     */
    public function setIdCargoEfetivo(?int $idCargoEfetivo): void
    {
        $this->idCargoEfetivo = $idCargoEfetivo;
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
