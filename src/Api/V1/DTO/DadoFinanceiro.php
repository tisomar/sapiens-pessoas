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
    jsonLDId: '/v1/dado_financeiro/{id}',
    jsonLDType: 'DadoFinanceiro',
    jsonLDContext: '/api/doc/#model-DadoFinanceiro'
)]
#[Form\Form]
class DadoFinanceiro extends RestDto
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
    protected string $inCalculaFolhaPagamento;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataOnusOrgao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataSuspensaoPagamento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $percentualTempoServico;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $qtdDependentes;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $qtdDependentesIrrf;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $valorAbatimentoIrrf;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $horaBaseMensal;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Horario',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Horario')]
    protected ?EntityInterface $horario = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegimePrevidenciario',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegimePrevidenciario')]
    protected ?EntityInterface $regimePrevidenciario = null;

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

    public function getInCalculaFolhaPagamento(): string
    {
        return $this->inCalculaFolhaPagamento;
    }

    public function setInCalculaFolhaPagamento(string $inCalculaFolhaPagamento): self
    {
        $this->inCalculaFolhaPagamento = $inCalculaFolhaPagamento;
        $this->setVisited('inCalculaFolhaPagamento');
        return $this;
    }

    public function getDataOnusOrgao(): ?DateTime
    {
        return $this->dataOnusOrgao;
    }

    public function setDataOnusOrgao(?DateTime $dataOnusOrgao): self
    {
        $this->dataOnusOrgao = $dataOnusOrgao;
        $this->setVisited('dataOnusOrgao');
        return $this;
    }

    public function getDataSuspensaoPagamento(): ?DateTime
    {
        return $this->dataSuspensaoPagamento;
    }

    public function setDataSuspensaoPagamento(?DateTime $dataSuspensaoPagamento): self
    {
        $this->dataSuspensaoPagamento = $dataSuspensaoPagamento;
        $this->setVisited('dataSuspensaoPagamento');
        return $this;
    }

    public function getPercentualTempoServico(): ?int
    {
        return $this->percentualTempoServico;
    }

    public function setPercentualTempoServico(?int $percentualTempoServico): self
    {
        $this->percentualTempoServico = $percentualTempoServico;
        $this->setVisited('percentualTempoServico');
        return $this;
    }

    public function getQtdDependentes(): ?int
    {
        return $this->qtdDependentes;
    }

    public function setQtdDependentes(?int $qtdDependentes): self
    {
        $this->qtdDependentes = $qtdDependentes;
        $this->setVisited('qtdDependentes');
        return $this;
    }

    public function getQtdDependentesIrrf(): ?int
    {
        return $this->qtdDependentesIrrf;
    }

    public function setQtdDependentesIrrf(?int $qtdDependentesIrrf): self
    {
        $this->qtdDependentesIrrf = $qtdDependentesIrrf;
        $this->setVisited('qtdDependentesIrrf');
        return $this;
    }

    public function getValorAbatimentoIrrf(): ?int
    {
        return $this->valorAbatimentoIrrf;
    }

    public function setValorAbatimentoIrrf(?int $valorAbatimentoIrrf): self
    {
        $this->valorAbatimentoIrrf = $valorAbatimentoIrrf;
        $this->setVisited('valorAbatimentoIrrf');
        return $this;
    }

    public function getHoraBaseMensal(): ?int
    {
        return $this->horaBaseMensal;
    }

    public function setHoraBaseMensal(?int $horaBaseMensal): self
    {
        $this->horaBaseMensal = $horaBaseMensal;
        $this->setVisited('horaBaseMensal');
        return $this;
    }

    public function getHorario(): ?EntityInterface
    {
        return $this->horario;
    }

    public function setHorario(?EntityInterface $horario): self
    {
        $this->horario = $horario;
        $this->setVisited('codigoSiape');
        return $this;
    }

    public function getRegimePrevidenciario(): ?EntityInterface
    {
        return $this->regimePrevidenciario;
    }

    public function setRegimePrevidenciario(?EntityInterface $regimePrevidenciario): self
    {
        $this->regimePrevidenciario = $regimePrevidenciario;
        $this->setVisited('regimePrevidenciario');
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
