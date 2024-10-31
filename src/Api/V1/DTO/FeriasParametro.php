<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Horario.php.
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
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use OpenApi\Attributes as OA;
use DateTime;

/**
 * Class Horario.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/cessao/{id}',
    jsonLDType: 'Cessao',
    jsonLDContext: '/api/doc/#model-cessao'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class FeriasParametro extends RestDto
{

    use Id;
    use Timeblameable;
    use CPFOperador;

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
    protected ?string $codigoFeriasParametro;

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
    protected ?string $descricaoFeriasParametro;

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
    protected ?string $descricaoFeriasQuantidadeDias;

    public function getCodigoFeriasParametro(): ?string
    {
        return $this->codigoFeriasParametro;
    }

    public function setCodigoFeriasParametro(?string $codigoFeriasParametro): void
    {
        $this->codigoFeriasParametro = $codigoFeriasParametro;
    }

    public function getDescricaoFeriasParametro(): ?string
    {
        return $this->descricaoFeriasParametro;
    }

    public function setDescricaoFeriasParametro(?string $descricaoFeriasParametro): void
    {
        $this->descricaoFeriasParametro = $descricaoFeriasParametro;
    }

    public function getDescricaoFeriasQuantidadeDias(): ?string
    {
        return $this->descricaoFeriasQuantidadeDias;
    }

    public function setDescricaoFeriasQuantidadeDias(?string $descricaoFeriasQuantidadeDias): void
    {
        $this->descricaoFeriasQuantidadeDias = $descricaoFeriasQuantidadeDias;
    }



}
