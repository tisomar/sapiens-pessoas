<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters\Loader;

use AguPessoas\Backend\Bundles\DMS\Filter\Filters\BaseFilter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;
use UnexpectedValueException;

/**
 * Defines the required interface for a loader capable of finding the executor of a specific rule.
 */
interface FilterLoaderInterface
{
    /**
     * Finds the filter responsible for executing a specific rule
     *
     * @throws UnexpectedValueException If filter can't be located
     */
    public function getFilterForRule(Rule $rule): BaseFilter;
}
