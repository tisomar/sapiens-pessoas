<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/Cargo.php.
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
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Entity\EntityInterface;
use OpenApi\Attributes as OA;
use DateTime;

/**
 * Class Cargo.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v1/cargo/{id}',
    jsonLDType: 'Cargo',
    jsonLDContext: '/api/doc/#model-Cargo'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class Cargo extends RestDto
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
    #[DTOMapper\Property]
    protected ?int $qtdHoras;

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
    protected ?string $codigoCboOcupacao;

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
    protected ?string $descricaoTcu;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $qtdVagas;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[DTOMapper\Property]
    protected ?int $qtdVagasOcupadas;

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
    protected string $inAtivo;

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
    protected string $inCargoAgu;

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
            'class' => 'AguPessoas\Backend\Entity\TipoSalario',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoSalario')]
    protected ?EntityInterface $tipoSalario = null;

    public function getQtdHoras(): ?int
    {
        return $this->qtdHoras;
    }

    public function setQtdHoras(?int $qtdHoras): self
    {
        $this->qtdHoras = $qtdHoras;
        $this->setVisited('qtdHoras');
        return $this;
    }

    public function getCodigoCboOcupacao(): string
    {
        return $this->codigoCboOcupacao;
    }

    public function setCodigoCboOcupacao(string $codigoCboOcupacao): self
    {
        $this->codigoCboOcupacao = $codigoCboOcupacao;
        $this->setVisited('codigoCboOcupacao');
        return $this;
    }

    public function getDescricaoTcu(): ?string
    {
        return $this->descricaoTcu;
    }

    public function setDescricaoTcu(?string $descricaoTcu): self
    {
        $this->descricaoTcu = $descricaoTcu;
        $this->setVisited('descricaoTcu');
        return $this;
    }

    public function getQtdVagas(): ?int
    {
        return $this->qtdVagas;
    }

    public function setQtdVagas(?int $qtdVagas): self
    {
        $this->qtdVagas = $qtdVagas;
        $this->setVisited('qtdVagas');
        return $this;
    }

    public function getQtdVagasOcupadas(): ?int
    {
        return $this->qtdVagasOcupadas;
    }

    public function setQtdVagasOcupadas(?int $qtdVagasOcupadas): self
    {
        $this->qtdVagasOcupadas = $qtdVagasOcupadas;
        $this->setVisited('qtdVagasOcupadas');
        return $this;
    }

    public function getDataCriacaoCargo(): ?\DateTime
    {
        return $this->dataCriacaoCargo;
    }

    public function setDataCriacaoCargo(?\DateTime $dataCriacaoCargo): self
    {
        $this->dataCriacaoCargo = $dataCriacaoCargo;
        $this->setVisited('dataCriacaoCargo');
        return $this;
    }

    public function getDataExtincaoCargo(): ?\DateTime
    {
        return $this->dataExtincaoCargo;
    }

    public function setDataExtincaoCargo(?\DateTime $dataExtincaoCargo): self
    {
        $this->dataExtincaoCargo = $dataExtincaoCargo;
        $this->setVisited('dataExtincaoCargo');
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

    public function getInCargoAgu(): string
    {
        return $this->inCargoAgu;
    }

    public function setInCargoAgu(string $inCargoAgu): self
    {
        $this->inCargoAgu = $inCargoAgu;
        $this->setVisited('inCargoAgu');
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

    public function getTipoSalario(): ?EntityInterface
    {
        return $this->tipoSalario;
    }

    public function setIdTipoSalario(?EntityInterface $tipoSalario): self
    {
        $this->tipoSalario = $tipoSalario;
        $this->setVisited('tipoSalario');
        return $this;
    }


}
