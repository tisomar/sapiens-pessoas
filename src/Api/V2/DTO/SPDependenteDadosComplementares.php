<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPDependenteDadosComplementares.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
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
 * Class SPDependenteDadosComplementares.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/dependente/dados_complementares/{id}',
    jsonLDType: 'SPDependenteDadosComplementares',
    jsonLDContext: '/api/doc/#model-SPDependenteDadosComplementares'
)]
#[Form\Form]
class SPDependenteDadosComplementares extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    //use Blameable;
    use SPSoftdeleteable;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeDependente',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPSigepeDependente::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeDependente')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $sigepeDependente = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataNascimento = null;

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
    protected ?string $nomePai;

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
    protected ?string $nomeMae;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataCasamento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $cnDataRegistro = null;

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
    protected ?string $cnNumero = null;

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
    protected ?string $cnLivro = null;

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
    protected ?string $cnFolha = null;

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
    protected ?string $cnCartorio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioAssistencia = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimAssistencia = null;

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
    protected ?string $motivoFimAssistencia = null;

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
    protected ?string $observacao = null;

    /**
     * @return EntityInterface|null
     */
    public function getSigepeDependente(): ?EntityInterface
    {
        return $this->sigepeDependente;
    }

    /**
     * @param EntityInterface|null $sigepeDependente
     * @return SPDependenteDadosComplementares
     */
    public function setSigepeDependente(?EntityInterface $sigepeDependente): SPDependenteDadosComplementares
    {
        $this->sigepeDependente = $sigepeDependente;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    /**
     * @param DateTime|null $dataNascimento
     * @return SPDependenteDadosComplementares
     */
    public function setDataNascimento(?DateTime $dataNascimento): SPDependenteDadosComplementares
    {
        $this->dataNascimento = $dataNascimento;
        $this->setVisited('dataNascimento');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomePai(): ?string
    {
        return $this->nomePai;
    }

    /**
     * @param string|null $nomePai
     * @return SPDependenteDadosComplementares
     */
    public function setNomePai(?string $nomePai): SPDependenteDadosComplementares
    {
        $this->nomePai = $nomePai;
        $this->setVisited('nomePai');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeMae(): ?string
    {
        return $this->nomeMae;
    }

    /**
     * @param string|null $nomeMae
     * @return SPDependenteDadosComplementares
     */
    public function setNomeMae(?string $nomeMae): SPDependenteDadosComplementares
    {
        $this->nomeMae = $nomeMae;
        $this->setVisited('nomeMae');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataCasamento(): ?DateTime
    {
        return $this->dataCasamento;
    }

    /**
     * @param DateTime|null $dataCasamento
     * @return SPDependenteDadosComplementares
     */
    public function setDataCasamento(?DateTime $dataCasamento): SPDependenteDadosComplementares
    {
        $this->dataCasamento = $dataCasamento;
        $this->setVisited('dataCasamento');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getCnDataRegistro(): ?DateTime
    {
        return $this->cnDataRegistro;
    }

    /**
     * @param DateTime|null $cnDataRegistro
     * @return SPDependenteDadosComplementares
     */
    public function setCnDataRegistro(?DateTime $cnDataRegistro): SPDependenteDadosComplementares
    {
        $this->cnDataRegistro = $cnDataRegistro;
        $this->setVisited('cnDataRegistro');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnNumero(): ?string
    {
        return $this->cnNumero;
    }

    /**
     * @param string|null $cnNumero
     * @return SPDependenteDadosComplementares
     */
    public function setCnNumero(?string $cnNumero): SPDependenteDadosComplementares
    {
        $this->cnNumero = $cnNumero;
        $this->setVisited('cnNumero');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnLivro(): ?string
    {
        return $this->cnLivro;
    }

    /**
     * @param string|null $cnLivro
     * @return SPDependenteDadosComplementares
     */
    public function setCnLivro(?string $cnLivro): SPDependenteDadosComplementares
    {
        $this->cnLivro = $cnLivro;
        $this->setVisited('cnLivro');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnFolha(): ?string
    {
        return $this->cnFolha;
    }

    /**
     * @param string|null $cnFolha
     * @return SPDependenteDadosComplementares
     */
    public function setCnFolha(?string $cnFolha): SPDependenteDadosComplementares
    {
        $this->cnLivro = $cnFolha;
        $this->setVisited('cnLivro');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCnCartorio(): ?string
    {
        return $this->cnCartorio;
    }

    /**
     * @param string|null $cnCartorio
     * @return SPDependenteDadosComplementares
     */
    public function setCnCartorio(?string $cnCartorio): SPDependenteDadosComplementares
    {
        $this->cnCartorio = $cnCartorio;
        $this->setVisited('cnCartorio');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioAssistencia(): ?DateTime
    {
        return $this->dataInicioAssistencia;
    }

    /**
     * @param DateTime|null $dataInicioAssistencia
     * @return SPDependenteDadosComplementares
     */
    public function setDataInicioAssistencia(?DateTime $dataInicioAssistencia): SPDependenteDadosComplementares
    {
        $this->dataInicioAssistencia = $dataInicioAssistencia;
        $this->setVisited('dataInicioAssistencia');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimAssistencia(): ?DateTime
    {
        return $this->dataFimAssistencia;
    }

    /**
     * @param DateTime|null $dataFimAssistencia
     * @return SPDependenteDadosComplementares
     */
    public function setDataFimAssistencia(?DateTime $dataFimAssistencia): SPDependenteDadosComplementares
    {
        $this->dataFimAssistencia = $dataFimAssistencia;
        $this->setVisited('dataFimAssistencia');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMotivoFimAssistencia(): ?string
    {
        return $this->motivoFimAssistencia;
    }

    /**
     * @param string|null $motivoFimAssistencia
     * @return SPDependenteDadosComplementares
     */
    public function setMotivoFimAssistencia(?string $motivoFimAssistencia): SPDependenteDadosComplementares
    {
        $this->motivoFimAssistencia = $motivoFimAssistencia;
        $this->setVisited('motivoFimAssistencia');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    /**
     * @param string|null $observacao
     * @return SPDependenteDadosComplementares
     */
    public function setObservacao(?string $observacao): SPDependenteDadosComplementares
    {
        $this->observacao = $observacao;
        $this->setVisited('observacao');
        return $this;
    }




}
