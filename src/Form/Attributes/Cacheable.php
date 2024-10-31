<?php

declare(strict_types=1);
/**
 * /src/Form/Attributes/Cacheable.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Attributes;

use Attribute;

/**
 * Class Cacheable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_CLASS)]
class Cacheable extends \AguPessoas\Backend\Form\Annotations\Cacheable
{
    /**
     * @param int $expire
     */
    public function __construct(
        int $expire,
    ) {
        parent::__construct([
            'expire' => (string) $expire,
            ]);
    }
}
