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
    jsonLDId: '/v1/dado_promocao/{id}',
    jsonLDType: 'DadoPromocao',
    jsonLDContext: '/api/doc/#model-DadoPromocao'
)]
#[Form\Form]
class DadoPromocao extends RestDto
{
    use Id;
    use Timeblameable;
    Use CPFOperador;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType'
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?int $qtdDiasCategoriaFuncional;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType'
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?int $qtdDiasServicoCarreira;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType'
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?int $qtdDiasServicoPublico;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType'
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?int $qtdDiasServicoMesario;

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
    protected ?string $classificacaoPne;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoCarreira = null;

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
    protected ?string $inEstagioConfirmatorio;

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
    protected ?string $inTempoEmpresaPublica;

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
    protected ?string $inSubjudice;

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
    protected ?string $inElegivel;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCarreiraPrecedente = null;


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
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;


    public function getQtdDiasCategoriaFuncional(): ?int
    {
        return $this->qtdDiasCategoriaFuncional;
    }

    public function setQtdDiasCategoriaFuncional(?int $qtdDiasCategoriaFuncional): self
    {
        $this->qtdDiasCategoriaFuncional = $qtdDiasCategoriaFuncional;
        $this->setVisited('qtdDiasCategoriaFuncional');
        return $this;
    }

    public function getQtdDiasServicoCarreira(): ?int
    {
        return $this->qtdDiasServicoCarreira;
    }

    public function setQtdDiasServicoCarreira(?int $qtdDiasServicoCarreira): self
    {
        $this->qtdDiasServicoCarreira = $qtdDiasServicoCarreira;
        $this->setVisited('qtdDiasServicoCarreira');
        return $this;
    }

    public function getQtdDiasServicoPublico(): ?int
    {
        return $this->qtdDiasServicoPublico;
    }

    public function setQtdDiasServicoPublico(?int $qtdDiasServicoPublico): self
    {
        $this->qtdDiasServicoPublico = $qtdDiasServicoPublico;
        $this->setVisited('qtdDiasServicoPublico');
        return $this;
    }

    public function getQtdDiasServicoMesario(): ?int
    {
        return $this->qtdDiasServicoMesario;
    }

    public function setQtdDiasServicoMesario(?int $qtdDiasServicoMesario): self
    {
        $this->qtdDiasServicoMesario = $qtdDiasServicoMesario;
        $this->setVisited('qtdDiasServicoMesario');
        return $this;
    }

    public function getClassificacaoPne(): ?string
    {
        return $this->classificacaoPne;
    }

    public function setClassificacaoPne(?string $classificacaoPne): self
    {
        $this->classificacaoPne = $classificacaoPne;
        $this->setVisited('classificacaoPne');
        return $this;
    }

    public function getDataIngressoCarreira(): ?DateTime
    {
        return $this->dataIngressoCarreira;
    }

    public function setDataIngressoCarreira(?DateTime $dataIngressoCarreira): self
    {
        $this->dataIngressoCarreira = $dataIngressoCarreira;
        $this->setVisited('dataIngressoCarreira');
        return $this;
    }

    public function getInEstagioConfirmatorio(): ?string
    {
        return $this->inEstagioConfirmatorio;
    }

    public function setInEstagioConfirmatorio(?string $inEstagioConfirmatorio): self
    {
        $this->inEstagioConfirmatorio = $inEstagioConfirmatorio;
        $this->setVisited('inEstagioConfirmatorio');
        return $this;
    }

    public function getInTempoEmpresaPublica(): ?string
    {
        return $this->inTempoEmpresaPublica;
    }

    public function setInTempoEmpresaPublica(?string $inTempoEmpresaPublica): self
    {
        $this->inTempoEmpresaPublica = $inTempoEmpresaPublica;
        $this->setVisited('inTempoEmpresaPublica');
        return $this;
    }

    public function getInSubjudice(): ?string
    {
        return $this->inSubjudice;
    }

    public function setInSubjudice(?string $inSubjudice): self
    {
        $this->inSubjudice = $inSubjudice;
        $this->setVisited('inSubjudice');
        return $this;
    }

    public function getInElegivel(): ?string
    {
        return $this->inElegivel;
    }

    public function setInElegivel(?string $inElegivel): self
    {
        $this->inElegivel = $inElegivel;
        $this->setVisited('inElegivel');
        return $this;
    }

    public function getDataCarreiraPrecedente(): ?DateTime
    {
        return $this->dataCarreiraPrecedente;
    }

    public function setDataCarreiraPrecedente(?DateTime $dataCarreiraPrecedente): self
    {
        $this->dataCarreiraPrecedente = $dataCarreiraPrecedente;
        $this->setVisited('dataCarreiraPrecedente');
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
