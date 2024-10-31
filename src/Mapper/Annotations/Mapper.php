<?php

declare(strict_types=1);
/**
 * /src/Mapper/Annotations/Mapper.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Annotations;

/**
 * Class Mapper.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class Mapper
{
    public string $class;

    public array $options = [];

    public array $entityMapping = [];

    public array $excludePopulate = [];

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
