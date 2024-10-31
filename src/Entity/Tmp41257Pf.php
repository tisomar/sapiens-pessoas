<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tmp#41257Pf
 */
#[ORM\Table(name: 'TMP_#41257_PF')]
#[ORM\Entity]
class Tmp#41257Pf
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 14, nullable: true, options: ['fixed' => true, 'comment' => 'NÚMERO DO CPF'])]
    private $cpf;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'K', type: 'date', nullable: true, options: ['comment' => 'III- maior tempo na Carreira (K)'])]
    private $k;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'N', type: 'string', length: 10, nullable: true, options: ['comment' => 'Tipo Classe (N)'])]
    private $n;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'O', type: 'string', length: 25, nullable: true, options: ['comment' => 'Tipo Padrao (O)'])]
    private $o;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'S', type: 'date', nullable: true, options: ['comment' => 'V- maior tempo na carreira precedente (S)'])]
    private $s;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'W', type: 'integer', nullable: true, options: ['comment' => 'VI- maior tempo serviço em outras carreiras (W)'])]
    private $w;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'X', type: 'date', nullable: true, options: ['comment' => 'VII- maior tempo de serviço público federal (X)'])]
    private $x;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_PADRAO', type: 'integer', nullable: true)]
    private $idTipoPadrao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TMP_#41257_PF_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     */
    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return DateTime|null
     */
    public function getK(): ?\DateTime
    {
        return $this->k;
    }

    /**
     * @param DateTime|null $k
     */
    public function setK(?\DateTime $k): void
    {
        $this->k = $k;
    }

    /**
     * @return string|null
     */
    public function getN(): ?string
    {
        return $this->n;
    }

    /**
     * @param string|null $n
     */
    public function setN(?string $n): void
    {
        $this->n = $n;
    }

    /**
     * @return string|null
     */
    public function getO(): ?string
    {
        return $this->o;
    }

    /**
     * @param string|null $o
     */
    public function setO(?string $o): void
    {
        $this->o = $o;
    }

    /**
     * @return DateTime|null
     */
    public function getS(): ?\DateTime
    {
        return $this->s;
    }

    /**
     * @param DateTime|null $s
     */
    public function setS(?\DateTime $s): void
    {
        $this->s = $s;
    }

    /**
     * @return int|null
     */
    public function getW(): ?int
    {
        return $this->w;
    }

    /**
     * @param int|null $w
     */
    public function setW(?int $w): void
    {
        $this->w = $w;
    }

    /**
     * @return DateTime|null
     */
    public function getX(): ?\DateTime
    {
        return $this->x;
    }

    /**
     * @param DateTime|null $x
     */
    public function setX(?\DateTime $x): void
    {
        $this->x = $x;
    }

    /**
     * @return int|null
     */
    public function getIdTipoPadrao(): ?int
    {
        return $this->idTipoPadrao;
    }

    /**
     * @param int|null $idTipoPadrao
     */
    public function setIdTipoPadrao(?int $idTipoPadrao): void
    {
        $this->idTipoPadrao = $idTipoPadrao;
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
