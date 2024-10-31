<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/User.php.
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
use JMS\Serializer\Annotation as Serializer;

/**
 * Class User.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/user/{id}',
    jsonLDType: 'User',
    jsonLDContext: '/api/doc/#model-User'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class User extends RestDto
{

    use Timeblameable;
    use Id;

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
    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $name = null;

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
    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $email = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $cpf = null;

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
    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Serializer\Exclude]
    #[DTOMapper\Property]
    protected ?string $password = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $tokenSuperSapiens = null;

    public function getTokenSuperSapiens(): ?string
    {
        return $this->tokenSuperSapiens;
    }

    public function setTokenSuperSapiens(?string $tokenSuperSapiens): self
    {
        $this->tokenSuperSapiens = $tokenSuperSapiens;
        $this->setVisited('tokenSuperSapiens');
        return $this;
    }
    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(?string $name): self
    {
        $this->name = $name;
        $this->setVisited('name');
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this->setVisited('email');
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): self
    {
        $this->password = $password;
        $this->setVisited('password');
        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;
        $this->setVisited('cpf');
        return $this;
    }

}
