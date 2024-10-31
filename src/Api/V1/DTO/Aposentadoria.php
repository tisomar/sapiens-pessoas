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
use AguPessoas\Backend\Entity\TipoAposentadoria;
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
    jsonLDId: '/v1/aposentadoria/{id}',
    jsonLDType: 'Aposentadoria',
    jsonLDContext: '/api/doc/#model-Aposentadoria'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Aposentadoria extends RestDto
{

    use Id;
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoAposentadoria',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoAposentadoria')]
    protected ?EntityInterface $tipoAposentadoria = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataAposentadoria = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIsencaoIrrf = null;

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
    protected ?string $proporcionalidade;

    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    #[OA\Property(type: 'integer')]
    protected ?int $servidor = null;

    public function getServidor(): ?int
    {
        return $this->servidor;
    }

    public function setServidor(?int $servidor): self
    {
        $this->servidor = $servidor;
        $this->setVisited('servidor');
        return $this;
    }

    public function getTipoAposentadoria(): ?EntityInterface
    {
        return $this->tipoAposentadoria;
    }

    public function setTipoAposentadoria(?EntityInterface $tipoAposentadoria): self
    {
        $this->tipoAposentadoria = $tipoAposentadoria;
        $this->setVisited('tipoAposentadoria');
        return $this;
    }

    public function getDataAposentadoria(): ?DateTime
    {
        return $this->dataAposentadoria;
    }

    public function setDataAposentadoria(?DateTime $dataAposentadoria): self
    {
        $this->dataAposentadoria = $dataAposentadoria;
        $this->setVisited('dataAposentadoria');
        return $this;
    }

    public function getDataIsencaoIrrf(): ?DateTime
    {
        return $this->dataIsencaoIrrf;
    }

    public function setDataIsencaoIrrf(?DateTime $dataIsencaoIrrf): self
    {
        $this->dataIsencaoIrrf = $dataIsencaoIrrf;
        $this->setVisited('dataIsencaoIrrf');
        return $this;
    }

    public function getProporcionalidade(): ?string
    {
        return $this->proporcionalidade;
    }

    public function setProporcionalidade(?string $proporcionalidade): self
    {
        $this->proporcionalidade = $proporcionalidade;
        $this->setVisited('proporcionalidade');
        return $this;
    }


}
