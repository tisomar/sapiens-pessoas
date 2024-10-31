<?php

declare(strict_types=1);

/**
 * /src/Api/V1/DTO/TipoTelefone.php.
 * Renomeie o arquivo para 'TipoTelefone.php' e atualize a definição da classe para 'TipoTelefone'.
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
 * Class TipoTelefone.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoTelefone'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/tipo_telefone/{id}',
    jsonLDType: 'TipoTelefone',
    jsonLDContext: '/api/doc/#model-TipoTelefone'
)]
#[Form\Form]
class TipoTelefone extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
