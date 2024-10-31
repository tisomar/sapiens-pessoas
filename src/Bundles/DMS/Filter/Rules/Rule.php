<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Rules;

/**
 * Base class for a Filtering Rule, it implements common behaviour.
 *
 * Rules are classes that define the metadata supported by
 * each filter and are used to annotate objects.
 */
class Rule
{
    /**
     * Retrieves the Filter class that is responsible for executing this filter
     * It may also be a service name. By default it loads a class with the
     * same name from the Filters namespace.
     */
    public function getFilter(): string
    {
        return \str_replace('Rules', 'Filters', static::class);
    }

}
