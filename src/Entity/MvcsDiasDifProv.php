<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MvcsDiasDifProv
 */
#[ORM\Table(name: 'MVCS_DIAS_DIF_PROV')]
#[ORM\Entity]
class MvcsDiasDifProv
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'TOT_DIAS', type: 'integer', nullable: true)]
    private $totDias;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SN_2ANOS', type: 'string', length: 3, nullable: true, options: ['fixed' => true])]
    private $sn2anos;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MVCS_DIAS_DIF_PROV_ID_TABLE_se', allocationSize: 1, initialValue: 1)]
    private $idTable;

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
