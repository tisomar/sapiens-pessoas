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
    jsonLDId: '/v1/regiao_juridica/{id}',
    jsonLDType: 'RegiaoJuridica',
    jsonLDContext: '/api/doc/#model-RegiaoJuridica'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class RegiaoJuridica extends RestDto
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
    #[Assert\NotBlank(message: 'Campo sigla não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo sigla não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $sigla = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[DTOMapper\Property]
    protected ?string $codigoInterno = null;

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): self
    {
        $this->sigla = $sigla;
        $this->setVisited('sigla');
        return $this;
    }

    public function getCodigoInterno(): ?string
    {
        return $this->codigoInterno;
    }

    public function setCodigoInterno(?string $codigoInterno): self
    {
        $this->codigoInterno = $codigoInterno;
        $this->setVisited('codigoInterno');
        return $this;
    }

}
