<?php

declare(strict_types=1);
/**
 * /src/Form/Annotations/Method.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Annotations;

/**
 * Class Method.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class Method
{
    public array $roles = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }
}
