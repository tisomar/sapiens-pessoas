<?php

declare(strict_types=1);
/**
 * /src/Form/Driver/AnnotationDriverInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Form\Driver;

use AguPessoas\Backend\Form\FormMetadata;

/**
 * Class AnnotationDriverInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface MetadataDriverInterface
{
    /**
     * @param string $entity
     *
     * @return FormMetadata
     */
    public function getMetadata(string $entity): FormMetadata;
}
