<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoServidor.php.
 * Renomeie o arquivo para 'TipoServidor.php' e atualize a definição da classe para 'TipoServidor'.
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class TipoServidor.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoServidor'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_servidor/{id}',
    jsonLDType: 'TipoServidor',
    jsonLDContext: '/api/doc/#model-TipoServidor'
)]
#[Form\Form]
class TipoServidor extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
}
