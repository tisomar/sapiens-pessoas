<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/IdUuid.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use OpenApi\Attributes as OA;

/**
 * Trait IdUuid.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Id
{
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $id = null;
    #[OA\Property(type: 'integer')]
    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): self
    {
        $this->id = $id;

        return $this;
    }
}
