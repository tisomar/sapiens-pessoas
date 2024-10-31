<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbRedistribuicao
 */
#[ORM\Table(name: 'TBREDISTRIBUICAO')]
#[ORM\Entity]
class TbRedistribuicao
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IDSERVIDOR', type: 'string', length: 20, nullable: true)]
    private $idservidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ORIGEM_REDISTRIBUICAO', type: 'string', length: 20, nullable: true)]
    private $origemRedistribuicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'PORTARIA_DOU', type: 'string', length: 50, nullable: true)]
    private $portariaDou;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'AVISO_AGU', type: 'string', length: 50, nullable: true)]
    private $avisoAgu;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'AUTORIZADO', type: 'string', length: 5, nullable: true)]
    private $autorizado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DOC_AUTORIZA', type: 'string', length: 50, nullable: true)]
    private $docAutoriza;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_DOC_AUTORIZA', type: 'date', nullable: true)]
    private $dtDocAutoriza;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBREDISTRIBUICAO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
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
    public function getOrigemRedistribuicao(): ?string
    {
        return $this->origemRedistribuicao;
    }

    /**
     * @param string|null $origemRedistribuicao
     */
    public function setOrigemRedistribuicao(?string $origemRedistribuicao): void
    {
        $this->origemRedistribuicao = $origemRedistribuicao;
    }

    /**
     * @return string|null
     */
    public function getPortariaDou(): ?string
    {
        return $this->portariaDou;
    }

    /**
     * @param string|null $portariaDou
     */
    public function setPortariaDou(?string $portariaDou): void
    {
        $this->portariaDou = $portariaDou;
    }

    /**
     * @return string|null
     */
    public function getAvisoAgu(): ?string
    {
        return $this->avisoAgu;
    }

    /**
     * @param string|null $avisoAgu
     */
    public function setAvisoAgu(?string $avisoAgu): void
    {
        $this->avisoAgu = $avisoAgu;
    }

    /**
     * @return string|null
     */
    public function getAutorizado(): ?string
    {
        return $this->autorizado;
    }

    /**
     * @param string|null $autorizado
     */
    public function setAutorizado(?string $autorizado): void
    {
        $this->autorizado = $autorizado;
    }

    /**
     * @return string|null
     */
    public function getDocAutoriza(): ?string
    {
        return $this->docAutoriza;
    }

    /**
     * @param string|null $docAutoriza
     */
    public function setDocAutoriza(?string $docAutoriza): void
    {
        $this->docAutoriza = $docAutoriza;
    }

    /**
     * @return DateTime|null
     */
    public function getDtDocAutoriza(): ?\DateTime
    {
        return $this->dtDocAutoriza;
    }

    /**
     * @param DateTime|null $dtDocAutoriza
     */
    public function setDtDocAutoriza(?\DateTime $dtDocAutoriza): void
    {
        $this->dtDocAutoriza = $dtDocAutoriza;
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
