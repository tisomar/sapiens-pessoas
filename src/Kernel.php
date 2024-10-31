<?php

namespace AguPessoas\Backend;

use Doctrine\Common\Annotations\AnnotationReader;
use Symfony\Bundle\FrameworkBundle\Kernel\MicroKernelTrait;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symfony\Component\HttpKernel\Kernel as BaseKernel;
use AguPessoas\Backend\DependencyInjection\Compiler\TriggersManagerPass;
use AguPessoas\Backend\DependencyInjection\Compiler\MapperManagerPass;
use AguPessoas\Backend\DependencyInjection\Compiler\PipesManagerPass;

class Kernel extends BaseKernel
{
    use MicroKernelTrait;

    /**
     * The extension point similar to the Bundle::build() method.
     *
     * Use this method to register compiler passes and manipulate the container during the building process.
     *
     * @param ContainerBuilder $container
     */
    protected function build(ContainerBuilder $container): void
    {
        parent::build($container);

        AnnotationReader::addGlobalIgnoredName('descSwagger');
        AnnotationReader::addGlobalIgnoredName('classeSwagger');

        $container->addCompilerPass(new MapperManagerPass());
    }

    /**
     * Configures the container.
     *
     * You can register extensions:
     *
     * $c->loadFromExtension('framework', array(
     *     'secret' => '%secret%'
     * ));
     *
     * Or services:
     *
     * $c->register('halloween', 'FooBundle\HalloweenProvider');
     *
     * Or parameters:
     *
     * $c->setParameter('halloween', 'lot of fun');
     *
     * @param ContainerConfigurator $container
     *
     * @throws Exception
     */
    protected function configureContainer(ContainerConfigurator $container): void
    {
        $container->import('../config/{packages}/*.yaml');
        $container->import('../config/{packages}/'.$this->environment.'/*.yaml');

        if (is_file(dirname(__DIR__).'/config/services.yaml')) {
            $container->import('../config/services.yaml');
            $container->import('../config/{services}_'.$this->environment.'.yaml');

            return;
        }

        $container->import('../config/{services}.php');
    }

}
