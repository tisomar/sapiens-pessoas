<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsServTempoCategTmp
 */
#[ORM\Table(name: 'MVCS_SERV_TEMPO_CATEG_TMP')]
#[ORM\Entity]
class MvcsServTempoCategTmp
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CD_CARGO_RH', type: 'string', length: 10, nullable: false)]
    private $cdCargoRh;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_RH', type: 'string', length: 100, nullable: true)]
    private $dsCargoRh;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CARREIRA', type: 'string', length: 30, nullable: true)]
    private $carreira;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_TIPO_PADRAO', type: 'string', length: 10, nullable: true)]
    private $cdTipoPadrao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_TIPO_PADRAO', type: 'string', length: 100, nullable: false)]
    private $dsTipoPadrao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_ATUAL', type: 'date', nullable: true)]
    private $dtClasseAtual;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIAS_CLASSE_ATUAL', type: 'integer', nullable: true)]
    private $qtDiasClasseAtual;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_PADRAO_ATUAL', type: 'date', nullable: true)]
    private $dtClassePadraoAtual;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_SERV_TEMPO_CATEG_TMP_ID_T', allocationSize: 1, initialValue: 1)]
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
    public function getCdCargoRh(): string
    {
        return $this->cdCargoRh;
    }

    /**
     * @param string $cdCargoRh
     */
    public function setCdCargoRh(string $cdCargoRh): void
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
    public function getCarreira(): ?string
    {
        return $this->carreira;
    }

    /**
     * @param string|null $carreira
     */
    public function setCarreira(?string $carreira): void
    {
        $this->carreira = $carreira;
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
     * @return string
     */
    public function getDsTipoPadrao(): string
    {
        return $this->dsTipoPadrao;
    }

    /**
     * @param string $dsTipoPadrao
     */
    public function setDsTipoPadrao(string $dsTipoPadrao): void
    {
        $this->dsTipoPadrao = $dsTipoPadrao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtClasseAtual(): ?\DateTime
    {
        return $this->dtClasseAtual;
    }

    /**
     * @param DateTime|null $dtClasseAtual
     */
    public function setDtClasseAtual(?\DateTime $dtClasseAtual): void
    {
        $this->dtClasseAtual = $dtClasseAtual;
    }

    /**
     * @return int|null
     */
    public function getQtDiasClasseAtual(): ?int
    {
        return $this->qtDiasClasseAtual;
    }

    /**
     * @param int|null $qtDiasClasseAtual
     */
    public function setQtDiasClasseAtual(?int $qtDiasClasseAtual): void
    {
        $this->qtDiasClasseAtual = $qtDiasClasseAtual;
    }

    /**
     * @return DateTime|null
     */
    public function getDtClassePadraoAtual(): ?\DateTime
    {
        return $this->dtClassePadraoAtual;
    }

    /**
     * @param DateTime|null $dtClassePadraoAtual
     */
    public function setDtClassePadraoAtual(?\DateTime $dtClassePadraoAtual): void
    {
        $this->dtClassePadraoAtual = $dtClassePadraoAtual;
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
