<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/EstadoCivil.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
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
 * Class EstadoCivil.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/administrativo/estado_civil/{id}',
    jsonLDType: 'EstadoCivil',
    jsonLDContext: '/api/doc/#model-EstadoCivil'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class EstadoCivil extends RestDto
{
    use Id;
    use Codigo;
    use Descricao;
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;
}
