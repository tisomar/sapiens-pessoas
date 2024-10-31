<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/FormacaoProfissional.php.
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
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class FormacaoProfissional.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/administrativo/formacao_profissional/{id}',
    jsonLDType: 'FormacaoProfissional',
    jsonLDContext: '/api/doc/#model-FormacaoProfissional'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class FormacaoProfissional extends RestDto
{

    //use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
   // use Softdeleteable;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $codigoSiape = null;

    public function getCodigoSiape(): ?string
    {
        return $this->codigoSiape;
    }

    public function setCodigoSiape(?string $codigoSiape): self
    {
        $this->setVisited('codigoSiape');
        $this->codigoSiape = $codigoSiape;
        return $this;
    }
}
