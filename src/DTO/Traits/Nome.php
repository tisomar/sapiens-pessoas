<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/NomeDescricao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait NomeDescricao.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Nome
{
    /**
     * Nome.
     */
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
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nome = null;

    public function setNome(?string $nome): self
    {


        $this->nome = $nome;

        $this->setVisited('nome');

        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }
}
