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
    jsonLDId: '/v1/requisicao/{id}',
    jsonLDType: 'Requisicao',
    jsonLDContext: '/api/doc/#model-Requisicao'
)]
#[Form\Form]
class Requisicao extends RestDto
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
    protected ?DateTime $dataInicio;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim;

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
    protected string $situacaoOnus;

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
    protected ?string $matriculaOrigem;


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
    protected string $inCancelado;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?float $valorPrevidencia;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?float $valorRemuneracao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?float $valorBeneficio;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?float $valorTetoRemuneracao;

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
            'class' => 'AguPessoas\Backend\Entity\Cargo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Cargo')]
    protected ?EntityInterface $cargo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    protected ?EntityInterface $norma = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Orgao')]
    protected ?EntityInterface $orgaoDestino = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Orgao')]
    protected ?EntityInterface $orgaoOrigem = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegimeJuridico',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegimeJuridico')]
    protected ?EntityInterface $regimeJuridico = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    protected ?EntityInterface $servidor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoPadrao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoPadrao')]
    protected ?EntityInterface $tipoPadrao = null;

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

    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    public function setDataFim(?DateTime $dataFim): self
    {
        $this->dataFim = $dataFim;
        $this->setVisited('dataFim');
        return $this;
    }

    public function getSituacaoOnus(): string
    {
        return $this->situacaoOnus;
    }

    public function setSituacaoOnus(string $situacaoOnus): self
    {
        $this->situacaoOnus = $situacaoOnus;
        $this->setVisited('situacaoOnus');
        return $this;
    }

    public function getMatriculaOrigem(): ?string
    {
        return $this->matriculaOrigem;
    }

    public function setMatriculaOrigem(?string $matriculaOrigem): self
    {
        $this->matriculaOrigem = $matriculaOrigem;
        $this->setVisited('matriculaOrigem');
        return $this;
    }

    public function getInCancelado(): string
    {
        return $this->inCancelado;
    }

    public function setInCancelado(string $inCancelado): self
    {
        $this->inCancelado = $inCancelado;
        $this->setVisited('inCancelado');
        return $this;
    }

    public function getValorPrevidencia(): ?float
    {
        return $this->valorPrevidencia;
    }

    public function setValorPrevidencia(?float $valorPrevidencia): self
    {
        $this->valorPrevidencia = $valorPrevidencia;
        $this->setVisited('valorPrevidencia');
        return $this;
    }

    public function getValorRemuneracao(): ?float
    {
        return $this->valorRemuneracao;
    }

    public function setValorRemuneracao(?float $valorRemuneracao): self
    {
        $this->valorRemuneracao = $valorRemuneracao;
        $this->setVisited('valorRemuneracao');
        return $this;
    }

    public function getValorBeneficio(): ?float
    {
        return $this->valorBeneficio;
    }

    public function setValorBeneficio(?float $valorBeneficio): self
    {
        $this->valorBeneficio = $valorBeneficio;
        $this->setVisited('valorBeneficio');
        return $this;
    }

    public function getValorTetoRemuneracao(): ?float
    {
        return $this->valorTetoRemuneracao;
    }

    public function setValorTetoRemuneracao(?float $valorTetoRemuneracao): self
    {
        $this->valorTetoRemuneracao = $valorTetoRemuneracao;
        $this->setVisited('valorTetoRemuneracao');
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

    public function getCargo(): ?EntityInterface
    {
        return $this->cargo;
    }

    public function setCargo(?EntityInterface $cargo): self
    {
        $this->cargo = $cargo;
        $this->setVisited('cargo');
        return $this;
    }

    public function getNorma(): ?EntityInterface
    {
        return $this->norma;
    }

    public function setNorma(?EntityInterface $norma): self
    {
        $this->norma = $norma;
        $this->setVisited('norma');
        return $this;
    }

    public function getOrgaoDestino(): ?EntityInterface
    {
        return $this->orgaoDestino;
    }

    public function setOrgaoDestino(?EntityInterface $orgaoDestino): self
    {
        $this->orgaoDestino = $orgaoDestino;
        $this->setVisited('orgaoDestino');
        return $this;
    }

    public function getOrgaoOrigem(): ?EntityInterface
    {
        return $this->orgaoOrigem;
    }

    public function setOrgaoOrigem(?EntityInterface $orgaoOrigem): self
    {
        $this->orgaoOrigem = $orgaoOrigem;
        $this->setVisited('orgaoOrigem');
        return $this;
    }

    public function getRegimeJuridico(): ?EntityInterface
    {
        return $this->regimeJuridico;
    }

    public function setRegimeJuridico(?EntityInterface $regimeJuridico): self
    {
        $this->regimeJuridico = $regimeJuridico;
        $this->setVisited('regimeJuridico');
        return $this;
    }

    public function getServidor(): ?EntityInterface
    {
        return $this->servidor;
    }

    public function setServidor(?EntityInterface $servidor): self
    {
        $this->servidor = $servidor;
        $this->setVisited('servidor');
        return $this;
    }

    public function getTipoPadrao(): ?EntityInterface
    {
        return $this->tipoPadrao;
    }

    public function setTipoPadrao(?EntityInterface $tipoPadrao): self
    {
        $this->tipoPadrao = $tipoPadrao;
        $this->setVisited('tipoPadrao');
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
