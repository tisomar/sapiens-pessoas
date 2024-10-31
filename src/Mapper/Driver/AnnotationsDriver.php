<?php

declare(strict_types=1);
/**
 * /src//Mapper/Driver/AnnotationDriver.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Driver;

use Doctrine\Common\Annotations\AnnotationReader;
use Psr\Cache\InvalidArgumentException;
use ReflectionClass;
use AguPessoas\Backend\Mapper\Attributes\JsonLD as JsonLDAttribute;
use AguPessoas\Backend\Mapper\Attributes\Mapper as MapperAttribute;
use AguPessoas\Backend\Mapper\Attributes\Property as PropertyAttribute;
use AguPessoas\Backend\Mapper\Annotations\JsonLD as JsonLDAnnotation;
use AguPessoas\Backend\Mapper\Annotations\Mapper as MapperAnnotation;
use AguPessoas\Backend\Mapper\Annotations\Property as PropertyAnnotation;
use AguPessoas\Backend\Mapper\MapperMetadata;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Class AnnotationDriver.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class AnnotationsDriver implements MetadataDriverInterface
{
    /**
     * @param CacheInterface $appCache
     */
    public function __construct(
        private CacheInterface $appCache
    ) {
    }

    /**
     * @param string $dtoClassName
     *
     * @return MapperMetadata
     *
     * @throws InvalidArgumentException
     */
    public function getMetadata(string $dtoClassName): MapperMetadata
    {
        return $this->appCache->get('mapper_'.str_replace('\\', '_', $dtoClassName), function () use ($dtoClassName) {
            $metadata = new MapperMetadata();
            $reader = new AnnotationReader();
            $reflectionClass = new ReflectionClass($dtoClassName);

            foreach ($reflectionClass->getAttributes() as $attribute) {
                if (MapperAttribute::class === $attribute->getName()) {
                    $metadata->setMapper($attribute->newInstance());
                }

                if (JsonLDAttribute::class === $attribute->getName()) {
                    $metadata->setJsonLD($attribute->newInstance());
                }
            }

            foreach ($reader->getClassAnnotations($reflectionClass) as $classAnnotation) {
                if ((null === $metadata->getMapper()) && $classAnnotation instanceof MapperAnnotation) {
                    $metadata->setMapper($classAnnotation);
                }

                if ((null === $metadata->getJsonLD()) && $classAnnotation instanceof JsonLDAnnotation) {
                    $metadata->setJsonLD($classAnnotation);
                }
            }

            while (is_object($reflectionClass)) {
                $properties = $reflectionClass->getProperties();
                foreach ($properties as $property) {
                    /** @var PropertyAttribute|PropertyAnnotation $propertyMetadata */
                    $propertyMetadata = null;
                    foreach ($property->getAttributes() as $attribute) {
                        if (PropertyAttribute::class === $attribute->getName()) {
                            $propertyMetadata = $attribute->newInstance();
                            break;
                        }
                    }
                    $propertyMetadata ??= $reader->getPropertyAnnotation($property, PropertyAnnotation::class);
                    if (!$propertyMetadata) {
                        continue;
                    }
                    if (null === $propertyMetadata->name) {
                        $propertyMetadata->name = $property->getName();
                    }
                    $metadata->addProperty($propertyMetadata);
                }
                $reflectionClass = $reflectionClass->getParentClass();
            }

            return $metadata;
        });
    }
}
