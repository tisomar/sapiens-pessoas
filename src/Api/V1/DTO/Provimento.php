<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\CargoEfetivo;
use AguPessoas\Backend\Entity\Norma;
use AguPessoas\Backend\Entity\TipoProvimento;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/provimento/{id}',
    jsonLDType: 'Provimento',
    jsonLDContext: '/api/doc/#model-Provimento'
)]
#[Form\Form]
class Provimento extends RestDto
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
    protected ?DateTime $dataNomeacao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPosse;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExercicio;

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
            'class' => 'AguPessoas\Backend\Entity\TipoProvimento',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoProvimento')]
    protected ?EntityInterface $tipo = null;


    public function getDataNomeacao(): ?DateTime
    {
        return $this->dataNomeacao;
    }

    public function setDataNomeacao(?DateTime $dataNomeacao): self
    {
        $this->dataNomeacao = $dataNomeacao;
        $this->setVisited('dataNomeacao');
        return $this;
    }

    public function getDataPosse(): ?DateTime
    {
        return $this->dataPosse;
    }

    public function setDataPosse(?DateTime $dataPosse): self
    {
        $this->dataPosse = $dataPosse;
        $this->setVisited('dataPosse');
        return $this;
    }

    public function getDataExercicio(): ?DateTime
    {
        return $this->dataExercicio;
    }

    public function setDataExercicio(?DateTime $dataExercicio): self
    {
        $this->dataExercicio = $dataExercicio;
        $this->setVisited('dataExercicio');
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

}
