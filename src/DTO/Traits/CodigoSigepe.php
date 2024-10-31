<?php

declare(strict_types=1);
/**
 * /src/DTO/Traits/IdUuid.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\DTO\Traits;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait IdUuid.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait CodigoSigepe
{
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $codigoSigepe = null;

    public function getCodigoSigepe(): ?string
    {
        return $this->codigoSigepe;
    }

    public function setCodigoSigepe(?string $codigoSigepe): self
    {
        $this->codigoSigepe = $codigoSigepe;
        $this->setVisited('codigoSigepe');
        return $this;
    }
}
