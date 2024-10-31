<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * ToUpper Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class ToUpper extends Rule
{
    /**
     * @param string|null $encoding Encoding to be used
     */
    public function __construct(
        public ?string $encoding = null
    ) {
    }
}
