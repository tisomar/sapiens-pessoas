<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbDocumentoRequisicao
 */
#[ORM\Table(name: 'TBDOCUMENTO_REQUISICAO')]
#[ORM\Entity]
class TbDocumentoRequisicao
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IDSERVIDOR', type: 'string', length: 20, nullable: true)]
    private $idservidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DOC_REQUISICAO', type: 'string', length: 75, nullable: true)]
    private $docRequisicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_DOC_REQUISICAO', type: 'date', nullable: true)]
    private $dtDocRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TIPODEDOUMENTO', type: 'string', length: 12, nullable: true)]
    private $tipodedoumento;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBDOCUMENTO_REQUISICAO_ID_TABL', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getIdservidor(): ?string
    {
        return $this->idservidor;
    }

    /**
     * @param string|null $idservidor
     */
    public function setIdservidor(?string $idservidor): void
    {
        $this->idservidor = $idservidor;
    }

    /**
     * @return string|null
     */
    public function getDocRequisicao(): ?string
    {
        return $this->docRequisicao;
    }

    /**
     * @param string|null $docRequisicao
     */
    public function setDocRequisicao(?string $docRequisicao): void
    {
        $this->docRequisicao = $docRequisicao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtDocRequisicao(): ?\DateTime
    {
        return $this->dtDocRequisicao;
    }

    /**
     * @param DateTime|null $dtDocRequisicao
     */
    public function setDtDocRequisicao(?\DateTime $dtDocRequisicao): void
    {
        $this->dtDocRequisicao = $dtDocRequisicao;
    }

    /**
     * @return string|null
     */
    public function getTipodedoumento(): ?string
    {
        return $this->tipodedoumento;
    }

    /**
     * @param string|null $tipodedoumento
     */
    public function setTipodedoumento(?string $tipodedoumento): void
    {
        $this->tipodedoumento = $tipodedoumento;
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
