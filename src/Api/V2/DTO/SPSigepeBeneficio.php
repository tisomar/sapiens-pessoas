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
class SPSigepeBeneficio extends RestDto
{
    use IdUuid;
    use SPTimeblameable;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeDependenteOrgao',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeDependenteOrgao::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeDependenteOrgao')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $sigepeDependenteOrgao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoBeneficio',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoBeneficio')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoBeneficio::class))]
    protected ?EntityInterface $tipo = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim = null;

    /**
     * @return EntityInterface|null
     */
    public function getSigepeDependenteOrgao(): ?EntityInterface
    {
        return $this->sigepeDependenteOrgao;
    }

    /**
     * @param EntityInterface|null $sigepeDependenteOrgao
     * @return SPSigepeBeneficio
     */
    public function setSigepeDependenteOrgao(?EntityInterface $sigepeDependenteOrgao): SPSigepeBeneficio
    {
        $this->sigepeDependenteOrgao = $sigepeDependenteOrgao;
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getTipo(): ?EntityInterface
    {
        return $this->tipo;
    }

    /**
     * @param EntityInterface|null $tipo
     * @return SPSigepeBeneficio
     */
    public function setTipo(?EntityInterface $tipo): SPSigepeBeneficio
    {
        $this->tipo = $tipo;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    /**
     * @param DateTime|null $dataInicio
     * @return SPSigepeBeneficio
     */
    public function setDataInicio(?DateTime $dataInicio): SPSigepeBeneficio
    {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    /**
     * @param DateTime|null $dataFim
     * @return SPSigepeBeneficio
     */
    public function setDataFim(?DateTime $dataFim): SPSigepeBeneficio
    {
        $this->dataFim = $dataFim;
        return $this;
    }


}
