<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * PregReplace Rule
 * Replaces based on regular expression, will replace with empty if no
 * replacement is defined.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class PregReplace extends Rule
{
    /**
     * @param string|null $regexp      Regular Expression to use
     * @param string      $replacement Replacement
     */
    public function __construct(
        public ?string $regexp = null,
        public string $replacement = ''
    ) {
    }
}
