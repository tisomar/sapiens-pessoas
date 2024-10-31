<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DadoPessoalRec
 */
#[ORM\Table(name: 'DADO_PESSOAL_REC')]
#[ORM\Index(name: 'ix_dadopess_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_C6117B327D04BF1', columns: ['ID_COR'])]
#[ORM\Index(name: 'IDX_C6117B35FE9D3C3', columns: ['ID_ESCOLARIDADE'])]
#[ORM\Index(name: 'IDX_C6117B3DC5296', columns: ['ID_ESTADO_CIVIL'])]
#[ORM\Index(name: 'IDX_C6117B31ED96A81', columns: ['ID_FORMACAO'])]
#[ORM\Index(name: 'IDX_C6117B37298AD68', columns: ['ID_TIPO_TELEFONE'])]
#[ORM\Entity]
class DadoPessoalRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DADO_PESSOAL_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DADO_PESSOAL_REC'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DADO_PESSOAL_REC_ID_DADO_PESSO', allocationSize: 1, initialValue: 1)]
    private $idDadoPessoalRec;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome completo do servidor público. É o nome do servidor conforme descrito no seu documento de identificação RG.'])]
    private $nmServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_CONJUGE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo do conjuge do servidor. É o nome do conjuge conforme descrito na certidão de casamento ou declaração de união estável do servidor.'])]
    private $nmConjuge;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_EMAIL_PESSOAL', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome do endereço de correio eletrônico (Email) gerado para o servidor. Será o método que permite compor, enviar e receber mensagens através de um sistema eletrônico de comunicação do orgão a quem o servidor pertence.'])]
    private $nmEmailPessoal;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_DDD', type: 'string', length: 2, nullable: true, options: ['comment' => 'Número para a Discagem direta a distância (DDD), que é adotado para discagem interurbana através da inserção de prefixos regionais da localidade para onde a pessoa deseja ligar.'])]
    private $nrDdd;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_TELEFONE', type: 'string', length: 30, nullable: true, options: ['comment' => 'Número de contato para o telefone cadastrado de acordo com o tipo de telefone.'])]
    private $nrTelefone;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'datetime', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de inclusão do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ST_DADO_PESSOAL_REC', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true, 'comment' => 'Identificador para especificar o status ou situação do registro de recadastramento do dados pessoais do servidor. Ex: 1 - Inclusão, 2 - Devolução, 3 - Migração Manual ou 4 - Migração Automática.'])]
    private $stDadoPessoalRec = '1';

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_MIGRACAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA em que foi executada a operação de migração do registro, seja ela Manual ou Automática.'])]
    private $dtOperacaoMigracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_MIGRACAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de migração do registro, seja ela Manual ou Automática.'])]
    private $nrCpfOperadorMigracao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_DEVOLUCAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA em que foi executada a operação de devolução do registro cadastrado. Essa devolução pode ocorrer por pendências na informação cadastrada.'])]
    private $dtOperacaoDevolucao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_DEVOLUCAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de devolução do registro cadastrado. Essa devolução pode ocorrer por pendências na informação cadastrada.'])]
    private $nrCpfOperadorDevolucao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_PAI', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo do pai do servidor público. É o nome do pai do servidor conforme descrito no seu documento de identificação RG.'])]
    private $nmPai;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_MAE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome completo do mãe do servidor público. É o nome do mãe do servidor conforme descrito no seu documento de identificação RG.'])]
    private $nmMae;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número identificador para o documento de acordo com o seu tipo cadastrado pelo servidor público.'])]
    private $nrDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ORG_EXP_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva do orgão expedidor para o documento cadastrado de acordo com o seu tipo. '])]
    private $dsOrgExpDocumentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXP_DOCUMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi expedido o documento pessoal cadastrado para o servidor público.'])]
    private $dtExpDocumentacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_SANGUINEO', type: 'integer', nullable: true, options: ['comment' => 'Tipo sanguíneo.'])]
    private $idTipoSanguineo;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_MUNICIPIO', type: 'integer', nullable: true, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela MUNICIPIO.'])]
    private $idMunicipio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data de nascimento do servidor público. É a data de nascimento conforme o registro na certidão de nascimento do servidor.'])]
    private $dtNascimento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'RP_NR_DOCUMENTACAO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número identificador para o documento registro pessoal.'])]
    private $rpNrDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'RP_DS_ORG_EXP_DOCUMENTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva do orgão expedidor para o documento registro pessoal. '])]
    private $rpDsOrgExpDocumentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'RP_DT_EXP_DOCUMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi expedido o documento registro pessoal.'])]
    private $rpDtExpDocumentacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'RP_ID_UF', type: 'integer', nullable: true, options: ['comment' => 'Especificação descritiva da UF para o documento registro pessoal'])]
    private $rpIdUf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_NACIONALIDADE', type: 'string', length: 50, nullable: true, options: ['comment' => 'Campo que representa a nacionalidade do servidor cadastrado.'])]
    private $dsNacionalidade;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'RG_ID_UF', type: 'integer', nullable: true, options: ['comment' => 'Especificação descritiva da UF para o documento de Identidade RG do servidor.'])]
    private $rgIdUf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ST_REG_ATUALIZADO_DPR', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Status do registro ENDERECO_REC, indica se o registro está atualizado, onde os valores são Null = Desatualizado e 1 = Atualizado.'])]
    private $stRegAtualizadoDpr;

    /**
     * @var Cor
     */
    #[ORM\JoinColumn(name: 'ID_COR', referencedColumnName: 'ID_COR')]
    #[ORM\ManyToOne(targetEntity: 'Cor')]
    private $idCor;

    /**
     * @var Escolaridade
     */
    #[ORM\JoinColumn(name: 'ID_ESCOLARIDADE', referencedColumnName: 'ID_ESCOLARIDADE')]
    #[ORM\ManyToOne(targetEntity: 'Escolaridade')]
    private $idEscolaridade;

    /**
     * @var EstadoCivil
     */
    #[ORM\JoinColumn(name: 'ID_ESTADO_CIVIL', referencedColumnName: 'ID_ESTADO_CIVIL')]
    #[ORM\ManyToOne(targetEntity: 'EstadoCivil')]
    private $idEstadoCivil;

    /**
     * @var FormacaoProfissional
     */
    #[ORM\JoinColumn(name: 'ID_FORMACAO', referencedColumnName: 'ID_FORMACAO')]
    #[ORM\ManyToOne(targetEntity: 'FormacaoProfissional')]
    private $idFormacao;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var TipoTelefone
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_TELEFONE', referencedColumnName: 'ID_TIPO_TELEFONE')]
    #[ORM\ManyToOne(targetEntity: 'TipoTelefone')]
    private $idTipoTelefone;

    /**
     * @return int
     */
    public function getIdDadoPessoalRec(): int
    {
        return $this->idDadoPessoalRec;
    }

    /**
     * @param int $idDadoPessoalRec
     */
    public function setIdDadoPessoalRec(int $idDadoPessoalRec): void
    {
        $this->idDadoPessoalRec = $idDadoPessoalRec;
    }

    /**
     * @return string
     */
    public function getNmServidor(): string
    {
        return $this->nmServidor;
    }

    /**
     * @param string $nmServidor
     */
    public function setNmServidor(string $nmServidor): void
    {
        $this->nmServidor = $nmServidor;
    }

    /**
     * @return string|null
     */
    public function getNmConjuge(): ?string
    {
        return $this->nmConjuge;
    }

    /**
     * @param string|null $nmConjuge
     */
    public function setNmConjuge(?string $nmConjuge): void
    {
        $this->nmConjuge = $nmConjuge;
    }

    /**
     * @return string|null
     */
    public function getNmEmailPessoal(): ?string
    {
        return $this->nmEmailPessoal;
    }

    /**
     * @param string|null $nmEmailPessoal
     */
    public function setNmEmailPessoal(?string $nmEmailPessoal): void
    {
        $this->nmEmailPessoal = $nmEmailPessoal;
    }

    /**
     * @return string|null
     */
    public function getNrDdd(): ?string
    {
        return $this->nrDdd;
    }

    /**
     * @param string|null $nrDdd
     */
    public function setNrDdd(?string $nrDdd): void
    {
        $this->nrDdd = $nrDdd;
    }

    /**
     * @return string|null
     */
    public function getNrTelefone(): ?string
    {
        return $this->nrTelefone;
    }

    /**
     * @param string|null $nrTelefone
     */
    public function setNrTelefone(?string $nrTelefone): void
    {
        $this->nrTelefone = $nrTelefone;
    }

    /**
     * @return DateTime|string
     */
    public function getDtOperacaoInclusao(): \DateTime|string
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime|string $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime|string $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return string
     */
    public function getNrCpfOperador(): string
    {
        return $this->nrCpfOperador;
    }

    /**
     * @param string $nrCpfOperador
     */
    public function setNrCpfOperador(string $nrCpfOperador): void
    {
        $this->nrCpfOperador = $nrCpfOperador;
    }

    /**
     * @return string
     */
    public function getStDadoPessoalRec(): string
    {
        return $this->stDadoPessoalRec;
    }

    /**
     * @param string $stDadoPessoalRec
     */
    public function setStDadoPessoalRec(string $stDadoPessoalRec): void
    {
        $this->stDadoPessoalRec = $stDadoPessoalRec;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoMigracao(): ?\DateTime
    {
        return $this->dtOperacaoMigracao;
    }

    /**
     * @param DateTime|null $dtOperacaoMigracao
     */
    public function setDtOperacaoMigracao(?\DateTime $dtOperacaoMigracao): void
    {
        $this->dtOperacaoMigracao = $dtOperacaoMigracao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorMigracao(): ?string
    {
        return $this->nrCpfOperadorMigracao;
    }

    /**
     * @param string|null $nrCpfOperadorMigracao
     */
    public function setNrCpfOperadorMigracao(?string $nrCpfOperadorMigracao): void
    {
        $this->nrCpfOperadorMigracao = $nrCpfOperadorMigracao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoDevolucao(): ?\DateTime
    {
        return $this->dtOperacaoDevolucao;
    }

    /**
     * @param DateTime|null $dtOperacaoDevolucao
     */
    public function setDtOperacaoDevolucao(?\DateTime $dtOperacaoDevolucao): void
    {
        $this->dtOperacaoDevolucao = $dtOperacaoDevolucao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorDevolucao(): ?string
    {
        return $this->nrCpfOperadorDevolucao;
    }

    /**
     * @param string|null $nrCpfOperadorDevolucao
     */
    public function setNrCpfOperadorDevolucao(?string $nrCpfOperadorDevolucao): void
    {
        $this->nrCpfOperadorDevolucao = $nrCpfOperadorDevolucao;
    }

    /**
     * @return string|null
     */
    public function getNmPai(): ?string
    {
        return $this->nmPai;
    }

    /**
     * @param string|null $nmPai
     */
    public function setNmPai(?string $nmPai): void
    {
        $this->nmPai = $nmPai;
    }

    /**
     * @return string|null
     */
    public function getNmMae(): ?string
    {
        return $this->nmMae;
    }

    /**
     * @param string|null $nmMae
     */
    public function setNmMae(?string $nmMae): void
    {
        $this->nmMae = $nmMae;
    }

    /**
     * @return string|null
     */
    public function getNrDocumentacao(): ?string
    {
        return $this->nrDocumentacao;
    }

    /**
     * @param string|null $nrDocumentacao
     */
    public function setNrDocumentacao(?string $nrDocumentacao): void
    {
        $this->nrDocumentacao = $nrDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsOrgExpDocumentacao(): ?string
    {
        return $this->dsOrgExpDocumentacao;
    }

    /**
     * @param string|null $dsOrgExpDocumentacao
     */
    public function setDsOrgExpDocumentacao(?string $dsOrgExpDocumentacao): void
    {
        $this->dsOrgExpDocumentacao = $dsOrgExpDocumentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExpDocumentacao(): ?\DateTime
    {
        return $this->dtExpDocumentacao;
    }

    /**
     * @param DateTime|null $dtExpDocumentacao
     */
    public function setDtExpDocumentacao(?\DateTime $dtExpDocumentacao): void
    {
        $this->dtExpDocumentacao = $dtExpDocumentacao;
    }

    /**
     * @return int|null
     */
    public function getIdTipoSanguineo(): ?int
    {
        return $this->idTipoSanguineo;
    }

    /**
     * @param int|null $idTipoSanguineo
     */
    public function setIdTipoSanguineo(?int $idTipoSanguineo): void
    {
        $this->idTipoSanguineo = $idTipoSanguineo;
    }

    /**
     * @return int|null
     */
    public function getIdMunicipio(): ?int
    {
        return $this->idMunicipio;
    }

    /**
     * @param int|null $idMunicipio
     */
    public function setIdMunicipio(?int $idMunicipio): void
    {
        $this->idMunicipio = $idMunicipio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtNascimento(): ?\DateTime
    {
        return $this->dtNascimento;
    }

    /**
     * @param DateTime|null $dtNascimento
     */
    public function setDtNascimento(?\DateTime $dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    /**
     * @return string|null
     */
    public function getRpNrDocumentacao(): ?string
    {
        return $this->rpNrDocumentacao;
    }

    /**
     * @param string|null $rpNrDocumentacao
     */
    public function setRpNrDocumentacao(?string $rpNrDocumentacao): void
    {
        $this->rpNrDocumentacao = $rpNrDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getRpDsOrgExpDocumentacao(): ?string
    {
        return $this->rpDsOrgExpDocumentacao;
    }

    /**
     * @param string|null $rpDsOrgExpDocumentacao
     */
    public function setRpDsOrgExpDocumentacao(?string $rpDsOrgExpDocumentacao): void
    {
        $this->rpDsOrgExpDocumentacao = $rpDsOrgExpDocumentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getRpDtExpDocumentacao(): ?\DateTime
    {
        return $this->rpDtExpDocumentacao;
    }

    /**
     * @param DateTime|null $rpDtExpDocumentacao
     */
    public function setRpDtExpDocumentacao(?\DateTime $rpDtExpDocumentacao): void
    {
        $this->rpDtExpDocumentacao = $rpDtExpDocumentacao;
    }

    /**
     * @return int|null
     */
    public function getRpIdUf(): ?int
    {
        return $this->rpIdUf;
    }

    /**
     * @param int|null $rpIdUf
     */
    public function setRpIdUf(?int $rpIdUf): void
    {
        $this->rpIdUf = $rpIdUf;
    }

    /**
     * @return string|null
     */
    public function getDsNacionalidade(): ?string
    {
        return $this->dsNacionalidade;
    }

    /**
     * @param string|null $dsNacionalidade
     */
    public function setDsNacionalidade(?string $dsNacionalidade): void
    {
        $this->dsNacionalidade = $dsNacionalidade;
    }

    /**
     * @return int|null
     */
    public function getRgIdUf(): ?int
    {
        return $this->rgIdUf;
    }

    /**
     * @param int|null $rgIdUf
     */
    public function setRgIdUf(?int $rgIdUf): void
    {
        $this->rgIdUf = $rgIdUf;
    }

    /**
     * @return string|null
     */
    public function getStRegAtualizadoDpr(): ?string
    {
        return $this->stRegAtualizadoDpr;
    }

    /**
     * @param string|null $stRegAtualizadoDpr
     */
    public function setStRegAtualizadoDpr(?string $stRegAtualizadoDpr): void
    {
        $this->stRegAtualizadoDpr = $stRegAtualizadoDpr;
    }

    /**
     * @return Cor
     */
    public function getIdCor(): Cor
    {
        return $this->idCor;
    }

    /**
     * @param Cor $idCor
     */
    public function setIdCor(Cor $idCor): void
    {
        $this->idCor = $idCor;
    }

    /**
     * @return Escolaridade
     */
    public function getIdEscolaridade(): Escolaridade
    {
        return $this->idEscolaridade;
    }

    /**
     * @param Escolaridade $idEscolaridade
     */
    public function setIdEscolaridade(Escolaridade $idEscolaridade): void
    {
        $this->idEscolaridade = $idEscolaridade;
    }

    /**
     * @return EstadoCivil
     */
    public function getIdEstadoCivil(): EstadoCivil
    {
        return $this->idEstadoCivil;
    }

    /**
     * @param EstadoCivil $idEstadoCivil
     */
    public function setIdEstadoCivil(EstadoCivil $idEstadoCivil): void
    {
        $this->idEstadoCivil = $idEstadoCivil;
    }

    /**
     * @return FormacaoProfissional
     */
    public function getIdFormacao(): FormacaoProfissional
    {
        return $this->idFormacao;
    }

    /**
     * @param FormacaoProfissional $idFormacao
     */
    public function setIdFormacao(FormacaoProfissional $idFormacao): void
    {
        $this->idFormacao = $idFormacao;
    }

    /**
     * @return Servidor
     */
    public function getIdServidor(): Servidor
    {
        return $this->idServidor;
    }

    /**
     * @param Servidor $idServidor
     */
    public function setIdServidor(Servidor $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return TipoTelefone
     */
    public function getIdTipoTelefone(): TipoTelefone
    {
        return $this->idTipoTelefone;
    }

    /**
     * @param TipoTelefone $idTipoTelefone
     */
    public function setIdTipoTelefone(TipoTelefone $idTipoTelefone): void
    {
        $this->idTipoTelefone = $idTipoTelefone;
    }


}
