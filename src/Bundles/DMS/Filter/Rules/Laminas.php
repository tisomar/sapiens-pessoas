<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Laminas Rule.
 *
 * Allows the use for Laminas Filters
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Laminas extends Rule
{
    /**
     * @param string $class          Laminas\Filter class, can be either a FQN or just Boolean for example
     * @param array  $laminasOptions Array of options to be passed into the Laminas Filter
     */
    public function __construct(
        public string $class,
        public array $laminasOptions = [],
    ) {
    }
}
