<?php

namespace AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Loader;

use AguPessoas\Backend\Bundles\DMS\Filter\Filters\BaseFilter;
use AguPessoas\Backend\Bundles\DMS\Filter\Filters\Loader\FilterLoader;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerAwareLoader extends FilterLoader implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * @param ContainerInterface $container
     */
    public function setContainer(ContainerInterface $container = null): void
    {
        $this->container = $container;
    }

    /**
     * Attempts to load Filter from Container or hands off to parent loader.
     *
     * @param Rule $rule
     * @return BaseFilter|null|\stdClass
     * @throws \UnexpectedValueException
     */
    public function getFilterForRule(Rule $rule): BaseFilter
    {
        $filterIdentifier = $rule->getFilter();

        if ($this->container === null || !$this->container->has($filterIdentifier)) {
            return parent::getFilterForRule($rule);
        }

        return $this->container->get($filterIdentifier);
    }
}
