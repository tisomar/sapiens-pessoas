<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsServidorRemocao
 */
#[ORM\Table(name: 'MVCS_SERVIDOR_REMOCAO')]
#[ORM\Entity]
class MvcsServidorRemocao
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: false)]
    private $nrDocumentacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false)]
    private $nmServidor;

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
    #[ORM\Column(name: 'DS_TIPO_CLASSE', type: 'string', length: 100, nullable: true)]
    private $dsTipoClasse;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_SERVIDOR', type: 'date', nullable: true)]
    private $dtIngressoServidor;

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
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_DIA_CARREIRA_SEM_AFAST', type: 'integer', nullable: true)]
    private $qtdDiaCarreiraSemAfast;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_DIA_CARREIRA_COM_AFAST', type: 'integer', nullable: true)]
    private $qtdDiaCarreiraComAfast;

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
     * @var int|null
     */
    #[ORM\Column(name: 'TOT_DIAS', type: 'integer', nullable: true)]
    private $totDias;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SN_2ANOS', type: 'string', length: 3, nullable: true)]
    private $sn2anos;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_SERVIDOR_REMOCAO_ID_TABLE', allocationSize: 1, initialValue: 1)]
    private $idTable;

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
     * @return int|null
     */
    public function getQtdDiaCarreiraSemAfast(): ?int
    {
        return $this->qtdDiaCarreiraSemAfast;
    }

    /**
     * @param int|null $qtdDiaCarreiraSemAfast
     */
    public function setQtdDiaCarreiraSemAfast(?int $qtdDiaCarreiraSemAfast): void
    {
        $this->qtdDiaCarreiraSemAfast = $qtdDiaCarreiraSemAfast;
    }

    /**
     * @return int|null
     */
    public function getQtdDiaCarreiraComAfast(): ?int
    {
        return $this->qtdDiaCarreiraComAfast;
    }

    /**
     * @param int|null $qtdDiaCarreiraComAfast
     */
    public function setQtdDiaCarreiraComAfast(?int $qtdDiaCarreiraComAfast): void
    {
        $this->qtdDiaCarreiraComAfast = $qtdDiaCarreiraComAfast;
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
     * @return int|null
     */
    public function getTotDias(): ?int
    {
        return $this->totDias;
    }

    /**
     * @param int|null $totDias
     */
    public function setTotDias(?int $totDias): void
    {
        $this->totDias = $totDias;
    }

    /**
     * @return string|null
     */
    public function getSn2anos(): ?string
    {
        return $this->sn2anos;
    }

    /**
     * @param string|null $sn2anos
     */
    public function setSn2anos(?string $sn2anos): void
    {
        $this->sn2anos = $sn2anos;
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
