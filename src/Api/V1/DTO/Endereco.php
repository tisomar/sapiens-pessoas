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
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/endereco/{id}',
    jsonLDType: 'Endereco',
    jsonLDContext: '/api/doc/#model-Endereco'
)]
#[Form\Form]
class Endereco extends RestDto
{
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;
    use Id;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $logradouro;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $complemento;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $bairro;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $cep;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Municipio',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Municipio')]
    protected ?EntityInterface $municipio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoEndereco',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoEndereco')]
    protected ?EntityInterface $tipoEndereco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Uf',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Uf')]
    protected ?EntityInterface $uf = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    protected ?EntityInterface $servidor = null;

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;
        $this->setVisited('logradouro');
        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;
        $this->setVisited('complemento');
        return $this;
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;
        $this->setVisited('bairro');
        return $this;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;
        $this->setVisited('cep');
        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function getMunicipio(): ?EntityInterface
    {
        return $this->municipio;
    }

    public function setMunicipio(?EntityInterface $municipio): self
    {
        $this->setVisited('municipio');
        $this->municipio = $municipio;

        return $this;
    }
    public function getTipoEndereco(): ?EntityInterface
    {
        return $this->tipoEndereco;
    }

    public function setTipoEndereco(?EntityInterface $tipoEndereco): self
    {
        $this->setVisited('tipoEndereco');
        $this->tipoEndereco = $tipoEndereco;

        return $this;
    }

    public function getUf(): ?EntityInterface
    {
        return $this->uf;
    }

    public function setUf(?EntityInterface $uf): self
    {
        $this->setVisited('uf');
        $this->uf = $uf;

        return $this;
    }
    public function getServidor(): ?EntityInterface
    {
        return $this->servidor;
    }

    public function setServidor(?EntityInterface $servidor): void
    {
        $this->servidor = $servidor;
    }

}
