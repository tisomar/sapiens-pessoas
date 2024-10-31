<?php

declare(strict_types=1);
/**
 * /src/Form/Attributes/Field.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Attributes;

use Attribute;

/**
 * Class Field.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Field extends \AguPessoas\Backend\Form\Annotations\Field
{
    /**
     * @param string      $value
     * @param array       $options
     * @param array       $methods
     * @param string|null $name
     */
    public function __construct(
        string $value,
        array $options = [],
        array $methods = [],
        ?string $name = null,
    ) {
        parent::__construct([
                'value' => $value,
                'methods' => $methods,
                'options' => $options,
                'name' => $name,
        ]);
    }
}
