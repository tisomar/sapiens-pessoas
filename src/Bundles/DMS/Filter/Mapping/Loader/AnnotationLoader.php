<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Mapping\Loader;

use AguPessoas\Backend\Bundles\DMS\Filter\Mapping\ClassMetadataInterface;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules;
use Doctrine\Common\Annotations\AnnotationRegistry;
use Doctrine\Common\Annotations\Reader;

/**
 * Loader that reads filtering data from Annotations.
 */
class AnnotationLoader implements LoaderInterface
{
    protected Reader $reader;

    /**
     * Constructor.
     */
    public function __construct(Reader $reader)
    {
        $this->reader = $reader;

        // Register Filter Rules Annotation Namespace
        if (\method_exists(AnnotationRegistry::class, 'registerAutoloadNamespace')) {
            AnnotationRegistry::registerAutoloadNamespace('AguPessoas\Backend\Bundles\DMS\Filter\Rules', __DIR__.'/../../../../');
        }
    }

    /**
     * Loads annotations data present in the class, using a Doctrine
     * annotation reader.
     *
     * @return bool|void
     */
    public function loadClassMetadata(ClassMetadataInterface $metadata): bool
    {
        $reflClass = $metadata->getReflectionClass();

        // Iterate over properties to get annotations
        foreach ($reflClass->getProperties() as $property) {
            $this->readProperty($property, $metadata);
        }

        return true;
    }

    /**
     * Reads annotations for a selected property in the class.
     */
    private function readProperty(\ReflectionProperty $property, ClassMetadataInterface $metadata): void
    {
        // Skip if this property is not from this class
        if ($property->getDeclaringClass()->getName()
            !== $metadata->getClassName()
        ) {
            return;
        }

        // Iterate over all attributes
        foreach ($property->getAttributes(Rules\Rule::class, \ReflectionAttribute::IS_INSTANCEOF) as $attribute) {
            $metadata->addPropertyRule($property->getName(), $attribute->newInstance());
        }

        // Iterate over all annotations
        foreach ($this->reader->getPropertyAnnotations($property) as $rule) {
            // Skip is its not a rule
            if (!$rule instanceof Rules\Rule) {
                continue;
            }

            // Add Rule
            $metadata->addPropertyRule($property->getName(), $rule);
        }
    }
}
