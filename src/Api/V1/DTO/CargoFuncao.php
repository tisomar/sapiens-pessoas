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
    jsonLDId: '/v1/cargo_funcao/{id}',
    jsonLDType: 'CargoFuncao',
    jsonLDContext: '/api/doc/#model-CargoFuncao'
)]
#[Form\Form]
class CargoFuncao extends RestDto
{
    use Id;
    use Codigo;
    use Descricao;
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
    protected ?string $sigla;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCriacaoCargo = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExtincaoCargo = null;

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
    protected string $tipoCargo;

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
    protected string $inOpcao;

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
    protected string $inSubstituto;

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
    protected string $inVantagem;

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
    protected string $inProgressao;

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
            'class' => 'AguPessoas\Backend\Entity\ComissaoEspecificaReduzida',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\ComissaoEspecificaReduzida')]
    protected ?EntityInterface $comissaoEspecificaReduzida = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\FuncaoGratificada',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FuncaoGratificada')]
    protected ?EntityInterface $funcaoGratificada = null;

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
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Lotacao')]
    protected ?EntityInterface $lotacao = null;

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): self
    {
        $this->sigla = $sigla;
        $this->setVisited('sigla');
        return $this;
    }

    function getDataCriacaoCargo(): ?DateTime
    {
        return $this->dataCriacaoCargo;
    }

    public function setDataCriacaoCargo(?DateTime $dataCriacaoCargo): self
    {
        $this->dataCriacaoCargo = $dataCriacaoCargo;
        $this->setVisited('dataCriacaoCargo');
        return $this;
    }

    public function getDataExtincaoCargo(): ?DateTime
    {
        return $this->dataExtincaoCargo;
    }

    public function setDataExtincaoCargo(?DateTime $dataExtincaoCargo): self
    {
        $this->dataExtincaoCargo = $dataExtincaoCargo;
        $this->setVisited('dataExtincaoCargo');
        return $this;
    }

    public function getTipoCargo(): string
    {
        return $this->tipoCargo;
    }

    public function setTipoCargo(string $tipoCargo): self
    {
        $this->tipoCargo = $tipoCargo;
        $this->setVisited('tipoCargo');
        return $this;
    }

    public function getInOpcao(): string
    {
        return $this->inOpcao;
    }

    public function setInOpcao(string $inOpcao): self
    {
        $this->inOpcao = $inOpcao;
        $this->setVisited('inOpcao');
        return $this;
    }

    public function getInSubstituto(): string
    {
        return $this->inSubstituto;
    }

    public function setInSubstituto(string $inSubstituto): self
    {
        $this->inSubstituto = $inSubstituto;
        $this->setVisited('inSubstituto');
        return $this;
    }

    public function getInVantagem(): string
    {
        return $this->inVantagem;
    }

    public function setInVantagem(string $inVantagem): self
    {
        $this->inVantagem = $inVantagem;
        $this->setVisited('inVantagem');
        return $this;
    }

    public function getInProgressao(): string
    {
        return $this->inProgressao;
    }

    public function setInProgressao(string $inProgressao): self
    {
        $this->inProgressao = $inProgressao;
        $this->setVisited('inProgressao');
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

    public function getComissaoEspecificaReduzida(): ?EntityInterface
    {
        return $this->comissaoEspecificaReduzida;
    }

    public function setComissaoEspecificaReduzida(?EntityInterface $comissaoEspecificaReduzida): self
    {
        $this->comissaoEspecificaReduzida = $comissaoEspecificaReduzida;
        $this->setVisited('comissaoEspecificaReduzida');
        return $this;
    }

    public function getFuncaoGratificada(): ?EntityInterface
    {
        return $this->funcaoGratificada;
    }

    public function setFuncaoGratificada(?EntityInterface $funcaoGratificada): self
    {
        $this->funcaoGratificada = $funcaoGratificada;
        $this->setVisited('funcaoGratificada');
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

    public function getLotacao(): ?EntityInterface
    {
        return $this->lotacao;
    }

    public function setLotacao(?EntityInterface $lotacao): self
    {
        $this->lotacao = $lotacao;
        $this->setVisited('lotacao');
        return $this;
    }


}
