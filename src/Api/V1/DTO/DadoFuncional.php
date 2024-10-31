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
    jsonLDId: '/v1/dado_funcional/{id}',
    jsonLDType: 'DadoFuncional',
    jsonLDContext: '/api/doc/#model-DadoFuncional'
)]
#[Form\Form]
class DadoFuncional extends RestDto
{
    use Id;
    use Timeblameable;
    Use CPFOperador;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RescisaoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RescisaoRais')]
    protected ?EntityInterface $rescisaoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoAdmissao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoAdmissao')]
    protected ?EntityInterface $tipoAdmissao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SituacaoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\SituacaoRais')]
    protected ?EntityInterface $situacaoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoSalario',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoSalario')]
    protected ?EntityInterface $tipoSalario = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\VinculoRais',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\VinculoRais')]
    protected ?EntityInterface $vinculoRais = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegimeJuridico',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegimeJuridico')]
    protected ?EntityInterface $regimeJuridico = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\AreaAtuacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\AreaAtuacao')]
    protected ?EntityInterface $areaAtuacao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoOrgao = null;

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
    protected ?string $matriculaSiape;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoRegimeJuridico = null;

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

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataRescisao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoServicoPublico = null;

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

    public function getRescisaoRais(): ?EntityInterface
    {
        return $this->rescisaoRais;
    }

    public function setRescisaoRais(?EntityInterface $rescisaoRais): self
    {
        $this->setVisited('rescisaoRais');
        $this->rescisaoRais = $rescisaoRais;

        return $this;
    }

    public function getTipoAdmissao(): ?EntityInterface
    {
        return $this->tipoAdmissao;
    }

    public function setTipoAdmissao(?EntityInterface $tipoAdmissao): self
    {
        $this->setVisited('tipoAdmissao');
        $this->tipoAdmissao = $tipoAdmissao;

        return $this;
    }

    public function getSituacaoRais(): ?EntityInterface
    {
        return $this->situacaoRais;
    }

    public function setSituacaoRais(?EntityInterface $situacaoRais): self
    {
        $this->setVisited('situacaoRais');
        $this->situacaoRais = $situacaoRais;

        return $this;
    }

    public function getTipoSalario(): ?EntityInterface
    {
        return $this->tipoSalario;
    }

    public function setTipoSalario(?EntityInterface $tipoSalario): self
    {
        $this->setVisited('tipoSalario');
        $this->tipoSalario = $tipoSalario;

        return $this;
    }

    public function getVinculoRais(): ?EntityInterface
    {
        return $this->vinculoRais;
    }

    public function setVinculoRais(?EntityInterface $vinculoRais): self
    {
        $this->setVisited('vinculoRais');
        $this->vinculoRais = $vinculoRais;

        return $this;
    }

    public function getRegimeJuridico(): ?EntityInterface
    {
        return $this->regimeJuridico;
    }

    public function setRegimeJuridico(?EntityInterface $regimeJuridico): self
    {
        $this->setVisited('regimeJuridico');
        $this->regimeJuridico = $regimeJuridico;

        return $this;
    }

    public function getAreaAtuacao(): ?EntityInterface
    {
        return $this->areaAtuacao;
    }

    public function setAreaAtuacao(?EntityInterface $areaAtuacao): self
    {
        $this->setVisited('areaAtuacao');
        $this->areaAtuacao = $areaAtuacao;

        return $this;
    }

    public function getDataIngressoOrgao(): DateTime|string|null
    {
        return $this->dataIngressoOrgao;
    }

    public function setDataIngressoOrgao(?DateTime $dataIngressoOrgao): self
    {
        $this->setVisited('dataIngressoOrgao');
        $this->dataIngressoOrgao = $dataIngressoOrgao;
        return $this;
    }

    public function getMatriculaSiape(): ?string
    {
        return $this->matriculaSiape;
    }

    public function setMatriculaSiape(string $matriculaSiape): self
    {
        $this->matriculaSiape = $matriculaSiape;
        $this->setVisited('matriculaSiape');
        return $this;
    }

    public function getDataIngressoRegimeJuridico(): DateTime|string|null
    {
        return $this->dataIngressoRegimeJuridico;
    }

    public function setDataIngressoRegimeJuridico(?DateTime $dataIngressoRegimeJuridico): self
    {
        $this->setVisited('dataIngressoRegimeJuridico');
        $this->dataIngressoRegimeJuridico = $dataIngressoRegimeJuridico;
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

    public function getDataRescisao(): DateTime|string|null
    {
        return $this->dataRescisao;
    }

    public function setDataRescisao(?DateTime $dataRescisao): self
    {
        $this->setVisited('dataRescisao');
        $this->dataRescisao = $dataRescisao;
        return $this;
    }

    public function getDataIngressoServicoPublico(): DateTime|string|null
    {
        return $this->dataIngressoServicoPublico;
    }

    public function setDataIngressoServicoPublico(?DateTime $dataIngressoServicoPublico): self
    {
        $this->setVisited('dataIngressoServicoPublico');
        $this->dataIngressoServicoPublico = $dataIngressoServicoPublico;
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
