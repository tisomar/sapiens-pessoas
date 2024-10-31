<?php

declare(strict_types=1);
/**
 * /src/Form/Attributes/Method.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Attributes;

use Attribute;

/**
 * Class Method.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_PROPERTY)]
class Method extends \AguPessoas\Backend\Form\Annotations\Method
{
    /**
     * @param string $value
     * @param array  $roles
     */
    public function __construct(
        string $value,
        array $roles = [],
    ) {
        parent::__construct([
           'value' => $value,
            'roles' => $roles,
        ]);
    }
}
