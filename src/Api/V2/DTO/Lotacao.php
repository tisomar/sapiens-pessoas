<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/Lotacao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use DateTime;

/**
 * Class Lotacao.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/lotacao/{id}',
    jsonLDType: 'Lotacao',
    jsonLDContext: '/api/doc/#model-Lotacao'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Lotacao extends RestDto
{

    use Timeblameable;
    use Id;
    use Codigo;
    use Descricao;
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
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected string $sigla;

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
    protected string $inAtivo;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCriacaoLotacao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExtincaoLotacao = null;

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
    protected ?string $emailLotacao;

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
    protected ?int $codigoUorg;

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
    protected ?string $inDificilProvimento;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioUdp = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExpiracaoUdp = null;

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
    protected ?string $inDirecaoSuperior;

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
    protected ?string $codigoSiorg;

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
    protected ?string $tipoNormaUdp;

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
    protected ?string $tipoNormaOds;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Endereco',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Endereco')]
    protected ?EntityInterface $endereco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Lotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Lotacao')]
    protected ?EntityInterface $lotacaoPai = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoLotacao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoLotacao')]
    protected ?EntityInterface $tipoLotacao = null;

    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): self
    {
        $this->sigla = $sigla;
        $this->setVisited('sigla');
        return $this;
    }

    public function getInAtivo(): string
    {
        return $this->inAtivo;
    }

    public function setInAtivo(string $inAtivo): self
    {
        $this->inAtivo = $inAtivo;
        $this->setVisited('inAtivo');
        return $this;
    }

    public function getDataCriacaoLotacao(): ?DateTime
    {
        return $this->dataCriacaoLotacao;
    }

    public function setDataCriacaoLotacao(?DateTime $dtCriacaoLotacao): self
    {
        $this->dataCriacaoLotacao = $dtCriacaoLotacao;
        $this->setVisited('dataCriacaoLotacao');
        return $this;
    }

    public function getDataExtincaoLotacao(): ?DateTime
    {
        return $this->dataExtincaoLotacao;
    }

    public function setDataExtincaoLotacao(?DateTime $dataExtincaoLotacao): self
    {
        $this->dataExtincaoLotacao = $dataExtincaoLotacao;
        $this->setVisited('dataExtincaoLotacao');
        return $this;
    }

    public function getEmailLotacao(): ?string
    {
        return $this->emailLotacao;
    }

    public function setEmailLotacao(?string $emailLotacao): self
    {
        $this->emailLotacao = $emailLotacao;
        $this->setVisited('emailLotacao');
        return $this;
    }

    public function getCodigoUorg(): ?int
    {
        return $this->codigoUorg;
    }

    public function setCodigoUorg(?int $codigoUorg): self
    {
        $this->codigoUorg = $codigoUorg;
        $this->setVisited('codigoUorg');
        return $this;
    }

    public function getInDificilProvimento(): ?string
    {
        return $this->inDificilProvimento;
    }

    public function setInDificilProvimento(?string $inDificilProvimento): self
    {
        $this->inDificilProvimento = $inDificilProvimento;
        $this->setVisited('inDificilProvimento');
        return $this;
    }

    public function getDataInicioUdp(): ?\DateTime
    {
        return $this->dataInicioUdp;
    }

    public function setDataInicioUdp(?\DateTime $dtInicioUdp): self
    {
        $this->dataInicioUdp = $dtInicioUdp;
        $this->setVisited('dataInicioUdp');
        return $this;
    }

    public function getDataExpiracaoUdp(): ?\DateTime
    {
        return $this->dataExpiracaoUdp;
    }

    public function setDataExpiracaoUdp(?\DateTime $dataExpiracaoUdp): self
    {
        $this->dataExpiracaoUdp = $dataExpiracaoUdp;
        $this->setVisited('dataExpiracaoUdp');
        return $this;
    }

    public function getInDirecaoSuperior(): ?string
    {
        return $this->inDirecaoSuperior;
    }

    public function setInDirecaoSuperior(?string $inDirecaoSuperior): self
    {
        $this->inDirecaoSuperior = $inDirecaoSuperior;
        $this->setVisited('inDirecaoSuperior');
        return $this;
    }

    public function getCodigoSiorg(): ?string
    {
        return $this->codigoSiorg;
    }

    public function setCodigoSiorg(?string $codigoSiorg): self
    {
        $this->codigoSiorg = $codigoSiorg;
        $this->setVisited('codigoSiorg');
        return $this;
    }

    public function getTipoNormaUdp(): ?string
    {
        return $this->tipoNormaUdp;
    }

    public function setTipoNormaUdp(?string $tipoNormaUdp): self
    {
        $this->tipoNormaUdp = $tipoNormaUdp;
        $this->setVisited('tipoNormaUdp');
        return $this;
    }

    public function getTipoNormaOds(): ?string
    {
        return $this->tipoNormaOds;
    }

    public function setTipoNormaOds(?string $tipoNormaOds): self
    {
        $this->tipoNormaOds = $tipoNormaOds;
        $this->setVisited('tipoNormaOds');
        return $this;
    }

    public function getEndereco(): ?EntityInterface
    {
        return $this->endereco;
    }

    public function setEndereco(?EntityInterface $endereco): self
    {
        $this->endereco = $endereco;
        $this->setVisited('endereco');
        return $this;
    }

    public function getLotacaoPai(): ?EntityInterface
    {
        return $this->lotacaoPai;
    }

    public function setLotacaoPai(?EntityInterface $lotacaoPai): self
    {
        $this->lotacaoPai = $lotacaoPai;
        $this->setVisited('lotacaoPai');
        return $this;
    }

    public function getTipoLotacao(): ?EntityInterface
    {
        return $this->tipoLotacao;
    }

    public function setTipoLotacao(?EntityInterface $tipoLotacao): self
    {
        $this->tipoLotacao = $tipoLotacao;
        $this->setVisited('tipoLotacao');
        return $this;
    }

}
