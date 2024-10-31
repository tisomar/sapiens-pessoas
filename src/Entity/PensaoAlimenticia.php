<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * PensaoAlimenticia
 */
#[ORM\Table(name: 'PENSAO_ALIMENTICIA')]
#[ORM\Index(name: 'ix_pensaoalimenticia_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_CADAC9FF7422761C', columns: ['ID_MUNICIPIO_BENEFICIARIO'])]
#[ORM\Index(name: 'IDX_CADAC9FFC718FD80', columns: ['ID_AGENCIA'])]
#[ORM\Index(name: 'IDX_CADAC9FF611538B4', columns: ['ID_UF_EXP_RG'])]
#[ORM\UniqueConstraint(name: 'uk_pensao_alimenticia', columns: ['NM_BENEFICIARIO', 'DT_NASC_BENEFICIARIO'])]
#[ORM\Entity]
class PensaoAlimenticia
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_PENSAO_ALIMENTICIA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela PENSAO_ALIMENTICIA'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'PENSAO_ALIMENTICIA_ID_PENSAO_A', allocationSize: 1, initialValue: 1)]
    private $idPensaoAlimenticia;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_BENEFICIARIO', type: 'string', length: 70, nullable: false, options: ['comment' => 'Especifica o nome do beneficiário.'])]
    private $nmBeneficiario;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_NASC_BENEFICIARIO', type: 'date', nullable: false, options: ['comment' => 'Especifica a data de nascimento do beneficiário.'])]
    private $dtNascBeneficiario;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_PENSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de inicio da pensão.'])]
    private $dtInicioPensao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_PENSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data final da pensão.'])]
    private $dtFimPensao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CD_SEXO', type: 'string', length: 1, nullable: false, options: ['comment' => 'Especifica o código do sexo do dependente da pensão alimenticia: Masculino ou feminino.'])]
    private $cdSexo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_OPERACAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Especifica o código da operação na qual será feito o pagamento para o beneficiário .'])]
    private $cdOperacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CONTA', type: 'string', length: 10, nullable: true, options: ['comment' => 'Especifica o número da conta do servidor na qual será feito o pagamento para o beneficiário'])]
    private $nrConta;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_DV_CONTA', type: 'string', length: 10, nullable: true, options: ['comment' => 'Especifica o dígito verificador da conta na qual será feito o pagamento para o beneficiário.'])]
    private $nrDvConta;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do beneficiário.'])]
    private $nrCpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_IDENTIDADE', type: 'string', length: 30, nullable: true, options: ['comment' => 'Especifica o número da identidade do beneficiário.'])]
    private $nrIdentidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ORG_EXP_IDENT', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição do orgão expedidor da identidade.'])]
    private $dsOrgExpIdent;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXP_IDENTIDADE', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de expedição da identidade do beneficiário.'])]
    private $dtExpIdentidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OFICIO_JUIZ', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição do ofício do juíz.'])]
    private $dsOficioJuiz;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ENDERECO_RESIDENCIA', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição do endereço residencial do beneficiário.'])]
    private $dsEnderecoResidencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_BAIRRO_RESIDENCIA', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica o nome do bairro residencial do beneficiário.'])]
    private $nmBairroResidencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_CIDADE_RESIDENCIA', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica o nome da cidade onde o beneficiário reside.'])]
    private $nmCidadeResidencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CEP_RESIDENCIA', type: 'string', length: 8, nullable: true, options: ['comment' => 'Especifica o número do CEP referente ao bairro residencial do beneficiário.'])]
    private $nrCepResidencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_TELEFONE_RESIDENCIA', type: 'string', length: 15, nullable: true, options: ['comment' => 'Especifica a descrição contendo o número do telefone residencial do beneficiário.'])]
    private $nrTelefoneResidencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_EMAIL', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica o E-mail do beneficiário.'])]
    private $nmEmail;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_VARA', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição da vara onde foi dado a liminar'])]
    private $dsVara;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CIRCUNSCRICAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica a descrição da circunscrição.'])]
    private $dsCircunscricao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_PERCENTUAL_PENSAO', type: 'decimal', precision: 5, scale: 2, nullable: true, options: ['comment' => 'Especifica a porcentagem da pensão dada ao beneficiário.'])]
    private $nrPercentualPensao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO_PENSAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especifica a descrição e observação da pensão alimentícia.'])]
    private $dsObservacaoPensao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @var Municipio
     */
    #[ORM\JoinColumn(name: 'ID_MUNICIPIO_BENEFICIARIO', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    private $idMunicipioBeneficiario;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var Agencia
     */
    #[ORM\JoinColumn(name: 'ID_AGENCIA', referencedColumnName: 'ID_AGENCIA')]
    #[ORM\ManyToOne(targetEntity: 'Agencia')]
    private $idAgencia;

    /**
     * @var Uf
     */
    #[ORM\JoinColumn(name: 'ID_UF_EXP_RG', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    private $idUfExpRg;

    /**
     * @return int
     */
    public function getIdPensaoAlimenticia(): int
    {
        return $this->idPensaoAlimenticia;
    }

    /**
     * @param int $idPensaoAlimenticia
     */
    public function setIdPensaoAlimenticia(int $idPensaoAlimenticia): void
    {
        $this->idPensaoAlimenticia = $idPensaoAlimenticia;
    }

    /**
     * @return string
     */
    public function getNmBeneficiario(): string
    {
        return $this->nmBeneficiario;
    }

    /**
     * @param string $nmBeneficiario
     */
    public function setNmBeneficiario(string $nmBeneficiario): void
    {
        $this->nmBeneficiario = $nmBeneficiario;
    }

    /**
     * @return DateTime
     */
    public function getDtNascBeneficiario(): \DateTime
    {
        return $this->dtNascBeneficiario;
    }

    /**
     * @param DateTime $dtNascBeneficiario
     */
    public function setDtNascBeneficiario(\DateTime $dtNascBeneficiario): void
    {
        $this->dtNascBeneficiario = $dtNascBeneficiario;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioPensao(): ?\DateTime
    {
        return $this->dtInicioPensao;
    }

    /**
     * @param DateTime|null $dtInicioPensao
     */
    public function setDtInicioPensao(?\DateTime $dtInicioPensao): void
    {
        $this->dtInicioPensao = $dtInicioPensao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimPensao(): ?\DateTime
    {
        return $this->dtFimPensao;
    }

    /**
     * @param DateTime|null $dtFimPensao
     */
    public function setDtFimPensao(?\DateTime $dtFimPensao): void
    {
        $this->dtFimPensao = $dtFimPensao;
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
    public function getCdOperacao(): ?string
    {
        return $this->cdOperacao;
    }

    /**
     * @param string|null $cdOperacao
     */
    public function setCdOperacao(?string $cdOperacao): void
    {
        $this->cdOperacao = $cdOperacao;
    }

    /**
     * @return string|null
     */
    public function getNrConta(): ?string
    {
        return $this->nrConta;
    }

    /**
     * @param string|null $nrConta
     */
    public function setNrConta(?string $nrConta): void
    {
        $this->nrConta = $nrConta;
    }

    /**
     * @return string|null
     */
    public function getNrDvConta(): ?string
    {
        return $this->nrDvConta;
    }

    /**
     * @param string|null $nrDvConta
     */
    public function setNrDvConta(?string $nrDvConta): void
    {
        $this->nrDvConta = $nrDvConta;
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
     * @return string|null
     */
    public function getNrIdentidade(): ?string
    {
        return $this->nrIdentidade;
    }

    /**
     * @param string|null $nrIdentidade
     */
    public function setNrIdentidade(?string $nrIdentidade): void
    {
        $this->nrIdentidade = $nrIdentidade;
    }

    /**
     * @return string|null
     */
    public function getDsOrgExpIdent(): ?string
    {
        return $this->dsOrgExpIdent;
    }

    /**
     * @param string|null $dsOrgExpIdent
     */
    public function setDsOrgExpIdent(?string $dsOrgExpIdent): void
    {
        $this->dsOrgExpIdent = $dsOrgExpIdent;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExpIdentidade(): ?\DateTime
    {
        return $this->dtExpIdentidade;
    }

    /**
     * @param DateTime|null $dtExpIdentidade
     */
    public function setDtExpIdentidade(?\DateTime $dtExpIdentidade): void
    {
        $this->dtExpIdentidade = $dtExpIdentidade;
    }

    /**
     * @return string|null
     */
    public function getDsOficioJuiz(): ?string
    {
        return $this->dsOficioJuiz;
    }

    /**
     * @param string|null $dsOficioJuiz
     */
    public function setDsOficioJuiz(?string $dsOficioJuiz): void
    {
        $this->dsOficioJuiz = $dsOficioJuiz;
    }

    /**
     * @return string|null
     */
    public function getDsEnderecoResidencia(): ?string
    {
        return $this->dsEnderecoResidencia;
    }

    /**
     * @param string|null $dsEnderecoResidencia
     */
    public function setDsEnderecoResidencia(?string $dsEnderecoResidencia): void
    {
        $this->dsEnderecoResidencia = $dsEnderecoResidencia;
    }

    /**
     * @return string|null
     */
    public function getNmBairroResidencia(): ?string
    {
        return $this->nmBairroResidencia;
    }

    /**
     * @param string|null $nmBairroResidencia
     */
    public function setNmBairroResidencia(?string $nmBairroResidencia): void
    {
        $this->nmBairroResidencia = $nmBairroResidencia;
    }

    /**
     * @return string|null
     */
    public function getNmCidadeResidencia(): ?string
    {
        return $this->nmCidadeResidencia;
    }

    /**
     * @param string|null $nmCidadeResidencia
     */
    public function setNmCidadeResidencia(?string $nmCidadeResidencia): void
    {
        $this->nmCidadeResidencia = $nmCidadeResidencia;
    }

    /**
     * @return string|null
     */
    public function getNrCepResidencia(): ?string
    {
        return $this->nrCepResidencia;
    }

    /**
     * @param string|null $nrCepResidencia
     */
    public function setNrCepResidencia(?string $nrCepResidencia): void
    {
        $this->nrCepResidencia = $nrCepResidencia;
    }

    /**
     * @return string|null
     */
    public function getNrTelefoneResidencia(): ?string
    {
        return $this->nrTelefoneResidencia;
    }

    /**
     * @param string|null $nrTelefoneResidencia
     */
    public function setNrTelefoneResidencia(?string $nrTelefoneResidencia): void
    {
        $this->nrTelefoneResidencia = $nrTelefoneResidencia;
    }

    /**
     * @return string|null
     */
    public function getNmEmail(): ?string
    {
        return $this->nmEmail;
    }

    /**
     * @param string|null $nmEmail
     */
    public function setNmEmail(?string $nmEmail): void
    {
        $this->nmEmail = $nmEmail;
    }

    /**
     * @return string|null
     */
    public function getDsVara(): ?string
    {
        return $this->dsVara;
    }

    /**
     * @param string|null $dsVara
     */
    public function setDsVara(?string $dsVara): void
    {
        $this->dsVara = $dsVara;
    }

    /**
     * @return string|null
     */
    public function getDsCircunscricao(): ?string
    {
        return $this->dsCircunscricao;
    }

    /**
     * @param string|null $dsCircunscricao
     */
    public function setDsCircunscricao(?string $dsCircunscricao): void
    {
        $this->dsCircunscricao = $dsCircunscricao;
    }

    /**
     * @return string|null
     */
    public function getNrPercentualPensao(): ?string
    {
        return $this->nrPercentualPensao;
    }

    /**
     * @param string|null $nrPercentualPensao
     */
    public function setNrPercentualPensao(?string $nrPercentualPensao): void
    {
        $this->nrPercentualPensao = $nrPercentualPensao;
    }

    /**
     * @return string|null
     */
    public function getDsObservacaoPensao(): ?string
    {
        return $this->dsObservacaoPensao;
    }

    /**
     * @param string|null $dsObservacaoPensao
     */
    public function setDsObservacaoPensao(?string $dsObservacaoPensao): void
    {
        $this->dsObservacaoPensao = $dsObservacaoPensao;
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
     * @return DateTime|string
     */
    public function getDtOperacaoAlteracao(): \DateTime|string
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime|string $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime|string $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
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
     * @return Municipio
     */
    public function getIdMunicipioBeneficiario(): Municipio
    {
        return $this->idMunicipioBeneficiario;
    }

    /**
     * @param Municipio $idMunicipioBeneficiario
     */
    public function setIdMunicipioBeneficiario(Municipio $idMunicipioBeneficiario): void
    {
        $this->idMunicipioBeneficiario = $idMunicipioBeneficiario;
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
     * @return Agencia
     */
    public function getIdAgencia(): Agencia
    {
        return $this->idAgencia;
    }

    /**
     * @param Agencia $idAgencia
     */
    public function setIdAgencia(Agencia $idAgencia): void
    {
        $this->idAgencia = $idAgencia;
    }

    /**
     * @return Uf
     */
    public function getIdUfExpRg(): Uf
    {
        return $this->idUfExpRg;
    }

    /**
     * @param Uf $idUfExpRg
     */
    public function setIdUfExpRg(Uf $idUfExpRg): void
    {
        $this->idUfExpRg = $idUfExpRg;
    }


}
