<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servidor
 */
#[ORM\Table(name: 'SERVIDOR')]
#[ORM\Index(name: 'ix_servidor_instatusservidor', columns: ['IN_STATUS_SERVIDOR'])]
#[ORM\Index(name: 'ix_servidor_nome', columns: ['NM_SERVIDOR_FORMAT'])]
#[ORM\Index(name: 'IDX_3DA6B3BC27D04BF1', columns: ['ID_COR'])]
#[ORM\Index(name: 'IDX_3DA6B3BC5FE9D3C3', columns: ['ID_ESCOLARIDADE'])]
#[ORM\Index(name: 'IDX_3DA6B3BCDC5296', columns: ['ID_ESTADO_CIVIL'])]
#[ORM\Index(name: 'IDX_3DA6B3BC907487AB', columns: ['ID_ETNIA'])]
#[ORM\Index(name: 'IDX_3DA6B3BC1ED96A81', columns: ['ID_FORMACAO'])]
#[ORM\Index(name: 'IDX_3DA6B3BCA4C20307', columns: ['ID_MUNICIPIO'])]
#[ORM\Index(name: 'IDX_3DA6B3BC10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_3DA6B3BC4F2DA3D4', columns: ['ID_TIPO_SANGUINEO'])]
#[ORM\Index(name: 'IDX_3DA6B3BCA83F61F9', columns: ['ID_TIPO_SERVIDOR'])]
#[ORM\UniqueConstraint(name: 'uk_servidor', columns: ['CD_SERVIDOR'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Servidor implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela SERVIDOR'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_SERVIDOR', allocationSize: 1, initialValue: 572321)]
    protected $id;

    #[ORM\Column(name: 'CD_SERVIDOR', type: 'string', length: 20, nullable: false, options: ['comment' => 'Especificação sequencial e única para o código de um servidor, este código é gerado de forma automática pelo sistema no ato do cadastro de um servidor.'])]
    protected string $codigo;

    #[ORM\Column(name: 'CD_SEXO', type: 'string', length: 1, nullable: false, options: ['comment' => 'Identificador para representar o sexo do servidor cadastrado. Codificação: M - Masculino ou F - Feminino.'])]
    protected string $sexo;

    #[ORM\Column(name: 'IN_STATUS_SERVIDOR', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especifica o status do servidor, ou seja, se o servidor está ativo ou não para o RH da AGU. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $status;

    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome completo do servidor cadastrado. É o nome do servidor conforme descrito no seu documento de identificação RG.'])]
    protected string $nome;

    #[ORM\Column(name: 'NM_SERVIDOR_FORMAT', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome simplificado do servidor cadastrado. É o nome de forma abreviado no qual o servidor deseja informar para o cadastro.'])]
    protected ?string $nomeSimples;

    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'datetime', nullable: false, options: ['comment' => 'Data de nascimento do servidor público. É a data de nascimento conforme o registro na certidão de nascimento do servidor.'])]
    protected DateTime $dataNascimento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CADASTRO_SERVIDOR', type: 'datetime', nullable: true, options: ['default' => 'SYSDATE', 'comment' => 'Data em que foi efetuado o cadastro do servidor público no sistema de RH da AGU (AGUPessoas).'])]
    private ?DateTime $dtCadastroServidor;

    #[ORM\Column(name: 'DT_OBITO', type: 'datetime', nullable: true, options: ['comment' => 'Data em que foi dado o óbito do servidor conforme registro na certid??o de óbito emitido pelo orgão competente.'])]
    protected ?DateTime $dataObito;

    #[ORM\Column(name: 'NM_GUERRA', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome personalizado do servidor. É o nome de guerra ou apelido no qual o servidor deseja ser chamado ou conhecido.'])]
    protected ?string $apelido;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_EMAIL', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome do endereço particular de correio eletrônico (Email) do servidor. Será o método que permite compor, enviar e receber mensagens através de um sistema eletrônico de comunicação.'])]
    protected ?string $email;

    #[ORM\Column(name: 'NM_PAI', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo do pai do servidor. É o nome do pai conforme descrito na certidão de nascimento do servidor.'])]
    protected ?string $nomePai;

    #[ORM\Column(name: 'NM_MAE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo da mãe do servidor. É o nome da mãe conforme descrito na certidão de nascimento do servidor.'])]
    protected ?string $nomeMae;

    #[ORM\Column(name: 'NM_CONJUGE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo do conjuge do servidor. É o nome do conjuge conforme descrito na certidão de casamento ou declaração de união estável do servidor.'])]
    protected ?string $nomeConjuge;

    #[ORM\Column(name: 'IN_PORTADOR_NECESS_ESP', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica se o servidor é portador de alguma necessidade especial. Codificaçaõ:  0 - FALSO e 1 - VERDADEIRO.'])]
    protected ?string $inPortadorNecessidadeEspecial = '0';

    #[ORM\Column(name: 'DS_PORTADOR_NECESS_ESP', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a necessidade especial no qual o servidor é portador. O nome, a dependencia e o auxílio necessário para o bem estar do servidor.'])]
    protected ?string $nomeNecessidadeEspecial;

    #[ORM\Column(name: 'IN_DOADOR', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor é doador de orgãos após o óbito. Codificação: 0 - FALSO e 1 - VERDADEIRO.'])]
    protected ?string $inDoador = '0';

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CHEGADA_PAIS', type: 'datetime', nullable: true, options: ['comment' => 'Data em que o servidor (caso seja extrangeiro) chegou ao país (Brasil). Será a identificação do tempo que o servidor encontra-se no país.'])]
    private $dtChegadaPais;

    #[ORM\Column(name: 'NM_EMAIL_INSTITUCIONAL', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome do endereço institucional de correio eletrônico (Email) gerado para o servidor. Será o método que permite compor, enviar e receber mensagens através de um sistema eletrônico de comunicação do orgão a quem o servidor pertence.'])]
    protected ?string $emailInstitucional;

    #[ORM\JoinColumn(name: 'ID_COR', referencedColumnName: 'ID_COR')]
    #[ORM\ManyToOne(targetEntity: 'Cor')]
    protected ?Cor $cor;

    #[ORM\JoinColumn(name: 'ID_ESCOLARIDADE', referencedColumnName: 'ID_ESCOLARIDADE')]
    #[ORM\ManyToOne(targetEntity: 'Escolaridade')]
    protected Escolaridade $escolaridade;

    #[ORM\JoinColumn(name: 'ID_ESTADO_CIVIL', referencedColumnName: 'ID_ESTADO_CIVIL')]
    #[ORM\ManyToOne(targetEntity: 'EstadoCivil')]
    protected EstadoCivil $estadoCivil;

    #[ORM\JoinColumn(name: 'ID_ETNIA', referencedColumnName: 'ID_ETNIA')]
    #[ORM\ManyToOne(targetEntity: 'Etnia')]
    protected ?Etnia $etnia;

    #[ORM\JoinColumn(name: 'ID_FORMACAO', referencedColumnName: 'ID_FORMACAO')]
    #[ORM\ManyToOne(targetEntity: 'FormacaoProfissional')]
    protected ?FormacaoProfissional $formacaoProfissional;

    #[ORM\JoinColumn(name: 'ID_MUNICIPIO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    protected ?Municipio $municipioNascimento;

    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_TIPO_SANGUINEO', referencedColumnName: 'ID_TIPO_SANGUINEO')]
    #[ORM\ManyToOne(targetEntity: 'TipoSanguineo')]
    protected ?TipoSanguineo $tipoSanguineo;

    #[ORM\ManyToOne(targetEntity: 'TipoServidor')]
    #[ORM\JoinColumn(name: 'ID_TIPO_SERVIDOR', referencedColumnName: 'ID_TIPO_SERVIDOR')]
    protected TipoServidor|null $tipoServidor = null;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<Documentacao>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'Documentacao')]
    protected $documentos;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<DadoFuncional>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'DadoFuncional')]
    protected $dadosFuncionais;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<Endereco>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'Endereco')]
    protected $enderecos;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<Telefone>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'Telefone')]
    protected $telefones;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<DadoFinanceiro>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'DadoFinanceiro')]
    protected $dadosFinanceiro;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<DadoBancario>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'DadoBancario')]
    protected $dadosBancario;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<CargoEfetivo>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'CargoEfetivo')]
    protected $cargosEfetivo;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<FuncaoComissionada>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'FuncaoComissionada')]
    protected $funcoesComissionada;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<Aposentadoria>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'Aposentadoria')]
    protected $aposentadorias;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<Movimentacao>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'Movimentacao')]
    protected $movimentacoes;

    /**
     * @var Collection|ArrayCollection|ArrayCollection<DadoPromocao>
     */
    #[ORM\OneToMany(mappedBy: 'servidor', targetEntity: 'DadoPromocao')]
    protected $dadosPromocao;

    #[ORM\Column(name: 'DT_IMPORTACAO_SP', type: 'datetime', nullable: true)]
    protected ?DateTime $dataImportacaoSP;

    #[ORM\Column(name: 'MSG_FALHA_IMPORTACAO_SP', type: 'string', length: 4000, nullable: true)]
    protected ?string $msgFalhaImportacaoSP;

    public function __construct()
    {
        $this->documentos = new ArrayCollection();
        $this->dadosFuncionais = new ArrayCollection();
        $this->enderecos = new ArrayCollection();
        $this->telefones = new ArrayCollection();
        $this->dadosFinanceiro = new ArrayCollection();
        $this->dadosBancario = new ArrayCollection();
        $this->cargosEfetivo = new ArrayCollection();
        $this->funcoesComissionada = new ArrayCollection();
        $this->aposentadorias = new ArrayCollection();
        $this->movimentacoes = new ArrayCollection();
        $this->dadosPromocao = new ArrayCollection();
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $cdServidor): void
    {
        $this->codigo = $cdServidor;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): void
    {
        $this->sexo = $sexo;
    }

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): void
    {
        $this->status = $status;
    }

    /**
     * @return string
     */
    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nmServidor): void
    {
        $this->nome = $nmServidor;
    }

    public function getNomeSimples(): ?string
    {
        return $this->nomeSimples;
    }

    /**
     * @param string|null $nmServidorFormat
     */
    public function setNomeSimples(?string $nmServidorFormat): void
    {
        $this->nomeSimples = $nmServidorFormat;
    }

    public function getDataNascimento(): DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(DateTime $dataNascimento): void
    {
        $this->dataNascimento = $dataNascimento;
    }

    /**
     * @return DateTime|string|null
     */
    public function getDtCadastroServidor(): DateTime|string|null
    {
        return $this->dtCadastroServidor;
    }

    /**
     * @param DateTime|string|null $dtCadastroServidor
     */
    public function setDtCadastroServidor(\DateTime|string|null $dtCadastroServidor): void
    {
        $this->dtCadastroServidor = $dtCadastroServidor;
    }

    public function getDataObito(): ?DateTime
    {
        return $this->dataObito;
    }

    public function setDataObito(?DateTime $dataObito): void
    {
        $this->dataObito = $dataObito;
    }

    public function getApelido(): ?string
    {
        return $this->apelido;
    }

    public function setApelido(?string $nmGuerra): void
    {
        $this->apelido = $nmGuerra;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $nmEmail): void
    {
        $this->email = $nmEmail;
    }

    public function getNomePai(): ?string
    {
        return $this->nomePai;
    }

    public function setNomePai(?string $nmPai): void
    {
        $this->nomePai = $nmPai;
    }

    public function getNomeMae(): ?string
    {
        return $this->nomeMae;
    }

    public function setNomeMae(?string $nmMae): void
    {
        $this->nomeMae = $nmMae;
    }

    public function getNomeConjuge(): ?string
    {
        return $this->nomeConjuge;
    }

    public function setNomeConjuge(?string $nmConjuge): void
    {
        $this->nomeConjuge = $nmConjuge;
    }

    public function getInPortadorNecessidadeEspecial(): string
    {
        return $this->inPortadorNecessidadeEspecial;
    }

    public function setInPortadorNecessidadeEspecial(string $inPortadorNecessidadeEspecial): void
    {
        $this->inPortadorNecessidadeEspecial = $inPortadorNecessidadeEspecial;
    }

    public function getNomeNecessidadeEspecial(): ?string
    {
        return $this->nomeNecessidadeEspecial;
    }

    public function setNomeNecessidadeEspecial(?string $nomeNecessidadeEspecial): void
    {
        $this->nomeNecessidadeEspecial = $nomeNecessidadeEspecial;
    }

    public function getInDoador(): string
    {
        return $this->inDoador;
    }

    public function setInDoador(string $inDoador): void
    {
        $this->inDoador = $inDoador;
    }

    /**
     * @return DateTime|null
     */
    public function getDtChegadaPais(): ?\DateTime
    {
        return $this->dtChegadaPais;
    }

    /**
     * @param DateTime|null $dtChegadaPais
     */
    public function setDtChegadaPais(?\DateTime $dtChegadaPais): void
    {
        $this->dtChegadaPais = $dtChegadaPais;
    }

    public function getEmailInstitucional(): ?string
    {
        return $this->emailInstitucional;
    }

    public function setEmailInstitucional(?string $emailInstitucional): void
    {
        $this->emailInstitucional = $emailInstitucional;
    }

    public function getCor(): ?Cor
    {
        return $this->cor;
    }

    public function setCor(?Cor $cor): void
    {
        $this->cor = $cor;
    }

    public function getEscolaridade(): Escolaridade
    {
        return $this->escolaridade;
    }

    public function setEscolaridade(Escolaridade $escolaridade): void
    {
        $this->escolaridade = $escolaridade;
    }

    public function getEstadoCivil(): EstadoCivil
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(EstadoCivil $estadoCivil): void
    {
        $this->estadoCivil = $estadoCivil;
    }

    public function getEtnia(): ?Etnia
    {
        return $this->etnia;
    }

    public function setEtnia(?Etnia $etnia): void
    {
        $this->etnia = $etnia;
    }

    public function getFormacaoProfissional(): ?FormacaoProfissional
    {
        return $this->formacaoProfissional;
    }

    public function setFormacaoProfissional(?FormacaoProfissional $formacaoProfissional): void
    {
        $this->formacaoProfissional = $formacaoProfissional;
    }

    public function getMunicipioNascimento(): ?Municipio
    {
        return $this->municipioNascimento;
    }

    public function setMunicipioNascimento(?Municipio $municipioNascimento): void
    {
        $this->municipioNascimento = $municipioNascimento;
    }

    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getTipoSanguineo(): ?TipoSanguineo
    {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo(TipoSanguineo $tipoSanguineo): void
    {
        $this->tipoSanguineo = $tipoSanguineo;
    }

    public function getTipoServidor(): TipoServidor
    {
        return $this->tipoServidor;
    }

    public function setTipoServidor(TipoServidor $tipoServidor): void
    {
        $this->tipoServidor = $tipoServidor;
    }

    public function addDocumento(Documentacao $documento): self
    {
        if (!$this->documentos->contains($documento)) {
            $this->documentos->add($documento);
            $documento->setServidor($this);
        }

        return $this;
    }

    public function removeDocumento(Documentacao $documento): self
    {
        if ($this->documentos->contains($documento)) {
            $this->documentos->removeElement($documento);
        }

        return $this;
    }

    public function getDocumentos(): Collection
    {
        return $this->documentos;
    }

    public function addDadoFuncional(DadoFuncional $dadoFuncional): self
    {
        if (!$this->dadosFuncionais->contains($dadoFuncional)) {
            $this->dadosFuncionais->add($dadoFuncional);
            $dadoFuncional->setServidor($this);
        }

        return $this;
    }

    public function removeDadoFuncional(DadoFuncional $dadoFuncional): self
    {
        if ($this->dadosFuncionais->contains($dadoFuncional)) {
            $this->dadosFuncionais->removeElement($dadoFuncional);
        }

        return $this;
    }

    public function getDadosFuncionais(): Collection
    {
        return $this->dadosFuncionais;
    }

    public function removeEndereco(Endereco $endereco): self
    {
        if ($this->enderecos->contains($endereco)) {
            $this->enderecos->removeElement($endereco);
        }

        return $this;
    }

    public function getEnderecos(): Collection
    {
        return $this->enderecos;
    }

    public function removeTelefone(Telefone $telefone): self
    {
        if ($this->telefones->contains($telefone)) {
            $this->telefones->removeElement($telefone);
        }

        return $this;
    }

    public function getTelefones(): Collection
    {
        return $this->telefones;
    }

    public function removeDadoFinanceiro(DadoFinanceiro $dadoFinanceiro): self
    {
        if ($this->dadosFinanceiro->contains($dadoFinanceiro)) {
            $this->dadosFinanceiro->removeElement($dadoFinanceiro);
        }

        return $this;
    }

    public function getDadosFinanceiro(): Collection
    {
        return $this->dadosFinanceiro;
    }

    public function removeDadoBancario(DadoBancario $dadoBancario): self
    {
        if ($this->dadosBancario->contains($dadoBancario)) {
            $this->dadosBancario->removeElement($dadoBancario);
        }

        return $this;
    }

    public function getDadosBancario(): Collection
    {
        return $this->dadosBancario;
    }

    public function removeCargoEfetivo(DadoBancario $cargoEfetivo): self
    {
        if ($this->cargosEfetivo->contains($cargoEfetivo)) {
            $this->cargosEfetivo->removeElement($cargoEfetivo);
        }

        return $this;
    }

    public function getCargosEfetivo(): Collection
    {
        return $this->cargosEfetivo;
    }

    public function removeFuncaoComissionada(FuncaoComissionada $funcaoComissionada): self
    {
        if ($this->funcoesComissionada->contains($funcaoComissionada)) {
            $this->funcoesComissionada->removeElement($funcaoComissionada);
        }

        return $this;
    }

    public function getFuncoesComissionada(): Collection
    {
        return $this->funcoesComissionada;
    }

    public function removeAposentadoria(Aposentadoria $aposentadoria): self
    {
        if ($this->aposentadorias->contains($aposentadoria)) {
            $this->aposentadorias->removeElement($aposentadoria);
        }

        return $this;
    }

    public function getAposentadorias(): Collection
    {
        return $this->aposentadorias;
    }

    public function removeMovimentacao(Movimentacao $movimentacao): self
    {
        if ($this->movimentacoes->contains($movimentacao)) {
            $this->movimentacoes->removeElement($movimentacao);
        }

        return $this;
    }

    public function getMovimentacoes(): Collection
    {
        return $this->movimentacoes;
    }

    public function removeDadoPromocao(DadoPromocao $dadoPromocao): self
    {
        if ($this->dadosPromocao->contains($dadoPromocao)) {
            $this->dadosPromocao->removeElement($dadoPromocao);
        }

        return $this;
    }

    public function getDadosPromocao(): Collection
    {
        return $this->dadosPromocao;
    }

    public function getDataImportacaoSP(): ?DateTime
    {
        return $this->dataImportacaoSP;
    }

    public function setDataImportacaoSP(?DateTime $dataImportacaoSP)
    {
        $this->dataImportacaoSP = $dataImportacaoSP;
        return $this;
    }

    public function getMsgFalhaImportacaoSP(): ?string
    {
        return $this->msgFalhaImportacaoSP;
    }

    public function setMsgFalhaImportacaoSP(?string $msgFalhaImportacaoSP): Servidor
    {
        $this->msgFalhaImportacaoSP = $msgFalhaImportacaoSP;
        return $this;
    }


}
