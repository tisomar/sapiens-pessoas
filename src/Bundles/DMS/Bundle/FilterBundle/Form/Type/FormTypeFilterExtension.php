<?php

namespace AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Form\Type;

use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Form\EventListener\DelegatingFilterListener;
use AguPessoas\Backend\Bundles\DMS\Bundle\FilterBundle\Service\Filter;
use Symfony\Component\Form\AbstractTypeExtension;
use Symfony\Component\Form\Extension\Core\Type\FormType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

/**
 * Form Type Filter Extension
 *
 * Extends the Form Type and adds auto filtering to it.
 * It checks the dms_filter.auto_filter_forms parameter to see if it should or
 * not enable auto filtering.
 */
class FormTypeFilterExtension extends AbstractTypeExtension
{
    /**
     * @var Filter
     */
    protected $filterService;

    /**
     * @var boolean
     */
    protected $autoFilter;

    /**
     * @param Filter $filterService
     * @param boolean $autoFilter
     */
    public function __construct(Filter $filterService, bool $autoFilter)
    {
        $this->filterService = $filterService;
        $this->autoFilter = $autoFilter;
    }

    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        if (!$this->autoFilter) {
            return;
        }

        $builder->addEventSubscriber(new DelegatingFilterListener($this->filterService));
    }

    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'cascade_filter' => true
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getExtendedType()
    {
        return FormType::class;
    }

    /**
     * {@inheritdoc}
     */
    public static function getExtendedTypes(): iterable
    {
        return [FormType::class];
    }

}
