<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb20100226Tk16039Prfzn
 */
#[ORM\Table(name: 'TB_20100226_TK16039_PRFZN')]
#[ORM\Entity]
class Tb20100226Tk16039Prfzn
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO', type: 'integer', nullable: true)]
    private $nrClassificacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME', type: 'string', length: 200, nullable: true)]
    private $nome;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO', type: 'date', nullable: true)]
    private $dtIngresso;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CONCURSO', type: 'string', length: 25, nullable: true)]
    private $dsConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CONCURSO', type: 'integer', nullable: true)]
    private $nrConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ANO_CONCURSO', type: 'integer', nullable: true)]
    private $anoConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'COD_SIAPE', type: 'integer', nullable: true)]
    private $codSiape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CATEGORIA', type: 'string', length: 25, nullable: true)]
    private $dsCategoria;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_CATEGORIA_12S', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $cdCategoria12s;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $nrCpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COD_SEXO_MF', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $codSexoMf;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_20100226_TK16039_PRFZN_ID_T', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int|null
     */
    public function getNrClassificacao(): ?int
    {
        return $this->nrClassificacao;
    }

    /**
     * @param int|null $nrClassificacao
     */
    public function setNrClassificacao(?int $nrClassificacao): void
    {
        $this->nrClassificacao = $nrClassificacao;
    }

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
     * @return DateTime|null
     */
    public function getDtIngresso(): ?\DateTime
    {
        return $this->dtIngresso;
    }

    /**
     * @param DateTime|null $dtIngresso
     */
    public function setDtIngresso(?\DateTime $dtIngresso): void
    {
        $this->dtIngresso = $dtIngresso;
    }

    /**
     * @return string|null
     */
    public function getDsConcurso(): ?string
    {
        return $this->dsConcurso;
    }

    /**
     * @param string|null $dsConcurso
     */
    public function setDsConcurso(?string $dsConcurso): void
    {
        $this->dsConcurso = $dsConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrConcurso(): ?int
    {
        return $this->nrConcurso;
    }

    /**
     * @param int|null $nrConcurso
     */
    public function setNrConcurso(?int $nrConcurso): void
    {
        $this->nrConcurso = $nrConcurso;
    }

    /**
     * @return int|null
     */
    public function getAnoConcurso(): ?int
    {
        return $this->anoConcurso;
    }

    /**
     * @param int|null $anoConcurso
     */
    public function setAnoConcurso(?int $anoConcurso): void
    {
        $this->anoConcurso = $anoConcurso;
    }

    /**
     * @return int|null
     */
    public function getCodSiape(): ?int
    {
        return $this->codSiape;
    }

    /**
     * @param int|null $codSiape
     */
    public function setCodSiape(?int $codSiape): void
    {
        $this->codSiape = $codSiape;
    }

    /**
     * @return string|null
     */
    public function getDsCategoria(): ?string
    {
        return $this->dsCategoria;
    }

    /**
     * @param string|null $dsCategoria
     */
    public function setDsCategoria(?string $dsCategoria): void
    {
        $this->dsCategoria = $dsCategoria;
    }

    /**
     * @return string|null
     */
    public function getCdCategoria12s(): ?string
    {
        return $this->cdCategoria12s;
    }

    /**
     * @param string|null $cdCategoria12s
     */
    public function setCdCategoria12s(?string $cdCategoria12s): void
    {
        $this->cdCategoria12s = $cdCategoria12s;
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
     * @return string|null
     */
    public function getCodSexoMf(): ?string
    {
        return $this->codSexoMf;
    }

    /**
     * @param string|null $codSexoMf
     */
    public function setCodSexoMf(?string $codSexoMf): void
    {
        $this->codSexoMf = $codSexoMf;
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
