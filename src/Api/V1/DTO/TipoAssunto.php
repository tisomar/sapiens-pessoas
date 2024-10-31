<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/TipoAssunto.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class TipoAssunto.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/administrativo/tipo_assunto/{id}',
    jsonLDType: 'TipoAssunto',
    jsonLDContext: '/api/doc/#model-TipoAssunto'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class TipoAssunto extends RestDto
{

    use Timeblameable;
    use Id;
    use Descricao;

}
