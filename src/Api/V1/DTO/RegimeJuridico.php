<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/RegimeJuridico.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class RegimeJuridico.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/regime_juridico/{id}',
    jsonLDType: 'RegimeJuridico',
    jsonLDContext: '/api/doc/#model-RegimeJuridico'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class RegimeJuridico extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
