<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * MotivoDevolucaoRec
 */
#[ORM\Table(name: 'MOTIVO_DEVOLUCAO_REC')]
#[ORM\Index(name: 'IDX_AF5E715FA4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
class MotivoDevolucaoRec
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_MOTIVO_DEVOLUCAO_REC', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela MOTIVO_DEVOLUCAO_REC.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'MOTIVO_DEVOLUCAO_REC_ID_MOTIVO', allocationSize: 1, initialValue: 1)]
    private $idMotivoDevolucaoRec;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_MOTIVO_DEVOLUCAO_REC', type: 'string', length: 4000, nullable: false, options: ['comment' => 'Especificação descritiva relatando os motivos que levaram a devolução do recadastramento do servidor público.'])]
    private $dsMotivoDevolucaoRec;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_EMAIL_DEVOLUCAO_REC', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva do email de contato no caso de devolução.'])]
    private $nmEmailDevolucaoRec;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA em que foi feita a operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR_INCLUSAO', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a operação de inclusão do registro no sistema.'])]
    private $nrCpfOperadorInclusao;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    private $idServidor;

    /**
     * @return int
     */
    public function getIdMotivoDevolucaoRec(): int
    {
        return $this->idMotivoDevolucaoRec;
    }

    /**
     * @param int $idMotivoDevolucaoRec
     */
    public function setIdMotivoDevolucaoRec(int $idMotivoDevolucaoRec): void
    {
        $this->idMotivoDevolucaoRec = $idMotivoDevolucaoRec;
    }

    /**
     * @return string
     */
    public function getDsMotivoDevolucaoRec(): string
    {
        return $this->dsMotivoDevolucaoRec;
    }

    /**
     * @param string $dsMotivoDevolucaoRec
     */
    public function setDsMotivoDevolucaoRec(string $dsMotivoDevolucaoRec): void
    {
        $this->dsMotivoDevolucaoRec = $dsMotivoDevolucaoRec;
    }

    /**
     * @return string
     */
    public function getNmEmailDevolucaoRec(): string
    {
        return $this->nmEmailDevolucaoRec;
    }

    /**
     * @param string $nmEmailDevolucaoRec
     */
    public function setNmEmailDevolucaoRec(string $nmEmailDevolucaoRec): void
    {
        $this->nmEmailDevolucaoRec = $nmEmailDevolucaoRec;
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
    public function getNrCpfOperadorInclusao(): string
    {
        return $this->nrCpfOperadorInclusao;
    }

    /**
     * @param string $nrCpfOperadorInclusao
     */
    public function setNrCpfOperadorInclusao(string $nrCpfOperadorInclusao): void
    {
        $this->nrCpfOperadorInclusao = $nrCpfOperadorInclusao;
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
