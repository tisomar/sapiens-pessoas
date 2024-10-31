<?php

namespace AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Rule;

use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Filter\ContainerFilter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules\Rule;

/**
 * Service Rule
 *
 * @package AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Rule
 *
 * @Annotation
 */
class Service extends Rule
{
    /**
     * @var string
     */
    public $service;

    /**
     * @var string
     */
    public $method;

    /**
     * {@inheritdoc}
     */
    public function getRequiredOptions(): array
    {
        return array('service', 'method');
    }

    /**
     * @return string
     */
    public function getFilter(): string
    {
        return ContainerFilter::class;
    }
}
