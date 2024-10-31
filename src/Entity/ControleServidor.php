<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ControleServidor
 */
#[ORM\Table(name: 'CONTROLE_SERVIDOR')]
#[ORM\Index(name: 'IDX_4077686A4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
class ControleServidor
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CONTROLE_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que representa um registro na tabela controle_servidor.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'CONTROLE_SERVIDOR_ID_CONTROLE_', allocationSize: 1, initialValue: 1)]
    private $idControleServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ANO_ENTREGA', type: 'integer', nullable: true, options: ['comment' => 'Identificação do Ano de exercício no qual o servidor entregou ao RH da AGU a transcrição ou autorização para a declaração do imposto de renda pessoa física.'])]
    private $nrAnoEntrega;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_ENTREGA_TRANSCRICAO', type: 'date', nullable: false, options: ['comment' => 'Data em que o servidor entregou ao RH a transcrição para a declaração do imposto de renda pessoa física do ano vigente.'])]
    private $dtEntregaTranscricao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_TRANSCRICAO_ENTREGUE', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando que informa se a transcrição foi entregue ou não. Ex. 0 - FALSO e 1 - VERDADEIRO.'])]
    private $inTranscricaoEntregue;

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
     * @var string
     */
    #[ORM\Column(name: 'IN_AUTORIZACAO_ENTREGUE', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica se o servidor concorda e autoriza o RH do orgão de origem administrar a declaração do imposto de renda do servidor. Codificação: 0 - FALSO e 1 - VERDADEIRO.'])]
    private $inAutorizacaoEntregue = '0';

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @return int
     */
    public function getIdControleServidor(): int
    {
        return $this->idControleServidor;
    }

    /**
     * @param int $idControleServidor
     */
    public function setIdControleServidor(int $idControleServidor): void
    {
        $this->idControleServidor = $idControleServidor;
    }

    /**
     * @return int|null
     */
    public function getNrAnoEntrega(): ?int
    {
        return $this->nrAnoEntrega;
    }

    /**
     * @param int|null $nrAnoEntrega
     */
    public function setNrAnoEntrega(?int $nrAnoEntrega): void
    {
        $this->nrAnoEntrega = $nrAnoEntrega;
    }

    /**
     * @return DateTime
     */
    public function getDtEntregaTranscricao(): \DateTime
    {
        return $this->dtEntregaTranscricao;
    }

    /**
     * @param DateTime $dtEntregaTranscricao
     */
    public function setDtEntregaTranscricao(\DateTime $dtEntregaTranscricao): void
    {
        $this->dtEntregaTranscricao = $dtEntregaTranscricao;
    }

    /**
     * @return string
     */
    public function getInTranscricaoEntregue(): string
    {
        return $this->inTranscricaoEntregue;
    }

    /**
     * @param string $inTranscricaoEntregue
     */
    public function setInTranscricaoEntregue(string $inTranscricaoEntregue): void
    {
        $this->inTranscricaoEntregue = $inTranscricaoEntregue;
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
     * @return string
     */
    public function getInAutorizacaoEntregue(): string
    {
        return $this->inAutorizacaoEntregue;
    }

    /**
     * @param string $inAutorizacaoEntregue
     */
    public function setInAutorizacaoEntregue(string $inAutorizacaoEntregue): void
    {
        $this->inAutorizacaoEntregue = $inAutorizacaoEntregue;
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


}
