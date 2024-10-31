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
#[ORM\Table(name: 'sp_servidor')]
#[UniqueEntity(fields: ['sigepeServidor'], message: 'Dados do SigepeServidor já cadastrado!')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPServidor implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\OneToOne(targetEntity: 'SPSigepeServidor', inversedBy: 'servidor')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: false)]
    protected SPSigepeServidor $sigepeServidor;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $apelido = null;

    #[ORM\Column(name: 'data_obito', type: 'date', nullable: true)]
    protected ?DateTime $dataObito = null;

    #[ORM\Column(name: 'id_servidor_agu_pessoas', type: 'string', nullable: true)]
    protected ?string $idServidorAguPessoas = null;

    #[ORM\Column(name: 'codigo_servidor_agu_pessoas', type: 'string', nullable: true)]
    protected ?string $codigoServidorAguPessoas = null;

    #[ORM\Column(name: 'status', type: 'boolean', nullable: false)]
    protected bool $status = true;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'email_particular', type: 'string', nullable: true)]
    protected ?string $emailParticular = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_conjuge', type: 'string', nullable: true)]
    protected ?string $nomeConjuge = null;

    #[ORM\Column(name: 'portador_necessidade_especial', type: 'boolean', nullable: false)]
    protected bool $portadorNecessidadeEspecial = false;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_necessidade_especial', type: 'string', nullable: true)]
    protected ?string $nomeNecessidadeEspecial = null;

    #[ORM\Column(name: 'doador_orgaos', type: 'boolean', nullable: false)]
    protected bool $doadorOrgaos = false;

    #[ORM\JoinColumn(name: 'etnia_id', referencedColumnName: 'ID_ETNIA')]
    #[ORM\ManyToOne(targetEntity: 'Etnia')]
    protected ?Etnia $etnia;

    #[ORM\JoinColumn(name: 'rh_id', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    #[ORM\JoinColumn(name: 'tipo_sanguineo_id', referencedColumnName: 'ID_TIPO_SANGUINEO')]
    #[ORM\ManyToOne(targetEntity: 'TipoSanguineo')]
    protected ?TipoSanguineo $tipoSanguineo;

    #[ORM\ManyToOne(targetEntity: 'TipoServidor')]
    #[ORM\JoinColumn(name: 'tipo_servidor_id', referencedColumnName: 'ID_TIPO_SERVIDOR')]
    protected TipoServidor|null $tipoServidor = null;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return SPSigepeServidor
     */
    public function getSigepeServidor(): SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    /**
     * @param SPSigepeServidor $sigepeServidor
     */
    public function setSigepeServidor(SPSigepeServidor $sigepeServidor): void
    {
        $this->sigepeServidor = $sigepeServidor;
    }

    /**
     * @return string
     */
    public function getApelido(): ?string
    {
        return $this->apelido;
    }

    /**
     * @param string $apelido
     */
    public function setApelido(?string $apelido): void
    {
        $this->apelido = $apelido;
    }

    /**
     * @return DateTime|null
     */
    public function getDataObito(): ?DateTime
    {
        return $this->dataObito;
    }

    /**
     * @param DateTime|null $dataObito
     */
    public function setDataObito(?DateTime $dataObito): void
    {
        $this->dataObito = $dataObito;
    }

    /**
     * @return string|null
     */
    public function getIdServidorAguPessoas(): ?string
    {
        return $this->idServidorAguPessoas;
    }

    /**
     * @param string|null $idServidorAguPessoas
     */
    public function setIdServidorAguPessoas(?string $idServidorAguPessoas): void
    {
        $this->idServidorAguPessoas = $idServidorAguPessoas;
    }

    /**
     * @return string|null
     */
    public function getCodigoServidorAguPessoas(): ?string
    {
        return $this->codigoServidorAguPessoas;
    }

    /**
     * @param string|null $codigoServidorAguPessoas
     */
    public function setCodigoServidorAguPessoas(?string $codigoServidorAguPessoas): void
    {
        $this->codigoServidorAguPessoas = $codigoServidorAguPessoas;
    }

    /**
     * @return bool
     */
    public function getStatus(): bool
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus(bool $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string|null
     */
    public function getEmailParticular(): ?string
    {
        return $this->emailParticular;
    }

    /**
     * @param string|null $emailParticular
     */
    public function setEmailParticular(?string $emailParticular): void
    {
        $this->emailParticular = $emailParticular;
    }


    /**
     * @return string|null
     */
    public function getNomeConjuge(): ?string
    {
        return $this->nomeConjuge;
    }

    /**
     * @param string|null $nomeConjuge
     */
    public function setNomeConjuge(?string $nomeConjuge): void
    {
        $this->nomeConjuge = $nomeConjuge;
    }

    /**
     * @return bool
     */
    public function getPortadorNecessidadeEspecial(): bool
    {
        return $this->portadorNecessidadeEspecial;
    }

    /**
     * @param bool $portadorNecessidadeEspecial
     */
    public function setPortadorNecessidadeEspecial(bool $portadorNecessidadeEspecial): void
    {
        $this->portadorNecessidadeEspecial = $portadorNecessidadeEspecial;
    }

    /**
     * @return string|null
     */
    public function getNomeNecessidadeEspecial(): ?string
    {
        return $this->nomeNecessidadeEspecial;
    }

    /**
     * @param string|null $nomeNecessidadeEspecial
     */
    public function setNomeNecessidadeEspecial(?string $nomeNecessidadeEspecial): void
    {
        $this->nomeNecessidadeEspecial = $nomeNecessidadeEspecial;
    }

    /**
     * @return bool
     */
    public function getDoadorOrgaos(): bool
    {
        return $this->doadorOrgaos;
    }

    /**
     * @param bool $doadorOrgaos
     */
    public function setDoadorOrgaos(bool $doadorOrgaos): void
    {
        $this->doadorOrgaos = $doadorOrgaos;
    }

    /**
     * @return Etnia|null
     */
    public function getEtnia(): ?Etnia
    {
        return $this->etnia;
    }

    /**
     * @param Etnia|null $etnia
     */
    public function setEtnia(?Etnia $etnia): void
    {
        $this->etnia = $etnia;
    }

    /**
     * @return Rh|null
     */
    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    /**
     * @param Rh|null $rh
     */
    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    /**
     * @return TipoSanguineo|null
     */
    public function getTipoSanguineo(): ?TipoSanguineo
    {
        return $this->tipoSanguineo;
    }

    /**
     * @param TipoSanguineo|null $tipoSanguineo
     */
    public function setTipoSanguineo(?TipoSanguineo $tipoSanguineo): void
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }

    /**
     * @return TipoServidor|null
     */
    public function getTipoServidor(): ?TipoServidor
    {
        return $this->tipoServidor;
    }

    /**
     * @param TipoServidor|null $tipoServidor
     */
    public function setTipoServidor(?TipoServidor $tipoServidor): void
    {
        $this->tipoServidor = $tipoServidor;
    }




}
