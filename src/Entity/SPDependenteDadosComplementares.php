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
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//use DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * SigepeServidor
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_dependente_dados_compl')]
#[UniqueEntity(fields: ['sigepeDependente'], message: 'Dados do SigepeDependente já cadastrado!')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPDependenteDadosComplementares implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\OneToOne(targetEntity: 'SPSigepeDependente', inversedBy: 'dadosComplementares')]
    #[ORM\JoinColumn(name: 'sigepe_dependente_id', referencedColumnName: 'id', nullable: false)]
    protected SPSigepeDependente $sigepeDependente;

    #[ORM\Column(name: 'data_nascimento', type: 'date', nullable: true)]
    protected ?DateTime $dataNascimento = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $sexo = null;

    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $nomePai = null;

    #[ORM\Column( type: 'string', nullable: true)]
    protected ?string $nomeMae = null;

    #[ORM\Column(name: 'data_casamento', type: 'date', nullable: true)]
    protected ?DateTime $dataCasamento = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $cnDataRegistro = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnNumero = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnLivro = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnFolha = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $cnCartorio = null;

    #[ORM\Column(name: 'data_inicio_assistencia', type: 'date', nullable: true)]
    protected ?DateTime $dataInicioAssistencia = null;

    #[ORM\Column(name: 'data_fim_assistencia', type: 'date', nullable: true)]
    protected ?DateTime $dataFimAssistencia = null;

    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $motivoFimAssistencia = null;

    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', length: 4000, nullable: true)]
    protected ?string $observacao = null;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return SPSigepeDependente
     */
    public function getSigepeDependente(): SPSigepeDependente
    {
        return $this->sigepeDependente;
    }

    /**
     * @param SPSigepeDependente $sigepeDependente
     * @return SPDependenteDadosComplementares
     */
    public function setSigepeDependente(SPSigepeDependente $sigepeDependente): SPDependenteDadosComplementares
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
        return $this;
    }

    /**
     * @return string|null
     */
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    /**
     * @param string|null $sexo
     * @return SPDependenteDadosComplementares
     */
    public function setSexo(?string $sexo): SPDependenteDadosComplementares
    {
        $this->sexo = $sexo;
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
        $this->cnFolha = $cnFolha;
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
        return $this;
    }



}
