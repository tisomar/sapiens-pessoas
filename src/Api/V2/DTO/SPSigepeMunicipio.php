<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/SPSigepeMunicipio.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CodigoSigepe;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use OpenApi\Attributes as OA;

/**
 * Class SPSigepeMunicipio.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/sigepe_municipio/{id}',
    jsonLDType: 'SPSigepeMunicipio',
    jsonLDContext: '/api/doc/#model-SPSigepeMunicipio'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeMunicipio extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;

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
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(
        min: 2,
        max: 2,
        minMessage: 'O campo deve ter no mínimo 2 caracteres!',
        maxMessage: 'O campo deve ter no máximo 2 caracteres!'
    )]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $uf = null;

    public function setUf(?string $uf): self
    {
        $this->setVisited('uf');

        $this->uf = $uf;

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }
}
