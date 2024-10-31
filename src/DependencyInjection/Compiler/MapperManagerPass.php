<?php
/**
 * /src/DependencyInjection/Compiler/MapperManagerPass.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
declare(strict_types=1);

namespace AguPessoas\Backend\DependencyInjection\Compiler;

use function array_keys;
use AguPessoas\Backend\Mapper\MapperManager;
use Symfony\Component\DependencyInjection\Compiler\CompilerPassInterface;
use Symfony\Component\DependencyInjection\ContainerBuilder;
use Symfony\Component\DependencyInjection\Exception\InvalidArgumentException;
use Symfony\Component\DependencyInjection\Exception\ServiceNotFoundException;
use Symfony\Component\DependencyInjection\Reference;

/**
 * Class MapperManager.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class MapperManagerPass implements CompilerPassInterface
{
    /**
     * This process will attach all REST resource objects to collection class, where we can use those on certain cases.
     *
     * @codeCoverageIgnore
     *
     * @param ContainerBuilder $container
     *
     * @throws InvalidArgumentException
     * @throws ServiceNotFoundException
     */
    public function process(ContainerBuilder $container): void
    {
        // always first check if the primary service is defined
        if (!$container->has(MapperManager::class)) {
            return;
        }

        $mapperManager = $container->getDefinition(MapperManager::class);

        foreach (array_keys($container->findTaggedServiceIds('dto_mapper.mapper')) as $id) {
            $mapperManager->addMethodCall('addMapper', [new Reference($id)]);
        }
    }
}
