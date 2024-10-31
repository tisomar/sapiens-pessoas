<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeDependente.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\SPDependenteDadosComplementares;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SPSigepeDependente.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/dependente/{id}',
    jsonLDType: 'SPSigepeDependente',
    jsonLDContext: '/api/doc/#model-SPSigepeDependente'
)]
#[Form\Form]
class SPSigepeDependente extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    //use Blameable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cpf = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nome = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPDependenteDadosComplementares',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPDependenteDadosComplementares::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPDependenteDadosComplementares')]
    protected ?EntityInterface $dadosComplementares = null;

    /**
     * @var SPSigepeDependenteOrgao[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeDependenteOrgao',
        dtoGetter: 'getOrgaos',
        dtoSetter: 'addOrgao',
        collection: true
    )]
    protected $orgaos = [];

    public function getDadosComplementares(): ?EntityInterface
    {
        return $this->dadosComplementares;
    }

    public function setDadosComplementares(?EntityInterface $dadosComplementares): self
    {
        $this->setVisited('dadosComplementares');
        $this->dadosComplementares = $dadosComplementares;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     * @return SPSigepeDependente
     */
    public function setCpf(?string $cpf): SPSigepeDependente
    {
        $this->cpf = $cpf;
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
     * @return SPSigepeDependente
     */
    public function setNome(?string $nome): SPSigepeDependente
    {
        $this->nome = $nome;
        return $this;
    }

    public function addOrgao(SPSigepeDependenteOrgao $orgao): SPSigepeDependente
    {
        $this->orgaos[] = $orgao;

        return $this;
    }

    public function getOrgaos(): array
    {
        return $this->orgaos;
    }


}
