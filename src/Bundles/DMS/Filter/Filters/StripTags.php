<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

use function is_string;
use function strip_tags;

/**
 * StripTags Filter
 */
class StripTags extends BaseFilter
{
    /**
     * {@inheritDoc}
     *
     * @param \AguPessoas\Backend\Bundles\DMS\Filter\Rules\StripTags $rule
     */
    public function apply(Rule $rule, $value)
    {
        return is_string($value) ? strip_tags($value, $rule->allowed) : $value;
    }
}
