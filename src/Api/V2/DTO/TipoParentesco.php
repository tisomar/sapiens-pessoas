<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoParentesco.php.
 * Renomeie o arquivo para 'TipoParentesco.php' e atualize a definição da classe para 'TipoParentesco'.
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
 * Class TipoParentesco.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoParentesco'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_parentesco/{id}',
    jsonLDType: 'TipoParentesco',
    jsonLDContext: '/api/doc/#model-TipoParentesco'
)]
#[Form\Form]
class TipoParentesco extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
