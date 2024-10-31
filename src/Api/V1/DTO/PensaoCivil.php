<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Id;
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
    jsonLDId: '/v1/pensao_civil/{id}',
    jsonLDType: 'PensaoCivil',
    jsonLDContext: '/api/doc/#model-PensaoCivil'
)]
#[Form\Form]
class PensaoCivil extends RestDto
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
    #[DTOMapper\Property]
    #[OA\Property(type: 'float', description: 'Número identificando o percentual do salário pago ao beneficiário como pensão civil.')]
    protected ?float $percentual = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim = null;

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
    #[OA\Property(type: 'string', description: 'Especificação descritiva do ato administrativo autorizando e declarando a concessão do benefício de pensão civil.')]
    protected ?string $ato = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property]
    #[OA\Property(type: 'string', format: 'date-time', description: 'Data em que foi publicado o ato administrativo autorizando e declarando a concessão do benefício de pensão civil.')]
    protected ?DateTime $dataAto = null;

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
    #[OA\Property(type: 'string', description: 'Nome do representante legal do beneficiário pensionista em caso de menor idade.')]
    protected ?string $nomeRepresentanteLegal  = null;

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
    protected ?string $cartorio  = null;

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
    protected ?string $livroRegistroCartorio  = null;

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
    protected ?string $folhaRegistroCartorio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioProcuracao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimProcuracao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Norma',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Norma')]
    #[OA\Property(ref: new Model(type: Norma::class))]
    protected ?EntityInterface $norma = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\RepresentanteLegal',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\RepresentanteLegal')]
    #[OA\Property(ref: new Model(type: RepresentanteLegal::class))]
    protected ?EntityInterface $tipoRepresentanteLegal = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Servidor::class))]
    protected ?EntityInterface $servidor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    #[OA\Property(ref: new Model(type: Servidor::class))]
    protected ?EntityInterface $servidorBeneficiario = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoParentesco',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoParentesco')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: TipoParentesco::class))]
    protected ?EntityInterface $tipoParentesco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Uf',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Uf')]
    #[OA\Property(ref: new Model(type: Uf::class))]
    protected ?EntityInterface $ufCartorio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\NaturezaPensaocivil',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\NaturezaPensaocivil')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: NaturezaPensaocivil::class))]
    protected ?EntityInterface $natureza = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Rh',
            'required' => true,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;


    public function getPercentual(): ?float
    {
        return $this->percentual;
    }

    public function setPercentual(?float $percentual): self
    {
        $this->percentual = $percentual;
        $this->setVisited('percentual');
        return $this;
    }

    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(?DateTime $dataInicio): self
    {
        $this->dataInicio = $dataInicio;
        $this->setVisited('dataInicio');
        return $this;
    }

    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    public function setDataFim(?DateTime $dataFim): self
    {
        $this->dataFim = $dataFim;
        $this->setVisited('tipoSanguineo');
        return $this;
    }

    public function getAto(): ?string
    {
        return $this->ato;
    }

    public function setAto(?string $ato): self
    {
        $this->ato = $ato;
        $this->setVisited('ato');
        return $this;
    }

    public function getDataAto(): ?DateTime
    {
        return $this->dataAto;
    }

    public function setDataAto(?DateTime $dataAto): self
    {
        $this->dataAto = $dataAto;
        $this->setVisited('dataAto');
        return $this;
    }

    public function getNomeRepresentanteLegal(): ?string
    {
        return $this->nomeRepresentanteLegal;
    }

    public function setNomeRepresentanteLegal(?string $nomeRepresentanteLegal): self
    {
        $this->nomeRepresentanteLegal = $nomeRepresentanteLegal;
        $this->setVisited('nomeRepresentanteLegal');
        return $this;
    }

    public function getCartorio(): ?string
    {
        return $this->cartorio;
    }

    public function setCartorio(?string $cartorio): self
    {
        $this->cartorio = $cartorio;
        $this->setVisited('cartorio');
        return $this;
    }

    public function getLivroRegistroCartorio(): ?string
    {
        return $this->livroRegistroCartorio;
    }

    public function setLivroRegistroCartorio(?string $livroRegistroCartorio): self
    {
        $this->livroRegistroCartorio = $livroRegistroCartorio;
        $this->setVisited('livroRegistroCartorio');
        return $this;
    }

    public function getFolhaRegistroCartorio(): ?string
    {
        return $this->folhaRegistroCartorio;
    }

    public function setFolhaRegistroCartorio(?string $folhaRegistroCartorio): self
    {
        $this->folhaRegistroCartorio = $folhaRegistroCartorio;
        $this->setVisited('folhaRegistroCartorio');
        return $this;
    }

    public function getDataInicioProcuracao(): ?DateTime
    {
        return $this->dataInicioProcuracao;
    }

    public function setDataInicioProcuracao(?DateTime $dataInicioProcuracao): self
    {
        $this->dataInicioProcuracao = $dataInicioProcuracao;
        $this->setVisited('dataInicioProcuracao');
        return $this;
    }

    public function getDataFimProcuracao(): ?DateTime
    {
        return $this->dataFimProcuracao;
    }

    public function setDataFimProcuracao(?DateTime $dataFimProcuracao): self
    {
        $this->dataFimProcuracao = $dataFimProcuracao;
        $this->setVisited('dataFimProcuracao');
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

    public function getTipoRepresentanteLegal(): ?EntityInterface
    {
        return $this->tipoRepresentanteLegal;
    }

    public function setTipoRepresentanteLegal(?EntityInterface $tipoRepresentanteLegal): self
    {
        $this->tipoRepresentanteLegal = $tipoRepresentanteLegal;
        $this->setVisited('tipoRepresentanteLegal');
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

    public function getServidorBeneficiario(): ?EntityInterface
    {
        return $this->servidorBeneficiario;
    }

    public function setServidorBeneficiario(?EntityInterface $servidorBeneficiario): self
    {
        $this->servidorBeneficiario = $servidorBeneficiario;
        $this->setVisited('servidorBeneficiario');
        return $this;
    }

    public function getTipoParentesco(): ?EntityInterface
    {
        return $this->tipoParentesco;
    }

    public function setTipoParentesco(?EntityInterface $tipoParentesco): self
    {
        $this->tipoParentesco = $tipoParentesco;
        $this->setVisited('tipoParentesco');
        return $this;
    }

    public function getUfCartorio(): ?EntityInterface
    {
        return $this->ufCartorio;
    }

    public function setUfCartorio(?EntityInterface $ufCartorio): self
    {
        $this->ufCartorio = $ufCartorio;
        $this->setVisited('ufCartorio');
        return $this;
    }

    public function getNatureza(): ?EntityInterface
    {
        return $this->natureza;
    }

    public function setNatureza(?EntityInterface $natureza): self
    {
        $this->natureza = $natureza;
        $this->setVisited('natureza');
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
