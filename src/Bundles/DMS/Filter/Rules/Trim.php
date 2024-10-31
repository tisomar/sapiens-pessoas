<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Trim Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Trim extends Rule
{
    /**
     * @param string|null $charlist Comma separated string of allowed tags
     */
    public function __construct(
        public ?string $charlist = null
    ) {
    }
}
