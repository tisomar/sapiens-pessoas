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
    jsonLDId: '/v1/classe_padrao/{id}',
    jsonLDType: 'ClassePadrao',
    jsonLDContext: '/api/doc/#model-ClassePadrao'
)]
#[Form\Form]
class ClassePadrao extends RestDto
{
    use CPFOperador;
    use Softdeleteable;
    use Timeblameable;
    use Id;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dtClassePadrao = null;

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
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\CargoEfetivo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\CargoEfetivo')]
    protected ?EntityInterface $cargoEfetivo = null;

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
            'class' => 'AguPessoas\Backend\Entity\TipoPadrao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoPadrao')]
    protected ?EntityInterface $tipoPadrao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoProvimento',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoProvimento')]
    protected ?EntityInterface $tipoProvimento = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Rh',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;

    public function getDtClassePadrao(): ?DateTime
    {
        return $this->dtClassePadrao;
    }

    public function setDtClassePadrao(?DateTime $dtClassePadrao): self
    {
        $this->dtClassePadrao = $dtClassePadrao;
        $this->setVisited('dataOcorrencia');
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

    public function getCargoEfetivo(): ?EntityInterface
    {
        return $this->cargoEfetivo;
    }

    public function setCargoEfetivo(?EntityInterface $cargoEfetivo): self
    {
        $this->cargoEfetivo = $cargoEfetivo;
        $this->setVisited('cargoEfetivo');
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

    public function getTipoProvimento(): ?EntityInterface
    {
        return $this->tipoProvimento;
    }

    public function setTipoProvimento(?EntityInterface $tipoProvimento): self
    {
        $this->tipoProvimento = $tipoProvimento;
        $this->setVisited('tipoProvimento');
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
