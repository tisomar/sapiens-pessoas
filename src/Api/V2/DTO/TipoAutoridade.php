<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoAutoridade.php.
 * Renomeie o arquivo para 'TipoAutoridade.php' e atualize a definição da classe para 'TipoAutoridade'.
 */

namespace AguPessoas\Backend\Api\V2\DTO;

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
 * Class TipoAutoridade.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoAutoridade'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_autoridade/{id}',
    jsonLDType: 'TipoAutoridade',
    jsonLDContext: '/api/doc/#model-TipoAutoridade'
)]
#[Form\Form]
class TipoAutoridade extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
