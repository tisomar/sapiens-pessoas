<?php

declare(strict_types=1);

namespace AguPessoas\Backend\DTO\Traits;

use DateTime;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Form\Attributes as Form;

trait CPFOperador
{

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected ?string $cpfOperador = null;

    public function getCpfOperador(): ?string
    {
        return $this->cpfOperador;
    }

    public function setCpfOperador(?string $cpf): self
    {
        $this->setVisited('cpfOperador');
        $this->cpfOperador = $cpf;

        return $this;
    }
}
