<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * HistoricoFuncional
 */
#[ORM\Table(name: 'HISTORICO_FUNCIONAL')]
#[ORM\Index(name: 'IDX_A6B85A7110DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_A6B85A717108A111', columns: ['ID_NATUREZA_HISTORICO'])]
#[ORM\Index(name: 'IDX_A6B85A7111ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_A6B85A71A4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class HistoricoFuncional implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_HISTORICO_FUNCIONAL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela HISTORICO_FUNCIONAL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_HISTORICO_FUNCIONAL', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_HISTORICO_FUNCIONAL', type: 'date', nullable: false, options: ['comment' => 'Data da ocorrência histórica registrada para um servidor em sua carreira.'])]
    protected DateTime $data;

    #[ORM\Column(name: 'DS_HISTORICO_FUNCIONAL', type: 'string', length: 4000, nullable: false, options: ['comment' => 'Especificação descritiva ou nome para a ocorrência histórica registrada para um servidor em sua carreira.'])]
    protected string $historico;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_NATUREZA_HISTORICO', referencedColumnName: 'ID_NATUREZA_HISTORICO')]
    #[ORM\ManyToOne(targetEntity: 'NaturezaHistorico')]
    protected ?NaturezaHistorico $natureza;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getData(): \DateTime
    {
        return $this->data;
    }

    public function setData(\DateTime $data): void
    {
        $this->data = $data;
    }

    public function getHistorico(): string
    {
        return $this->historico;
    }

    public function setHistorico(string $historico): void
    {
        $this->historico = $historico;
    }

    public function getNatureza(): ?NaturezaHistorico
    {
        return $this->natureza;
    }

    public function setNatureza(?NaturezaHistorico $natureza): void
    {
        $this->natureza = $natureza;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getTipoOcupacao(): ?TipoOcupacao
    {
        return $this->tipoOcupacao;
    }

}
