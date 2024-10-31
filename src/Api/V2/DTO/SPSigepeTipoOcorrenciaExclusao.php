<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeTipoOcorrenciaExclusao.php.
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
 * Class SPSigepeTipoOcorrenciaExclusao.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_ocorrencia_exclusao/{id}',
    jsonLDType: 'SPSigepeTipoOcorrenciaExclusao',
    jsonLDContext: '/api/doc/#model-SPSigepeTipoOcorrenciaExclusao'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeTipoOcorrenciaExclusao extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;
}
