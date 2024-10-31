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
 * Class Mapper.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Mapper extends \AguPessoas\Backend\Mapper\Annotations\Mapper
{
    /**
     * @param string|null $class
     * @param array       $options
     * @param array       $entityMapping
     * @param array       $excludePopulate
     */
    public function __construct(
        ?string $class = null,
        array $options = [],
        array $entityMapping = [],
        array $excludePopulate = []
    ) {
        parent::__construct([
            'class' => $class,
            'options' => $options,
            'entityMapping' => $entityMapping,
            'excludePopulate' => $excludePopulate,
        ]);
    }
}
