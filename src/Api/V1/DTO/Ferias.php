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

/**
 * Class Horario.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/ferias/{id}',
    jsonLDType: 'Ferias',
    jsonLDContext: '/api/doc/#model-ferias'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Ferias extends RestDto
{

    use Id;
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;

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
            'class' => 'AguPessoas\Backend\Entity\FeriasParametro',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FeriasParametro')]
    protected ?EntityInterface $feriasParametro = null;

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
    protected ?string $anoExercicio;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioAquisicao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimAquisicao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $diasSolicitado= null;

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
    protected ?string $abono;

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
    protected ?string $decimoTerceiroSalario;

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
    protected ?int $protocolo;
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPagamentoConstitucional= null;
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPagamentoGratificacaoNatal = null;
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataPagamentoAbono= null;
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataProtocolo = null;

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
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicialAbono= null;
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimAbono = null;

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

    public function getFeriasParametro(): ?EntityInterface
    {
        return $this->feriasParametro;
    }

    public function setFeriasParametro(?EntityInterface $feriasParametro): self
    {
        $this->feriasParametro = $feriasParametro;
        $this->setVisited('feriasParametro');
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

    public function getAnoExercicio(): ?string
    {
        return $this->anoExercicio;
    }

    public function setAnoExercicio(?string $anoExercicio): self
    {
        $this->anoExercicio = $anoExercicio;
        $this->setVisited('anoExercicio');
        return $this;
    }

    public function getDataInicioAquisicao(): ?DateTime
    {
        return $this->dataInicioAquisicao;
    }

    public function setDataInicioAquisicao(?DateTime $dataInicioAquisicao): self
    {
        $this->dataInicioAquisicao = $dataInicioAquisicao;
        $this->setVisited('dataInicioAquisicao');
        return $this;
    }

    public function getDataFimAquisicao(): ?DateTime
    {
        return $this->dataFimAquisicao;
    }

    public function setDataFimAquisicao(?DateTime $dataFimAquisicao): self
    {
        $this->dataFimAquisicao = $dataFimAquisicao;
        $this->setVisited('dataFimAquisicao');
        return $this;
    }

    public function getDiasSolicitado(): ?int
    {
        return $this->diasSolicitado;
    }

    public function setDiasSolicitado(?int $diasSolicitado): self
    {
        $this->diasSolicitado = $diasSolicitado;
        $this->setVisited('diasSolicitado');
        return $this;
    }

    public function getAbono(): ?string
    {
        return $this->abono;
    }

    public function setAbono(?string $abono): self
    {
        $this->abono = $abono;
        $this->setVisited('abono');
        return $this;
    }

    public function getDecimoTerceiroSalario(): ?string
    {
        return $this->decimoTerceiroSalario;
    }

    public function setDecimoTerceiroSalario(?string $decimoTerceiroSalario): self
    {
        $this->decimoTerceiroSalario = $decimoTerceiroSalario;
        $this->setVisited('decimoTerceiroSalario');
        return $this;
    }

    public function getProtocolo(): ?int
    {
        return $this->protocolo;
    }

    public function setProtocolo(?int $protocolo): self
    {
        $this->protocolo = $protocolo;
        $this->setVisited('protocolo');
        return $this;
    }

    public function getDataPagamentoConstitucional(): ?DateTime
    {
        return $this->dataPagamentoConstitucional;
    }

    public function setDataPagamentoConstitucional(?DateTime $dataPagamentoConstitucional): self
    {
        $this->dataPagamentoConstitucional = $dataPagamentoConstitucional;
        $this->setVisited('dataPagamentoConstitucional');
        return $this;
    }

    public function getDataPagamentoGratificacaoNatal(): ?DateTime
    {
        return $this->dataPagamentoGratificacaoNatal;
    }

    public function setDataPagamentoGratificacaoNatal(?DateTime $dataPagamentoGratificacaoNatal): self
    {
        $this->dataPagamentoGratificacaoNatal = $dataPagamentoGratificacaoNatal;
        $this->setVisited('dataPagamentoGratificacaoNatal');
        return $this;
    }

    public function getDataPagamentoAbono(): ?DateTime
    {
        return $this->dataPagamentoAbono;
    }

    public function setDataPagamentoAbono(?DateTime $dataPagamentoAbono): self
    {
        $this->dataPagamentoAbono = $dataPagamentoAbono;
        $this->setVisited('dataPagamentoAbono');
        return $this;
    }

    public function getDataProtocolo(): ?DateTime
    {
        return $this->dataProtocolo;
    }

    public function setDataProtocolo(?DateTime $dataProtocolo): self
    {
        $this->dataProtocolo = $dataProtocolo;
        $this->setVisited('dataProtocolo');
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

    public function getDataInicialAbono(): ?DateTime
    {
        return $this->dataInicialAbono;
    }

    public function setDataInicialAbono(?DateTime $dataInicialAbono): self
    {
        $this->dataInicialAbono = $dataInicialAbono;
        $this->setVisited('dataInicialAbono');
        return $this;
    }

    public function getDataFimAbono(): ?DateTime
    {
        return $this->dataFimAbono;
    }

    public function setDataFimAbono(?DateTime $dataFimAbono): self
    {
        $this->dataFimAbono = $dataFimAbono;
        $this->setVisited('dataFimAbono');
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
