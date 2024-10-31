<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/TipoAutoridade.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\Traits\CPFOperador;
use DateTime;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class TipoAutoridade.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/administrativo/tipo_autoridade/{id}',
    jsonLDType: 'TipoAutoridade',
    jsonLDContext: '/api/doc/#model-TipoAutoridade'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class TipoAutoridade extends RestDto
{

    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;

    #[DTOMapper\Property]
    protected $id;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Assert\NotBlank(message: 'O campo codigo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected $codigo;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Assert\NotBlank(message: 'O campo descrição não pode estar em branco!')]
    #[DTOMapper\Property]
    protected $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;
        $this->setVisited('codigo');
        return $this;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): self
    {
        $this->descricao = $descricao;
        $this->setVisited('descricao');
        return $this;
    }

    public function getUuid()
    {
        return $this->id;
    }

}
