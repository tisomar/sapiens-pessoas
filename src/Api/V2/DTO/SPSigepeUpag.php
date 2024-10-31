<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeUpag.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CodigoSigepe;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;
use AguPessoas\Backend\DTO\Traits\Sigla;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class SPSigepeUpag.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/upag/{id}',
    jsonLDType: 'SPSigepeUpag',
    jsonLDContext: '/api/doc/#model-SPSigepeUpag'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeUpag extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use Sigla;
    use SPTimeblameable;
    use SPSoftdeleteable;
}
