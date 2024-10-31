<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LotacaoIdeal
 */
#[ORM\Table(name: 'LOTACAO_IDEAL')]
#[ORM\Index(name: 'IDX_3FD40FEE601E1746', columns: ['ID_LOTACAO'])]
#[ORM\Entity]
class LotacaoIdeal
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOTACAO_IDEAL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica uma lotação ideal para o sistema.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOTACAO_IDEAL_ID_LOTACAO_IDEAL', allocationSize: 1, initialValue: 1)]
    private $idLotacaoIdeal;

    /**
     * @var int
     */
    #[ORM\Column(name: 'NR_LOTACAO_IDEAL', type: 'integer', nullable: false, options: ['comment' => 'Número de ordenação identificando a lotação favorável para o sistema, sendo esta a lotação ideal.'])]
    private $nrLotacaoIdeal;

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
     * @var Lotacao
     */
    #[ORM\JoinColumn(name: 'ID_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    private $idLotacao;

    /**
     * @return int
     */
    public function getIdLotacaoIdeal(): int
    {
        return $this->idLotacaoIdeal;
    }

    /**
     * @param int $idLotacaoIdeal
     */
    public function setIdLotacaoIdeal(int $idLotacaoIdeal): void
    {
        $this->idLotacaoIdeal = $idLotacaoIdeal;
    }

    /**
     * @return int
     */
    public function getNrLotacaoIdeal(): int
    {
        return $this->nrLotacaoIdeal;
    }

    /**
     * @param int $nrLotacaoIdeal
     */
    public function setNrLotacaoIdeal(int $nrLotacaoIdeal): void
    {
        $this->nrLotacaoIdeal = $nrLotacaoIdeal;
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
     * @return Lotacao
     */
    public function getIdLotacao(): Lotacao
    {
        return $this->idLotacao;
    }

    /**
     * @param Lotacao $idLotacao
     */
    public function setIdLotacao(Lotacao $idLotacao): void
    {
        $this->idLotacao = $idLotacao;
    }


}
