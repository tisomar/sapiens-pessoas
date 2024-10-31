<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * RegExp Rule.
 *
 * Filter using preg_replace and unicode or non-unicode patterns
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class RegExp extends Rule
{
    /**
     * @param string|null $unicodePattern Unicode version of Pattern
     * @param string|null $pattern        Reg Exp Pattern
     */
    public function __construct(
        public ?string $unicodePattern = null,
        public ?string $pattern = null
    ) {
    }
}
