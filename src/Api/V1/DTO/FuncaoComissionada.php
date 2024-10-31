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
use AguPessoas\Backend\Entity\CargoFuncao;
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
    jsonLDId: '/v1/funcao_comissionada/{id}',
    jsonLDType: 'FuncaoComissionada',
    jsonLDContext: '/api/doc/#model-FuncaoComissionada'
)]
#[Form\Form]
class FuncaoComissionada extends RestDto
{
    use Id;
    use Timeblameable;
    use Softdeleteable;
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
    protected string $inDireitoAdquirido;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataNomeacao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPosse = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExercicio = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExoneracao = null;

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
    protected ?EntityInterface $normaExoneracao = null;

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
            'class' => 'AguPessoas\Backend\Entity\TipoOpcao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoOpcao')]
    protected ?EntityInterface $tipoOpcao = null;

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
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    protected ?EntityInterface $normaOpcao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    protected ?EntityInterface $normaNomeacao = null;

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
            'class' => 'AguPessoas\Backend\Entity\Rh',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;

    public function getInDireitoAdquirido(): string
    {
        return $this->inDireitoAdquirido;
    }

    public function setInDireitoAdquirido(string $inDireitoAdquirido): self
    {
        $this->inDireitoAdquirido = $inDireitoAdquirido;
        $this->setVisited('inDireitoAdquirido');
        return $this;
    }

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

    public function getDataExoneracao(): ?DateTime
    {
        return $this->dataExoneracao;
    }

    public function setDataExoneracao(?DateTime $dataExoneracao): self
    {
        $this->dataExoneracao = $dataExoneracao;
        $this->setVisited('dataExoneracao');
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

    public function getNormaExoneracao(): ?EntityInterface
    {
        return $this->normaExoneracao;
    }

    public function setNormaExoneracao(?EntityInterface $normaExoneracao): self
    {
        $this->normaExoneracao = $normaExoneracao;
        $this->setVisited('normaExoneracao');
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

    public function getTipoOpcao(): ?EntityInterface
    {
        return $this->tipoOpcao;
    }

    public function setTipoOpcao(?EntityInterface $tipoOpcao): self
    {
        $this->tipoOpcao = $tipoOpcao;
        $this->setVisited('tipoOpcao');
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

    public function getNormaOpcao(): ?EntityInterface
    {
        return $this->normaOpcao;
    }

    public function setNormaOpcao(?EntityInterface $normaOpcao): self
    {
        $this->normaOpcao = $normaOpcao;
        $this->setVisited('normaOpcao');
        return $this;
    }

    public function getNormaNomeacao(): ?EntityInterface
    {
        return $this->normaNomeacao;
    }

    public function setNormaNomeacao(?EntityInterface $normaNomeacao): self
    {
        $this->normaNomeacao = $normaNomeacao;
        $this->setVisited('normaNomeacao');
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
