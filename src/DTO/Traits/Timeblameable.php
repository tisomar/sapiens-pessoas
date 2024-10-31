<?php

declare(strict_types=1);

namespace AguPessoas\Backend\DTO\Traits;

use DateTime;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

trait Timeblameable
{

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInclusao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataAlteracao = null;

    public function getDataInclusao(): ?DateTime
    {
        return $this->dataInclusao;
    }

    public function setDataInclusao(?DateTime $dataInclusao): self
    {

        $this->dataInclusao = $dataInclusao;

        return $this;
    }

    public function getDataAlteracao(): DateTime|string|null
    {
        return $this->dataAlteracao;
    }

    public function setDataAlteracao(?DateTime $dataAlteracao): self
    {
        $this->dataAlteracao = $dataAlteracao;
        return $this;
    }
}
