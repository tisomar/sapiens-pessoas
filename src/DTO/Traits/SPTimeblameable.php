<?php

declare(strict_types=1);

namespace AguPessoas\Backend\DTO\Traits;

use DateTime;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

trait SPTimeblameable
{

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $criadoEm = null;

    #[OA\Property]
    #[DTOMapper\Property]
    protected ?DateTime $atualizadoEm = null;

    public function getCriadoEm(): ?DateTime
    {
        return $this->criadoEm;
    }

    public function setCriadoEm(?DateTime $criadoEm): self
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

    public function getAtualizadoEm(): ?DateTime
    {
        return $this->atualizadoEm;
    }

    public function setAtualizadoEm(?DateTime $atualizadoEm): self
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }
}
