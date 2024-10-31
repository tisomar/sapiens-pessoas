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
use AguPessoas\Backend\Entity\BaseLegal;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/norma/{id}',
    jsonLDType: 'Norma',
    jsonLDContext: '/api/doc/#model-Norma'
)]
#[Form\Form]
class Norma extends RestDto
{
    use Timeblameable;
    use Id;
    use Codigo;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $idSistema;

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
    protected ?string $numeroDocumento;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataDocumento = null;

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
    protected ?string $numeroPublicacao;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPublicacao = null;

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
    protected ?string $processo;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataProcesso = null;

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
    protected ?string $observacao;

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
    protected ?string $inTipoNorma;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoAutoridade',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoAutoridade')]
    protected ?EntityInterface $tipoAutoridade = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoPublicacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoPublicacao')]
    protected ?EntityInterface $tipoPublicacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\BaseLegal',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\BaseLegal')]
    protected ?EntityInterface $baseLegal = null;

    public function getIdSistema(): int
    {
        return $this->idSistema;
    }

    public function setIdSistema(int $idSistema): self
    {
        $this->idSistema = $idSistema;
        $this->setVisited('idSistema');
        return $this;
    }

    public function getNumeroDocumento(): ?string
    {
        return $this->numeroDocumento;
    }

    public function setNumeroDocumento(?string $numeroDocumento): self
    {
        $this->numeroDocumento = $numeroDocumento;
        $this->setVisited('numeroDocumento');
        return $this;
    }

    public function getDataDocumento(): ?DateTime
    {
        return $this->dataDocumento;
    }

    public function setDataDocumento(?DateTime $dataDocumento): self
    {
        $this->dataDocumento = $dataDocumento;
        $this->setVisited('dataDocumento');
        return $this;
    }

    public function getNumeroPublicacao(): ?string
    {
        return $this->numeroPublicacao;
    }

    public function setNumeroPublicacao(?string $numeroPublicacao): self
    {
        $this->numeroPublicacao = $numeroPublicacao;
        $this->setVisited('numeroPublicacao');
        return $this;
    }

    public function getDataPublicacao(): ?DateTime
    {
        return $this->dataPublicacao;
    }

    public function setDataPublicacao(?DateTime $dataPublicacao): self
    {
        $this->dataPublicacao = $dataPublicacao;
        $this->setVisited('dataPublicacao');
        return $this;
    }

    public function getProcesso(): ?string
    {
        return $this->processo;
    }

    public function setProcesso(?string $processo): self
    {
        $this->processo = $processo;
        $this->setVisited('processo');
        return $this;
    }

    public function getDataProcesso(): ?DateTime
    {
        return $this->dataProcesso;
    }

    public function setDataProcesso(?DateTime $dataProcesso): self
    {
        $this->dataProcesso = $dataProcesso;
        $this->setVisited('dataProcesso');
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

    public function getInTipoNorma(): ?string
    {
        return $this->inTipoNorma;
    }

    public function setInTipoNorma(?string $inTipoNorma): self
    {
        $this->inTipoNorma = $inTipoNorma;
        $this->setVisited('inTipoNorma');
        return $this;
    }

    public function getTipoAutoridade(): ?EntityInterface
    {
        return $this->tipoAutoridade;
    }

    public function setTipoAutoridade(?EntityInterface $tipoAutoridade): self
    {
        $this->tipoAutoridade = $tipoAutoridade;
        $this->setVisited('tipoAutoridade');
        return $this;
    }

    public function getTipoPublicacao(): ?EntityInterface
    {
        return $this->tipoPublicacao;
    }

    public function setTipoPublicacao(?EntityInterface $tipoPublicacao): self
    {
        $this->tipoPublicacao = $tipoPublicacao;
        $this->setVisited('tipoPublicacao');
        return $this;
    }

    public function getBaseLegal(): ?EntityInterface
    {
        return $this->baseLegal;
    }

    public function setBaseLegal(?EntityInterface $baseLegal): self
    {
        $this->baseLegal = $baseLegal;
        $this->setVisited('baseLegal');
        return $this;
    }
}
