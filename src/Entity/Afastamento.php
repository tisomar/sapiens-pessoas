<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Afastamento
 */
#[ORM\Table(name: 'AFASTAMENTO')]
#[ORM\Index(name: 'ix_afastamento', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_A022A74411ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_A022A74410DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_A022A744ECAE6487', columns: ['ID_TIPO_AFASTAMENTO'])]
#[ORM\UniqueConstraint(name: 'uk_afastamento', columns: ['ID_SERVIDOR', 'DT_INICIO_AFASTAMENTO', 'ID_TIPO_AFASTAMENTO', 'DT_FIM_AFASTAMENTO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
class Afastamento
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_AFASTAMENTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela AFASTAMENTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'AFASTAMENTO_ID_AFASTAMENTO_seq', allocationSize: 1, initialValue: 1)]
    private $idAfastamento;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INICIO_AFASTAMENTO', type: 'date', nullable: false, options: ['comment' => 'Data/hora em que houve o início do afastamento do servidor público, ou seja, momento em que o servidor deixou de comprarecer ao local de trabalho.'])]
    private $dtInicioAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_AFASTAMENTO', type: 'date', nullable: true, options: ['comment' => 'Data/hora em que houve o encerramento do afastamento do servidor público, ou seja, momento em que o servidor retornou ao local de trabalho.'])]
    private $dtFimAfastamento;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_HORAS_AFASTAMENTO', type: 'smallint', nullable: true, options: ['comment' => 'Número em Horas na qual o servidor público ficou afastado do trabalho por algum motivo especifico.'])]
    private $nrHorasAfastamento;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_CANCELADO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica se o registro de afastamento está cancelado ou não. Codificação: 0 - FALSO e 1 - VERDADEIRO.'])]
    private $inCancelado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CID_AFASTAMENTO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especifica o código de identificação da classificação Internacional de Doenças e Problemas Relacionados com a Saúde, frequentemente designada pela sigla CID. Caso o servidor público tenha se afastado por motivo de doença, um atestado deverá ser entregue com a classificação do problema/doença.'])]
    private $dsCidAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_DESCONTO_AFASTAMENTO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o desconto (encargo) pelos dias/horas de faltas no periodo em que o servidor estava afastado do seu trabalho.'])]
    private $dtDescontoAfastamento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO_AFASTAMENTO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de afastamento de um servidor na AGU.'])]
    private $dsObservacaoAfastamento;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de altera????ão do registro. Retorna a data do sistema.'])]
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
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $idNorma;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $idRh;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @var TipoAfastamento
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_AFASTAMENTO', referencedColumnName: 'ID_TIPO_AFASTAMENTO')]
    #[ORM\ManyToOne(targetEntity: 'TipoAfastamento')]
    private $idTipoAfastamento;

    /**
     * @return int
     */
    public function getIdAfastamento(): int
    {
        return $this->idAfastamento;
    }

    /**
     * @param int $idAfastamento
     */
    public function setIdAfastamento(int $idAfastamento): void
    {
        $this->idAfastamento = $idAfastamento;
    }

    /**
     * @return DateTime
     */
    public function getDtInicioAfastamento(): \DateTime
    {
        return $this->dtInicioAfastamento;
    }

    /**
     * @param DateTime $dtInicioAfastamento
     */
    public function setDtInicioAfastamento(\DateTime $dtInicioAfastamento): void
    {
        $this->dtInicioAfastamento = $dtInicioAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimAfastamento(): ?\DateTime
    {
        return $this->dtFimAfastamento;
    }

    /**
     * @param DateTime|null $dtFimAfastamento
     */
    public function setDtFimAfastamento(?\DateTime $dtFimAfastamento): void
    {
        $this->dtFimAfastamento = $dtFimAfastamento;
    }

    /**
     * @return int|null
     */
    public function getNrHorasAfastamento(): ?int
    {
        return $this->nrHorasAfastamento;
    }

    /**
     * @param int|null $nrHorasAfastamento
     */
    public function setNrHorasAfastamento(?int $nrHorasAfastamento): void
    {
        $this->nrHorasAfastamento = $nrHorasAfastamento;
    }

    /**
     * @return string
     */
    public function getInCancelado(): string
    {
        return $this->inCancelado;
    }

    /**
     * @param string $inCancelado
     */
    public function setInCancelado(string $inCancelado): void
    {
        $this->inCancelado = $inCancelado;
    }

    /**
     * @return string|null
     */
    public function getDsCidAfastamento(): ?string
    {
        return $this->dsCidAfastamento;
    }

    /**
     * @param string|null $dsCidAfastamento
     */
    public function setDsCidAfastamento(?string $dsCidAfastamento): void
    {
        $this->dsCidAfastamento = $dsCidAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getDtDescontoAfastamento(): ?\DateTime
    {
        return $this->dtDescontoAfastamento;
    }

    /**
     * @param DateTime|null $dtDescontoAfastamento
     */
    public function setDtDescontoAfastamento(?\DateTime $dtDescontoAfastamento): void
    {
        $this->dtDescontoAfastamento = $dtDescontoAfastamento;
    }

    /**
     * @return string|null
     */
    public function getDsObservacaoAfastamento(): ?string
    {
        return $this->dsObservacaoAfastamento;
    }

    /**
     * @param string|null $dsObservacaoAfastamento
     */
    public function setDsObservacaoAfastamento(?string $dsObservacaoAfastamento): void
    {
        $this->dsObservacaoAfastamento = $dsObservacaoAfastamento;
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
     * @return Norma
     */
    public function getIdNorma(): Norma
    {
        return $this->idNorma;
    }

    /**
     * @param Norma $idNorma
     */
    public function setIdNorma(Norma $idNorma): void
    {
        $this->idNorma = $idNorma;
    }

    /**
     * @return Rh
     */
    public function getIdRh(): Rh
    {
        return $this->idRh;
    }

    /**
     * @param Rh $idRh
     */
    public function setIdRh(Rh $idRh): void
    {
        $this->idRh = $idRh;
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
     * @return TipoAfastamento
     */
    public function getIdTipoAfastamento(): TipoAfastamento
    {
        return $this->idTipoAfastamento;
    }

    /**
     * @param TipoAfastamento $idTipoAfastamento
     */
    public function setIdTipoAfastamento(TipoAfastamento $idTipoAfastamento): void
    {
        $this->idTipoAfastamento = $idTipoAfastamento;
    }


}
