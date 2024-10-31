<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DependenteRec
 */
#[ORM\Table(name: 'DEPENDENTE_REC')]
#[ORM\Index(name: 'ix_depedenterec_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_5DADB8197052B008', columns: ['ID_TIPO_PARENTESCO'])]
#[ORM\Index(name: 'IDX_5DADB819DB7962B0', columns: ['ID_MUNICIPIO_CERTIDAO'])]
#[ORM\Index(name: 'IDX_5DADB81974A44C80', columns: ['ID_UF_EXPEDIDOR_RG'])]
#[ORM\Entity]
class DependenteRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DEPENDENTE_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DEPENDENTE_REC.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DEPENDENTE_REC_ID_DEPENDENTE_R', allocationSize: 1, initialValue: 1)]
    private $idDependenteRec;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_DEPENDENTE', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome completo do dependente cadastrado para um servidor. O nome do dependente conforme descrito no seu documento de identificação.'])]
    private $nmDependente;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: false, options: ['comment' => 'Data do nascimento do dependente de um servidor conforme a descrição em sua certidão de nascimento.'])]
    private $dtNascimento;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CD_SEXO', type: 'string', length: 1, nullable: false, options: ['comment' => 'Código identificando o sexo do dependente: M - Masculino ou F - Feminino.'])]
    private $cdSexo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Número do CPF do dependente. Cadastro de pessoa física.'])]
    private $nrCpf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_RG', type: 'integer', nullable: true, options: ['comment' => 'Número identificador para o documento de registro geral (RG) do dependente cadastrado pelo servidor público.'])]
    private $nrRg;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXPEDICAO_RG', type: 'date', nullable: true, options: ['comment' => 'Data em que foi expedido o documento de RG do dependente cadastrado para o servidor público.'])]
    private $dtExpedicaoRg;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ORGAO_EXPEDIDOR_RG', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva do orgão expedidor para o documento de RG do dependente cadastrado.'])]
    private $dsOrgaoExpedidorRg;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_MIDIA_COMPROVANTE', type: 'integer', nullable: true, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela MIDIA'])]
    private $idMidiaComprovante;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_DEPENDENTE', type: 'integer', nullable: true, options: ['comment' => 'Identificador único que especifica um registro na tabela DEPENDENTE.'])]
    private $idDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_JUSTIFICATIVA', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações da justificativa ou observações mais relativas do registro de dependentes de um servidor na AGU.'])]
    private $dsJustificativa;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_INCLUSAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de inclusão do registro no sistema.'])]
    private $nrCpfOperadorInclusao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_ALTERACAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de alteração do registro no sistema.'])]
    private $nrCpfOperadorAlteracao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_EXCLUSAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de exclusão do registro no sistema.'])]
    private $nrCpfOperadorExclusao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_REGISTRO_IRPF', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o dependente cadastrado está ativo para dedução na declaração de Imposto de Renda Pessoa Física do servidor público. Ex: 0 - FALSO e 1 - VERDADEIRO.'])]
    private $inRegistroIrpf = '0';

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_DOC_COMPROB_PASTA_FUNCIONAL', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se os documentos comprobatórios do dependente já estão disponíveis na pasta funcional do servidor. Ex: 0 - FALSO e 1 - VERDADEIRO.'])]
    private $inDocComprobPastaFuncional = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_PAI_DEPENDENTE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome do pai do dependente declarado conforme a certidão de nascimento do dependente.'])]
    private $nmPaiDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_MAE_DEPENDENTE', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome da mãe do dependente declarado conforme a certidão de nascimento do dependente.'])]
    private $nmMaeDependente;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_DEPENDENTE', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi declarado o início da assístência ao dependente, ou seja, em que o dependente entrou na folha de benefícios da AGU.'])]
    private $dtInicioDependente;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_DEPENDENTE', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi declarado o fim da assístência ao dependente, ou seja, em que o dependente saiu da folha de benefícios da AGU.'])]
    private $dtFimDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_MOTIVO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o motivo que levou ao fim dos benefícios pagos ao dependente pela AGU.'])]
    private $dsMotivo;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CERTIDAO_NASCIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi registrada a certidão de nascimento do dependente de um servidor público.'])]
    private $dtCertidaoNascimento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CERTIDAO_NASCIMENTO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número dado pelo cartório para o registro da certidão de nascimento do dependente de um servidor público.'])]
    private $nrCertidaoNascimento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LIVRO_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do Livro em que o cartório registrou as informações da certidão de nascimento do dependente de um servidor público.'])]
    private $dsLivroCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_FOLHA_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação da Folha/Livro em o cartório registrou as informações da certidão de nascimento do dependente de um servidor público.'])]
    private $dsFolhaCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_MATRICULA_CERTIDAO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Especifica??ão descritiva para a identificação da matricula vinculada a certidão de nascimento do dependente de um servidor público.'])]
    private $dsMatriculaCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARTORIO_CERTIDAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a identificação do cartório em foi registrado a certidão de nascimento do dependente de um servidor público.'])]
    private $dsCartorioCertidao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'ST_DEPENDENTE_REC', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true, 'comment' => 'Identificador para especificar o status ou situação do registro de recadastramento dos dependentes do servidor, caso exista. Ex: 1 - Inclusão, 2 - Devolução, 3 - Migração Manual ou 4 - Migração Automática.'])]
    private $stDependenteRec = '1';

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
     * @var TipoParentesco
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_PARENTESCO', referencedColumnName: 'ID_TIPO_PARENTESCO')]
    #[ORM\ManyToOne(targetEntity: 'TipoParentesco')]
    private $idTipoParentesco;

    /**
     * @var Municipio
     */
    #[ORM\JoinColumn(name: 'ID_MUNICIPIO_CERTIDAO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    private $idMunicipioCertidao;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var Uf
     */
    #[ORM\JoinColumn(name: 'ID_UF_EXPEDIDOR_RG', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    private $idUfExpedidorRg;

    /**
     * @return int
     */
    public function getIdDependenteRec(): int
    {
        return $this->idDependenteRec;
    }

    /**
     * @param int $idDependenteRec
     */
    public function setIdDependenteRec(int $idDependenteRec): void
    {
        $this->idDependenteRec = $idDependenteRec;
    }

    /**
     * @return string
     */
    public function getNmDependente(): string
    {
        return $this->nmDependente;
    }

    /**
     * @param string $nmDependente
     */
    public function setNmDependente(string $nmDependente): void
    {
        $this->nmDependente = $nmDependente;
    }

    /**
     * @return DateTime
     */
    public function getDtNascimento(): \DateTime
    {
        return $this->dtNascimento;
    }

    /**
     * @param DateTime $dtNascimento
     */
    public function setDtNascimento(\DateTime $dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    /**
     * @return string
     */
    public function getCdSexo(): string
    {
        return $this->cdSexo;
    }

    /**
     * @param string $cdSexo
     */
    public function setCdSexo(string $cdSexo): void
    {
        $this->cdSexo = $cdSexo;
    }

    /**
     * @return string|null
     */
    public function getNrCpf(): ?string
    {
        return $this->nrCpf;
    }

    /**
     * @param string|null $nrCpf
     */
    public function setNrCpf(?string $nrCpf): void
    {
        $this->nrCpf = $nrCpf;
    }

    /**
     * @return int|null
     */
    public function getNrRg(): ?int
    {
        return $this->nrRg;
    }

    /**
     * @param int|null $nrRg
     */
    public function setNrRg(?int $nrRg): void
    {
        $this->nrRg = $nrRg;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExpedicaoRg(): ?\DateTime
    {
        return $this->dtExpedicaoRg;
    }

    /**
     * @param DateTime|null $dtExpedicaoRg
     */
    public function setDtExpedicaoRg(?\DateTime $dtExpedicaoRg): void
    {
        $this->dtExpedicaoRg = $dtExpedicaoRg;
    }

    /**
     * @return string|null
     */
    public function getDsOrgaoExpedidorRg(): ?string
    {
        return $this->dsOrgaoExpedidorRg;
    }

    /**
     * @param string|null $dsOrgaoExpedidorRg
     */
    public function setDsOrgaoExpedidorRg(?string $dsOrgaoExpedidorRg): void
    {
        $this->dsOrgaoExpedidorRg = $dsOrgaoExpedidorRg;
    }

    /**
     * @return int|null
     */
    public function getIdMidiaComprovante(): ?int
    {
        return $this->idMidiaComprovante;
    }

    /**
     * @param int|null $idMidiaComprovante
     */
    public function setIdMidiaComprovante(?int $idMidiaComprovante): void
    {
        $this->idMidiaComprovante = $idMidiaComprovante;
    }

    /**
     * @return int|null
     */
    public function getIdDependente(): ?int
    {
        return $this->idDependente;
    }

    /**
     * @param int|null $idDependente
     */
    public function setIdDependente(?int $idDependente): void
    {
        $this->idDependente = $idDependente;
    }

    /**
     * @return string|null
     */
    public function getDsJustificativa(): ?string
    {
        return $this->dsJustificativa;
    }

    /**
     * @param string|null $dsJustificativa
     */
    public function setDsJustificativa(?string $dsJustificativa): void
    {
        $this->dsJustificativa = $dsJustificativa;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoInclusao(): ?\DateTime
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime|null $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(?\DateTime $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorInclusao(): ?string
    {
        return $this->nrCpfOperadorInclusao;
    }

    /**
     * @param string|null $nrCpfOperadorInclusao
     */
    public function setNrCpfOperadorInclusao(?string $nrCpfOperadorInclusao): void
    {
        $this->nrCpfOperadorInclusao = $nrCpfOperadorInclusao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoAlteracao(): ?\DateTime
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime|null $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(?\DateTime $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorAlteracao(): ?string
    {
        return $this->nrCpfOperadorAlteracao;
    }

    /**
     * @param string|null $nrCpfOperadorAlteracao
     */
    public function setNrCpfOperadorAlteracao(?string $nrCpfOperadorAlteracao): void
    {
        $this->nrCpfOperadorAlteracao = $nrCpfOperadorAlteracao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoExclusao(): ?\DateTime
    {
        return $this->dtOperacaoExclusao;
    }

    /**
     * @param DateTime|null $dtOperacaoExclusao
     */
    public function setDtOperacaoExclusao(?\DateTime $dtOperacaoExclusao): void
    {
        $this->dtOperacaoExclusao = $dtOperacaoExclusao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperadorExclusao(): ?string
    {
        return $this->nrCpfOperadorExclusao;
    }

    /**
     * @param string|null $nrCpfOperadorExclusao
     */
    public function setNrCpfOperadorExclusao(?string $nrCpfOperadorExclusao): void
    {
        $this->nrCpfOperadorExclusao = $nrCpfOperadorExclusao;
    }

    /**
     * @return string
     */
    public function getInRegistroIrpf(): string
    {
        return $this->inRegistroIrpf;
    }

    /**
     * @param string $inRegistroIrpf
     */
    public function setInRegistroIrpf(string $inRegistroIrpf): void
    {
        $this->inRegistroIrpf = $inRegistroIrpf;
    }

    /**
     * @return string
     */
    public function getInDocComprobPastaFuncional(): string
    {
        return $this->inDocComprobPastaFuncional;
    }

    /**
     * @param string $inDocComprobPastaFuncional
     */
    public function setInDocComprobPastaFuncional(string $inDocComprobPastaFuncional): void
    {
        $this->inDocComprobPastaFuncional = $inDocComprobPastaFuncional;
    }

    /**
     * @return string|null
     */
    public function getNmPaiDependente(): ?string
    {
        return $this->nmPaiDependente;
    }

    /**
     * @param string|null $nmPaiDependente
     */
    public function setNmPaiDependente(?string $nmPaiDependente): void
    {
        $this->nmPaiDependente = $nmPaiDependente;
    }

    /**
     * @return string|null
     */
    public function getNmMaeDependente(): ?string
    {
        return $this->nmMaeDependente;
    }

    /**
     * @param string|null $nmMaeDependente
     */
    public function setNmMaeDependente(?string $nmMaeDependente): void
    {
        $this->nmMaeDependente = $nmMaeDependente;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioDependente(): ?\DateTime
    {
        return $this->dtInicioDependente;
    }

    /**
     * @param DateTime|null $dtInicioDependente
     */
    public function setDtInicioDependente(?\DateTime $dtInicioDependente): void
    {
        $this->dtInicioDependente = $dtInicioDependente;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimDependente(): ?\DateTime
    {
        return $this->dtFimDependente;
    }

    /**
     * @param DateTime|null $dtFimDependente
     */
    public function setDtFimDependente(?\DateTime $dtFimDependente): void
    {
        $this->dtFimDependente = $dtFimDependente;
    }

    /**
     * @return string|null
     */
    public function getDsMotivo(): ?string
    {
        return $this->dsMotivo;
    }

    /**
     * @param string|null $dsMotivo
     */
    public function setDsMotivo(?string $dsMotivo): void
    {
        $this->dsMotivo = $dsMotivo;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCertidaoNascimento(): ?\DateTime
    {
        return $this->dtCertidaoNascimento;
    }

    /**
     * @param DateTime|null $dtCertidaoNascimento
     */
    public function setDtCertidaoNascimento(?\DateTime $dtCertidaoNascimento): void
    {
        $this->dtCertidaoNascimento = $dtCertidaoNascimento;
    }

    /**
     * @return string|null
     */
    public function getNrCertidaoNascimento(): ?string
    {
        return $this->nrCertidaoNascimento;
    }

    /**
     * @param string|null $nrCertidaoNascimento
     */
    public function setNrCertidaoNascimento(?string $nrCertidaoNascimento): void
    {
        $this->nrCertidaoNascimento = $nrCertidaoNascimento;
    }

    /**
     * @return string|null
     */
    public function getDsLivroCertidao(): ?string
    {
        return $this->dsLivroCertidao;
    }

    /**
     * @param string|null $dsLivroCertidao
     */
    public function setDsLivroCertidao(?string $dsLivroCertidao): void
    {
        $this->dsLivroCertidao = $dsLivroCertidao;
    }

    /**
     * @return string|null
     */
    public function getDsFolhaCertidao(): ?string
    {
        return $this->dsFolhaCertidao;
    }

    /**
     * @param string|null $dsFolhaCertidao
     */
    public function setDsFolhaCertidao(?string $dsFolhaCertidao): void
    {
        $this->dsFolhaCertidao = $dsFolhaCertidao;
    }

    /**
     * @return string|null
     */
    public function getDsMatriculaCertidao(): ?string
    {
        return $this->dsMatriculaCertidao;
    }

    /**
     * @param string|null $dsMatriculaCertidao
     */
    public function setDsMatriculaCertidao(?string $dsMatriculaCertidao): void
    {
        $this->dsMatriculaCertidao = $dsMatriculaCertidao;
    }

    /**
     * @return string|null
     */
    public function getDsCartorioCertidao(): ?string
    {
        return $this->dsCartorioCertidao;
    }

    /**
     * @param string|null $dsCartorioCertidao
     */
    public function setDsCartorioCertidao(?string $dsCartorioCertidao): void
    {
        $this->dsCartorioCertidao = $dsCartorioCertidao;
    }

    /**
     * @return string
     */
    public function getStDependenteRec(): string
    {
        return $this->stDependenteRec;
    }

    /**
     * @param string $stDependenteRec
     */
    public function setStDependenteRec(string $stDependenteRec): void
    {
        $this->stDependenteRec = $stDependenteRec;
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
     * @return TipoParentesco
     */
    public function getIdTipoParentesco(): TipoParentesco
    {
        return $this->idTipoParentesco;
    }

    /**
     * @param TipoParentesco $idTipoParentesco
     */
    public function setIdTipoParentesco(TipoParentesco $idTipoParentesco): void
    {
        $this->idTipoParentesco = $idTipoParentesco;
    }

    /**
     * @return Municipio
     */
    public function getIdMunicipioCertidao(): Municipio
    {
        return $this->idMunicipioCertidao;
    }

    /**
     * @param Municipio $idMunicipioCertidao
     */
    public function setIdMunicipioCertidao(Municipio $idMunicipioCertidao): void
    {
        $this->idMunicipioCertidao = $idMunicipioCertidao;
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
     * @return Uf
     */
    public function getIdUfExpedidorRg(): Uf
    {
        return $this->idUfExpedidorRg;
    }

    /**
     * @param Uf $idUfExpedidorRg
     */
    public function setIdUfExpedidorRg(Uf $idUfExpedidorRg): void
    {
        $this->idUfExpedidorRg = $idUfExpedidorRg;
    }


}
