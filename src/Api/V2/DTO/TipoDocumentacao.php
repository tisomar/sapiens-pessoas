<?php

declare(strict_types=1);

/**
 * /src/Api/V2/DTO/TipoDocumentacao.php.
 * Renomeie o arquivo para 'TipoDocumentacao.php' e atualize a definição da classe para 'TipoDocumentacao'.
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
 * Class TipoDocumentacao.
 * Atualize a definição da classe de 'TipoAposentadoria' para 'TipoDocumentacao'.
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/tipo_documentacao/{id}',
    jsonLDType: 'TipoDocumentacao',
    jsonLDContext: '/api/doc/#model-TipoDocumentacao'
)]
#[Form\Form]
class TipoDocumentacao extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use Softdeleteable;
    use CPFOperador;
}
