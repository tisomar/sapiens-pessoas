<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/SPSigepeJornada.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CodigoSigepe;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class SPSigepeJornada.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/jornada/{id}',
    jsonLDType: 'SPSigepeJornada',
    jsonLDContext: '/api/doc/#model-SPSigepeJornada'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeJornada extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;
}
