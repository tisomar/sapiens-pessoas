<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LogUpdateNorma
 */
#[ORM\Table(name: 'LOG_UPDATE_NORMA')]
#[ORM\Entity]
class LogUpdateNorma
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TABELA', type: 'string', length: 30, nullable: true)]
    private $tabela;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID', type: 'integer', nullable: true)]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CAMPO', type: 'string', length: 30, nullable: true)]
    private $campo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COMANDO', type: 'string', length: 1000, nullable: true)]
    private $comando;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOG_UPDATE_NORMA_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getTabela(): ?string
    {
        return $this->tabela;
    }

    /**
     * @param string|null $tabela
     */
    public function setTabela(?string $tabela): void
    {
        $this->tabela = $tabela;
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCampo(): ?string
    {
        return $this->campo;
    }

    /**
     * @param string|null $campo
     */
    public function setCampo(?string $campo): void
    {
        $this->campo = $campo;
    }

    /**
     * @return string|null
     */
    public function getComando(): ?string
    {
        return $this->comando;
    }

    /**
     * @param string|null $comando
     */
    public function setComando(?string $comando): void
    {
        $this->comando = $comando;
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
