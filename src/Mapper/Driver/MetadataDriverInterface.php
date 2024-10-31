<?php

declare(strict_types=1);
/**
 * /src/Mapper/Driver/MetadataDriverInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Driver;

use AguPessoas\Backend\Mapper\MapperMetadata;

/**
 * Class AnnotationDriverInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface MetadataDriverInterface
{
    /**
     * @param string $dtoClassName
     *
     * @return MapperMetadata
     */
    public function getMetadata(string $dtoClassName): MapperMetadata;
}
