<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\RescisaoRais;
use AguPessoas\Backend\Entity\SituacaoRais;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/dado_bancario/{id}',
    jsonLDType: 'DadoBancario',
    jsonLDContext: '/api/doc/#model-DadoBancario'
)]
#[Form\Form]
class DadoBancario extends RestDto
{
    use Id;
    use Codigo;
    use Timeblameable;
    Use CPFOperador;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataOpcao = null;

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
    protected string $numeroConta;

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
    protected string $inAtiva;

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
    protected ?string $digitoConta;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Agencia',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Agencia')]
    protected ?EntityInterface $agencia = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoConta',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoConta')]
    protected ?EntityInterface $tipoConta = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    protected ?EntityInterface $servidor = null;

    public function getDataOpcao(): ?DateTime
    {
        return $this->dataOpcao;
    }

    public function setDataOpcao(?DateTime $dataOpcao): self
    {
        $this->dataOpcao = $dataOpcao;
        $this->setVisited('dataOpcao');
        return $this;
    }

    public function getNumeroConta(): string
    {
        return $this->numeroConta;
    }

    public function setNumeroConta(string $numeroConta): self
    {
        $this->numeroConta = $numeroConta;
        $this->setVisited('numeroConta');
        return $this;
    }

    public function getInAtiva(): string
    {
        return $this->inAtiva;
    }

    public function setInAtiva(string $inAtiva): self
    {
        $this->inAtiva = $inAtiva;
        $this->setVisited('inAtiva');
        return $this;
    }

    public function getDigitoConta(): ?string
    {
        return $this->digitoConta;
    }

    public function setDigitoConta(?string $digitoConta): self
    {
        $this->digitoConta = $digitoConta;
        $this->setVisited('digitoConta');
        return $this;
    }

    public function getAgencia(): ?EntityInterface
    {
        return $this->agencia;
    }

    public function setAgencia(?EntityInterface $agencia): self
    {
        $this->agencia = $agencia;
        $this->setVisited('agencia');
        return $this;
    }

    public function getTipoConta(): ?EntityInterface
    {
        return $this->tipoConta;
    }

    public function setTipoConta(?EntityInterface $tipoConta): self
    {
        $this->tipoConta = $tipoConta;
        $this->setVisited('tipoConta');
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

}
