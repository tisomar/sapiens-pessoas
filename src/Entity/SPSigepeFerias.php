<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Traits\Blameable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping\InverseJoinColumn;
use Doctrine\ORM\Mapping\JoinColumn;
use Doctrine\ORM\Mapping\JoinTable;
use Doctrine\ORM\Mapping\ManyToMany;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//use DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * SPSigepeFerias
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_ferias')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeFerias implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeServidor')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeServidor $sigepeServidor = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $hash = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $matricula = null;

    #[Assert\Length(max: 4, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $anoExercicio = null;

    #[ORM\Column(name: 'data_inicio', type: 'date', nullable: true)]
    protected ?DateTime $dataInicio = null;

    #[ORM\Column(name: 'data_fim', type: 'date', nullable: true)]
    protected ?DateTime $dataFim = null;

    #[ORM\Column(name: 'data_inicio_aquisicao', type: 'date', nullable: true)]
    protected ?DateTime $dataInicioAquisicao = null;

    #[ORM\Column(name: 'data_fim_aquisicao', type: 'date', nullable: true)]
    protected ?DateTime $dataFimAquisicao = null;

    #[Assert\Length(max: 4, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $numeroParcela = null;

    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'integer', nullable: true)]
    protected ?int $qtdDias = null;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'boolean', nullable: true)]
    protected ?bool $parcelaInterrompida = null;

    #[Assert\Length(max: 4, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $diasRestantes = null;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(name: 'parcela_continuacao_interrup', type: 'boolean', nullable: true)]
    protected ?bool $parcelaContinuacaoInterrupcao = null;

    #[ORM\Column(name: 'data_inicio_ferias_interromp', type: 'date', nullable: true)]
    protected ?DateTime $dataInicioFeriasInterrompidas = null;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'boolean', nullable: true)]
    protected ?bool $adiantamentoSalarioFerias = null;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'boolean', nullable: true)]
    protected ?bool $gratificacaoNatalina = null;

    public function __construct()
    {
        $this->setUuid();
    }

    public function getSigepeServidor(): ?SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    public function setSigepeServidor(?SPSigepeServidor $sigepeServidor): void
    {
        $this->sigepeServidor = $sigepeServidor;
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
     * @return bool|null
     */
    public function getParcelaInterrompida(): ?bool
    {
        return $this->parcelaInterrompida;
    }

    /**
     * @param bool|null $parcelaInterrompida
     * @return SPSigepeFerias
     */
    public function setParcelaInterrompida(?bool $parcelaInterrompida): SPSigepeFerias
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
     * @return bool|null
     */
    public function getParcelaContinuacaoInterrupcao(): ?bool
    {
        return $this->parcelaContinuacaoInterrupcao;
    }

    /**
     * @param bool|null $parcelaContinuacaoInterrupcao
     * @return SPSigepeFerias
     */
    public function setParcelaContinuacaoInterrupcao(?bool $parcelaContinuacaoInterrupcao): SPSigepeFerias
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
     * @return bool|null
     */
    public function getAdiantamentoSalarioFerias(): ?bool
    {
        return $this->adiantamentoSalarioFerias;
    }

    /**
     * @param bool|null $adiantamentoSalarioFerias
     * @return SPSigepeFerias
     */
    public function setAdiantamentoSalarioFerias(?bool $adiantamentoSalarioFerias): SPSigepeFerias
    {
        $this->adiantamentoSalarioFerias = $adiantamentoSalarioFerias;
        return $this;
    }

    /**
     * @return bool|null
     */
    public function getGratificacaoNatalina(): ?bool
    {
        return $this->gratificacaoNatalina;
    }

    /**
     * @param bool|null $gratificacaoNatalina
     * @return SPSigepeFerias
     */
    public function setGratificacaoNatalina(?bool $gratificacaoNatalina): SPSigepeFerias
    {
        $this->gratificacaoNatalina = $gratificacaoNatalina;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string|null $hash
     * @return SPSigepeFerias
     */
    public function setHash(?string $hash): SPSigepeFerias
    {
        $this->hash = $hash;
        return $this;
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
     * @return SPSigepeFerias
     */
    public function setMatricula(?string $matricula): SPSigepeFerias
    {
        $this->matricula = $matricula;
        return $this;
    }

}
