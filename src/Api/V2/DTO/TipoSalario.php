<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoSalario.php
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
 * Class TipoSalario.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_salario/{id}',
    jsonLDType: 'TipoSalario',
    jsonLDContext: '/api/doc/#model-TipoSalario'
)]
#[Form\Form]
class TipoSalario extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
