<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/FormaDocumento.php.
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
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Class FormaDocumento.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/forma_documento/{id}',
    jsonLDType: 'FormaDocumento',
    jsonLDContext: '/api/doc/#model-FormaDocumento'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class FormaDocumento extends RestDto
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
            'class' => 'AguPessoas\Backend\Entity\FinalidadeNorma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FinalidadeNorma')]
    protected ?EntityInterface $finalidadeNorma = null;

    public function getFinalidadeNorma(): ?EntityInterface
    {
        return $this->finalidadeNorma;
    }

    public function setFinalidadeNorma(?EntityInterface $finalidadeNorma): self
    {
        $this->finalidadeNorma = $finalidadeNorma;
        $this->setVisited('finalidadeNorma');
        return $this;
    }
}
