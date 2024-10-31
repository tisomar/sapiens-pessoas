<?php

declare(strict_types=1);
/**
 * /src/Form/Driver/AnnotationDriver.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Driver;

use Doctrine\Common\Annotations\AnnotationReader;
use LogicException;
use Psr\Cache\InvalidArgumentException;
use ReflectionClass;
use AguPessoas\Backend\Form\Attributes\Field as FieldAttribute;
use AguPessoas\Backend\Form\Attributes\Form as FormAttribute;
use AguPessoas\Backend\Form\Annotations\Field as FieldAnnotation;
use AguPessoas\Backend\Form\Annotations\Form as FormAnnotation;
use AguPessoas\Backend\Form\FormMetadata;
use Symfony\Contracts\Cache\CacheInterface;
use function is_object;

/**
 * Class AnnotationDriver.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class AnnotationsDriver implements MetadataDriverInterface
{
    public function __construct(
        private CacheInterface $appCache
    ) {
    }

    /**
     * @param string $dtoClassName
     *
     * @return FormMetadata
     *
     * @throws InvalidArgumentException
     */
    public function getMetadata(string $dtoClassName): FormMetadata
    {
        return $this->appCache->get('form_'.str_replace('\\', '_', $dtoClassName), function () use ($dtoClassName) {
            $metadata = new FormMetadata();
            $reader = new AnnotationReader();
            $reflectionClass = new ReflectionClass($dtoClassName);
            /* @var FormAttribute|FormAnnotation $formMetadata */
            foreach ($reflectionClass->getAttributes() as $attribute) {
                if (FormAttribute::class === $attribute->getName()) {
                    $formMetadata = $attribute->newInstance();
                    break;
                }
            }
            $formMetadata ??= $reader->getClassAnnotation($reflectionClass, FormAnnotation::class);

            if (null === $formMetadata) {
                throw new LogicException('DTO não possui a anotação @Form nem o atributo #Form');
            } else {
                $metadata->setForm($formMetadata);
            }
            while (is_object($reflectionClass)) {
                $properties = $reflectionClass->getProperties();
                foreach ($properties as $property) {
                    /* @var FieldAttribute|FieldAnnotation $fieldMetadata */
                    $fieldMetadata = null;
                    foreach ($property->getAttributes() as $attribute) {
                        if (FieldAttribute::class === $attribute->getName()) {
                            $fieldMetadata = $attribute->newInstance();
                            break;
                        }
                    }
                    $fieldMetadata ??= $reader->getPropertyAnnotation($property, FieldAnnotation::class);
                    if (null !== $fieldMetadata) {
                        if (null === $fieldMetadata->name) {
                            $fieldMetadata->name = $property->getName();
                        }
                        $metadata->addField($fieldMetadata);
                    }
                }
                $reflectionClass = $reflectionClass->getParentClass();
            }

            return $metadata;
        });
    }
}
