<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Orgao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

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
 * Class Orgao.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/orgao/{id}',
    jsonLDType: 'Orgao',
    jsonLDContext: '/api/doc/#model-Orgao'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Orgao extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;

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
    #[Assert\NotBlank(message: 'O campo sigla não pode estar em branco!')]
    #[DTOMapper\Property]
    protected string $sigla;

    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): self
    {
        $this->sigla = $sigla;
        $this->setVisited('sigla');
        return $this;
    }
}
