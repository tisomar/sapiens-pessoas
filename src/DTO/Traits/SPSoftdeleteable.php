<?php

declare(strict_types=1);


namespace AguPessoas\Backend\DTO\Traits;

use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
#use AguPessoas\Backend\Api\V1\DTO\Usuario;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
#use AguPessoas\Backend\Api\V1\DTO\Usuario as UsuarioDTO;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
//use AguPessoas\Backend\Entity\Usuario as UsuarioEntity;

/**
 * Trait SPSoftdeleteable.
 *
 * @author Advocacia-Geral da União
 */
trait SPSoftdeleteable
{
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $apagadoEm = null;

    /**
     * @var EntityInterface|RestDtoInterface|UsuarioDTO|int|null
     */
    ##[OA\Property(ref: new Model(type: UsuarioDTO::class))]
    ##[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Usuario')]
    #protected $apagadoPor;

    public function getApagadoEm(): ?DateTime
    {
        return $this->apagadoEm;
    }

    public function setApagadoEm(?DateTime $apagadoEm): self
    {
        $this->apagadoEm = $apagadoEm;

        return $this;
    }

    /**
     * @return EntityInterface|RestDtoInterface|AguPessoas\Backend\Api\V1\DTO\Usuario|int|null
     */
//    public function getApagadoPor()
//    {
//        return $this->apagadoPor;
//    }

    /**
     * @param EntityInterface|RestDtoInterface|UsuarioDTO|int|null $apagadoPor
     */
//    public function setApagadoPor($apagadoPor): self
//    {
//        $this->apagadoPor = $apagadoPor;
//
//        return $this;
//    }
}
