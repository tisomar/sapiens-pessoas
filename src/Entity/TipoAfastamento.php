<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TipoAfastamento
 */
#[ORM\Table(name: 'TIPO_AFASTAMENTO')]
#[ORM\Index(name: 'IDX_74E6FF72113F38D0', columns: ['ID_CLASS_TIPO_AFASTAMENTO'])]
#[ORM\Entity]
class TipoAfastamento implements EntityInterface
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_AFASTAMENTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TIPO_AFASTAMENTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TIPO_AFASTAMENTO_ID_TIPO_AFAST', allocationSize: 1, initialValue: 1)]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_TIPO_AFASTAMENTO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    private $codigo;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_TIPO_AFASTAMENTO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para os tipos possíveis de afastamentos que serão utilizados no sistema AGUPessoas.'])]
    private $descricao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'datetime', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'datetime', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteraç??o do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    private $cpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DESCONT_TMPO_SV_PBL_FED_SN', type: 'string', length: 1, nullable: false, options: ['default' => 'N', 'fixed' => true, 'comment' => "Identificador boleano que especifica se este tipo de afastamento afeta nos calculos para o tempo de serviço público federal. Codificação ('S' - Sim, 'N' - Não) "])]
    private $descontTmpoSvPblFedSn = 'N';

    /**
     * @var string
     */
    #[ORM\Column(name: 'DESCON_TMPO_EXE_F_INST_SN', type: 'string', length: 1, nullable: false, options: ['default' => 'N', 'fixed' => true, 'comment' => "Identificador boleano que especifica se este tipo de afastamento afeta nos calculos para o tempo na função institucional . Codificação ('S' - Sim, 'N' - Não) "])]
    private $desconTmpoExeFInstSn = 'N';

    /**
     * @var string
     */
    #[ORM\Column(name: 'DESCON_COMO_FALTA_INJUS_SN', type: 'string', length: 1, nullable: false, options: ['default' => 'N', 'fixed' => true, 'comment' => "Identificador boleano que especifica se este tipo de afastamento afeta nos calculos para a falta injustificada. Codificação ('S' - Sim, 'N' - Não) "])]
    private $desconComoFaltaInjusSn = 'N';

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_NECESSITA_HOMOLOGACAO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se este tipo de afastamento necessita de homologação. Codificação (0 - NÃO e 1 - SIM)'])]
    private $inNecessitaHomologacao = '0';

    /**
     * @var ClassificacaoTipoAfastamento
     */
    #[ORM\JoinColumn(name: 'ID_CLASS_TIPO_AFASTAMENTO', referencedColumnName: 'ID_CLASS_TIPO_AFASTAMENTO')]
    #[ORM\ManyToOne(targetEntity: 'ClassificacaoTipoAfastamento')]
    private $idClassTipoAfastamento;

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

    /**
     * @return string|null
     */
    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    /**
     * @param string|null $codigo
     */
    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    /**
     * @return string
     */
    public function getDescricao(): string
    {
        return $this->descricao;
    }

    /**
     * @param string $descricao
     */
    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
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
    public function getCpfOperador(): string
    {
        return $this->cpfOperador;
    }

    /**
     * @param string $cpfOperador
     */
    public function setCpfOperador(string $cpfOperador): void
    {
        $this->cpfOperador = $cpfOperador;
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
     * @return string
     */
    public function getDescontTmpoSvPblFedSn(): string
    {
        return $this->descontTmpoSvPblFedSn;
    }

    /**
     * @param string $descontTmpoSvPblFedSn
     */
    public function setDescontTmpoSvPblFedSn(string $descontTmpoSvPblFedSn): void
    {
        $this->descontTmpoSvPblFedSn = $descontTmpoSvPblFedSn;
    }

    /**
     * @return string
     */
    public function getDesconTmpoExeFInstSn(): string
    {
        return $this->desconTmpoExeFInstSn;
    }

    /**
     * @param string $desconTmpoExeFInstSn
     */
    public function setDesconTmpoExeFInstSn(string $desconTmpoExeFInstSn): void
    {
        $this->desconTmpoExeFInstSn = $desconTmpoExeFInstSn;
    }

    /**
     * @return string
     */
    public function getDesconComoFaltaInjusSn(): string
    {
        return $this->desconComoFaltaInjusSn;
    }

    /**
     * @param string $desconComoFaltaInjusSn
     */
    public function setDesconComoFaltaInjusSn(string $desconComoFaltaInjusSn): void
    {
        $this->desconComoFaltaInjusSn = $desconComoFaltaInjusSn;
    }

    /**
     * @return string
     */
    public function getInNecessitaHomologacao(): string
    {
        return $this->inNecessitaHomologacao;
    }

    /**
     * @param string $inNecessitaHomologacao
     */
    public function setInNecessitaHomologacao(string $inNecessitaHomologacao): void
    {
        $this->inNecessitaHomologacao = $inNecessitaHomologacao;
    }

    /**
     * @return ClassificacaoTipoAfastamento
     */
    public function getIdClassTipoAfastamento(): ClassificacaoTipoAfastamento
    {
        return $this->idClassTipoAfastamento;
    }

    /**
     * @param ClassificacaoTipoAfastamento $idClassTipoAfastamento
     */
    public function setIdClassTipoAfastamento(ClassificacaoTipoAfastamento $idClassTipoAfastamento): void
    {
        $this->idClassTipoAfastamento = $idClassTipoAfastamento;
    }


}
