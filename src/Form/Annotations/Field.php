<?php

declare(strict_types=1);
/**
 * /src/Form/Annotations/Field.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Annotations;

/**
 * Class Field.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class Field
{
    public ?string $value = null;

    public ?string $name = null;

    public array $methods = [];

    public array $options = [];

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
     * @param mixed $value
     * @return void
     */
    public function __set(string $name, mixed $value)
    {
        $this->options[$name] = $value;
    }

    /**
     * @param $name
     * @return void
     */
    public function __isset($name)
    {
    }
}
