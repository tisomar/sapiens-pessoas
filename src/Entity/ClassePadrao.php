<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ClassePadrao
 */
#[ORM\Table(name: 'CLASSE_PADRAO')]
#[ORM\Index(name: 'ix_classe_cargo_efetivo', columns: ['ID_CARGO_EFETIVO'])]
#[ORM\Index(name: 'ix_classe_padrao_dt_classe', columns: ['DT_CLASSE_PADRAO'])]
#[ORM\Index(name: 'IDX_9DD2FC6911ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_9DD2FC6910DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_9DD2FC69ED67AB6C', columns: ['ID_TIPO_PADRAO'])]
#[ORM\Index(name: 'IDX_9DD2FC69351F1DEB', columns: ['ID_TIPO_PROVIMENTO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class ClassePadrao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_CLASSE_PADRAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CLASSE_PADRAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CLASSE_PADRAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_CLASSE_PADRAO', type: 'datetime', nullable: true, options: ['comment' => 'Data em que ocorreu a progressão funcional (Alteração da Classe padrão) do servidor público efetivado em um cargo especifico.'])]
    protected ?DateTime $dtClassePadrao = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de classe padrão (Evolução funcional) do um servidor em um cargo.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_CARGO_EFETIVO', referencedColumnName: 'ID_CARGO_EFETIVO')]
    #[ORM\ManyToOne(targetEntity: 'CargoEfetivo')]
    protected ?CargoEfetivo $cargoEfetivo;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_TIPO_PADRAO', referencedColumnName: 'ID_TIPO_PADRAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoPadrao')]
    protected ?TipoPadrao $tipoPadrao;

    #[ORM\JoinColumn(name: 'ID_TIPO_PROVIMENTO', referencedColumnName: 'ID_TIPO_PROVIMENTO')]
    #[ORM\ManyToOne(targetEntity: 'TipoProvimento')]
    protected ?TipoProvimento $tipoProvimento;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDtClassePadrao(): ?DateTime
    {
        return $this->dtClassePadrao;
    }

    public function setDtClassePadrao(?DateTime $dtClassePadrao): void
    {
        $this->dtClassePadrao = $dtClassePadrao;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getCargoEfetivo(): ?CargoEfetivo
    {
        return $this->cargoEfetivo;
    }

    public function setCargoEfetivo(?CargoEfetivo $cargoEfetivo): void
    {
        $this->cargoEfetivo = $cargoEfetivo;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    /**
     * @return Rh
     */
    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getTipoPadrao(): ?TipoPadrao
    {
        return $this->tipoPadrao;
    }

    public function setTipoPadrao(?TipoPadrao $tipoPadrao): void
    {
        $this->tipoPadrao = $tipoPadrao;
    }

    public function getTipoProvimento(): ?TipoProvimento
    {
        return $this->tipoProvimento;
    }

    public function setTipoProvimento(?TipoProvimento $tipoProvimento): void
    {
        $this->tipoProvimento = $tipoProvimento;
    }

}
