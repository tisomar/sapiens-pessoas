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
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;

/**
 * Class Uf.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/uf/{id}',
    jsonLDType: 'Uf',
    jsonLDContext: '/api/doc/#model-Uf'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Uf extends RestDto
{

    use Timeblameable;
    use Softdeleteable;
    use Id;
    use Codigo;
    use Descricao;
    Use CPFOperador;

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
    protected ?string $sigla;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Pais',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Pais')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Pais::class))]
    protected ?EntityInterface $pais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Regiao',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Regiao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Regiao::class))]
    protected ?EntityInterface $regiao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegiaoJuridica',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegiaoJuridica')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: RegiaoJuridica::class))]
    protected ?EntityInterface $regiaoJuridica = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegiaoAdministrativa',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegiaoAdministrativa')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: RegiaoAdministrativa::class))]
    protected ?EntityInterface $regiaoAdministrativa = null;

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

    public function getPais(): ?EntityInterface
    {
        return $this->pais;
    }

    public function setPais(?EntityInterface $pais): self
    {
        $this->pais = $pais;
        $this->setVisited('pais');
        return $this;
    }

    public function getRegiao(): ?EntityInterface
    {
        return $this->regiao;
    }

    public function setRegiao(?EntityInterface $regiao): self
    {
        $this->regiao = $regiao;
        $this->setVisited('regiao');
        return $this;
    }

    public function getRegiaoJuridica(): ?EntityInterface
    {
        return $this->regiaoJuridica;
    }

    public function setRegiaoJuridica(?EntityInterface $regiaoJuridica): self
    {
        $this->regiaoJuridica = $regiaoJuridica;
        $this->setVisited('regiaoJuridica');
        return $this;
    }

    public function getRegiaoAdministrativa(): ?EntityInterface
    {
        return $this->regiaoAdministrativa;
    }

    public function setRegiaoAdministrativa(?EntityInterface $regiaoAdministrativa): self
    {
        $this->regiaoAdministrativa = $regiaoAdministrativa;
        $this->setVisited('regiaoAdministrativa');
        return $this;
    }

}
