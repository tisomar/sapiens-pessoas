<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelatorioTabApoio
 */
#[ORM\Table(name: 'RELATORIO_TAB_APOIO')]
#[ORM\Entity]
class RelatorioTabApoio
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_TABELA', type: 'string', length: 30, nullable: false)]
    private $nmTabela;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_COLUNA_ID', type: 'string', length: 30, nullable: false)]
    private $nmColunaId;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_COLUNA_DS', type: 'string', length: 100, nullable: false)]
    private $nmColunaDs;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID', type: 'integer', nullable: false, options: ['default' => '""AGU_RH'])]
    private $id;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'RELATORIO_TAB_APOIO_ID_TABLE_s', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string
     */
    public function getNmTabela(): string
    {
        return $this->nmTabela;
    }

    /**
     * @param string $nmTabela
     */
    public function setNmTabela(string $nmTabela): void
    {
        $this->nmTabela = $nmTabela;
    }

    /**
     * @return string
     */
    public function getNmColunaId(): string
    {
        return $this->nmColunaId;
    }

    /**
     * @param string $nmColunaId
     */
    public function setNmColunaId(string $nmColunaId): void
    {
        $this->nmColunaId = $nmColunaId;
    }

    /**
     * @return string
     */
    public function getNmColunaDs(): string
    {
        return $this->nmColunaDs;
    }

    /**
     * @param string $nmColunaDs
     */
    public function setNmColunaDs(string $nmColunaDs): void
    {
        $this->nmColunaDs = $nmColunaDs;
    }

    /**
     * @return int|string
     */
    public function getId(): int|string
    {
        return $this->id;
    }

    /**
     * @param int|string $id
     */
    public function setId(int|string $id): void
    {
        $this->id = $id;
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
