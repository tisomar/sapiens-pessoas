<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\Lotacao;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/movimentacao/{id}',
    jsonLDType: 'Movimentacao',
    jsonLDContext: '/api/doc/#model-Movimentacao'
)]
#[Form\Form]
class Movimentacao extends RestDto
{
    use Id;
    use Timeblameable;
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
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $inDificilProvimento;


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
    protected ?EntityInterface $orgao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoMovimentacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoMovimentacao')]
    protected ?EntityInterface $tipo = null;

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
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    protected ?EntityInterface $lotacaoExercicio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    protected ?EntityInterface $lotacaoOrigem = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    protected ?EntityInterface $lotacaoLocalizacao = null;

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

    public function getDataFinal(): ?DateTime
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

    public function getInDificilProvimento(): string
    {
        return $this->inDificilProvimento;
    }

    public function setInDificilProvimento(string $inDificilProvimento): self
    {
        $this->inDificilProvimento = $inDificilProvimento;
        $this->setVisited('inDificilProvimento');
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

    public function getOrgao(): ?EntityInterface
    {
        return $this->orgao;
    }

    public function setOrgao(?EntityInterface $orgao): self
    {
        $this->orgao = $orgao;
        $this->setVisited('orgao');
        return $this;
    }

    public function getTipo(): ?EntityInterface
    {
        return $this->tipo;
    }

    public function setTipo(?EntityInterface $tipo): self
    {
        $this->tipo = $tipo;
        $this->setVisited('tipo');
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

    public function getLotacaoExercicio(): ?EntityInterface
    {
        return $this->lotacaoExercicio;
    }

    public function setLotacaoExercicio(?EntityInterface $lotacaoExercicio): self
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
        $this->setVisited('lotacaoExercicio');
        return $this;
    }

    public function getLotacaoOrigem(): ?EntityInterface
    {
        return $this->lotacaoOrigem;
    }

    public function setLotacaoOrigem(?EntityInterface $lotacaoOrigem): self
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
        $this->setVisited('lotacaoOrigem');
        return $this;
    }

    public function getLotacaoLocalizacao(): ?EntityInterface
    {
        return $this->lotacaoLocalizacao;
    }

    public function setLotacaoLocalizacao(?EntityInterface $lotacaoLocalizacao): self
    {
        $this->lotacaoLocalizacao = $lotacaoLocalizacao;
        $this->setVisited('lotacaoLocalizacao');
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
