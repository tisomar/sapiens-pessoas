<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Alnum Rule (Alphanumeric).
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Alnum extends RegExp
{
    /**
     * @param bool $allowWhitespace Allow Whitespace or not
     */
    public function __construct(
        public bool $allowWhitespace = true
    ) {
        parent::__construct(null, null);
    }
}
