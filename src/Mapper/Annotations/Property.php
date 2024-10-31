<?php

declare(strict_types=1);
/**
 * /src/Mapper/Annotations/Property.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Annotations;

/**
 * Class Property.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class Property
{
    public ?string $name = null;

    public ?string $dtoClass = null;

    public ?string $dtoGetter = null;

    public ?string $dtoSetter = null;

    public ?string $entityGetter = null;

    public ?string $entitySetter = null;

    public bool $collection = false;

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
     * @param string $class
     * @param mixed  $value
     */
    public function __set(string $class, mixed $value)
    {
        $this->options[$class] = $value;
    }

    /**
     * @param $class
     * @return void
     */
    public function __isset($class)
    {
    }
}
