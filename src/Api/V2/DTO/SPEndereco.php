<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPEndereco.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
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
 * Class SPEndereco.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/endereco/{id}',
    jsonLDType: 'SPEndereco',
    jsonLDContext: '/api/doc/#model-SPEndereco'
)]
#[Form\Form]
class SPEndereco extends RestDto
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
    #[Assert\Length(max: 8, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Assert\Regex(pattern: '/\d{8}/', message: 'CEP Inválido!')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cep = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $logradouro = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $numero = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $complemento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $bairro = null;


    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeMunicipio',
            'required' => false,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeMunicipio::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeMunicipio')]
    protected ?EntityInterface $municipio = null;


    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(type: 'boolean', default: true)]
    #[DTOMapper\Property]
    protected bool $origemSigepe = true;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $observacao = null;


    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    /**
     * @return $this
     */
    public function setBairro(?string $bairro): self
    {
        $this->setVisited('bairro');

        $this->bairro = $bairro;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    /**
     * @return $this
     */
    public function setCep(?string $cep): self
    {
        $this->setVisited('cep');

        $this->cep = $cep;

        return $this;
    }

    public function getMunicipio(): ?EntityInterface
    {
        return $this->municipio;
    }

    public function setMunicipio(?EntityInterface $municipio): self
    {
        $this->setVisited('municipio');

        $this->municipio = $municipio;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    /**
     * @return $this
     */
    public function setComplemento(?string $complemento): self
    {
        $this->setVisited('complemento');

        $this->complemento = $complemento;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    /**
     * @return $this
     */
    public function setLogradouro(?string $logradouro): self
    {
        $this->setVisited('logradouro');

        $this->logradouro = $logradouro;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    /**
     * @return $this
     */
    public function setNumero(?string $numero): self
    {
        $this->setVisited('numero');

        $this->numero = $numero;

        return $this;
    }

    public function getOrigemSigepe(): ?bool
    {
        return $this->origemSigepe;
    }

    public function setOrigemSigepe(?bool $origemSigepe): self
    {
        $this->setVisited('origemSigepe');

        $this->origemSigepe = $origemSigepe;

        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->setVisited('observacao');

        $this->observacao = $observacao;

        return $this;
    }
}
