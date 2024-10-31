<?php

declare(strict_types=1);
/**
 * /src/JsonLD/Attributes/JsonLD.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Attributes;

use Attribute;

/**
 * Class JsonLD.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute(Attribute::TARGET_CLASS)]
class JsonLD extends \AguPessoas\Backend\Mapper\Annotations\JsonLD
{

    /**
     * @param string $jsonLDId
     * @param string $jsonLDType
     * @param string $jsonLDContext
     * @param array  $options
     */
    public function __construct(
        string $jsonLDId,
        string $jsonLDType,
        string $jsonLDContext,
        array $options = [],
    ) {
        parent::__construct([
            'jsonLDType' => $jsonLDType,
            'jsonLDId' => $jsonLDId,
            'jsonLDContext' => $jsonLDContext,
            'options' => $options,
        ]);
    }
}
