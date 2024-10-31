<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TransacaoInterna
 */
#[ORM\Table(name: 'TRANSACAO_INTERNA')]
#[ORM\Index(name: 'IDX_6FD3281593C648F3', columns: ['ID_PAGINA'])]
#[ORM\Entity]
class TransacaoInterna
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TRANSACAO_INTERNA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial único da tabela AGU_RH.TRANSACAO_INTERNA.ID_TRANSACAO_INTERNA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TRANSACAO_INTERNA_ID_TRANSACAO', allocationSize: 1, initialValue: 1)]
    private $idTransacaoInterna;

    /**
     * @var string
     */
    #[ORM\Column(name: 'SG_TRANSACAO_INTERNA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Sigla ou nome abreviado para as transações internas da funcionalidade do sistema.'])]
    private $sgTransacaoInterna;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_TRANSACAO_INTERNA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome completo para as transações internas da funcionalidade do sistema.'])]
    private $nmTransacaoInterna;

    /**
     * @var Pagina
     */
    #[ORM\JoinColumn(name: 'ID_PAGINA', referencedColumnName: 'ID_PAGINA')]
    #[ORM\ManyToOne(targetEntity: 'Pagina')]
    private $idPagina;

    /**
     * @return int
     */
    public function getIdTransacaoInterna(): int
    {
        return $this->idTransacaoInterna;
    }

    /**
     * @param int $idTransacaoInterna
     */
    public function setIdTransacaoInterna(int $idTransacaoInterna): void
    {
        $this->idTransacaoInterna = $idTransacaoInterna;
    }

    /**
     * @return string
     */
    public function getSgTransacaoInterna(): string
    {
        return $this->sgTransacaoInterna;
    }

    /**
     * @param string $sgTransacaoInterna
     */
    public function setSgTransacaoInterna(string $sgTransacaoInterna): void
    {
        $this->sgTransacaoInterna = $sgTransacaoInterna;
    }

    /**
     * @return string
     */
    public function getNmTransacaoInterna(): string
    {
        return $this->nmTransacaoInterna;
    }

    /**
     * @param string $nmTransacaoInterna
     */
    public function setNmTransacaoInterna(string $nmTransacaoInterna): void
    {
        $this->nmTransacaoInterna = $nmTransacaoInterna;
    }

    /**
     * @return Pagina
     */
    public function getIdPagina(): Pagina
    {
        return $this->idPagina;
    }

    /**
     * @param Pagina $idPagina
     */
    public function setIdPagina(Pagina $idPagina): void
    {
        $this->idPagina = $idPagina;
    }


}
