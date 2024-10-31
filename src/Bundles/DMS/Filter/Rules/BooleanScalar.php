<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * BooleanScalar Rule.
 *
 * @Annotation
 * @NamedArgumentConstructor
 * @Target("PROPERTY")
 */
#[\Attribute(\Attribute::TARGET_PROPERTY)]
class BooleanScalar extends Rule
{
}
