<?php

declare(strict_types=1);


namespace AguPessoas\Backend\DTO\Traits;

use DateTime;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\DTO\Usuario;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Trait Blameable.
 *
 * @author Advocacia-Geral da União
 */
trait Softdeleteable
{
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExclusao = null;

    public function getDataExclusao(): ?\DateTime
    {
        return $this->dataExclusao;
    }

    public function setDataExclusao(?DateTime $dataExclusao): self
    {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }
}
