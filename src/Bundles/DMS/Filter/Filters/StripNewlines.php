<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

use function is_string;
use function str_replace;

/**
 * StripNewlines Filter
 */
class StripNewlines extends BaseFilter
{
    /**
     * {@inheritDoc}
     */
    public function apply(Rule $rule, $value)
    {
        return is_string($value) ? str_replace(["\n", "\r"], '', $value) : $value;
    }
}
