<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Traits\Blameable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SigepeServidor;
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
 * SPSigepeDadoFuncional
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_dado_funcional')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeDadoFuncional implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    use SigepeServidor;
    //use Blameable;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $hash = null;

    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    #[ORM\JoinColumn(name: 'orgao_id', referencedColumnName: 'ID_ORGAO', nullable: true)]
    protected ?Orgao $orgao = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: false)]
    protected ?string $matricula = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeAtividadeFuncional')]
    #[ORM\JoinColumn(name: 'atividade_funcional_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeAtividadeFuncional $atividadeFuncional = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeCargo')]
    #[ORM\JoinColumn(name: 'sigepe_cargo_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeCargo $sigepeCargo = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeClasse')]
    #[ORM\JoinColumn(name: 'sigepe_classe_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeClasse $sigepeClasse = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeFuncao')]
    #[ORM\JoinColumn(name: 'sigepe_funcao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeFuncao $sigepeFuncao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeJornada')]
    #[ORM\JoinColumn(name: 'sigepe_jornada_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeJornada $jornada = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaAposentadoria')]
    #[ORM\JoinColumn(name: 'ocorrencia_aposentadoria_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaAposentadoria $ocorrenciaAposentadoria = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataAposentadoria = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaExclusao')]
    #[ORM\JoinColumn(name: 'ocorrencia_exclusao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaExclusao $ocorrenciaExclusao = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataExclusao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaIngressoOrgao')]
    #[ORM\JoinColumn(name: 'ocorrencia_ingresso_orgao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaIngressoOrgao $ocorrenciaIngressoOrgao = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataIngressoOrgao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaIngressoServicoPublico')]
    #[ORM\JoinColumn(name: 'ocor_ingresso_servico_publ_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaIngressoServicoPublico $ocorrenciaIngressoServicoPublico = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataIngressoServicoPublico = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaIsencaoIr')]
    #[ORM\JoinColumn(name: 'ocorrencia_isencao_ir_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaIsencaoIr $ocorrenciaIsencaoIr = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataInicioIsencaoIR = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataFimIsencaoIR = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaPss')]
    #[ORM\JoinColumn(name: 'ocorrencia_pss_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaPss $ocorrenciaPss = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataInicioPSS = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataFimPSS = null;


    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: false)]
    protected ?string $codigoPadrao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeSituacaoFuncional')]
    #[ORM\JoinColumn(name: 'situacao_funcional_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeSituacaoFuncional $situacaoFuncional = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeUorg')]
    #[ORM\JoinColumn(name: 'uorg_exercicio_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeUorg $uorgExercicio = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeUorg')]
    #[ORM\JoinColumn(name: 'uorg_lotacao_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeUorg $uorgLotacao = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeUpag')]
    #[ORM\JoinColumn(name: 'upag_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeUpag $upag = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $valeTransporteCodigo = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $valeTransporteValor = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $valeArTipo = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $valeArDataInicio = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $valeArDataFim = null;

    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    #[ORM\JoinColumn(name: 'orgao_origem_id', referencedColumnName: 'ID_ORGAO', nullable: true)]
    protected ?Orgao $orgaoOrigem = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $chefiaImediataCPF = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $chefiaImediataEmail = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataExercicioOrgao = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataIngressoFuncao = null;

    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataIngressoNovaFuncao = null;


    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $percentualTS = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $pontuacaoDesempenho = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $nivelCargoSigla = null;


    public function __construct()
    {
        $this->setUuid();
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
     * @return SPSigepeDadoFuncional
     */
    public function setHash(?string $hash): SPSigepeDadoFuncional
    {
        $this->hash = $hash;
        return $this;
    }


    public function getOrgao(): ?Orgao
    {
        return $this->orgao;
    }


    public function setOrgao(?Orgao $orgao): SPSigepeDadoFuncional
    {
        $this->orgao = $orgao;
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
     * @return SPSigepeDadoFuncional
     */
    public function setMatricula(?string $matricula): SPSigepeDadoFuncional
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return SPSigepeAtividadeFuncional|null
     */
    public function getAtividadeFuncional(): ?SPSigepeAtividadeFuncional
    {
        return $this->atividadeFuncional;
    }

    /**
     * @param SPSigepeAtividadeFuncional|null $atividadeFuncional
     * @return SPSigepeDadoFuncional
     */
    public function setAtividadeFuncional(?SPSigepeAtividadeFuncional $atividadeFuncional): SPSigepeDadoFuncional
    {
        $this->atividadeFuncional = $atividadeFuncional;
        return $this;
    }

    /**
     * @return SPSigepeCargo|null
     */
    public function getSigepeCargo(): ?SPSigepeCargo
    {
        return $this->sigepeCargo;
    }

    /**
     * @param SPSigepeCargo|null $sigepeCargo
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeCargo(?SPSigepeCargo $sigepeCargo): SPSigepeDadoFuncional
    {
        $this->sigepeCargo = $sigepeCargo;
        return $this;
    }

    /**
     * @return SPSigepeClasse|null
     */
    public function getSigepeClasse(): ?SPSigepeClasse
    {
        return $this->sigepeClasse;
    }

    /**
     * @param SPSigepeClasse|null $sigepeClasse
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeClasse(?SPSigepeClasse $sigepeClasse): SPSigepeDadoFuncional
    {
        $this->sigepeClasse = $sigepeClasse;
        return $this;
    }

    /**
     * @return SPSigepeFuncao|null
     */
    public function getSigepeFuncao(): ?SPSigepeFuncao
    {
        return $this->sigepeFuncao;
    }

    /**
     * @param SPSigepeFuncao|null $sigepeFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeFuncao(?SPSigepeFuncao $sigepeFuncao): SPSigepeDadoFuncional
    {
        $this->sigepeFuncao = $sigepeFuncao;
        return $this;
    }

    /**
     * @return SPSigepeJornada|null
     */
    public function getJornada(): ?SPSigepeJornada
    {
        return $this->jornada;
    }

    /**
     * @param SPSigepeJornada|null $jornada
     * @return SPSigepeDadoFuncional
     */
    public function setJornada(?SPSigepeJornada $jornada): SPSigepeDadoFuncional
    {
        $this->jornada = $jornada;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaAposentadoria|null
     */
    public function getOcorrenciaAposentadoria(): ?SPSigepeTipoOcorrenciaAposentadoria
    {
        return $this->ocorrenciaAposentadoria;
    }

    /**
     * @param SPSigepeTipoOcorrenciaAposentadoria|null $ocorrenciaAposentadoria
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaAposentadoria(?SPSigepeTipoOcorrenciaAposentadoria $ocorrenciaAposentadoria): SPSigepeDadoFuncional
    {
        $this->ocorrenciaAposentadoria = $ocorrenciaAposentadoria;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataAposentadoria(): ?DateTime
    {
        return $this->dataAposentadoria;
    }

    /**
     * @param DateTime|null $dataAposentadoria
     * @return SPSigepeDadoFuncional
     */
    public function setDataAposentadoria(?DateTime $dataAposentadoria): SPSigepeDadoFuncional
    {
        $this->dataAposentadoria = $dataAposentadoria;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaExclusao|null
     */
    public function getOcorrenciaExclusao(): ?SPSigepeTipoOcorrenciaExclusao
    {
        return $this->ocorrenciaExclusao;
    }

    /**
     * @param SPSigepeTipoOcorrenciaExclusao|null $ocorrenciaExclusao
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaExclusao(?SPSigepeTipoOcorrenciaExclusao $ocorrenciaExclusao): SPSigepeDadoFuncional
    {
        $this->ocorrenciaExclusao = $ocorrenciaExclusao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataExclusao(): ?DateTime
    {
        return $this->dataExclusao;
    }

    /**
     * @param DateTime|null $dataExclusao
     * @return SPSigepeDadoFuncional
     */
    public function setDataExclusao(?DateTime $dataExclusao): SPSigepeDadoFuncional
    {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaIngressoOrgao|null
     */
    public function getOcorrenciaIngressoOrgao(): ?SPSigepeTipoOcorrenciaIngressoOrgao
    {
        return $this->ocorrenciaIngressoOrgao;
    }

    /**
     * @param SPSigepeTipoOcorrenciaIngressoOrgao|null $ocorrenciaIngressoOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIngressoOrgao(?SPSigepeTipoOcorrenciaIngressoOrgao $ocorrenciaIngressoOrgao): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIngressoOrgao = $ocorrenciaIngressoOrgao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoOrgao(): ?DateTime
    {
        return $this->dataIngressoOrgao;
    }

    /**
     * @param DateTime|null $dataIngressoOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoOrgao(?DateTime $dataIngressoOrgao): SPSigepeDadoFuncional
    {
        $this->dataIngressoOrgao = $dataIngressoOrgao;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaIngressoServicoPublico|null
     */
    public function getOcorrenciaIngressoServicoPublico(): ?SPSigepeTipoOcorrenciaIngressoServicoPublico
    {
        return $this->ocorrenciaIngressoServicoPublico;
    }

    /**
     * @param SPSigepeTipoOcorrenciaIngressoServicoPublico|null $ocorrenciaIngressoServicoPublico
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIngressoServicoPublico(?SPSigepeTipoOcorrenciaIngressoServicoPublico $ocorrenciaIngressoServicoPublico): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIngressoServicoPublico = $ocorrenciaIngressoServicoPublico;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoServicoPublico(): ?DateTime
    {
        return $this->dataIngressoServicoPublico;
    }

    /**
     * @param DateTime|null $dataIngressoServicoPublico
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoServicoPublico(?DateTime $dataIngressoServicoPublico): SPSigepeDadoFuncional
    {
        $this->dataIngressoServicoPublico = $dataIngressoServicoPublico;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaIsencaoIr|null
     */
    public function getOcorrenciaIsencaoIr(): ?SPSigepeTipoOcorrenciaIsencaoIr
    {
        return $this->ocorrenciaIsencaoIr;
    }

    /**
     * @param SPSigepeTipoOcorrenciaIsencaoIr|null $ocorrenciaIsencaoIr
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIsencaoIr(?SPSigepeTipoOcorrenciaIsencaoIr $ocorrenciaIsencaoIr): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIsencaoIr = $ocorrenciaIsencaoIr;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioIsencaoIR(): ?DateTime
    {
        return $this->dataInicioIsencaoIR;
    }

    /**
     * @param DateTime|null $dataInicioIsencaoIR
     * @return SPSigepeDadoFuncional
     */
    public function setDataInicioIsencaoIR(?DateTime $dataInicioIsencaoIR): SPSigepeDadoFuncional
    {
        $this->dataInicioIsencaoIR = $dataInicioIsencaoIR;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimIsencaoIR(): ?DateTime
    {
        return $this->dataFimIsencaoIR;
    }

    /**
     * @param DateTime|null $dataFimIsencaoIR
     * @return SPSigepeDadoFuncional
     */
    public function setDataFimIsencaoIR(?DateTime $dataFimIsencaoIR): SPSigepeDadoFuncional
    {
        $this->dataFimIsencaoIR = $dataFimIsencaoIR;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaPss|null
     */
    public function getOcorrenciaPss(): ?SPSigepeTipoOcorrenciaPss
    {
        return $this->ocorrenciaPss;
    }

    /**
     * @param SPSigepeTipoOcorrenciaPss|null $ocorrenciaPss
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaPss(?SPSigepeTipoOcorrenciaPss $ocorrenciaPss): SPSigepeDadoFuncional
    {
        $this->ocorrenciaPss = $ocorrenciaPss;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioPSS(): ?DateTime
    {
        return $this->dataInicioPSS;
    }

    /**
     * @param DateTime|null $dataInicioPSS
     * @return SPSigepeDadoFuncional
     */
    public function setDataInicioPSS(?DateTime $dataInicioPSS): SPSigepeDadoFuncional
    {
        $this->dataInicioPSS = $dataInicioPSS;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimPSS(): ?DateTime
    {
        return $this->dataFimPSS;
    }

    /**
     * @param DateTime|null $dataFimPSS
     * @return SPSigepeDadoFuncional
     */
    public function setDataFimPSS(?DateTime $dataFimPSS): SPSigepeDadoFuncional
    {
        $this->dataFimPSS = $dataFimPSS;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodigoPadrao(): ?string
    {
        return $this->codigoPadrao;
    }

    /**
     * @param string|null $codigoPadrao
     * @return SPSigepeDadoFuncional
     */
    public function setCodigoPadrao(?string $codigoPadrao): SPSigepeDadoFuncional
    {
        $this->codigoPadrao = $codigoPadrao;
        return $this;
    }

    /**
     * @return SPSigepeSituacaoFuncional|null
     */
    public function getSituacaoFuncional(): ?SPSigepeSituacaoFuncional
    {
        return $this->situacaoFuncional;
    }

    /**
     * @param SPSigepeSituacaoFuncional|null $situacaoFuncional
     * @return SPSigepeDadoFuncional
     */
    public function setSituacaoFuncional(?SPSigepeSituacaoFuncional $situacaoFuncional): SPSigepeDadoFuncional
    {
        $this->situacaoFuncional = $situacaoFuncional;
        return $this;
    }

    /**
     * @return SPSigepeUorg|null
     */
    public function getUorgExercicio(): ?SPSigepeUorg
    {
        return $this->uorgExercicio;
    }

    /**
     * @param SPSigepeUorg|null $uorgExercicio
     * @return SPSigepeDadoFuncional
     */
    public function setUorgExercicio(?SPSigepeUorg $uorgExercicio): SPSigepeDadoFuncional
    {
        $this->uorgExercicio = $uorgExercicio;
        return $this;
    }

    /**
     * @return SPSigepeUorg|null
     */
    public function getUorgLotacao(): ?SPSigepeUorg
    {
        return $this->uorgLotacao;
    }

    /**
     * @param SPSigepeUorg|null $uorgLotacao
     * @return SPSigepeDadoFuncional
     */
    public function setUorgLotacao(?SPSigepeUorg $uorgLotacao): SPSigepeDadoFuncional
    {
        $this->uorgLotacao = $uorgLotacao;
        return $this;
    }

    /**
     * @return SPSigepeUpag|null
     */
    public function getUpag(): ?SPSigepeUpag
    {
        return $this->upag;
    }

    /**
     * @param SPSigepeUpag|null $upag
     * @return SPSigepeDadoFuncional
     */
    public function setUpag(?SPSigepeUpag $upag): SPSigepeDadoFuncional
    {
        $this->upag = $upag;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeTransporteCodigo(): ?string
    {
        return $this->valeTransporteCodigo;
    }

    /**
     * @param string|null $valeTransporteCodigo
     * @return SPSigepeDadoFuncional
     */
    public function setValeTransporteCodigo(?string $valeTransporteCodigo): SPSigepeDadoFuncional
    {
        $this->valeTransporteCodigo = $valeTransporteCodigo;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeTransporteValor(): ?string
    {
        return $this->valeTransporteValor;
    }

    /**
     * @param string|null $valeTransporteValor
     * @return SPSigepeDadoFuncional
     */
    public function setValeTransporteValor(?string $valeTransporteValor): SPSigepeDadoFuncional
    {
        $this->valeTransporteValor = $valeTransporteValor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeArTipo(): ?string
    {
        return $this->valeArTipo;
    }

    /**
     * @param string|null $valeArTipo
     * @return SPSigepeDadoFuncional
     */
    public function setValeArTipo(?string $valeArTipo): SPSigepeDadoFuncional
    {
        $this->valeArTipo = $valeArTipo;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getValeArDataInicio(): ?DateTime
    {
        return $this->valeArDataInicio;
    }

    /**
     * @param DateTime|null $valeArDataInicio
     * @return SPSigepeDadoFuncional
     */
    public function setValeArDataInicio(?DateTime $valeArDataInicio): SPSigepeDadoFuncional
    {
        $this->valeArDataInicio = $valeArDataInicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getValeArDataFim(): ?DateTime
    {
        return $this->valeArDataFim;
    }

    /**
     * @param DateTime|null $valeArDataFim
     * @return SPSigepeDadoFuncional
     */
    public function setValeArDataFim(?DateTime $valeArDataFim): SPSigepeDadoFuncional
    {
        $this->valeArDataFim = $valeArDataFim;
        return $this;
    }

    public function getOrgaoOrigem(): ?Orgao
    {
        return $this->orgaoOrigem;
    }

    public function setOrgaoOrigem(?Orgao $orgaoOrigem): SPSigepeDadoFuncional
    {
        $this->orgaoOrigem = $orgaoOrigem;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChefiaImediataCPF(): ?string
    {
        return $this->chefiaImediataCPF;
    }

    /**
     * @param string|null $chefiaImediataCPF
     * @return SPSigepeDadoFuncional
     */
    public function setChefiaImediataCPF(?string $chefiaImediataCPF): SPSigepeDadoFuncional
    {
        $this->chefiaImediataCPF = $chefiaImediataCPF;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChefiaImediataEmail(): ?string
    {
        return $this->chefiaImediataEmail;
    }

    /**
     * @param string|null $chefiaImediataEmail
     * @return SPSigepeDadoFuncional
     */
    public function setChefiaImediataEmail(?string $chefiaImediataEmail): SPSigepeDadoFuncional
    {
        $this->chefiaImediataEmail = $chefiaImediataEmail;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataExercicioOrgao(): ?DateTime
    {
        return $this->dataExercicioOrgao;
    }

    /**
     * @param DateTime|null $dataExercicioOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setDataExercicioOrgao(?DateTime $dataExercicioOrgao): SPSigepeDadoFuncional
    {
        $this->dataExercicioOrgao = $dataExercicioOrgao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoFuncao(): ?DateTime
    {
        return $this->dataIngressoFuncao;
    }

    /**
     * @param DateTime|null $dataIngressoFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoFuncao(?DateTime $dataIngressoFuncao): SPSigepeDadoFuncional
    {
        $this->dataIngressoFuncao = $dataIngressoFuncao;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoNovaFuncao(): ?DateTime
    {
        return $this->dataIngressoNovaFuncao;
    }

    /**
     * @param DateTime|null $dataIngressoNovaFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoNovaFuncao(?DateTime $dataIngressoNovaFuncao): SPSigepeDadoFuncional
    {
        $this->dataIngressoNovaFuncao = $dataIngressoNovaFuncao;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPercentualTS(): ?string
    {
        return $this->percentualTS;
    }

    /**
     * @param string|null $percentualTS
     * @return SPSigepeDadoFuncional
     */
    public function setPercentualTS(?string $percentualTS): SPSigepeDadoFuncional
    {
        $this->percentualTS = $percentualTS;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPontuacaoDesempenho(): ?string
    {
        return $this->pontuacaoDesempenho;
    }

    /**
     * @param string|null $pontuacaoDesempenho
     * @return SPSigepeDadoFuncional
     */
    public function setPontuacaoDesempenho(?string $pontuacaoDesempenho): SPSigepeDadoFuncional
    {
        $this->pontuacaoDesempenho = $pontuacaoDesempenho;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNivelCargoSigla(): ?string
    {
        return $this->nivelCargoSigla;
    }

    /**
     * @param string|null $nivelCargoSigla
     * @return SPSigepeDadoFuncional
     */
    public function setNivelCargoSigla(?string $nivelCargoSigla): SPSigepeDadoFuncional
    {
        $this->nivelCargoSigla = $nivelCargoSigla;
        return $this;
    }



}
