<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\SPSigepeTipoDiplomaAfastamento;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAfastamento;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;

/**
 * Class SPSigepeAfastamento.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/afastamento/{id}',
    jsonLDType: 'SPSigepeAfastamento',
    jsonLDContext: '/api/doc/#model-SPSigepeAfastamento'
)]
#[Form\Form]
class SPSigepeAfastamento extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
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
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $hash = null;

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
    protected ?string $matricula = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateType',
        options: [
            'required' => false,
            'widget' => 'single_text',
        ]
    )]
    #[OA\Property(type: 'string', format: 'date')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateType',
        options: [
            'required' => false,
            'widget' => 'single_text',
        ]
    )]
    #[OA\Property(type: 'string', format: 'date')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAfastamento',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaAfastamento::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaAfastamento')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $tipo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoDiplomaAfastamento',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeTipoDiplomaAfastamento::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoDiplomaAfastamento')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $tipoDiploma = null;

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string|null $hash
     * @return SPSigepeAfastamento
     */
    public function setHash(?string $hash): SPSigepeAfastamento
    {
        $this->hash = $hash;
        $this->setVisited('hash');
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
     * @return SPSigepeAfastamento
     */
    public function setMatricula(?string $matricula): SPSigepeAfastamento
    {
        $this->matricula = $matricula;
        $this->setVisited('matricula');
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
     * @return SPSigepeAfastamento
     */
    public function setDataInicio(?DateTime $dataInicio): SPSigepeAfastamento
    {
        $this->dataInicio = $dataInicio;
        $this->setVisited('dataInicio');
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
     * @return SPSigepeAfastamento
     */
    public function setDataFim(?DateTime $dataFim): SPSigepeAfastamento
    {
        $this->dataFim = $dataFim;
        $this->setVisited('dataFim');
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
     * @return SPSigepeAfastamento
     */
    public function setTipo(?EntityInterface $tipo): SPSigepeAfastamento
    {
        $this->tipo = $tipo;
        $this->setVisited('tipoOcorrencia');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getTipoDiploma(): ?EntityInterface
    {
        return $this->tipoDiploma;
    }

    /**
     * @param EntityInterface|null $tipoDiploma
     * @return SPSigepeAfastamento
     */
    public function setTipoDiploma(?EntityInterface $tipoDiploma): SPSigepeAfastamento
    {
        $this->tipoDiploma = $tipoDiploma;
        $this->setVisited('tipo');
        return $this;
    }
}
