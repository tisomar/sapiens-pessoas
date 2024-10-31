<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Traits\Blameable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//use DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * SigepeServidor
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_beneficio')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeBeneficio implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[ORM\Column(name: 'data_inicio', type: 'date', nullable: true)]
    protected ?DateTime $dataInicio = null;

    #[ORM\Column(name: 'data_fim', type: 'date', nullable: true)]
    protected ?DateTime $dataFim = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoBeneficio')]
    #[ORM\JoinColumn(name: 'tipo_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoBeneficio $tipo = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeDependenteOrgao')]
    #[ORM\JoinColumn(name: 'sigepe_dependente_orgao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeDependenteOrgao $dependenteOrgao = null;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    /**
     * @param DateTime|null $dataInicio
     * @return SPSigepeBeneficio
     */
    public function setDataInicio(?DateTime $dataInicio): SPSigepeBeneficio
    {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    /**
     * @param DateTime|null $dataFim
     * @return SPSigepeBeneficio
     */
    public function setDataFim(?DateTime $dataFim): SPSigepeBeneficio
    {
        $this->dataFim = $dataFim;
        return $this;
    }

    /**
     * @return SPSigepeTipoBeneficio|null
     */
    public function getTipo(): ?SPSigepeTipoBeneficio
    {
        return $this->tipo;
    }

    /**
     * @param SPSigepeTipoBeneficio|null $tipo
     * @return SPSigepeBeneficio
     */
    public function setTipo(?SPSigepeTipoBeneficio $tipo): SPSigepeBeneficio
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return SPSigepeDependente|null
     */
    public function getDependenteOrgao(): ?SPSigepeDependenteOrgao
    {
        return $this->dependenteOrgao;
    }

    /**
     * @param SPSigepeDependente|null $dependente
     * @return SPSigepeBeneficio
     */
    public function setDependenteOrgao(?SPSigepeDependenteOrgao $dependenteOrgao): SPSigepeBeneficio
    {
        $this->dependenteOrgao = $dependenteOrgao;
        return $this;
    }

}
