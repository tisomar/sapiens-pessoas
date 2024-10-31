<?php

declare(strict_types=1);

namespace AguPessoas\Backend\DTO\Traits;

use DMS\Filter\Rules as Filter;
use JMS\Serializer\Annotation as Serializer;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V1\DTO\ComponenteDigital;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Trait CryptoService.
 */
trait CryptoService
{
    /**
     * CryptoService.
     */
    #[Serializer\Exclude]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cryptoService = null;

    /**
     * Set CryptoService.
     *
     * @return ComponenteDigital|CryptoService
     */
    public function setCryptoService(string|null $cryptoService): self
    {
        $this->setVisited('cryptoService');

        $this->cryptoService = $cryptoService;

        return $this;
    }

    public function getCryptoService(): string|null
    {
        return $this->cryptoService;
    }
}
