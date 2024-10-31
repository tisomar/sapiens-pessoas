<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/OrigemDados.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\DTO\OrigemDados as OrigemDadosDTO;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Trait OrigemDados.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait OrigemDados
{
    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'SuppCore\AdministrativoBackend\Entity\OrigemDados',
            'required' => false,
        ],
        methods: [
            new Form\Method('createMethod', roles: ['ROLE_ROOT']),
            new Form\Method('updateMethod', roles: ['ROLE_ROOT']),
            new Form\Method('patchMethod', roles: ['ROLE_ROOT']),
        ]
    )]
    #[OA\Property(ref: new Model(type: OrigemDadosDTO::class))]
    #[DTOMapper\Property(dtoClass: 'SuppCore\AdministrativoBackend\Api\V1\DTO\OrigemDados')]
    protected ?EntityInterface $origemDados = null;

    public function getOrigemDados(): ?EntityInterface
    {
        return $this->origemDados;
    }

    public function setOrigemDados(?EntityInterface $origemDados): self
    {
        $this->setVisited('origemDados');

        $this->origemDados = $origemDados;

        return $this;
    }
}
