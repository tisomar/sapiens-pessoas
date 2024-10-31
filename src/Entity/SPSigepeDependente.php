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
 * SPSigepeDependente
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_dependente')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeDependente implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[Filter\Digits(allowWhitespace: false)]
    #[AppAssert\CpfCnpj]
    #[Assert\Length(max: 11, maxMessage: 'O campo deve ter no máximo 11 caracteres!')]
    #[ORM\Column(name: 'cpf', type: 'string', unique: true, nullable: true)]
    protected ?string $cpf = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: false)]
    protected ?string $nome = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeServidor')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeServidor $sigepeServidor = null;

    #[ORM\OneToOne(mappedBy: 'sigepeDependente',targetEntity: 'SPDependenteDadosComplementares')]
    protected ?SPDependenteDadosComplementares $dadosComplementares = null;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<SPSigepeDependenteOrgao>
     */
    #[ORM\OneToMany(mappedBy: 'sigepeDependente', targetEntity: 'SPSigepeDependenteOrgao')]
    protected $orgaos;


    public function __construct()
    {
        $this->setUuid();
        $this->orgaos = new ArrayCollection();
    }

    public function getSigepeServidor(): ?SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    public function setSigepeServidor(?SPSigepeServidor $sigepeServidor): void
    {
        $this->sigepeServidor = $sigepeServidor;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     * @return SPSigepeDependente
     */
    public function setCpf(?string $cpf): SPSigepeDependente
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string $nome
     * @return SPSigepeDependente
     */
    public function setNome(?string $nome): SPSigepeDependente
    {
        $this->nome = $nome;
        return $this;
    }

    /**
     * @return SPDependenteDadosComplementares|null
     */
    public function getDadosComplementares(): ?SPDependenteDadosComplementares
    {
        return $this->dadosComplementares;
    }

    /**
     * @param SPDependenteDadosComplementares|null $dadosComplementares
     * @return SPSigepeDependente
     */
    public function setDadosComplementares(?SPDependenteDadosComplementares $dadosComplementares): SPSigepeDependente
    {
        $this->dadosComplementares = $dadosComplementares;
        return $this;
    }

    public function getOrgaos(): Collection
    {
        return $this->orgaos;
    }

    public function addOrgao(SPSigepeDependenteOrgao $orgao): self
    {
        if (!$this->orgaos->contains($orgao)) {
            $this->orgaos->add($orgao);
            $orgao->setSigepeDependente($this);
        }

        return $this;
    }

    public function removeOrgao(SPSigepeDependenteOrgao $orgao): self
    {
        if ($this->orgaos->contains($orgao)) {
            $this->orgaos->removeElement($orgao);
        }

        return $this;
    }

}
