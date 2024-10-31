<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/funcao_comissionada_substituto/{id}',
    jsonLDType: 'FuncaoComissionadaSubstituto',
    jsonLDContext: '/api/doc/#model-FuncaoComissionadaSubstituto'
)]
#[Form\Form]
class FuncaoComissionadaSubstituto extends RestDto
{
    use Id;
    use Timeblameable;
    use Softdeleteable;
    Use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFinal = null;

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
    protected ?string $observacao;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    protected ?EntityInterface $normaInicio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    protected ?EntityInterface $normaFim = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\CargoFuncao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\CargoFuncao')]
    protected ?EntityInterface $cargoFuncao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoOcupacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoOcupacao')]
    protected ?EntityInterface $tipoOcupacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    protected ?EntityInterface $servidorSubstituto = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Rh',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;

    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(?DateTime $dataInicio): self
    {
        $this->dataInicio = $dataInicio;
        $this->setVisited('dataInicio');
        return $this;
    }

    public function getDataFinal(): \DateTime
    {
        return $this->dataFinal;
    }

    public function setDataFinal(?DateTime $dataFinal): self
    {
        $this->dataFinal = $dataFinal;
        $this->setVisited('dataFinal');
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;
        $this->setVisited('observacao');
        return $this;
    }

    public function getNormaFim(): ?EntityInterface
    {
        return $this->normaFim;
    }

    public function setNormaFim(?EntityInterface $normaFim): self
    {
        $this->normaFim = $normaFim;
        $this->setVisited('normaFim');
        return $this;
    }

    public function getNormaInicio(): ?EntityInterface
    {
        return $this->normaInicio;
    }

    public function setNormaInicio(?EntityInterface $normaInicio): self
    {
        $this->normaInicio = $normaInicio;
        $this->setVisited('normaInicio');
        return $this;
    }

    public function getCargoFuncao(): ?EntityInterface
    {
        return $this->cargoFuncao;
    }

    public function setCargoFuncao(?EntityInterface $cargoFuncao): self
    {
        $this->cargoFuncao = $cargoFuncao;
        $this->setVisited('cargoFuncao');
        return $this;
    }

    public function getServidorSubstituto(): ?EntityInterface
    {
        return $this->servidorSubstituto;
    }

    public function setServidorSubstituto(?EntityInterface $servidorSubstituto): self
    {
        $this->servidorSubstituto = $servidorSubstituto;
        $this->setVisited('servidorSubstituto');
        return $this;
    }

    public function getTipoOcupacao(): ?EntityInterface
    {
        return $this->tipoOcupacao;
    }

    public function setTipoOcupacao(?EntityInterface $tipoOcupacao): self
    {
        $this->tipoOcupacao = $tipoOcupacao;
        $this->setVisited('tipoOcupacao');
        return $this;
    }

    public function getRh(): ?EntityInterface
    {
        return $this->rh;
    }

    public function setRh(?EntityInterface $rh): self
    {
        $this->rh = $rh;
        $this->setVisited('rh');
        return $this;
    }

}
