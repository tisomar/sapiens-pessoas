<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagina
 */
#[ORM\Table(name: 'PAGINA')]
#[ORM\Entity]
class Pagina
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_PAGINA', type: 'integer', nullable: false, options: ['comment' => 'Identicador sequencial único da tabela AGU_RH.PAGINA.ID_PAGINA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'PAGINA_ID_PAGINA_seq', allocationSize: 1, initialValue: 1)]
    private $idPagina;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_PAGINA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especifica o nome de uma determinada página dentro do sistema AGUpessoas.'])]
    private $nmPagina;

    /**
     * @return int
     */
    public function getIdPagina(): int
    {
        return $this->idPagina;
    }

    /**
     * @param int $idPagina
     */
    public function setIdPagina(int $idPagina): void
    {
        $this->idPagina = $idPagina;
    }

    /**
     * @return string
     */
    public function getNmPagina(): string
    {
        return $this->nmPagina;
    }

    /**
     * @param string $nmPagina
     */
    public function setNmPagina(string $nmPagina): void
    {
        $this->nmPagina = $nmPagina;
    }


}
