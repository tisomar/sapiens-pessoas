<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Uf.php.
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
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Uf.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/pais/{id}',
    jsonLDType: 'Uf',
    jsonLDContext: '/api/doc/#model-Pais'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Pais extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $nacionalidade = null;

    public function getNacionalidade(): ?string
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(?string $nacionalidade): self
    {
        $this->nacionalidade = $nacionalidade;
        $this->setVisited('nacionalidade');
        return $this;
    }

}
