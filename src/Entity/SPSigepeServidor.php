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
 * SigepeServidor
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_sigepe_servidor')]
#[UniqueEntity(fields: ['cpf'], message: 'CPF já cadastrado!')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPSigepeServidor implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[Filter\Digits(allowWhitespace: false)]
    #[AppAssert\CpfCnpj]
    #[Assert\Length(max: 11, maxMessage: 'O campo deve ter no máximo 11 caracteres!')]
    #[ORM\Column(name: 'cpf', type: 'string', unique: true, nullable: true)]
    protected ?string $cpf = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: false)]
    protected string $nome;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $emailInstitucional = null;

    #[Assert\NotBlank(message: 'Campo não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $identificacaoUnica = null;

    #[ORM\Column(name: 'data_nascimento', type: 'date', nullable: true)]
    #[Assert\GreaterThan('1800-01-01', message: 'A data não pode ser menor que 1800-01-01!')]
    protected ?DateTime $dataNascimento = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_pai', type: 'string', nullable: true)]
    protected ?string $nomePai = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_mae', type: 'string', nullable: true)]
    protected ?string $nomeMae = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeSexo')]
    #[ORM\JoinColumn(name: 'sexo_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeSexo $sexo = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeCor')]
    #[ORM\JoinColumn(name: 'cor_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeCor $cor = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeDeficienciaFisica')]
    #[ORM\JoinColumn(name: 'deficiencia_fisica_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeDeficienciaFisica $deficienciaFisica = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeEstadoCivil')]
    #[ORM\JoinColumn(name: 'estado_civil_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeEstadoCivil $estadoCivil = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeNacionalidade')]
    #[ORM\JoinColumn(name: 'nacionalidade_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeNacionalidade $nacionalidade = null;

    #[ORM\Column(name: 'data_chegada_brasil', type: 'date', nullable: true)]
    protected ?DateTime $dataChegadaBrasil = null;

    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_pais', type: 'string', nullable: true)]
    protected ?string $nomePais = null;

    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'grupo_sanguineo', type: 'string', nullable: true)]
    protected ?string $grupoSaguineo = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_municipio_nascimento', type: 'string', nullable: true)]
    protected ?string $nomeMunicipioNascimento = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'nome_u_nascimento', type: 'string', nullable: true)]
    protected ?string $nomeUfNascimento = null;

    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(name: 'pis_pasep', type: 'string', nullable: true)]
    protected ?string $pisPasep = null;

    #[ORM\OneToOne(mappedBy: 'sigepeServidor',targetEntity: 'SPServidor')]
    protected ?SPServidor $servidor = null;

    #[ORM\OneToOne(mappedBy: 'sigepeServidor',targetEntity: 'SPDadoFuncionalDadosComplementares')]
    protected ?SPDadoFuncionalDadosComplementares $dadoFuncionalComplementar = null;

    #[JoinTable(name: 'sp_sigepe_servidor_curso')]
    #[JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name: 'curso_id', referencedColumnName: 'id')]
    #[ManyToMany(targetEntity: SPSigepeCurso::class)]
    private Collection $cursos;

    #[JoinTable(name: 'sp_sigepe_servidor_titulacao')]
    #[JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id')]
    #[InverseJoinColumn(name: 'titulacao_id', referencedColumnName: 'id')]
    #[ManyToMany(targetEntity: SPSigepeTitulacao::class)]
    private Collection $titulacoes;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeEscolaridade')]
    #[ORM\JoinColumn(name: 'escolaridade_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeEscolaridade $escolaridade = null;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<SPEndereco>
     */
    #[ORM\OneToMany(mappedBy: 'sigepeServidor', targetEntity: 'SPEndereco')]
    protected $enderecos;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<SPTelefone>
     */
    #[ORM\OneToMany(mappedBy: 'sigepeServidor', targetEntity: 'SPTelefone')]
    protected $telefones;

    public function __construct()
    {
        $this->setUuid();
        $this->cursos = new ArrayCollection();
        $this->titulacoes = new ArrayCollection();
        $this->enderecos = new ArrayCollection();
        $this->telefones = new ArrayCollection();
    }

    public function getServidor(): ?SPServidor
    {
        return $this->servidor;
    }

    public function setServidor(?SPServidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getCursos(): Collection
    {
        return $this->cursos;
    }

    public function addCurso(SPSigepeCurso $curso): self
    {
        if (!$this->cursos->contains($curso)) {
            $this->cursos->add($curso);
        }

        return $this;
    }

    public function getTitulacoes(): Collection
    {
        return $this->titulacoes;
    }

    public function addTitulacao(SPSigepeTitulacao $titulacao): self
    {
        if (!$this->titulacoes->contains($titulacao)) {
            $this->titulacoes->add($titulacao);
        }

        return $this;
    }

    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    public function getNomePai(): ?string
    {
        return $this->nomePai;
    }

    public function setNomePai(?string $nomePai): void
    {
        $this->nomePai = $nomePai;
    }

    public function getNomeMae(): ?string
    {
        return $this->nomeMae;
    }

    public function setNomeMae(?string $nomeMae): void
    {
        $this->nomeMae = $nomeMae;
    }

    public function getSexo(): ?SPSigepeSexo
    {
        return $this->sexo;
    }

    public function setSexo(?SPSigepeSexo $sexo): void
    {
        $this->sexo = $sexo;
    }

    public function getCor(): ?SPSigepeCor
    {
        return $this->cor;
    }

    public function setCor(?SPSigepeCor $cor): void
    {
        $this->cor = $cor;
    }

    public function getDeficienciaFisica(): ?SPSigepeDeficienciaFisica
    {
        return $this->deficienciaFisica;
    }

    public function setDeficienciaFisica(?SPSigepeDeficienciaFisica $deficienciaFisica): void
    {
        $this->deficienciaFisica = $deficienciaFisica;
    }

    public function getEstadoCivil(): ?SPSigepeEstadoCivil
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(?SPSigepeEstadoCivil $estadoCivil): void
    {
        $this->estadoCivil = $estadoCivil;
    }

    public function getNacionalidade(): ?SPSigepeNacionalidade
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(?SPSigepeNacionalidade $nacionalidade): void
    {
        $this->nacionalidade = $nacionalidade;
    }

    public function getDataChegadaBrasil(): ?DateTime
    {
        return $this->dataChegadaBrasil;
    }

    public function setDataChegadaBrasil(?DateTime $dataChegadaBrasil): void
    {
        $this->dataChegadaBrasil = $dataChegadaBrasil;
    }

    public function getNomePais(): ?string
    {
        return $this->nomePais;
    }

    public function setNomePais(?string $nomePais): void
    {
        $this->nomePais = $nomePais;
    }

    public function getGrupoSaguineo(): ?string
    {
        return $this->grupoSaguineo;
    }

    public function setGrupoSaguineo(?string $grupoSaguineo): void
    {
        $this->grupoSaguineo = $grupoSaguineo;
    }

    public function getNomeMunicipioNascimento(): ?string
    {
        return $this->nomeMunicipioNascimento;
    }

    public function setNomeMunicipioNascimento(?string $nomeMunicipioNascimento): void
    {
        $this->nomeMunicipioNascimento = $nomeMunicipioNascimento;
    }

    public function getNomeUfNascimento(): ?string
    {
        return $this->nomeUfNascimento;
    }

    public function setNomeUfNascimento(?string $nomeUfNascimento): void
    {
        $this->nomeUfNascimento = $nomeUfNascimento;
    }

    public function getPisPasep(): ?string
    {
        return $this->pisPasep;
    }

    public function setPisPasep(?string $pisPasep): void
    {
        $this->pisPasep = $pisPasep;
    }

    public function getEscolaridade(): ?SPSigepeEscolaridade
    {
        return $this->escolaridade;
    }

    public function setEscolaridade(?SPSigepeEscolaridade $escolaridade): void
    {
        $this->escolaridade = $escolaridade;
    }


    public function getEnderecos(): Collection
    {
        return $this->enderecos;
    }

    public function addEndereco(SPEndereco $endereco): self
    {
        if (!$this->enderecos->contains($endereco)) {
            $this->enderecos->add($endereco);
            $endereco->setSigepeServidor($this);
        }

        return $this;
    }

    public function removeEndereco(SPEndereco $endereco): self
    {
        if ($this->enderecos->contains($endereco)) {
            $this->enderecos->removeElement($endereco);
        }

        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function addTelefone(SPTelefone $telefone): self
    {
        if (!$this->telefones->contains($telefone)) {
            $this->telefones->add($telefone);
            $telefone->setSigepeServidor($this);
        }

        return $this;
    }

    public function removeTelefone(SPTelefone $telefone): self
    {
        if ($this->telefones->contains($telefone)) {
            $this->telefones->removeElement($telefone);
        }

        return $this;
    }

    public function getEmailInstitucional(): ?string
    {
        return $this->emailInstitucional;
    }

    public function setEmailInstitucional(?string $emailInstitucional): SPSigepeServidor
    {
        $this->emailInstitucional = $emailInstitucional;
        return $this;
    }

    public function getIdentificacaoUnica(): ?string
    {
        return $this->identificacaoUnica;
    }

    public function setIdentificacaoUnica(?string $identificacaoUnica): SPSigepeServidor
    {
        $this->identificacaoUnica = $identificacaoUnica;
        return $this;
    }

    /**
     * @return SPDadoFuncionalDadosComplementares|null
     */
    public function getDadoFuncionalComplementar(): ?SPDadoFuncionalDadosComplementares
    {
        return $this->dadoFuncionalComplementar;
    }

    /**
     * @param SPDadoFuncionalDadosComplementares|null $dadoFuncionalComplementar
     * @return SPSigepeServidor
     */
    public function setDadoFuncionalComplementar(?SPDadoFuncionalDadosComplementares $dadoFuncionalComplementar): SPSigepeServidor
    {
        $this->dadoFuncionalComplementar = $dadoFuncionalComplementar;
        return $this;
    }



}
