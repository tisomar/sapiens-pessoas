<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeDocumentacao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\Agencia;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\DTO\SPSigepeMunicipio;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SPSigepeDocumentacao.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/documentacao/{id}',
    jsonLDType: 'SPSigepeDocumentacao',
    jsonLDContext: '/api/doc/#model-SPSigepeDocumentacao'
)]
#[Form\Form]
class SPSigepeDadosBancarios extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    //use Blameable;
    use SPSoftdeleteable;
    use SigepeServidor;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $matricula = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $codBanco = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomeBanco = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Agencia',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: Agencia::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Agencia')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $agencia = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $contaCorrente = null;



    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $codBancoOutrosPgto = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomeBancoOutrosPgto = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeServidor',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: Agencia::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Agencia')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $agenciaOutrosPgto = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\Digits]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $contaCorrenteOutrosPgto = null;

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
     * @return EntityInterface|null
     */
    public function getAgencia(): ?EntityInterface
    {
        return $this->agencia;
    }

    /**
     * @param EntityInterface|null $agencia
     * @return SPSigepeDadosBancarios
     */
    public function setAgencia(?EntityInterface $agencia): SPSigepeDadosBancarios
    {
        $this->agencia = $agencia;
        $this->setVisited('agencia');
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
     * @return EntityInterface|null
     */
    public function getAgenciaOutrosPgto(): ?EntityInterface
    {
        return $this->agenciaOutrosPgto;
    }

    /**
     * @param EntityInterface|null $agenciaOutrosPgto
     * @return SPSigepeDadosBancarios
     */
    public function setAgenciaOutrosPgto(?EntityInterface $agenciaOutrosPgto): SPSigepeDadosBancarios
    {
        $this->agenciaOutrosPgto = $agenciaOutrosPgto;
        $this->setVisited('agenciaOutrosPgto');
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
