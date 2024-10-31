<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeTipoOcorrenciaIngressoServicoPublico.php.
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
 * Class SPSigepeTipoOcorrenciaIngressoServicoPublico.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_ocorrencia_ingresso_servico_publico/{id}',
    jsonLDType: 'SPSigepeTipoOcorrenciaIngressoServicoPublico',
    jsonLDContext: '/api/doc/#model-SPSigepeTipoOcorrenciaIngressoServicoPublico'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeTipoOcorrenciaIngressoServicoPublico extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;
}
