<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Zend Rule.
 *
 * Allows the use for Zend Filters
 *
 * @deprecated Replaced with {@link Laminas}
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Zend extends Rule
{
    /**
     * @param string $class       Zend\Filter class, can be either a FQN or just Boolean for example
     * @param array  $zendOptions Array of options to be passed into the Zend Filter
     */
    public function __construct(
        public string $class,
        public array $zendOptions = []
    ) {
    }
}
