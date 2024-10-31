<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * SituacaoRequisicao
 */
#[ORM\Table(name: 'SITUACAO_REQUISICAO')]
#[ORM\Entity]
class SituacaoRequisicao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SITUACAO_REQUISICAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela SITUACAO_REQUISICAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'SITUACAO_REQUISICAO_ID_SITUACA', allocationSize: 1, initialValue: 1)]
    private $idSituacaoRequisicao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_SITUACAO_REQUISICAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para as possíveis situações do processo de uma requisição.'])]
    private $dsSituacaoRequisicao;

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
     * @return int
     */
    public function getIdSituacaoRequisicao(): int
    {
        return $this->idSituacaoRequisicao;
    }

    /**
     * @param int $idSituacaoRequisicao
     */
    public function setIdSituacaoRequisicao(int $idSituacaoRequisicao): void
    {
        $this->idSituacaoRequisicao = $idSituacaoRequisicao;
    }

    /**
     * @return string
     */
    public function getDsSituacaoRequisicao(): string
    {
        return $this->dsSituacaoRequisicao;
    }

    /**
     * @param string $dsSituacaoRequisicao
     */
    public function setDsSituacaoRequisicao(string $dsSituacaoRequisicao): void
    {
        $this->dsSituacaoRequisicao = $dsSituacaoRequisicao;
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


}
