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
    jsonLDId: '/v1/servidor/documento/{id}',
    jsonLDType: 'DocumentoServidor',
    jsonLDContext: '/api/doc/#model-DocumentoServidor'
)]
#[Form\Form]
class Documentacao extends RestDto
{
    use Id;
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;
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
    protected ?string $inSituacao;

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
    protected string $numero;

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
    protected ?string $orgaoExpedidor;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExpedicao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataValidade = null;

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
    protected ?string $categoria;

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
    protected ?string $zonaEleitoral;

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
    protected ?string $serie = null;

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
    protected ?string $secaoEleitoral;

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
    protected ?string $entidadeClasse = null;

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
    protected ?string $regiaoCertificadoMilitar = null;

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
    protected ?string $registroEleitoral = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Uf',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Uf')]
    protected ?EntityInterface $uf = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoDocumentacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoDocumentacao')]
    protected ?EntityInterface $tipo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Servidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Servidor')]
    protected ?EntityInterface $servidor = null;

    public function getInSituacao(): string
    {
        return $this->inSituacao;
    }

    public function setInSituacao(string $inSituacao): self
    {
        $this->setVisited('inSituacao');
        $this->inSituacao = $inSituacao;
        return $this;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $numero): self
    {
        $this->setVisited('numero');
        $this->numero = $numero;
        return $this;
    }

    public function getOrgaoExpedidor(): ?string
    {
        return $this->orgaoExpedidor;
    }

    public function setOrgaoExpedidor(?string $orgaoExpedidor): self
    {
        $this->setVisited('orgaoExpedidor');
        $this->orgaoExpedidor = $orgaoExpedidor;
        return $this;
    }

    public function getDataExpedicao(): ?\DateTime
    {
        return $this->dataExpedicao;
    }

    public function setDataExpedicao(?\DateTime $dataExpedicao): self
    {
        $this->setVisited('dataExpedicao');
        $this->dataExpedicao = $dataExpedicao;
        return $this;
    }

    public function getDataValidade(): ?\DateTime
    {
        return $this->dataValidade;
    }

    public function setDataValidade(?\DateTime $dataValidade): self
    {
        $this->setVisited('dataValidade');
        $this->dataValidade = $dataValidade;
        return $this;
    }

    public function getCategoria(): ?string
    {
        return $this->categoria;
    }

    public function setCategoria(?string $categoria): self
    {
        $this->setVisited('categoria');
        $this->categoria = $categoria;
        return $this;
    }

    public function getZonaEleitoral(): ?string
    {
        return $this->zonaEleitoral;
    }

    public function setZonaEleitoral(?string $zonaEleitoral): self
    {
        $this->setVisited('zonaEleitoral');
        $this->zonaEleitoral = $zonaEleitoral;
        return $this;
    }

    public function getSerie(): ?string
    {
        return $this->serie;
    }

    public function setSerie(?string $serie): self
    {
        $this->setVisited('serie');
        $this->serie = $serie;
        return $this;
    }

    public function getSecaoEleitoral(): ?string
    {
        return $this->secaoEleitoral;
    }

    public function setSecaoEleitoral(?string $secaoEleitoral): self
    {
        $this->setVisited('secaoEleitoral');
        $this->secaoEleitoral = $secaoEleitoral;
        return $this;
    }

    public function getEntidadeClasse(): ?string
    {
        return $this->entidadeClasse;
    }

    public function setEntidadeClasse(?string $entidadeClasse): self
    {
        $this->setVisited('entidadeClasse');
        $this->entidadeClasse = $entidadeClasse;
        return $this;
    }

    public function getRegiaoCertificadoMilitar(): ?string
    {
        return $this->regiaoCertificadoMilitar;
    }

    public function setRegiaoCertificadoMilitar(?string $regiaoCertificadoMilitar): self
    {
        $this->setVisited('regiaoCertificadoMilitar');
        $this->regiaoCertificadoMilitar = $regiaoCertificadoMilitar;
        return $this;
    }

    public function getRegistroEleitoral(): ?string
    {
        return $this->registroEleitoral;
    }

    public function setRegistroEleitoral(?string $registroEleitoral): self
    {
        $this->setVisited('registroEleitoral');
        $this->registroEleitoral = $registroEleitoral;
        return $this;
    }

    public function getUf(): ?EntityInterface
    {
        return $this->uf;
    }

    public function setUf(?EntityInterface $uf): self
    {
        $this->setVisited('uf');
        $this->uf = $uf;

        return $this;
    }

    public function getTipo(): ?EntityInterface
    {
        return $this->tipo;
    }

    public function setTipo(?EntityInterface $tipo): self
    {
        $this->setVisited('tipo');
        $this->tipo = $tipo;

        return $this;
    }
    public function getServidor(): ?EntityInterface
    {
        return $this->servidor;
    }

    public function setServidor(?EntityInterface $servidor): self
    {

        $this->setVisited('servidor');
        $this->servidor = $servidor;
        return $this;
    }

}
