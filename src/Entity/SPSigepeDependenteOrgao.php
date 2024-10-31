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
 * SPSigepeDependenteOrgao
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_dependente_orgao')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeDependenteOrgao implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    #[ORM\JoinColumn(name: 'orgao_id', referencedColumnName: 'ID_ORGAO', nullable: true)]
    protected ?Orgao $orgao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeDependente')]
    #[ORM\JoinColumn(name: 'sigepe_dependente_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeDependente $sigepeDependente = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'matricula', type: 'string', nullable: true)]
    protected ?string $matricula = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeCondicaoDependente')]
    #[ORM\JoinColumn(name: 'condicao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeCondicaoDependente $condicao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeGrauParentesco')]
    #[ORM\JoinColumn(name: 'parentesco_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeGrauParentesco $parentesco = null;


    /**
     * @var Collection|ArrayCollection|ArrayCollection<SPSigepeBeneficio>
     */
    #[ORM\OneToMany(mappedBy: 'dependenteOrgao', targetEntity: 'SPSigepeBeneficio')]
    protected $beneficios;


    public function __construct()
    {
        $this->setUuid();
        $this->beneficios = new ArrayCollection();
    }

    public function addBeneficio(SPSigepeBeneficio $beneficio): self
    {
        if (!$this->beneficios->contains($beneficio)) {
            $this->beneficios->add($beneficio);
            $beneficio->setDependenteOrgao($this);
        }

        return $this;
    }

    public function removeBeneficio(SPSigepeBeneficio $beneficio): self
    {
        if ($this->beneficios->contains($beneficio)) {
            $this->beneficios->removeElement($beneficio);
        }

        return $this;
    }

    /**
     * @return ArrayCollection|Collection
     */
    public function getBeneficios(): ArrayCollection|Collection
    {
        return $this->beneficios;
    }


    /**
     * @return Orgao|null
     */
    public function getOrgao(): ?Orgao
    {
        return $this->orgao;
    }

    /**
     * @param Orgao|null $orgao
     * @return SPSigepeDependenteOrgao
     */
    public function setOrgao(?Orgao $orgao): SPSigepeDependenteOrgao
    {
        $this->orgao = $orgao;
        return $this;
    }

    /**
     * @return SPSigepeServidor|null
     */
    public function SPSigepeDependente(): ?SPSigepeDependente
    {
        return $this->sigepeDependente;
    }

    /**
     * @param SPSigepeDependente|null $sigepeDependente
     * @return SPSigepeDependenteOrgao
     */
    public function setSigepeDependente(?SPSigepeDependente $sigepeDependente): SPSigepeDependenteOrgao
    {
        $this->sigepeDependente = $sigepeDependente;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeDependenteOrgao
     */
    public function setMatricula(?string $matricula): SPSigepeDependenteOrgao
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return SPSigepeCondicaoDependente|null
     */
    public function getCondicao(): ?SPSigepeCondicaoDependente
    {
        return $this->condicao;
    }

    /**
     * @param SPSigepeCondicaoDependente|null $condicao
     * @return SPSigepeDependenteOrgao
     */
    public function setCondicao(?SPSigepeCondicaoDependente $condicao): SPSigepeDependenteOrgao
    {
        $this->condicao = $condicao;
        return $this;
    }

    /**
     * @return SPSigepeGrauParentesco|null
     */
    public function getParentesco(): ?SPSigepeGrauParentesco
    {
        return $this->parentesco;
    }

    /**
     * @param SPSigepeGrauParentesco|null $parentesco
     * @return SPSigepeDependenteOrgao
     */
    public function setParentesco(?SPSigepeGrauParentesco $parentesco): SPSigepeDependenteOrgao
    {
        $this->parentesco = $parentesco;
        return $this;
    }


}
