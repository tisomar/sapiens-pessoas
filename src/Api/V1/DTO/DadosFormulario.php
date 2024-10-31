<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/DadosFormulario.php.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Blameable;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Api\V1\DTO\Formulario as FormularioDTO;
use AguPessoas\Backend\Entity\Formulario as FormularioEntity;
use AguPessoas\Backend\Api\V1\DTO\ComponenteDigital as ComponenteDigitalDTO;
use AguPessoas\Backend\Entity\ComponenteDigital as ComponenteDigitalEntity;

/**
 * Class DadosFormulario.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 */

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/administrativo/dados_formulario/{id}',
    jsonLDType: 'DadosFormulario',
    jsonLDContext: '/api/doc/#model-DadosFormulario'
)]
#[Form\Form]
class DadosFormulario extends RestDto
{
    use Blameable;
    use Timeblameable;
    use Softdeleteable;

    use IdUuid;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $dataValue = null;

    /**
     * @var FormularioEntity|FormularioDTO|null
     */
    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Formulario',
            'required' => false,
        ]
    )]
    #[OA\Property(ref: new Model(type: FormularioDTO::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Formulario')]
    protected ?EntityInterface $formulario = null;

    /**
     * @var ComponenteDigitalEntity|ComponenteDigitalDTO|null
     */
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'Campo não pode ser nulo!')]
    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\ComponenteDigital',
            'required' => false,
        ]
    )]
    #[OA\Property(ref: new Model(type: ComponenteDigitalDTO::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\ComponenteDigital')]
    protected ?EntityInterface $componenteDigital = null;

    /**
     * @return string|null
     */
    public function getDataValue(): ?string
    {
        return $this->dataValue;
    }

    /**
     * @param string|null $dataValue
     *
     * @return self
     * @noinspection PhpUnused
     */
    public function setDataValue(?string $dataValue): self
    {
        $this->setVisited('dataValue');
        $this->dataValue = $dataValue;

        return $this;
    }

    /**
     * @return FormularioEntity|FormularioDTO|null
     */
    public function getFormulario(): ?EntityInterface
    {
        return $this->formulario;
    }

    /**
     * @param FormularioEntity|FormularioDTO|null $formulario
     *
     * @return self
     */
    public function setFormulario(?EntityInterface $formulario): self
    {
        $this->setVisited('formulario');
        $this->formulario = $formulario;

        return $this;
    }

    /**
     * @return ComponenteDigitalEntity|ComponenteDigitalDTO|null
     */
    public function getComponenteDigital(): ?EntityInterface
    {
        return $this->componenteDigital;
    }

    /**
     * @param ComponenteDigitalEntity|ComponenteDigitalDTO|null $componenteDigital
     *
     * @return self
     */
    public function setComponenteDigital(?EntityInterface $componenteDigital): self
    {
        $this->setVisited('componenteDigital');
        $this->componenteDigital = $componenteDigital;

        return $this;
    }
}
