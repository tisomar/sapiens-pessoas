<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbOrgaoOrigem
 */
#[ORM\Table(name: 'TBORGAO_ORIGEM')]
#[ORM\Entity]
class TbOrgaoOrigem
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IDORIGEM', type: 'string', length: 20, nullable: true)]
    private $idorigem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CODIGOORIGEM', type: 'string', length: 20, nullable: true)]
    private $codigoorigem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DESCRICAO_ORIGEM', type: 'string', length: 70, nullable: true)]
    private $descricaoOrigem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SIGLA', type: 'string', length: 15, nullable: true)]
    private $sigla;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ORGAOSUPERIOR', type: 'string', length: 70, nullable: true)]
    private $orgaosuperior;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DIRIGENTESUPERIOR', type: 'string', length: 80, nullable: true)]
    private $dirigentesuperior;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'VINCULO', type: 'string', length: 5, nullable: true)]
    private $vinculo;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBORGAO_ORIGEM_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getIdorigem(): ?string
    {
        return $this->idorigem;
    }

    /**
     * @param string|null $idorigem
     */
    public function setIdorigem(?string $idorigem): void
    {
        $this->idorigem = $idorigem;
    }

    /**
     * @return string|null
     */
    public function getCodigoorigem(): ?string
    {
        return $this->codigoorigem;
    }

    /**
     * @param string|null $codigoorigem
     */
    public function setCodigoorigem(?string $codigoorigem): void
    {
        $this->codigoorigem = $codigoorigem;
    }

    /**
     * @return string|null
     */
    public function getDescricaoOrigem(): ?string
    {
        return $this->descricaoOrigem;
    }

    /**
     * @param string|null $descricaoOrigem
     */
    public function setDescricaoOrigem(?string $descricaoOrigem): void
    {
        $this->descricaoOrigem = $descricaoOrigem;
    }

    /**
     * @return string|null
     */
    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    /**
     * @param string|null $sigla
     */
    public function setSigla(?string $sigla): void
    {
        $this->sigla = $sigla;
    }

    /**
     * @return string|null
     */
    public function getOrgaosuperior(): ?string
    {
        return $this->orgaosuperior;
    }

    /**
     * @param string|null $orgaosuperior
     */
    public function setOrgaosuperior(?string $orgaosuperior): void
    {
        $this->orgaosuperior = $orgaosuperior;
    }

    /**
     * @return string|null
     */
    public function getDirigentesuperior(): ?string
    {
        return $this->dirigentesuperior;
    }

    /**
     * @param string|null $dirigentesuperior
     */
    public function setDirigentesuperior(?string $dirigentesuperior): void
    {
        $this->dirigentesuperior = $dirigentesuperior;
    }

    /**
     * @return string|null
     */
    public function getVinculo(): ?string
    {
        return $this->vinculo;
    }

    /**
     * @param string|null $vinculo
     */
    public function setVinculo(?string $vinculo): void
    {
        $this->vinculo = $vinculo;
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
