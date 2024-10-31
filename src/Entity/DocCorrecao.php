<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocCorrecao
 */
#[ORM\Table(name: 'DOC_CORRECAO')]
#[ORM\Entity]
class DocCorrecao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: false)]
    private $nrDocumentacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD', type: 'integer', nullable: true)]
    private $qtd;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DOC_CORRECAO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
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
     * @return int|null
     */
    public function getQtd(): ?int
    {
        return $this->qtd;
    }

    /**
     * @param int|null $qtd
     */
    public function setQtd(?int $qtd): void
    {
        $this->qtd = $qtd;
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
