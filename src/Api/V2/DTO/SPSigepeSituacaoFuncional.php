<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeSituacaoFuncional.php.
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
 * Class SPSigepeSituacaoFuncional.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/situacao_funcional/{id}',
    jsonLDType: 'SPSigepeSituacaoFuncional',
    jsonLDContext: '/api/doc/#model-SPSigepeSituacaoFuncional'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeSituacaoFuncional extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;
}
