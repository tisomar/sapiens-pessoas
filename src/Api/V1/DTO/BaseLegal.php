<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/BaseLegal.php.
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
use AguPessoas\Backend\Entity\FormaDocumento;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Class BaseLegal.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/tipo_conta/{id}',
    jsonLDType: 'BaseLegal',
    jsonLDContext: '/api/doc/#model-BaseLegal'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class BaseLegal extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\FormaDocumento',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FormaDocumento')]
    protected ?EntityInterface $formaDocumento = null;

    public function getFormaDocumento(): ?EntityInterface
    {
        return $this->formaDocumento;
    }

    public function setFormaDocumento(?EntityInterface $formaDocumento): self
    {
        $this->formaDocumento = $formaDocumento;
        $this->setVisited('formaDocumento');
        return $this;
    }
}
