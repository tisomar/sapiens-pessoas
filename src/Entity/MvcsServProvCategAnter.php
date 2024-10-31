<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsServProvCategAnter
 */
#[ORM\Table(name: 'MVCS_SERV_PROV_CATEG_ANTER')]
#[ORM\Entity]
class MvcsServProvCategAnter
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERCICIO_ATUAL', type: 'date', nullable: true)]
    private $dtExercicioAtual;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_RH_ATUAL', type: 'string', length: 100, nullable: true)]
    private $dsCargoRhAtual;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_SERVIDOR_ATUAL', type: 'date', nullable: true)]
    private $dtIngressoServidorAtual;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERCICIO_ANTERIOR', type: 'date', nullable: true)]
    private $dtExercicioAnterior;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_VACANCIA_PROV_ANTERIOR', type: 'date', nullable: true)]
    private $dtVacanciaProvAnterior;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_PADRAO', type: 'date', nullable: true)]
    private $dtClassePadrao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_CARGO_ANTERIOR', type: 'integer', nullable: true)]
    private $idCargoAnterior;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_ANTERIOR', type: 'string', length: 100, nullable: true)]
    private $dsCargoAnterior;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_PROVIMENTO_ANTERIOR', type: 'integer', nullable: false)]
    private $idProvimentoAnterior;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CLASSE_CATEGORIA', type: 'string', length: 100, nullable: true)]
    private $dsClasseCategoria;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_PADRAO_NIVEL', type: 'string', length: 10, nullable: true)]
    private $cdPadraoNivel;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_SERV_PROV_CATEG_ANTER_ID_', allocationSize: 1, initialValue: 1)]
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
     * @return DateTime|null
     */
    public function getDtExercicioAtual(): ?\DateTime
    {
        return $this->dtExercicioAtual;
    }

    /**
     * @param DateTime|null $dtExercicioAtual
     */
    public function setDtExercicioAtual(?\DateTime $dtExercicioAtual): void
    {
        $this->dtExercicioAtual = $dtExercicioAtual;
    }

    /**
     * @return string|null
     */
    public function getDsCargoRhAtual(): ?string
    {
        return $this->dsCargoRhAtual;
    }

    /**
     * @param string|null $dsCargoRhAtual
     */
    public function setDsCargoRhAtual(?string $dsCargoRhAtual): void
    {
        $this->dsCargoRhAtual = $dsCargoRhAtual;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoServidorAtual(): ?\DateTime
    {
        return $this->dtIngressoServidorAtual;
    }

    /**
     * @param DateTime|null $dtIngressoServidorAtual
     */
    public function setDtIngressoServidorAtual(?\DateTime $dtIngressoServidorAtual): void
    {
        $this->dtIngressoServidorAtual = $dtIngressoServidorAtual;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExercicioAnterior(): ?\DateTime
    {
        return $this->dtExercicioAnterior;
    }

    /**
     * @param DateTime|null $dtExercicioAnterior
     */
    public function setDtExercicioAnterior(?\DateTime $dtExercicioAnterior): void
    {
        $this->dtExercicioAnterior = $dtExercicioAnterior;
    }

    /**
     * @return DateTime|null
     */
    public function getDtVacanciaProvAnterior(): ?\DateTime
    {
        return $this->dtVacanciaProvAnterior;
    }

    /**
     * @param DateTime|null $dtVacanciaProvAnterior
     */
    public function setDtVacanciaProvAnterior(?\DateTime $dtVacanciaProvAnterior): void
    {
        $this->dtVacanciaProvAnterior = $dtVacanciaProvAnterior;
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
     * @return int|null
     */
    public function getIdCargoAnterior(): ?int
    {
        return $this->idCargoAnterior;
    }

    /**
     * @param int|null $idCargoAnterior
     */
    public function setIdCargoAnterior(?int $idCargoAnterior): void
    {
        $this->idCargoAnterior = $idCargoAnterior;
    }

    /**
     * @return string|null
     */
    public function getDsCargoAnterior(): ?string
    {
        return $this->dsCargoAnterior;
    }

    /**
     * @param string|null $dsCargoAnterior
     */
    public function setDsCargoAnterior(?string $dsCargoAnterior): void
    {
        $this->dsCargoAnterior = $dsCargoAnterior;
    }

    /**
     * @return int
     */
    public function getIdProvimentoAnterior(): int
    {
        return $this->idProvimentoAnterior;
    }

    /**
     * @param int $idProvimentoAnterior
     */
    public function setIdProvimentoAnterior(int $idProvimentoAnterior): void
    {
        $this->idProvimentoAnterior = $idProvimentoAnterior;
    }

    /**
     * @return string|null
     */
    public function getDsClasseCategoria(): ?string
    {
        return $this->dsClasseCategoria;
    }

    /**
     * @param string|null $dsClasseCategoria
     */
    public function setDsClasseCategoria(?string $dsClasseCategoria): void
    {
        $this->dsClasseCategoria = $dsClasseCategoria;
    }

    /**
     * @return string|null
     */
    public function getCdPadraoNivel(): ?string
    {
        return $this->cdPadraoNivel;
    }

    /**
     * @param string|null $cdPadraoNivel
     */
    public function setCdPadraoNivel(?string $cdPadraoNivel): void
    {
        $this->cdPadraoNivel = $cdPadraoNivel;
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
