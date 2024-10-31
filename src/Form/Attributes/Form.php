<?php

declare(strict_types=1);
/**
 * /src/Form/Attributes/Form.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Attributes;

use Attribute;

/**
 * Class Form.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Form extends \AguPessoas\Backend\Form\Annotations\Form
{
    /**
     * @param string|null $value
     * @param array       $validationGroups
     */
    public function __construct(
        ?string $value = null,
        array $validationGroups = [],
    ) {
        parent::__construct([
            'value' => $value,
            'validationGroups' => $validationGroups,
        ]);
    }
}
