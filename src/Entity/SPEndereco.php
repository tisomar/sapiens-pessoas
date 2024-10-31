<?php

declare(strict_types=1);
/**
 * /src/Entity/SPEndereco.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\SigepeServidor;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Blameable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class SPEndereco.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_endereco')]
class SPEndereco implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
   // use Blameable;
    use SPTimestampable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Assert\Length(max: 8, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Assert\Regex(pattern: '/\d{8}/', message: 'CEP Inválido!')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cep = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $logradouro = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $numero = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $complemento = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $bairro = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeMunicipio')]
    #[ORM\JoinColumn(name: 'sigepe_municipio_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeMunicipio $municipio = null;

    #[Assert\Length(max: 2, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $uf = null;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'boolean', nullable: false)]
    protected bool $origemSigepe = false;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $observacao = null;

    #[ORM\JoinColumn(name: 'tipo_endereco_id', referencedColumnName: 'ID_TIPO_ENDERECO')]
    #[ORM\ManyToOne(targetEntity: 'TipoEndereco')]
    protected ?TipoEndereco $tipo;


    public function __construct()
    {
        $this->setUuid();
    }

    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    public function setBairro(?string $bairro): self
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCep(): ?string
    {
        return $this->cep;
    }

    public function setCep(?string $cep): self
    {
        $this->cep = $cep;

        return $this;
    }

    public function getMunicipio(): ?SPSigepeMunicipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?SPSigepeMunicipio $municipio): self
    {
        $this->municipio = $municipio;

        return $this;
    }

    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    public function setComplemento(?string $complemento): self
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getLogradouro(): ?string
    {
        return $this->logradouro;
    }

    public function setLogradouro(?string $logradouro): self
    {
        $this->logradouro = $logradouro;

        return $this;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $numero): self
    {
        $this->numero = $numero;

        return $this;
    }

    public function getOrigemSigepe(): bool
    {
        return $this->origemSigepe;
    }

    public function setOrigemSigepe(bool $origemSigepe): self
    {
        $this->origemSigepe = $origemSigepe;

        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;

        return $this;
    }

    public function getUf(): ?string
    {
        return $this->uf;
    }

    public function setUf(?string $uf): self
    {
        $this->uf = $uf;

        return $this;
    }

    public function getTipo(): ?TipoEndereco
    {
        return $this->tipo;
    }

    public function setTipo(?TipoEndereco $tipoEndereco): self
    {
        $this->tipo = $tipoEndereco;
        return $this;
    }
}
