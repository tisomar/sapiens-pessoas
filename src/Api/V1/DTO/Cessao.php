<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Horario.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use DateTime;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class Horario.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/cessao/{id}',
    jsonLDType: 'Cessao',
    jsonLDContext: '/api/doc/#model-cessao'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Cessao extends RestDto
{

    use Id;
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[OA\Property(ref: new Model(type: Servidor::class))]
    protected ?EntityInterface $servidor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Orgao')]
    #[OA\Property(ref: new Model(type: Orgao::class))]
    protected ?EntityInterface $orgaoOrigem = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Orgao')]
    #[OA\Property(ref: new Model(type: Orgao::class))]
    protected ?EntityInterface $orgaoDestino = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected DateTime $dataInicioCessao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimCessao = null;

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
    protected ?string $dsCargoDestino;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RegimeJuridico',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RegimeJuridico')]
    protected ?EntityInterface $regimeJuridicoDestino = null;

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
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $stOnus;

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
    protected ?string $inCancelado;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $vlPrevidencia = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $vlBeneficios = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $vlRemuneracao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $vlTetoRemuneracao = null;

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
    protected ?string $dsObservacao;

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

    public function getOrgaoOrigem(): ?EntityInterface
    {
        return $this->orgaoOrigem;
    }

    public function setOrgaoOrigem(?EntityInterface $orgaoOrigem): self
    {
        $this->orgaoOrigem = $orgaoOrigem;
        $this->setVisited('orgaoOrigem');
        return $this;
    }

    public function getOrgaoDestino(): ?EntityInterface
    {
        return $this->orgaoDestino;
    }

    public function setOrgaoDestino(?EntityInterface $orgaoDestino): self
    {
        $this->orgaoDestino = $orgaoDestino;
        $this->setVisited('orgaoDestino');
        return $this;
    }

    public function getDataInicioCessao(): DateTime
    {
        return $this->dataInicioCessao;
    }

    public function setDataInicioCessao(DateTime $dataInicioCessao): self
    {
        $this->dataInicioCessao = $dataInicioCessao;
        $this->setVisited('dataInicioCessao');
        return $this;
    }

    public function getDataFimCessao(): ?DateTime
    {
        return $this->dataFimCessao;
    }

    public function setDataFimCessao(?DateTime $dataFimCessao): self
    {
        $this->dataFimCessao = $dataFimCessao;
        $this->setVisited('dataFimCessao');
        return $this;
    }

    public function getDsCargoDestino(): ?string
    {
        return $this->dsCargoDestino;
    }

    public function setDsCargoDestino(?string $dsCargoDestino): self
    {
        $this->dsCargoDestino = $dsCargoDestino;
        $this->setVisited('dsCargoDestino');
        return $this;
    }

    public function getRegimeJuridicoDestino(): ?EntityInterface
    {
        return $this->regimeJuridicoDestino;
    }

    public function setRegimeJuridicoDestino(?EntityInterface $regimeJuridicoDestino): self
    {
        $this->regimeJuridicoDestino = $regimeJuridicoDestino;
        $this->setVisited('regimeJuridicoDestino');
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

    public function getStOnus(): ?string
    {
        return $this->stOnus;
    }

    public function setStOnus(?string $stOnus): self
    {
        $this->stOnus = $stOnus;
        $this->setVisited('stOnus');
        return $this;
    }

    public function getInCancelado(): ?string
    {
        return $this->inCancelado;
    }

    public function setInCancelado(?string $inCancelado): self
    {
        $this->inCancelado = $inCancelado;
        $this->setVisited('inCancelado');
        return $this;
    }

    public function getVlPrevidencia(): ?int
    {
        return $this->vlPrevidencia;
    }

    public function setVlPrevidencia(?int $vlPrevidencia): self
    {
        $this->vlPrevidencia = $vlPrevidencia;
        $this->setVisited('vlPrevidencia');
        return $this;
    }

    public function getVlBeneficios(): ?int
    {
        return $this->vlBeneficios;
    }

    public function setVlBeneficios(?int $vlBeneficios): self
    {
        $this->vlBeneficios = $vlBeneficios;
        $this->setVisited('vlBeneficios');
        return $this;
    }

    public function getVlRemuneracao(): ?int
    {
        return $this->vlRemuneracao;
    }

    public function setVlRemuneracao(?int $vlRemuneracao): self
    {
        $this->vlRemuneracao = $vlRemuneracao;
        $this->setVisited('vlRemuneracao');
        return $this;
    }

    public function getVlTetoRemuneracao(): ?int
    {
        return $this->vlTetoRemuneracao;
    }

    public function setVlTetoRemuneracao(?int $vlTetoRemuneracao): self
    {
        $this->vlTetoRemuneracao = $vlTetoRemuneracao;
        $this->setVisited('vlTetoRemuneracao');
        return $this;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): self
    {
        $this->dsObservacao = $dsObservacao;
        $this->setVisited('dsObservacao');
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
