<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/IdUuid.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait IdUuid.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Codigo
{
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'O campo codigo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?string $codigo = null;

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;
        $this->setVisited('codigo');
        return $this;
    }
}
