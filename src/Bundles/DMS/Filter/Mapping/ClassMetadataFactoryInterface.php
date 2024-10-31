<?php
declare(strict_types=1);

namespace AguPessoas\Backend\Bundles\DMS\Filter\Mapping;

/**
 * Required methods of a Metadata Factory class
 */
interface ClassMetadataFactoryInterface
{
    /**
     * Retrieve metadata for the provided class
     */
    public function getClassMetadata(string $class): ClassMetadataInterface;
}
