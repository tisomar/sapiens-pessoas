<?php

declare(strict_types=1);
/**
 * /src/Api/V2/DTO/SPSigepeFerias.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\DTO\Traits\Hash;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\SPDependenteDadosComplementares;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use Symfony\Component\Validator\Constraints as Assert;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SPSigepeFerias.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/ferias/{id}',
    jsonLDType: 'SPSigepeFerias',
    jsonLDContext: '/api/doc/#model-SPSigepeFerias'
)]
#[Form\Form]
class SPSigepeFerias extends RestDto
{
    use IdUuid;
    use SPTimeblameable;
    //use Blameable;
    use SPSoftdeleteable;
    use SigepeServidor;
    use Hash;


    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
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
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $anoExercicio = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicio = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFim = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioAquisicao = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimAquisicao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $numeroParcela = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $qtdDias = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(type: 'boolean', default: false)]
    #[DTOMapper\Property]
    protected bool $parcelaInterrompida = false;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $diasRestantes = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(type: 'boolean', default: false)]
    #[DTOMapper\Property]
    protected bool $parcelaContinuacaoInterrupcao = false;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioFeriasInterrompidas = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(type: 'boolean', default: false)]
    #[DTOMapper\Property]
    protected bool $adiantamentoSalarioFerias = false;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\CheckboxType',
        options: [
            'required' => false,
        ]
    )]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(type: 'boolean', default: false)]
    #[DTOMapper\Property]
    protected bool $gratificacaoNatalina = false;
    

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeFerias
     */
    public function setMatricula(?string $matricula): SPSigepeFerias
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getAnoExercicio(): ?string
    {
        return $this->anoExercicio;
    }

    /**
     * @param string|null $anoExercicio
     * @return SPSigepeFerias
     */
    public function setAnoExercicio(?string $anoExercicio): SPSigepeFerias
    {
        $this->anoExercicio = $anoExercicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    /**
     * @param DateTime|null $dataInicio
     * @return SPSigepeFerias
     */
    public function setDataInicio(?DateTime $dataInicio): SPSigepeFerias
    {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    /**
     * @param DateTime|null $dataFim
     * @return SPSigepeFerias
     */
    public function setDataFim(?DateTime $dataFim): SPSigepeFerias
    {
        $this->dataFim = $dataFim;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioAquisicao(): ?DateTime
    {
        return $this->dataInicioAquisicao;
    }

    /**
     * @param DateTime|null $dataInicioAquisicao
     * @return SPSigepeFerias
     */
    public function setDataInicioAquisicao(?DateTime $dataInicioAquisicao): SPSigepeFerias
    {
        $this->dataInicioAquisicao = $dataInicioAquisicao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimAquisicao(): ?DateTime
    {
        return $this->dataFimAquisicao;
    }

    /**
     * @param DateTime|null $dataFimAquisicao
     * @return SPSigepeFerias
     */
    public function setDataFimAquisicao(?DateTime $dataFimAquisicao): SPSigepeFerias
    {
        $this->dataFimAquisicao = $dataFimAquisicao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNumeroParcela(): ?string
    {
        return $this->numeroParcela;
    }

    /**
     * @param string|null $numeroParcela
     * @return SPSigepeFerias
     */
    public function setNumeroParcela(?string $numeroParcela): SPSigepeFerias
    {
        $this->numeroParcela = $numeroParcela;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getQtdDias(): ?int
    {
        return $this->qtdDias;
    }

    /**
     * @param int|null $qtdDias
     * @return SPSigepeFerias
     */
    public function setQtdDias(?int $qtdDias): SPSigepeFerias
    {
        $this->qtdDias = $qtdDias;
        return $this;
    }

    /**
     * @return bool
     */
    public function getParcelaInterrompida(): bool
    {
        return $this->parcelaInterrompida;
    }

    /**
     * @param bool $parcelaInterrompida
     * @return SPSigepeFerias
     */
    public function setParcelaInterrompida(bool $parcelaInterrompida): SPSigepeFerias
    {
        $this->parcelaInterrompida = $parcelaInterrompida;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getDiasRestantes(): ?string
    {
        return $this->diasRestantes;
    }

    /**
     * @param string|null $diasRestantes
     * @return SPSigepeFerias
     */
    public function setDiasRestantes(?string $diasRestantes): SPSigepeFerias
    {
        $this->diasRestantes = $diasRestantes;
        return $this;
    }

    /**
     * @return bool
     */
    public function getParcelaContinuacaoInterrupcao(): bool
    {
        return $this->parcelaContinuacaoInterrupcao;
    }

    /**
     * @param bool $parcelaContinuacaoInterrupcao
     * @return SPSigepeFerias
     */
    public function setParcelaContinuacaoInterrupcao(bool $parcelaContinuacaoInterrupcao): SPSigepeFerias
    {
        $this->parcelaContinuacaoInterrupcao = $parcelaContinuacaoInterrupcao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioFeriasInterrompidas(): ?DateTime
    {
        return $this->dataInicioFeriasInterrompidas;
    }

    /**
     * @param DateTime|null $dataInicioFeriasInterrompidas
     * @return SPSigepeFerias
     */
    public function setDataInicioFeriasInterrompidas(?DateTime $dataInicioFeriasInterrompidas): SPSigepeFerias
    {
        $this->dataInicioFeriasInterrompidas = $dataInicioFeriasInterrompidas;
        return $this;
    }

    /**
     * @return bool
     */
    public function getAdiantamentoSalarioFerias(): bool
    {
        return $this->adiantamentoSalarioFerias;
    }

    /**
     * @param bool $adiantamentoSalarioFerias
     * @return SPSigepeFerias
     */
    public function setAdiantamentoSalarioFerias(bool $adiantamentoSalarioFerias): SPSigepeFerias
    {
        $this->adiantamentoSalarioFerias = $adiantamentoSalarioFerias;
        return $this;
    }

    /**
     * @return bool
     */
    public function getGratificacaoNatalina(): bool
    {
        return $this->gratificacaoNatalina;
    }

    /**
     * @param bool $gratificacaoNatalina
     * @return SPSigepeFerias
     */
    public function setGratificacaoNatalina(bool $gratificacaoNatalina): SPSigepeFerias
    {
        $this->gratificacaoNatalina = $gratificacaoNatalina;
        return $this;
    }





}
