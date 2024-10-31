<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Filters\Loader;

use AguPessoas\Backend\Bundles\DMS\Filter\Filters\BaseFilter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;
use UnexpectedValueException;

use function class_exists;
use function get_class;
use function sprintf;

/**
 * Loads the filter that enforces a specific rule.
 */
class FilterLoader implements FilterLoaderInterface
{
    /**
     * Finds the filter responsible for executing a specific rule
     *
     * @throws UnexpectedValueException If filter can't be located.
     */
    public function getFilterForRule(Rule $rule): BaseFilter
    {
        $filterIdentifier = $rule->getFilter();

        if (class_exists($filterIdentifier)) {
            return new $filterIdentifier();
        }

        $error = sprintf('Unable to locate filter for: %s defined in %s', $filterIdentifier, get_class($rule));

        throw new UnexpectedValueException($error);
    }
}
