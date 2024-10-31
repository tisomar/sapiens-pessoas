<?php

declare(strict_types=1);
/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Doctrine\ORM\Immutable;

use Closure;
use Doctrine\Common\Annotations\AnnotationReader;
use Doctrine\Common\Annotations\PsrCachedReader;
use ReflectionClass;
use RuntimeException;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Utils\ParameterParser;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * Class Immutable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
class ImmutableService
{
    /**
     * ImmutableService constructor.
     *
     * @param ParameterParser $parameterParser
     */
    public function __construct(
        private ParameterParser $parameterParser,
        private CacheInterface $appCache,
        private ParameterBagInterface $parameterBag
    ) {
    }

    /**
     * @return Closure[]
     */
    protected function getExpressions(): array
    {
        return [
            Immutable::EXPRESSION_EQUALS => fn ($value, $expressionValues) => $value === $expressionValues,
            Immutable::EXPRESSION_NOT_EQUALS => fn ($value, $expressionValues) => $value !== $expressionValues,
            Immutable::EXPRESSION_IN => fn ($value, $expressionValues) => in_array(
                $value,
                is_array($expressionValues) ? $expressionValues : [$expressionValues]
            ),
            Immutable::EXPRESSION_NOT_IN => fn ($value, $expressionValues) => !in_array(
                $value,
                is_array($expressionValues) ? $expressionValues : [$expressionValues]
            ),
            Immutable::EXPRESSION_IS_NULL => fn ($value, $expressionValues) => is_null($value),
            Immutable::EXPRESSION_IS_NOT_NULL => fn ($value, $expressionValues) => !is_null($value),
        ];
    }

    /**
     * Returns supported expressions.
     *
     * @return string[]
     */
    public function getSupportedExpressions(): array
    {
        return array_keys($this->getExpressions());
    }

    /**
     * @param EntityInterface $entity
     *
     * @return bool
     */
    public function isImmutable(EntityInterface $entity): bool
    {
        $immutableAnnotation = $this->getImmutableAnnotation($entity);

        if (!$immutableAnnotation) {
            return false;
        }

        if ($immutableAnnotation->lockAll) {
            return true;
        }

        $get = 'get'.ucfirst($immutableAnnotation->fieldName);

        if (!method_exists($entity, $get)) {
            throw new RuntimeException(sprintf('A entidade %s não possuí o método %s.', get_class($entity), $get));
        }

        if (!in_array($immutableAnnotation->expression, $this->getSupportedExpressions())) {
            throw new RuntimeException(sprintf('Expressão %s não suportada.', $immutableAnnotation->expression));
        }

        return $this->getExpressions()[$immutableAnnotation->expression](
            $entity->$get(),
            $this->parameterParser->parse($immutableAnnotation->expressionValues)
        );
    }

    /**
     * @param EntityInterface $entity
     *
     * @return Immutable|null
     */
    public function getImmutableAnnotation(EntityInterface $entity): ?Immutable
    {
        $reader = new PsrCachedReader(
            new AnnotationReader(),
            $this->appCache,
            $this->parameterBag->get('kernel.debug')
        );
        $reflectionClass = new ReflectionClass(get_class($entity));

        foreach ($reflectionClass->getAttributes() as $attribute) {
            if (Immutable::class === $attribute->getName()) {
                $classAnnotation = $attribute->newInstance();
                break;
            }
        }

        $classAnnotation ??= $reader->getClassAnnotation($reflectionClass, Immutable::class);

        /* @var Immutable $immutableAnnotation */
        return $classAnnotation;
    }
}
