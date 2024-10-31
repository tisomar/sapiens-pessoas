<?php

namespace AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Form;

use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Form\Type\FormTypeFilterExtension;
use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Service\Filter;
use Symfony\Component\Form\AbstractExtension;

/**
 * Filter Extension
 *
 * Enabled filtering in forms
 */
class FilterExtension extends AbstractExtension
{
    /**
     * @var boolean
     */
    protected $autoFilter;
    /**
     * @var Filter
     */
    private $filter;

    /**
     * {@inheritdoc}
     *
     * @param \AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Service\Filter $filterService
     * @param boolean $autoFilter
     */
    public function __construct(Filter $filterService, $autoFilter)
    {
        $this->filter = $filterService;
        $this->autoFilter = $autoFilter;
    }

    /**
     * {@inheritdoc}
     */
    protected function loadTypeExtensions(): array
    {
        return array(
            new FormTypeFilterExtension($this->filter, $this->autoFilter),
        );
    }
}
