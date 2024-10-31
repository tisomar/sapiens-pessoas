<?php

declare(strict_types=1);
/**
 * /src/Form/Annotations/Form.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Annotations;

/**
 * Class Form.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class Form
{
    public array $validationGroups = [];

    /**
     * @param array $data
     */
    public function __construct(array $data)
    {
        foreach ($data as $key => $value) {
            $this->{$key} = $value;
        }
    }

    /**
     * @param string $name
     * @param mixed  $value
     */
    public function __set(string $name, mixed $value)
    {
        $this->validationGroups[$name] = $value;
    }

    /**
     * @param $name
     * @return void
     */
    public function __isset($name)
    {
    }
}
