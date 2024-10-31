<?php

declare(strict_types=1);
/**
 * /src/Mapper/Annotations/JsonLD.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Annotations;

/**
 * Class JsonLD.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @Annotation
 */
class JsonLD
{
    public string $jsonLDType;

    public string $jsonLDId;

    public string $jsonLDContext;

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
