<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Alpha Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class Alpha extends RegExp
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