<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/IdUuid.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use OpenApi\Attributes as OA;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Trait IdUuid.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Uuid
{
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $uuid = null;

    public function getUuid(): ?string
    {
        return $this->uuid;
    }

    public function setUuid(?string $uuid): self
    {
        $this->uuid = $uuid;

        return $this;
    }
}
