<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbPrazoPermanencia
 */
#[ORM\Table(name: 'TBPRAZO_PERMANENCIA')]
#[ORM\Entity]
class TbPrazoPermanencia
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IDSERVIDOR', type: 'string', length: 20, nullable: true)]
    private $idservidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'PRAZO', type: 'date', nullable: true)]
    private $prazo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DOCREAFIRMACAOAGU', type: 'string', length: 50, nullable: true)]
    private $docreafirmacaoagu;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DOCRESOORIGEM', type: 'string', length: 50, nullable: true)]
    private $docresoorigem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DATADOCREAFIRMACAO', type: 'string', length: 50, nullable: true)]
    private $datadocreafirmacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'RESPOSTAORIGEM', type: 'string', length: 5, nullable: true)]
    private $respostaorigem;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBPRAZO_PERMANENCIA_ID_TABLE_s', allocationSize: 1, initialValue: 1)]
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
     * @return DateTime|null
     */
    public function getPrazo(): ?\DateTime
    {
        return $this->prazo;
    }

    /**
     * @param DateTime|null $prazo
     */
    public function setPrazo(?\DateTime $prazo): void
    {
        $this->prazo = $prazo;
    }

    /**
     * @return string|null
     */
    public function getDocreafirmacaoagu(): ?string
    {
        return $this->docreafirmacaoagu;
    }

    /**
     * @param string|null $docreafirmacaoagu
     */
    public function setDocreafirmacaoagu(?string $docreafirmacaoagu): void
    {
        $this->docreafirmacaoagu = $docreafirmacaoagu;
    }

    /**
     * @return string|null
     */
    public function getDocresoorigem(): ?string
    {
        return $this->docresoorigem;
    }

    /**
     * @param string|null $docresoorigem
     */
    public function setDocresoorigem(?string $docresoorigem): void
    {
        $this->docresoorigem = $docresoorigem;
    }

    /**
     * @return string|null
     */
    public function getDatadocreafirmacao(): ?string
    {
        return $this->datadocreafirmacao;
    }

    /**
     * @param string|null $datadocreafirmacao
     */
    public function setDatadocreafirmacao(?string $datadocreafirmacao): void
    {
        $this->datadocreafirmacao = $datadocreafirmacao;
    }

    /**
     * @return string|null
     */
    public function getRespostaorigem(): ?string
    {
        return $this->respostaorigem;
    }

    /**
     * @param string|null $respostaorigem
     */
    public function setRespostaorigem(?string $respostaorigem): void
    {
        $this->respostaorigem = $respostaorigem;
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
