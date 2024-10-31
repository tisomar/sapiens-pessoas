<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Agencia.php.
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
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Class Agencia.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/agencia/{id}',
    jsonLDType: 'Agencia',
    jsonLDContext: '/api/doc/#model-Agencia'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Agencia extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;

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
    protected ?string $digitoVerificador;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Banco',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Banco')]
    protected ?EntityInterface $banco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Municipio',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Municipio')]
    protected ?EntityInterface $municipio = null;

    public function getDigitoVerificador(): ?string
    {
        return $this->digitoVerificador;
    }
    public function setDigitoVerificador(?string $digitoVerificador): self
    {
        $this->digitoVerificador = $digitoVerificador;
        $this->setVisited('digitoVerificador');
        return $this;
    }

    public function getBanco(): ?EntityInterface
    {
        return $this->banco;
    }

    public function setBanco(?EntityInterface $banco): self
    {
        $this->banco = $banco;
        $this->setVisited('banco');
        return $this;
    }

    public function getMunicipio(): ?EntityInterface
    {
        return $this->municipio;
    }

    public function setMunicipio(?EntityInterface $municipio): self
    {
        $this->municipio = $municipio;
        $this->setVisited('municipio');
        return $this;
    }


}
