<?php

namespace AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Filter;

use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Rule\Service;
use AguPessoas\Backend\Bundles\DMS\Filter\Filters\BaseFilter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class ContainerFilter extends BaseFilter implements ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    protected $container;

    /**
     * Sets the Container.
     *
     * @param ContainerInterface|null $container A ContainerInterface instance or null
     *
     * @api
     */
    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }

    /**
     * Enforces the desired filtering on the the value
     * returning a filtered value.
     *
     * @param Service|Rule $rule
     * @param mixed $value
     *
     * @throws \RuntimeException
     * @return mixed
     */
    public function apply(Rule $rule, $value)
    {
        if (!$this->container->has($rule->service)) {
            throw new \RuntimeException("Unable to find service '{$rule->service}' to execute defined rule.");
        }

        $service = $this->container->get($rule->service);

        if (! \is_callable([$service, $rule->method])) {
            throw new \RuntimeException("Unable to find the method '{$rule->method}' in service '{$rule->service}'.");
        }

        $method = $rule->method;

        return $service->$method($value);
    }
}
