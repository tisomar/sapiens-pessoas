<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\Nome;
/**
 * Class SPTipoCertidao.
 *
 * @package AguPessoas\Backend\Api\V2\DTO
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo-certidao/{id}',
    jsonLDType: 'SPTipoCertidao',
    jsonLDContext: '/api/doc/#model-SPTipoCertidao'
)]
#[Form\Form]
class SPTipoCertidao extends RestDto
{
    use Timeblameable;
    use Id;
    use Softdeleteable;
    use Nome;
    use Descricao;
    use SPTimeblameable;
    use SPSoftdeleteable;


    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?bool $ativo = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?bool $requerNup = null;



    /**
     * Get the value of ativo
     */
    public function getAtivo(): ?bool
    {
        return $this->ativo;
    }

    /**
     * Set the value of ativo
     */
    public function setAtivo(?bool $ativo): self
    {
        $this->ativo = $ativo;

        return $this;
    }

    /**
     * Get the value of requerNup
     */
    public function getRequerNup(): ?bool
    {
        return $this->requerNup;
    }

    /**
     * Set the value of requerNup
     */
    public function setRequerNup(?bool $requerNup): self
    {
        $this->requerNup = $requerNup;

        return $this;
    }
}
