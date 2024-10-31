<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

/**
 * BooleanScalar Filter
 */
class BooleanScalar extends BaseFilter
{
    /**
     * {@inheritDoc}
     */
    public function apply(Rule $rule, $value)
    {
        return (bool) $value;
    }
}
