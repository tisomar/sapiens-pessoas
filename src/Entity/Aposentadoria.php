<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Aposentadoria
 */
#[ORM\Table(name: 'APOSENTADORIA')]
#[ORM\Index(name: 'IDX_DE57CF4E10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_DE57CF4E3CED9445', columns: ['ID_TIPO_APOSENTADORIA'])]
#[ORM\Entity]
class Aposentadoria implements EntityInterface
{
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela SERVIDOR'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_APOSENTADORIA', allocationSize: 1, initialValue: 572321)]
    protected $id;

    #[ORM\JoinColumn(name: 'ID_TIPO_APOSENTADORIA', referencedColumnName: 'ID_TIPO_APOSENTADORIA')]
    #[ORM\ManyToOne(targetEntity: 'TipoAposentadoria')]
    protected ?TipoAposentadoria $tipoAposentadoria;

    #[ORM\Column(name: 'DT_APOSENTADORIA', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a declaração da aposentadoria do servidor público.'])]
    protected ?DateTime $dataAposentadoria;

    #[ORM\Column(name: 'DT_ISENCAO_IRRF', type: 'date', nullable: true, options: ['comment' => 'Data em que foi determinado a isenção do desconto do imposto de renda no pagamento da aposentadoria do servidor público.'])]
    protected ?DateTime $dataIsencaoIrrf;

    #[ORM\Column(name: 'DS_PROPORCIONALIDADE', type: 'string', length: 100, nullable: true, options: ['comment' => '"Especificaçãodescritivaparaaproporcionalidadediretaeamplamentedifundidonaproporcãoportempodeserviçoquefoiadotadonoregimedeaposentadoriadoservidorpúblico'])]
    protected ?string $proporcionalidade;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $servidor;

    public function getDataAposentadoria(): ?DateTime
    {
        return $this->dataAposentadoria;
    }

    public function setDataAposentadoria(?DateTime $dataAposentadoria): void
    {
        $this->dataAposentadoria = $dataAposentadoria;
    }

    public function getDataIsencaoIrrf(): ?DateTime
    {
        return $this->dataIsencaoIrrf;
    }

    public function setDataIsencaoIrrf(?DateTime $dataIsencaoIrrf): void
    {
        $this->dataIsencaoIrrf = $dataIsencaoIrrf;
    }

    public function getProporcionalidade(): ?string
    {
        return $this->proporcionalidade;
    }

    public function setProporcionalidade(?string $proporcionalidade): void
    {
        $this->proporcionalidade = $proporcionalidade;
    }

    /**
     * @return Rh
     */
    public function getRh(): Rh
    {
        return $this->rh;
    }

    /**
     * @param Rh $rh
     */
    public function setRh(Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getTipoAposentadoria(): TipoAposentadoria
    {
        return $this->tipoAposentadoria;
    }

    public function setTipoAposentadoria(TipoAposentadoria $tipoAposentadoria): void
    {
        $this->tipoAposentadoria = $tipoAposentadoria;
    }

    public function getId(): ?Servidor
    {
        return $this->id;
    }

    public function setId(?Servidor $id): void
    {
        $this->id = $id;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->id = $servidor;
    }


}
