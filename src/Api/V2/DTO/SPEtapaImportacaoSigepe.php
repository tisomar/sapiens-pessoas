<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/SPEtapaImportacaoSigepe.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;

use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class SPEtapaImportacaoSigepe.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/etapa_importacao_sigepe/{id}',
    jsonLDType: 'SPEtapaImportacaoSigepe',
    jsonLDContext: '/api/doc/#model-SPEtapaImportacaoSigepe'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPEtapaImportacaoSigepe extends RestDto
{
    use IdUuid;
    use Codigo;
    use Nome;
    use SPTimeblameable;
}
