<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/NaturezaHistorico.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class NaturezaHistorico.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/natureza_historico/{id}',
    jsonLDType: 'NaturezaHistorico',
    jsonLDContext: '/api/doc/#model-NaturezaHistorico'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class NaturezaHistorico extends RestDto
{

    use Timeblameable;
    use Id;
    use Softdeleteable;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[DTOMapper\Property]
    protected ?int $codigo;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $descricao;

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(?int $codigo): self
    {
        $this->codigo = $codigo;
        $this->setVisited('codigo');
        return $this;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): self
    {
        $this->descricao = $descricao;
        $this->setVisited('descricao');
        return $this;
    }
}
