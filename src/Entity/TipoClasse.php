<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TipoClasse
 */
#[ORM\Table(name: 'TIPO_CLASSE')]
#[ORM\Index(name: 'IDX_5880E2FA10DD9DB6', columns: ['ID_RH'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class TipoClasse implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TIPO_CLASSE', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TIPO_CLASSE;'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_CLASSE', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_TIPO_CLASSE', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_TIPO_CLASSE', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para as classe possíveis na progressão funcional de um servidor em um cargo.'])]
    protected string $descricao;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $idRh;

    /**
     * @var Doctrine\Common\Collections\Collection
     */
    #[ORM\JoinTable(name: 'CLASSE_CATEGORIAS')]
    #[ORM\JoinColumn(name: 'ID_TIPO_CLASSE', referencedColumnName: 'ID_TIPO_CLASSE')]
    #[ORM\InverseJoinColumn(name: 'ID_CARGO', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToMany(targetEntity: 'Cargo', inversedBy: 'idTipoClasse')]
    private $idCargo = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idCargo = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id= $id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return Rh
     */
    public function getIdRh(): ?Rh
    {
        return $this->idRh;
    }

    /**
     * @param Rh $idRh
     */
    public function setIdRh(?Rh $idRh): void
    {
        $this->idRh = $idRh;
    }

    /**
     * @return Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    public function getIdCargo(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->idCargo;
    }

    /**
     * @param Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $idCargo
     */
    public function setIdCargo(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $idCargo): void
    {
        $this->idCargo = $idCargo;
    }

}
