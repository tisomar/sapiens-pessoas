<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Api\V1\DTO\Etnia;
use AguPessoas\Backend\Api\V1\DTO\TipoServidor;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;
use JMS\Serializer\Annotation as Serializer;

#[DTOMapper\JsonLD(
    jsonLDId: '/v2/dado_complementar_servidor/{id}',
    jsonLDType: 'DadoComplementarServidor',
    jsonLDContext: '/api/doc/#model-SPServidor'
)]
#[Form\Form]
class SPServidor extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?string $idServidorAguPessoas = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?string $codigoServidorAguPessoas = null;

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
    protected ?string $apelido;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoServidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoServidor')]
    #[OA\Property(ref: new Model(type: TipoServidor::class))]
    protected ?EntityInterface $tipoServidor = null;


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
    protected ?string $emailParticular;


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
    protected ?string $nomeConjuge;

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
    protected ?bool $status;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataObito = null;


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
    protected ?bool $doadorOrgaos = false;

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
    protected ?bool $portadorNecessidadeEspecial = false;

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
    protected ?string $nomeNecessidadeEspecial = null;


    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Etnia',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Etnia')]
    #[OA\Property(ref: new Model(type: Etnia::class))]
    protected ?EntityInterface $etnia = null;

    public function getApelido(): ?string
    {
        return $this->apelido;
    }

    public function setApelido(?string $apelido): self
    {
        $this->apelido = $apelido;
        $this->setVisited('apelido');
        return $this;
    }

    public function getIdServidorAguPessoas(): ?string
    {
        return $this->idServidorAguPessoas;
    }

    public function setIdServidorAguPessoas(?string $idServidorAguPessoas): self
    {
        $this->idServidorAguPessoas = $idServidorAguPessoas;
        $this->setVisited('idServidorAguPessoas');
        return $this;
    }

    public function getCodigoServidorAguPessoas(): ?string
    {
        return $this->codigoServidorAguPessoas;
    }

    public function setCodigoServidorAguPessoas(?string $codigoServidorAguPessoas): self
    {
        $this->codigoServidorAguPessoas = $codigoServidorAguPessoas;
        $this->setVisited('codigoServidorAguPessoas');
        return $this;
    }

    public function getTipoServidor(): ?EntityInterface
    {
        return $this->tipoServidor;
    }

    public function setTipoServidor(?EntityInterface $tipoServidor): self
    {
        $this->setVisited('tipoServidor');
        $this->tipoServidor = $tipoServidor;

        return $this;
    }

    public function getEmailParticular(): ?string
    {
        return $this->emailParticular;
    }

    public function setEmailParticular(?string $emailParticular): self
    {
        $this->emailParticular = $emailParticular;
        $this->setVisited('emailParticular');
        return $this;
    }

    public function getStatus(): bool
    {
        return $this->status;
    }

    public function setStatus(bool $status): self
    {
        $this->status = $status;
        $this->setVisited('status');
        return $this;
    }

    public function getDataObito(): DateTime|string|null
    {
        return $this->dataObito;
    }

    public function setDataObito(?DateTime $dataObito): self
    {
        $this->setVisited('dataObito');
        $this->dataObito = $dataObito;
        return $this;
    }

    public function getEtnia(): ?EntityInterface
    {
        return $this->etnia;
    }

    public function setEtnia(?EntityInterface $etnia): self
    {
        $this->setVisited('etnia');
        $this->etnia = $etnia;

        return $this;
    }

    public function getTipoSanguineo(): ?EntityInterface
    {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo(?EntityInterface $tipoSanguineo): self
    {
        $this->setVisited('tipoSanguineo');
        $this->tipoSanguineo = $tipoSanguineo;

        return $this;
    }

    public function getDoadorOrgaos(): ?bool
    {
        return $this->doadorOrgaos;
    }

    public function setInDoador(?bool $doadorOrgaos): self
    {
        $this->doadorOrgaos = $doadorOrgaos;
        $this->setVisited('doadorOrgaos');
        return $this;
    }

    public function getPortadorNecessidadeEspecial(): ?bool
    {
        return $this->portadorNecessidadeEspecial;
    }

    public function setPortadorNecessidadeEspecial(?bool $portadorNecessidadeEspecial): self
    {
        $this->portadorNecessidadeEspecial = $portadorNecessidadeEspecial;
        $this->setVisited('portadorNecessidadeEspecial');
        return $this;
    }

    public function getNomeNecessidadeEspecial(): ?string
    {
        return $this->nomeNecessidadeEspecial;
    }

    public function setNomeNecessidadeEspecial(?string $nomeNecessidadeEspecial): self
    {
        $this->nomeNecessidadeEspecial = $nomeNecessidadeEspecial;
        $this->setVisited('nomeNecessidadeEspecial');
        return $this;
    }

    public function getNomeConjuge(): ?string
    {
        return $this->nomeConjuge;
    }

    public function setNomeConjuge(?string $nmConjuge): self
    {
        $this->setVisited('nomeConjuge');
        $this->nomeConjuge = $nmConjuge;

        return $this;
    }

}
