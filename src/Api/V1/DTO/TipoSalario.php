<?php

declare(strict_types=1);

/**
 * /src/Api/V1/DTO/TipoSalario.php
 * Renomeie o arquivo para 'TipoSalario.php' e atualize a definição da classe para 'TipoSalario'.
 * Atualize todas as ocorrências do nome 'TipoAposentadoria' para 'TipoSalario' dentro do arquivo.
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
 * Class TipoSalario.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoSalario'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/tipo_salario/{id}',
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
