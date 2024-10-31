<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsServidorPromocao
 */
#[ORM\Table(name: 'MVCS_SERVIDOR_PROMOCAO')]
#[ORM\Entity]
class MvcsServidorPromocao
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false)]
    private $nmServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 50, nullable: false)]
    private $nrCpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_MATRICULA_SIAPE', type: 'string', length: 15, nullable: true)]
    private $cdMatriculaSiape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CLASSE', type: 'string', length: 100, nullable: true)]
    private $dsClasse;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TIPO_PADRAO', type: 'string', length: 100, nullable: true)]
    private $dsTipoPadrao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_II', type: 'integer', nullable: true)]
    private $art3Ii;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_III', type: 'integer', nullable: true)]
    private $art3Iii;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CLASSE_ANTERIOR', type: 'string', length: 100, nullable: true)]
    private $classeAnterior;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'PADRAO_ANTERIOR', type: 'string', length: 10, nullable: true)]
    private $padraoAnterior;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_IV', type: 'integer', nullable: true)]
    private $art3Iv;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_V', type: 'integer', nullable: true)]
    private $art3V;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_VI', type: 'integer', nullable: true)]
    private $art3Vi;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_VII', type: 'integer', nullable: true)]
    private $art3Vii;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ART_3_VIII', type: 'integer', nullable: true)]
    private $art3Viii;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_SERVIDOR_PROMOCAO_ID_TABL', allocationSize: 1, initialValue: 1)]
    private $idTable;

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
    public function getNrCpf(): string
    {
        return $this->nrCpf;
    }

    /**
     * @param string $nrCpf
     */
    public function setNrCpf(string $nrCpf): void
    {
        $this->nrCpf = $nrCpf;
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
     * @return string|null
     */
    public function getDsClasse(): ?string
    {
        return $this->dsClasse;
    }

    /**
     * @param string|null $dsClasse
     */
    public function setDsClasse(?string $dsClasse): void
    {
        $this->dsClasse = $dsClasse;
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
     * @return int|null
     */
    public function getArt3Ii(): ?int
    {
        return $this->art3Ii;
    }

    /**
     * @param int|null $art3Ii
     */
    public function setArt3Ii(?int $art3Ii): void
    {
        $this->art3Ii = $art3Ii;
    }

    /**
     * @return int|null
     */
    public function getArt3Iii(): ?int
    {
        return $this->art3Iii;
    }

    /**
     * @param int|null $art3Iii
     */
    public function setArt3Iii(?int $art3Iii): void
    {
        $this->art3Iii = $art3Iii;
    }

    /**
     * @return string|null
     */
    public function getClasseAnterior(): ?string
    {
        return $this->classeAnterior;
    }

    /**
     * @param string|null $classeAnterior
     */
    public function setClasseAnterior(?string $classeAnterior): void
    {
        $this->classeAnterior = $classeAnterior;
    }

    /**
     * @return string|null
     */
    public function getPadraoAnterior(): ?string
    {
        return $this->padraoAnterior;
    }

    /**
     * @param string|null $padraoAnterior
     */
    public function setPadraoAnterior(?string $padraoAnterior): void
    {
        $this->padraoAnterior = $padraoAnterior;
    }

    /**
     * @return int|null
     */
    public function getArt3Iv(): ?int
    {
        return $this->art3Iv;
    }

    /**
     * @param int|null $art3Iv
     */
    public function setArt3Iv(?int $art3Iv): void
    {
        $this->art3Iv = $art3Iv;
    }

    /**
     * @return int|null
     */
    public function getArt3V(): ?int
    {
        return $this->art3V;
    }

    /**
     * @param int|null $art3V
     */
    public function setArt3V(?int $art3V): void
    {
        $this->art3V = $art3V;
    }

    /**
     * @return int|null
     */
    public function getArt3Vi(): ?int
    {
        return $this->art3Vi;
    }

    /**
     * @param int|null $art3Vi
     */
    public function setArt3Vi(?int $art3Vi): void
    {
        $this->art3Vi = $art3Vi;
    }

    /**
     * @return int|null
     */
    public function getArt3Vii(): ?int
    {
        return $this->art3Vii;
    }

    /**
     * @param int|null $art3Vii
     */
    public function setArt3Vii(?int $art3Vii): void
    {
        $this->art3Vii = $art3Vii;
    }

    /**
     * @return int|null
     */
    public function getArt3Viii(): ?int
    {
        return $this->art3Viii;
    }

    /**
     * @param int|null $art3Viii
     */
    public function setArt3Viii(?int $art3Viii): void
    {
        $this->art3Viii = $art3Viii;
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
