<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * StripTags Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class StripTags extends Rule
{
    /**
     * @param string|null $allowed String of allowed tags. Ex: <b><i><a>
     */
    public function __construct(
        public ?string $allowed = null
    ) {
    }
}
