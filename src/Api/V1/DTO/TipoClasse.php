<?php

declare(strict_types=1);

/**
 * /src/Api/V1/DTO/TipoPadrao.php.
 * Renomeie o arquivo para 'TipoPadrao.php' e atualize a definição da classe para 'TipoPadrao'.
 * Atualize todas as ocorrências do nome 'TipoAposentadoria' para 'TipoPadrao' dentro do arquivo.
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class TipoPadrao.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoPadrao'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/tipo_classe/{id}',
    jsonLDType: 'TipoClasse',
    jsonLDContext: '/api/doc/#model-TipoClasse'
)]
#[Form\Form]
class TipoClasse extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;

}
