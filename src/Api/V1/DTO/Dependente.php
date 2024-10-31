<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Id;
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
    jsonLDId: '/v1/dependente/{id}',
    jsonLDType: 'Dependente',
    jsonLDContext: '/api/doc/#model-Dependente'
)]
#[Form\Form]
class Dependente extends RestDto
{
    use Id;
    use Timeblameable;
    Use CPFOperador;

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
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\Length(
        min: 3,
        max: 70,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    protected ?string $nome = null;

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
    protected ?DateTime $dataNascimento = null;

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
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\Length(
        min: 1,
        max: 1,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    #[OA\Property(type: 'string', description: 'M - Masculino ou F - Feminino')]
    protected ?string $sexo = null;

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
    protected ?string $cpfDependente = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCasamento = null;

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
    protected ?string $pai = null;

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
    protected ?string $mae = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    #[OA\Property(type: 'string', description: 'Especificação descritiva para o motivo que levou ao fim dos benefícios pagos ao dependente pela AGU.')]
    protected ?string $motivoFim = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCertidaoNascimento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?string $numeroCertidaoNascimento = null;

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
    protected ?string $livroCertidaoNascimento = null;

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
    protected ?string $folhaCertidaoNascimento = null;

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
    protected ?string $cartorioCertidaoNascimento = null;

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
    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    protected ?string $observacao;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Municipio',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Municipio')]
    #[OA\Property(ref: new Model(type: Municipio::class))]
    protected ?EntityInterface $municipioCertidaoNascimento = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Servidor::class))]
    protected ?EntityInterface $servidor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoParentesco',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoParentesco')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: TipoParentesco::class))]
    protected ?EntityInterface $tipoParentesco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoSanguineo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoSanguineo')]
    #[OA\Property(ref: new Model(type: TipoSanguineo::class))]
    protected ?EntityInterface $tipoSanguineo = null;


    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): self
    {
        $this->nome = $nome;
        $this->setVisited('nome');
        return $this;
    }

    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?DateTime $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;
        $this->setVisited('dataNascimento');
        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(?string $sexo): self
    {
        $this->sexo = $sexo;
        $this->setVisited('sexo');
        return $this;
    }

    public function getCpfDependente(): ?string
    {
        return $this->cpfDependente;
    }

    public function setCpfDependente(?string $cpfDependente): self
    {
        $this->cpfDependente = $cpfDependente;
        $this->setVisited('cpfDependente');
        return $this;
    }

    public function getDataCasamento(): ?DateTime
    {
        return $this->dataCasamento;
    }

    public function setDataCasamento(?DateTime $dataCasamento): self
    {
        $this->dataCasamento = $dataCasamento;
        $this->setVisited('dataCasamento');
        return $this;
    }

    public function getPai(): ?string
    {
        return $this->pai;
    }

    public function setPai(?string $pai): self
    {
        $this->pai = $pai;
        $this->setVisited('pai');
        return $this;
    }

    public function getMae(): ?string
    {
        return $this->mae;
    }

    public function setMae(?string $mae): self
    {
        $this->mae = $mae;
        $this->setVisited('mae');
        return $this;
    }

    public function getDataInicio(): ?\DateTime
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

    public function getMotivoFim(): ?string
    {
        return $this->motivoFim;
    }

    public function setMotivoFim(?string $motivoFim): self
    {
        $this->motivoFim = $motivoFim;
        $this->setVisited('motivoFim');
        return $this;
    }

    public function getDataCertidaoNascimento(): ?DateTime
    {
        return $this->dataCertidaoNascimento;
    }

    public function setDataCertidaoNascimento(?DateTime $dataCertidaoNascimento): self
    {
        $this->dataCertidaoNascimento = $dataCertidaoNascimento;
        $this->setVisited('dataCertidaoNascimento');
        return $this;
    }

    public function getNumeroCertidaoNascimento(): ?string
    {
        return $this->numeroCertidaoNascimento;
    }

    public function setNumeroCertidaoNascimento(?string $numeroCertidaoNascimento): self
    {
        $this->numeroCertidaoNascimento = $numeroCertidaoNascimento;
        $this->setVisited('numeroCertidaoNascimento');
        return $this;
    }

    public function getLivroCertidaoNascimento(): ?string
    {
        return $this->livroCertidaoNascimento;
    }

    public function setLivroCertidaoNascimento(?string $livroCertidaoNascimento): self
    {
        $this->livroCertidaoNascimento = $livroCertidaoNascimento;
        $this->setVisited('livroCertidaoNascimento');
        return $this;
    }

    public function getFolhaCertidaoNascimento(): ?string
    {
        return $this->folhaCertidaoNascimento;
    }

    public function setFolhaCertidaoNascimento(?string $folhaCertidaoNascimento): self
    {
        $this->folhaCertidaoNascimento = $folhaCertidaoNascimento;
        $this->setVisited('folhaCertidaoNascimento');
        return $this;
    }

    public function getCartorioCertidaoNascimento(): ?string
    {
        return $this->cartorioCertidaoNascimento;
    }

    public function setCartorioCertidaoNascimento(?string $cartorioCertidaoNascimento): self
    {
        $this->cartorioCertidaoNascimento = $cartorioCertidaoNascimento;
        $this->setVisited('cartorioCertidaoNascimento');
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

    public function getMunicipioCertidaoNascimento(): ?EntityInterface
    {
        return $this->municipioCertidaoNascimento;
    }

    public function setMunicipioCertidaoNascimento(?EntityInterface $municipioCertidaoNascimento): self
    {
        $this->municipioCertidaoNascimento = $municipioCertidaoNascimento;
        $this->setVisited('municipioCertidaoNascimento');
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

    public function getTipoParentesco(): ?EntityInterface
    {
        return $this->tipoParentesco;
    }

    public function setTipoParentesco(?EntityInterface $tipoParentesco): self
    {
        $this->tipoParentesco = $tipoParentesco;
        $this->setVisited('tipoParentesco');
        return $this;
    }

    public function getTipoSanguineo(): ?EntityInterface
    {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo(?EntityInterface $tipoSanguineo): self
    {
        $this->tipoSanguineo = $tipoSanguineo;
        $this->setVisited('tipoSanguineo');
        return $this;
    }

}
