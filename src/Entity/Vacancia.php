<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Vacancia
 */
#[ORM\Table(name: 'VACANCIA')]
#[ORM\Index(name: 'ix_vacancia_provimento', columns: ['ID_PROVIMENTO'])]
#[ORM\Index(name: 'IDX_D13FCB0311ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_D13FCB0344A61946', columns: ['ID_TIPO_VACANCIA'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Vacancia implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Id]
    #[ORM\Column(name: 'ID_VACANCIA', type: 'integer', nullable: false, options: ['comment' => '"IdentificadorsequencialeúnicoqueespecificaumregistronatabelaVACÂNCIA'])]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_VACANCIA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_VACANCIA', type: 'date', nullable: false, options: ['comment' => 'Data em que ocorreu a vacância (Exoneração) do servidor em um cargo. Este cargo ficará disponível para AGU como uma nova vaga.'])]
    protected DateTime $data;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de vacância de um servidor na AGU.'])]
    protected ?string $observacao = null;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    #[ORM\JoinColumn(name: 'ID_PROVIMENTO', referencedColumnName: 'ID_PROVIMENTO')]
    #[ORM\ManyToOne(targetEntity: 'Provimento')]
    protected ?Provimento $provimento;

    #[ORM\JoinColumn(name: 'ID_TIPO_VACANCIA', referencedColumnName: 'ID_TIPO_VACANCIA')]
    #[ORM\ManyToOne(targetEntity: 'TipoVacancia')]
    protected ?TipoVacancia $tipo;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getData(): DateTime
    {
        return $this->data;
    }

    public function setData(DateTime $data): void
    {
        $this->data = $data;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getProvimento(): ?Provimento
    {
        return $this->provimento;
    }

    public function setProvimento(?Provimento $provimento): void
    {
        $this->provimento = $provimento;
    }

    public function getTipo(): ?TipoVacancia
    {
        return $this->tipo;
    }

    public function setTipo(?TipoVacancia $tipo): void
    {
        $this->tipo = $tipo;
    }


}
