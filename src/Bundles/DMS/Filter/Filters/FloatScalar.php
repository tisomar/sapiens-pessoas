<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

use function is_array;
use function is_object;

/**
 * FloatScalar Filter
 * Converts content into a FloatScalar
 */
class FloatScalar extends BaseFilter
{
    /**
     * {@inheritDoc}
     */
    public function apply(Rule $rule, $value)
    {
        if (is_array($value) || is_object($value)) {
            return null;
        }

        return (float) $value;
    }
}
