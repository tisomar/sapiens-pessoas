<?php

declare(strict_types=1);
/**
 * /src/Mapper/Attributes/Mapper.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Attributes;

use Attribute;

/**
 * Class Property.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Property extends \AguPessoas\Backend\Mapper\Annotations\Property
{
    /**
     * @param string|null $name
     * @param string|null $dtoClass
     * @param string|null $dtoGetter
     * @param string|null $dtoSetter
     * @param string|null $entityGetter
     * @param string|null $entitySetter
     * @param bool        $collection
     * @param array       $options
     */
    public function __construct(
        ?string $name = null,
        ?string $dtoClass = null,
        ?string $dtoGetter = null,
        ?string $dtoSetter = null,
        ?string $entityGetter = null,
        ?string $entitySetter = null,
        bool $collection = false,
        array $options = []
    ) {
        parent::__construct([
            'name' => $name,
            'dtoClass' => $dtoClass,
            'dtoGetter' => $dtoGetter,
            'dtoSetter' => $dtoSetter,
            'entityGetter' => $entityGetter,
            'entitySetter' => $entitySetter,
            'collection' => $collection,
            'options' => $options,
        ]);
    }
}
