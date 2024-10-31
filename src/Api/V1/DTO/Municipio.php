<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Municipio.php.
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
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Entity\EntityInterface;
use OpenApi\Attributes as OA;

/**
 * Class Municipio.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/municipio/{id}',
    jsonLDType: 'Municipio',
    jsonLDContext: '/api/doc/#model-Municipio'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Municipio extends RestDto
{

    use Timeblameable;
    use Softdeleteable;
    use Id;
    use Codigo;
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
    #[Assert\NotBlank(message: 'Campo nome não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nome não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $nome;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Uf',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Uf')]
    #[OA\Property(ref: new Model(type: Uf::class))]
    protected ?EntityInterface $uf = null;

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
    protected ?string $inCapital = null;

    public function getInCapital(): ?string
    {
        return $this->inCapital;
    }

    public function setInCapital(?string $inCapital): self
    {
        $this->inCapital = $inCapital;
        $this->setVisited('inCapital');
        return $this;
    }

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;
        $this->setVisited('nome');
        return $this;
    }

    public function getUf(): ?EntityInterface
    {
        return $this->uf;
    }

    public function setUf(?EntityInterface $uf): self
    {
        $this->uf = $uf;
        $this->setVisited('uf');
        return $this;
    }

}
