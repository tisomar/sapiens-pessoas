<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class SPSigepeTipoDiplomaAfastamento.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/sp_sigepe_tipo-diploma-afastamento/{id}',
    jsonLDType: 'SPSigepeTipoDiplomaAfastamento',
    jsonLDContext: '/api/doc/#model-SPSigepeTipoDiplomaAfastamento'
)]
#[Form\Form]
class SPSigepeTipoDiplomaAfastamento extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    use SPSoftdeleteable;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?string $codigoSigepe = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?string $nome = null;

    /**
     * @return string|null
     */
    public function getCodigoSigepe(): ?string
    {
        return $this->codigoSigepe;
    }

    /**
     * @param string|null $codigoSigepe
     * @return SPSigepeTipoDiplomaAfastamento
     */
    public function setCodigoSigepe(?string $codigoSigepe): SPSigepeTipoDiplomaAfastamento
    {
        $this->codigoSigepe = $codigoSigepe;
        $this->setVisited('codigoSigepe');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     * @return SPSigepeTipoDiplomaAfastamento
     */
    public function setNome(?string $nome): SPSigepeTipoDiplomaAfastamento
    {
        $this->nome = $nome;
        $this->setVisited('nome');
        return $this;
    }
}
