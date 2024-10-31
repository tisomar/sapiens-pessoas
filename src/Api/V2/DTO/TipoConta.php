<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoConta.php.
 * Renomeie o arquivo para 'TipoConta.php' e atualize a definição da classe para 'TipoConta'.
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
 * Class TipoConta.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoConta'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_conta/{id}',
    jsonLDType: 'TipoConta',
    jsonLDContext: '/api/doc/#model-TipoConta'
)]
#[Form\Form]
class TipoConta extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
