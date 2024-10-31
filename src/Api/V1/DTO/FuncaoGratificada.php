<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/FuncaoGratificada.php.
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
 * Class FuncaoGratificada.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/funcao_gratificada/{id}',
    jsonLDType: 'FuncaoGratificada',
    jsonLDContext: '/api/doc/#model-FuncaoGratificada'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class FuncaoGratificada extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $nivelComissaoNacional;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $nivelComissaoInternacional;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?float $remuneracao;

    public function getNivelComissaoNacional(): ?int
    {
        return $this->nivelComissaoNacional;
    }

    public function setNivelComissaoNacional(?int $nivelComissaoNacional): self
    {
        $this->nivelComissaoNacional = $nivelComissaoNacional;
        $this->setVisited('nivelComissaoNacional');
        return $this;
    }

    public function getNivelComissaoInternacional(): ?int
    {
        return $this->nivelComissaoInternacional;
    }

    public function setNivelComissaoInternacional(?int $nivelComissaoInternacional): self
    {
        $this->nivelComissaoInternacional = $nivelComissaoInternacional;
        $this->setVisited('nivelComissaoInternacional');
        return $this;
    }

    public function getRemuneracao(): ?float
    {
        return $this->remuneracao;
    }

    public function setRemuneracao(?float $remuneracao): self
    {
        $this->remuneracao = $remuneracao;
        $this->setVisited('remuneracao');
        return $this;
    }
}
