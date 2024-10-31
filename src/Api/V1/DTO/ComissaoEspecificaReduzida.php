<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/ComissaoEspecificaReduzida.php.
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
 * Class ComissaoEspecificaReduzida.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/comissao_especifica_reduzida/{id}',
    jsonLDType: 'ComissaoEspecificaReduzida',
    jsonLDContext: '/api/doc/#model-ComissaoEspecificaReduzida'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class ComissaoEspecificaReduzida extends RestDto
{
    use Timeblameable;
    use Id;
    use Softdeleteable;
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
    protected string $nome;

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->setVisited('nome');
        $this->nome = $nome;

        return $this;
    }
}
