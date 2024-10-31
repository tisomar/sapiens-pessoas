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
trait Descricao
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
    #[Assert\NotBlank(message: 'Campo descrição não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo descrição não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $descricao = null;

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        $this->setVisited('descricao');
        return $this;
    }
}
