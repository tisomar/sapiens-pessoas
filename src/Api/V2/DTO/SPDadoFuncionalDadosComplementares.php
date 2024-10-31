<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Api\V1\DTO\Etnia;
use AguPessoas\Backend\Api\V1\DTO\TipoServidor;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\AreaAtuacao;
use AguPessoas\Backend\Entity\Lotacao;
use AguPessoas\Backend\Entity\RescisaoRais;
use AguPessoas\Backend\Entity\SituacaoRais;
use AguPessoas\Backend\Entity\TipoAdmissao;
use AguPessoas\Backend\Entity\TipoSalario;
use AguPessoas\Backend\Entity\VinculoRais;
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
class SPDadoFuncionalDadosComplementares extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RescisaoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\RescisaoRais')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: RescisaoRais::class))]
    protected ?EntityInterface $rescisaoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SituacaoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SituacaoRais')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SituacaoRais::class))]
    protected ?EntityInterface $situacaoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\VinculoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\VinculoRais')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: VinculoRais::class))]
    protected ?EntityInterface $vinculoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoAdmissao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\TipoAdmissao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: TipoAdmissao::class))]
    protected ?EntityInterface $tipoAdmissao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoSalario',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\TipoSalario')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: TipoSalario::class))]
    protected ?EntityInterface $tipoSalario = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\AreaAtuacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\AreaAtuacao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: AreaAtuacao::class))]
    protected ?EntityInterface $areaAtuacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Lotacao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Lotacao::class))]
    protected ?EntityInterface $lotacaoOrigem = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Lotacao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Lotacao::class))]
    protected ?EntityInterface $lotacaoExercicio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataRescisao = null;

    /**
     * @return EntityInterface|null
     */
    public function getRescisaoRais(): ?EntityInterface
    {
        return $this->rescisaoRais;
    }

    /**
     * @param EntityInterface|null $rescisaoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setRescisaoRais(?EntityInterface $rescisaoRais): SPDadoFuncionalDadosComplementares
    {
        $this->rescisaoRais = $rescisaoRais;
        $this->setVisited('rescisaoRais');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSituacaoRais(): ?EntityInterface
    {
        return $this->situacaoRais;
    }

    /**
     * @param EntityInterface|null $situacaoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setSituacaoRais(?EntityInterface $situacaoRais): SPDadoFuncionalDadosComplementares
    {
        $this->situacaoRais = $situacaoRais;
        $this->setVisited('situacaoRais');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getVinculoRais(): ?EntityInterface
    {
        return $this->vinculoRais;
    }

    /**
     * @param EntityInterface|null $vinculoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setVinculoRais(?EntityInterface $vinculoRais): SPDadoFuncionalDadosComplementares
    {
        $this->vinculoRais = $vinculoRais;
        $this->setVisited('vinculoRais');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getTipoAdmissao(): ?EntityInterface
    {
        return $this->tipoAdmissao;
    }

    /**
     * @param EntityInterface|null $tipoAdmissao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setTipoAdmissao(?EntityInterface $tipoAdmissao): SPDadoFuncionalDadosComplementares
    {
        $this->tipoAdmissao = $tipoAdmissao;
        $this->setVisited('tipoAdmissao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getTipoSalario(): ?EntityInterface
    {
        return $this->tipoSalario;
    }

    /**
     * @param EntityInterface|null $tipoSalario
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setTipoSalario(?EntityInterface $tipoSalario): SPDadoFuncionalDadosComplementares
    {
        $this->tipoSalario = $tipoSalario;
        $this->setVisited('tipoSalario');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getAreaAtuacao(): ?EntityInterface
    {
        return $this->areaAtuacao;
    }

    /**
     * @param EntityInterface|null $areaAtuacao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setAreaAtuacao(?EntityInterface $areaAtuacao): SPDadoFuncionalDadosComplementares
    {
        $this->areaAtuacao = $areaAtuacao;
        $this->setVisited('areaAtuacao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getLotacaoOrigem(): ?EntityInterface
    {
        return $this->lotacaoOrigem;
    }

    /**
     * @param EntityInterface|null $lotacaoOrigem
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setLotacaoOrigem(?EntityInterface $lotacaoOrigem): SPDadoFuncionalDadosComplementares
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
        $this->setVisited('lotacaoOrigem');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getLotacaoExercicio(): ?EntityInterface
    {
        return $this->lotacaoExercicio;
    }

    /**
     * @param EntityInterface|null $lotacaoExercicio
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setLotacaoExercicio(?EntityInterface $lotacaoExercicio): SPDadoFuncionalDadosComplementares
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
        $this->setVisited('lotacaoExercicio');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataRescisao(): ?DateTime
    {
        return $this->dataRescisao;
    }

    /**
     * @param DateTime|null $dataRescisao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setDataRescisao(?DateTime $dataRescisao): SPDadoFuncionalDadosComplementares
    {
        $this->dataRescisao = $dataRescisao;
        $this->setVisited('dataRescisao');
        return $this;
    }

}
