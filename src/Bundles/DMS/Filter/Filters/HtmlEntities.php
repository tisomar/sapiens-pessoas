<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

use function htmlentities;

/**
 * Html Entities Filter
 */
class HtmlEntities extends BaseFilter
{
    /**
     * {@inheritDoc}
     *
     * @param \AguPessoas\Backend\Bundles\DMS\Filter\Rules\HtmlEntities $rule
     */
    public function apply(Rule $rule, $value)
    {
        return htmlentities($value, $rule->flags, $rule->encoding, $rule->doubleEncode);
    }
}
