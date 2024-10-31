<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SigepeServidor;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use AguPessoas\Backend\Entity\Traits\Uuid;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * SPSigepeDocumentacao
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_sigepe_documentacao')]
class SPSigepeDocumentacao implements EntityInterface
{

    use Id;
    use Uuid;
    // use Blameable;
    use SPTimestampable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cpf = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $pisPasep = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $passaporte = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ciNumero = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $ciDataExpedicao = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ciOrgaoExpedidor = null;

    #[Assert\Length(max: 2, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ciUf = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnhNumero = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnhCategoria = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $cnhDataExpedicao = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $cnhDataPrimeiraExpedicao = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $cnhValidade = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnhRegistro = null;

    #[Assert\Length(max: 2, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnhUf = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $teNumero = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $teZona = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $teSecao = null;

    #[Assert\Length(max: 2, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $teUf = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $teDataExpedicao = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cmNumero = null;

    #[ORM\Column(type: 'datetime', nullable: true)]
    protected ?DateTime $cmDataExpedicao = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cmOrgaoExpedidor = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cmSerie = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ctNumero = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ctSerie = null;

    #[Assert\Length(max: 2, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $ctUf = null;

    public function __construct()
    {
        $this->setUuid();
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
     * @return SPSigepeDocumentacao
     */
    public function setCpf(?string $cpf): SPSigepeDocumentacao
    {
        $this->cpf = $cpf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPisPasep(): ?string
    {
        return $this->pisPasep;
    }

    /**
     * @param string|null $pisPasep
     * @return SPSigepeDocumentacao
     */
    public function setPisPasep(?string $pisPasep): SPSigepeDocumentacao
    {
        $this->pisPasep = $pisPasep;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPassaporte(): ?string
    {
        return $this->passaporte;
    }

    /**
     * @param string|null $passaporte
     * @return SPSigepeDocumentacao
     */
    public function setPassaporte(?string $passaporte): SPSigepeDocumentacao
    {
        $this->passaporte = $passaporte;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCiNumero(): ?string
    {
        return $this->ciNumero;
    }

    /**
     * @param string|null $ciNumero
     * @return SPSigepeDocumentacao
     */
    public function setCiNumero(?string $ciNumero): SPSigepeDocumentacao
    {
        $this->ciNumero = $ciNumero;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCiDataExpedicao(): ?DateTime
    {
        return $this->ciDataExpedicao;
    }

    /**
     * @param DateTime|null $ciDataExpedicao
     * @return SPSigepeDocumentacao
     */
    public function setCiDataExpedicao(?DateTime $ciDataExpedicao): SPSigepeDocumentacao
    {
        $this->ciDataExpedicao = $ciDataExpedicao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCiOrgaoExpedidor(): ?string
    {
        return $this->ciOrgaoExpedidor;
    }

    /**
     * @param string|null $ciOrgaoExpedidor
     * @return SPSigepeDocumentacao
     */
    public function setCiOrgaoExpedidor(?string $ciOrgaoExpedidor): SPSigepeDocumentacao
    {
        $this->ciOrgaoExpedidor = $ciOrgaoExpedidor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCiUf(): ?string
    {
        return $this->ciUf;
    }

    /**
     * @param string|null $ciUf
     * @return SPSigepeDocumentacao
     */
    public function setCiUf(?string $ciUf): SPSigepeDocumentacao
    {
        $this->ciUf = $ciUf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnhNumero(): ?string
    {
        return $this->cnhNumero;
    }

    /**
     * @param string|null $cnhNumero
     * @return SPSigepeDocumentacao
     */
    public function setCnhNumero(?string $cnhNumero): SPSigepeDocumentacao
    {
        $this->cnhNumero = $cnhNumero;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnhCategoria(): ?string
    {
        return $this->cnhCategoria;
    }

    /**
     * @param string|null $cnhCategoria
     * @return SPSigepeDocumentacao
     */
    public function setCnhCategoria(?string $cnhCategoria): SPSigepeDocumentacao
    {
        $this->cnhCategoria = $cnhCategoria;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCnhDataExpedicao(): ?DateTime
    {
        return $this->cnhDataExpedicao;
    }

    /**
     * @param DateTime|null $cnhDataExpedicao
     * @return SPSigepeDocumentacao
     */
    public function setCnhDataExpedicao(?DateTime $cnhDataExpedicao): SPSigepeDocumentacao
    {
        $this->cnhDataExpedicao = $cnhDataExpedicao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCnhDataPrimeiraExpedicao(): ?DateTime
    {
        return $this->cnhDataPrimeiraExpedicao;
    }

    /**
     * @param DateTime|null $cnhDataPrimeiraExpedicao
     * @return SPSigepeDocumentacao
     */
    public function setCnhDataPrimeiraExpedicao(?DateTime $cnhDataPrimeiraExpedicao): SPSigepeDocumentacao
    {
        $this->cnhDataPrimeiraExpedicao = $cnhDataPrimeiraExpedicao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCnhValidade(): ?DateTime
    {
        return $this->cnhValidade;
    }

    /**
     * @param DateTime|null $cnhValidade
     * @return SPSigepeDocumentacao
     */
    public function setCnhValidade(?DateTime $cnhValidade): SPSigepeDocumentacao
    {
        $this->cnhValidade = $cnhValidade;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnhRegistro(): ?string
    {
        return $this->cnhRegistro;
    }

    /**
     * @param string|null $cnhRegistro
     * @return SPSigepeDocumentacao
     */
    public function setCnhRegistro(?string $cnhRegistro): SPSigepeDocumentacao
    {
        $this->cnhRegistro = $cnhRegistro;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnhUf(): ?string
    {
        return $this->cnhUf;
    }

    /**
     * @param string|null $cnhUf
     * @return SPSigepeDocumentacao
     */
    public function setCnhUf(?string $cnhUf): SPSigepeDocumentacao
    {
        $this->cnhUf = $cnhUf;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTeNumero(): ?string
    {
        return $this->teNumero;
    }

    /**
     * @param string|null $teNumero
     * @return SPSigepeDocumentacao
     */
    public function setTeNumero(?string $teNumero): SPSigepeDocumentacao
    {
        $this->teNumero = $teNumero;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTeZona(): ?string
    {
        return $this->teZona;
    }

    /**
     * @param string|null $teZona
     * @return SPSigepeDocumentacao
     */
    public function setTeZona(?string $teZona): SPSigepeDocumentacao
    {
        $this->teZona = $teZona;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTeSecao(): ?string
    {
        return $this->teSecao;
    }

    /**
     * @param string|null $teSecao
     * @return SPSigepeDocumentacao
     */
    public function setTeSecao(?string $teSecao): SPSigepeDocumentacao
    {
        $this->teSecao = $teSecao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getTeUf(): ?string
    {
        return $this->teUf;
    }

    /**
     * @param string|null $teUf
     * @return SPSigepeDocumentacao
     */
    public function setTeUf(?string $teUf): SPSigepeDocumentacao
    {
        $this->teUf = $teUf;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getTeDataExpedicao(): ?DateTime
    {
        return $this->teDataExpedicao;
    }

    /**
     * @param DateTime|null $teDataExpedicao
     * @return SPSigepeDocumentacao
     */
    public function setTeDataExpedicao(?DateTime $teDataExpedicao): SPSigepeDocumentacao
    {
        $this->teDataExpedicao = $teDataExpedicao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCmNumero(): ?string
    {
        return $this->cmNumero;
    }

    /**
     * @param string|null $cmNumero
     * @return SPSigepeDocumentacao
     */
    public function setCmNumero(?string $cmNumero): SPSigepeDocumentacao
    {
        $this->cmNumero = $cmNumero;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCmDataExpedicao(): ?DateTime
    {
        return $this->cmDataExpedicao;
    }

    /**
     * @param DateTime|null $cmDataExpedicao
     * @return SPSigepeDocumentacao
     */
    public function setCmDataExpedicao(?DateTime $cmDataExpedicao): SPSigepeDocumentacao
    {
        $this->cmDataExpedicao = $cmDataExpedicao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCmOrgaoExpedidor(): ?string
    {
        return $this->cmOrgaoExpedidor;
    }

    /**
     * @param string|null $cmOrgaoExpedidor
     * @return SPSigepeDocumentacao
     */
    public function setCmOrgaoExpedidor(?string $cmOrgaoExpedidor): SPSigepeDocumentacao
    {
        $this->cmOrgaoExpedidor = $cmOrgaoExpedidor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCmSerie(): ?string
    {
        return $this->cmSerie;
    }

    /**
     * @param string|null $cmSerie
     * @return SPSigepeDocumentacao
     */
    public function setCmSerie(?string $cmSerie): SPSigepeDocumentacao
    {
        $this->cmSerie = $cmSerie;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCtNumero(): ?string
    {
        return $this->ctNumero;
    }

    /**
     * @param string|null $ctNumero
     * @return SPSigepeDocumentacao
     */
    public function setCtNumero(?string $ctNumero): SPSigepeDocumentacao
    {
        $this->ctNumero = $ctNumero;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCtSerie(): ?string
    {
        return $this->ctSerie;
    }

    /**
     * @param string|null $ctSerie
     * @return SPSigepeDocumentacao
     */
    public function setCtSerie(?string $ctSerie): SPSigepeDocumentacao
    {
        $this->ctSerie = $ctSerie;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCtUf(): ?string
    {
        return $this->ctUf;
    }

    /**
     * @param string|null $ctUf
     * @return SPSigepeDocumentacao
     */
    public function setCtUf(?string $ctUf): SPSigepeDocumentacao
    {
        $this->ctUf = $ctUf;
        return $this;
    }



}
