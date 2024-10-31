<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/Blameable.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\DTO\Usuario;
use AguPessoas\Backend\Api\V1\DTO\Usuario as UsuarioDTO;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\Usuario as UsuarioEntity;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Trait Blameable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Blameable
{
    /**
     * @var UsuarioEntity|RestDtoInterface|UsuarioDTO|EntityInterface|int|null
     */
    #[OA\Property(ref: new Model(type: UsuarioDTO::class))]
    #[DTOMapper\Property(dtoClass: 'SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario')]
    protected $criadoPor;

    /**
     *@var EntityInterface|RestDtoInterface|UsuarioDTO|UsuarioEntity|int|null
     */
    #[OA\Property(ref: new Model(type: UsuarioDTO::class))]
    #[DTOMapper\Property(dtoClass: 'SuppCore\AdministrativoBackend\Api\V1\DTO\Usuario')]
    protected $atualizadoPor;

    /**
     * @return EntityInterface|RestDtoInterface|Usuario|UsuarioEntity|int|null
     */
    public function getCriadoPor()
    {
        return $this->criadoPor;
    }

    /**
     * @param EntityInterface|RestDtoInterface|UsuarioDTO|UsuarioEntity|int|null $criadoPor
     */
    public function setCriadoPor($criadoPor): self
    {
        $this->criadoPor = $criadoPor;

        return $this;
    }

    /**
     * @return EntityInterface|RestDtoInterface|UsuarioDTO|UsuarioEntity|int|null
     */
    public function getAtualizadoPor()
    {
        return $this->atualizadoPor;
    }

    /**
     * @param EntityInterface|RestDtoInterface|UsuarioDTO|UsuarioEntity|int|null $atualizadoPor
     */
    public function setAtualizadoPor($atualizadoPor): self
    {
        $this->atualizadoPor = $atualizadoPor;

        return $this;
    }
}
