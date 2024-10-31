<?php

declare(strict_types=1);

namespace AguPessoas\Backend\DTO\Traits;

use AguPessoas\Backend\Api\V2\DTO\SPSigepeServidor;
use AguPessoas\Backend\Entity\EntityInterface;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Form\Attributes as Form;

trait SigepeServidor
{

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeServidor',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeServidor::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeServidor')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $sigepeServidor = null;

    public function getSigepeServidor(): ?EntityInterface
    {
        return $this->sigepeServidor;
    }

    public function setSigepeServidor(?EntityInterface $sigepeServidor): self
    {
        $this->setVisited('sigepeServidor');
        $this->sigepeServidor = $sigepeServidor;

        return $this;
    }
}
