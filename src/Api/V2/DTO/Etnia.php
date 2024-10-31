<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/Etnia.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
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
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class Etnia.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/etnia/{id}',
    jsonLDType: 'Etnia',
    jsonLDContext: '/api/doc/#model-Etnia'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Etnia extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;

}
