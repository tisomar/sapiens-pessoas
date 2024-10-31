<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Html Entities Filter.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class HtmlEntities extends Rule
{
    /**
     * @param int    $flags        Flags
     * @param string $encoding     Encoding to be used
     * @param bool   $doubleEncode Convert existing entities
     */
    public function __construct(
        public int $flags = \ENT_COMPAT,
        public string $encoding = 'UTF-8',
        public bool $doubleEncode = true
    ) {
    }
}
