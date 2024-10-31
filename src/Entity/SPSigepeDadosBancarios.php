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
 * Class SPSigepeDadosBancarios.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_sigepe_dados_bancarios')]
class SPSigepeDadosBancarios implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
   // use Blameable;
    use SPTimestampable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $matricula = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $codBanco = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $nomeBanco = null;

    #[ORM\JoinColumn(name: 'agencia_id', referencedColumnName: 'ID_AGENCIA')]
    #[ORM\ManyToOne(targetEntity: 'Agencia')]
    protected ?Agencia $agencia;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $contaCorrente = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $codBancoOutrosPgto = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $nomeBancoOutrosPgto = null;

    #[ORM\JoinColumn(name: 'agencia_outros_pagto_id', referencedColumnName: 'ID_AGENCIA')]
    #[ORM\ManyToOne(targetEntity: 'Agencia')]
    protected ?Agencia $agenciaOutrosPgto = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras ou números')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $contaCorrenteOutrosPgto = null;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeDadosBancarios
     */
    public function setMatricula(?string $matricula): SPSigepeDadosBancarios
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodBanco(): ?string
    {
        return $this->codBanco;
    }

    /**
     * @param string|null $codBanco
     * @return SPSigepeDadosBancarios
     */
    public function setCodBanco(?string $codBanco): SPSigepeDadosBancarios
    {
        $this->codBanco = $codBanco;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeBanco(): ?string
    {
        return $this->nomeBanco;
    }

    /**
     * @param string|null $nomeBanco
     * @return SPSigepeDadosBancarios
     */
    public function setNomeBanco(?string $nomeBanco): SPSigepeDadosBancarios
    {
        $this->nomeBanco = $nomeBanco;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAgencia(): ?Agencia
    {
        return $this->agencia;
    }

    /**
     * @param Agencia|null $agencia
     * @return SPSigepeDadosBancarios
     */
    public function setAgencia(?Agencia $agencia): SPSigepeDadosBancarios
    {
        $this->agencia = $agencia;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContaCorrente(): ?string
    {
        return $this->contaCorrente;
    }

    /**
     * @param string|null $contaCorrente
     * @return SPSigepeDadosBancarios
     */
    public function setContaCorrente(?string $contaCorrente): SPSigepeDadosBancarios
    {
        $this->contaCorrente = $contaCorrente;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodBancoOutrosPgto(): ?string
    {
        return $this->codBancoOutrosPgto;
    }

    /**
     * @param string|null $codBancoOutrosPgto
     * @return SPSigepeDadosBancarios
     */
    public function setCodBancoOutrosPgto(?string $codBancoOutrosPgto): SPSigepeDadosBancarios
    {
        $this->codBancoOutrosPgto = $codBancoOutrosPgto;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeBancoOutrosPgto(): ?string
    {
        return $this->nomeBancoOutrosPgto;
    }

    /**
     * @param string|null $nomeBancoOutrosPgto
     * @return SPSigepeDadosBancarios
     */
    public function setNomeBancoOutrosPgto(?string $nomeBancoOutrosPgto): SPSigepeDadosBancarios
    {
        $this->nomeBancoOutrosPgto = $nomeBancoOutrosPgto;
        return $this;
    }

    /**
     * @return Agencia|null
     */
    public function getAgenciaOutrosPgto(): ?Agencia
    {
        return $this->agenciaOutrosPgto;
    }

    /**
     * @param Agencia $agenciaOutrosPgto
     * @return SPSigepeDadosBancarios
     */
    public function setAgenciaOutrosPgto(?Agencia $agenciaOutrosPgto): SPSigepeDadosBancarios
    {
        $this->agenciaOutrosPgto = $agenciaOutrosPgto;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getContaCorrenteOutrosPgto(): ?string
    {
        return $this->contaCorrenteOutrosPgto;
    }

    /**
     * @param string|null $contaCorrenteOutrosPgto
     * @return SPSigepeDadosBancarios
     */
    public function setContaCorrenteOutrosPgto(?string $contaCorrenteOutrosPgto): SPSigepeDadosBancarios
    {
        $this->contaCorrenteOutrosPgto = $contaCorrenteOutrosPgto;
        return $this;
    }


}
