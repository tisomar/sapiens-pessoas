<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Api\V1\DTO\Etnia;
use AguPessoas\Backend\Api\V1\DTO\TipoServidor;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\SPSigepeCondicaoDependente;
use AguPessoas\Backend\Entity\SPSigepeGrauParentesco;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;
use JMS\Serializer\Annotation as Serializer;

#[DTOMapper\JsonLD(
    jsonLDId: '/v2/dado_complementar_servidor/{id}',
    jsonLDType: 'DadoComplementarServidor',
    jsonLDContext: '/api/doc/#model-SPServidor'
)]
#[Form\Form]
class SPSigepeDependenteOrgao extends RestDto
{
    use IdUuid;
    use SPTimeblameable;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeDependente',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeDependente::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeDependente')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $sigepeDependente = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Orgao')]
    #[OA\Property(ref: new Model(type: Orgao::class))]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $orgao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?string $matricula = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeCondicao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeCondicao')]
    #[OA\Property(ref: new Model(type: SPSigepeCondicao::class))]
    protected ?EntityInterface $condicao = null;


    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeGrauParentesco',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeGrauParentesco')]
    #[OA\Property(ref: new Model(type: SPSigepeGrauParentesco::class))]
    protected ?EntityInterface $parentesco = null;

    /**
     * @var SPSigepeBeneficio[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeBeneficio',
        dtoGetter: 'getBeneficios',
        dtoSetter: 'addBeneficio',
        collection: true
    )]
    protected $beneficios = [];

    /**
     * @return EntityInterface|null
     */
    public function getSigepeDependente(): ?EntityInterface
    {
        return $this->sigepeDependente;
    }

    /**
     * @param EntityInterface|null $sigepeDependente
     * @return SPSigepeDependenteOrgao
     */
    public function setSigepeDependente(?EntityInterface $sigepeDependente): SPSigepeDependenteOrgao
    {
        $this->sigepeDependente = $sigepeDependente;
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOrgao(): ?EntityInterface
    {
        return $this->orgao;
    }

    /**
     * @param EntityInterface|null $orgao
     * @return SPSigepeDependenteOrgao
     */
    public function setOrgao(?EntityInterface $orgao): SPSigepeDependenteOrgao
    {
        $this->orgao = $orgao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeDependenteOrgao
     */
    public function setMatricula(?string $matricula): SPSigepeDependenteOrgao
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getCondicao(): ?EntityInterface
    {
        return $this->condicao;
    }

    /**
     * @param EntityInterface|null $condicao
     * @return SPSigepeDependenteOrgao
     */
    public function setCondicao(?EntityInterface $condicao): SPSigepeDependenteOrgao
    {
        $this->condicao = $condicao;
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getParentesco(): ?EntityInterface
    {
        return $this->parentesco;
    }

    /**
     * @param EntityInterface|null $parentesco
     * @return SPSigepeDependenteOrgao
     */
    public function setParentesco(?EntityInterface $parentesco): SPSigepeDependenteOrgao
    {
        $this->parentesco = $parentesco;
        return $this;
    }

    public function addBeneficio(SPSigepeBeneficio $beneficio): SPSigepeDependenteOrgao
    {
        $this->beneficios[] = $beneficio;

        return $this;
    }

    public function getBeneficios(): array
    {
        return $this->beneficios;
    }


}
