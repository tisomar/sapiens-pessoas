<?php

declare(strict_types=1);

/**
 * /src/Api/V1/DTO/TipoProvimento.php
 * Renomeie o arquivo para 'TipoProvimento.php' e atualize a definição da classe para 'TipoProvimento'.
 * Atualize todas as ocorrências do nome 'TipoAposentadoria' para 'TipoProvimento' dentro do arquivo.
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
 * Class TipoProvimento.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoProvimento'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/tipo_provimento/{id}',
    jsonLDType: 'TipoProvimento',
    jsonLDContext: '/api/doc/#model-TipoProvimento'
)]
#[Form\Form]
class TipoProvimento extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
