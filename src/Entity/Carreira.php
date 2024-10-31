<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Carreira
 */
#[ORM\Table(name: 'CARREIRA')]
#[ORM\Entity]
class Carreira
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CARREIRA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial é único que especifica um registro na tabela CARREIRA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'CARREIRA_ID_CARREIRA_seq', allocationSize: 1, initialValue: 1)]
    private $idCarreira;

    /**
     * @var string
     */
    #[ORM\Column(name: 'SG_CARREIRA', type: 'string', length: 16, nullable: false, options: ['comment' => 'Sigla ou nome abreviado para o plano de carreira dado a um grupo de cargos.'])]
    private $sgCarreira;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_CARREIRA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome do plano da carreira incorporada a um grupo de cargo.'])]
    private $dsCarreira;

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
    public function getIdCarreira(): int
    {
        return $this->idCarreira;
    }

    /**
     * @param int $idCarreira
     */
    public function setIdCarreira(int $idCarreira): void
    {
        $this->idCarreira = $idCarreira;
    }

    /**
     * @return string
     */
    public function getSgCarreira(): string
    {
        return $this->sgCarreira;
    }

    /**
     * @param string $sgCarreira
     */
    public function setSgCarreira(string $sgCarreira): void
    {
        $this->sgCarreira = $sgCarreira;
    }

    /**
     * @return string
     */
    public function getDsCarreira(): string
    {
        return $this->dsCarreira;
    }

    /**
     * @param string $dsCarreira
     */
    public function setDsCarreira(string $dsCarreira): void
    {
        $this->dsCarreira = $dsCarreira;
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
