<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeDocumentacao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\DTO\SPSigepeMunicipio;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SPSigepeDocumentacao.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/documentacao/{id}',
    jsonLDType: 'SPSigepeDocumentacao',
    jsonLDContext: '/api/doc/#model-SPSigepeDocumentacao'
)]
#[Form\Form]
class SPSigepeDocumentacao extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    //use Blameable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cpf = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $pisPasep = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $passaporte = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ciNumero = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $ciDataExpedicao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ciOrgaoExpedidor = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ciUf = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cnhNumero = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cnhCategoria = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $cnhDataExpedicao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $cnhDataPrimeiraExpedicao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $cnhValidade = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cnhRegistro = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cnhUf = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $teNumero = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $teZona = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $teSecao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $teUf = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $teDataExpedicao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cmNumero = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $cmDataExpedicao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cmOrgaoExpedidor = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cmSerie = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ctNumero = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ctSerie = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $ctUf = null;

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
