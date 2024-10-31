<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Provimento
 */
#[ORM\Table(name: 'PROVIMENTO')]
#[ORM\Index(name: 'ix_provimento_cargo_efetivo', columns: ['ID_CARGO_EFETIVO'])]
#[ORM\Index(name: 'IDX_D0CC80CA11ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_D0CC80CA351F1DEB', columns: ['ID_TIPO_PROVIMENTO'])]
#[ORM\UniqueConstraint(name: 'uk_provimento', columns: ['ID_CARGO_EFETIVO', 'DT_NOMEACAO_PROVIMENTO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Provimento implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Id]
    #[ORM\Column(name: 'ID_PROVIMENTO', type: 'integer', nullable: false, options: ['comment' => '"IdentificadorsequencialeúnicoqueespecificaumregistronatabelaPROVIMENTO'])]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_PROVIMENTO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_NOMEACAO_PROVIMENTO', type: 'date', nullable: false, options: ['comment' => 'Data em que ocorreu a publicação de nomeação para o provimento de uma pessoa em um cargo público.'])]
    protected ?DateTime $dataNomeacao;

    #[ORM\Column(name: 'DT_POSSE_PROVIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a publicação da posse de uma pessoa em um cargo público.'])]
    protected ?DateTime $dataPosse;

    #[ORM\Column(name: 'DT_EXERCICIO_PROVIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a publicação do exercício de um servidor público já impossado em uma determinada lotação (Unidade).'])]
    protected ?DateTime $dataExercicio;

    #[ORM\Column(name: 'DS_OBSERVACAO_PROVIMENTO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais, relativas ao registro de provimento de uma pessoa em um cargo público na AGU.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_CARGO_EFETIVO', referencedColumnName: 'ID_CARGO_EFETIVO')]
    #[ORM\ManyToOne(targetEntity: 'CargoEfetivo')]
    protected ?CargoEfetivo $cargoEfetivo;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    #[ORM\JoinColumn(name: 'ID_TIPO_PROVIMENTO', referencedColumnName: 'ID_TIPO_PROVIMENTO')]
    #[ORM\ManyToOne(targetEntity: 'TipoProvimento')]
    protected ?TipoProvimento $tipo;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDataNomeacao(): ?DateTime
    {
        return $this->dataNomeacao;
    }

    public function setDataNomeacao(?DateTime $dataNomeacao): void
    {
        $this->dataNomeacao = $dataNomeacao;
    }

    public function getDataPosse(): ?DateTime
    {
        return $this->dataPosse;
    }

    public function setDataPosse(?DateTime $dataPosse): void
    {
        $this->dataPosse = $dataPosse;
    }

    public function getDataExercicio(): ?DateTime
    {
        return $this->dataExercicio;
    }

    public function setDataExercicio(?DateTime $dataExercicio): void
    {
        $this->dataExercicio = $dataExercicio;
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

    public function getTipo(): ?TipoProvimento
    {
        return $this->tipo;
    }

    public function setTipo(?TipoProvimento $tipo): void
    {
        $this->tipo = $tipo;
    }


}
