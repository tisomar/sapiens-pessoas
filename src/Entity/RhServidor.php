<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * RhServidor
 */
#[ORM\Table(name: 'RH_SERVIDOR')]
#[ORM\Index(name: 'IDX_3357702F10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_3357702FA4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
class RhServidor
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_RH_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela RH_SERVIDOR.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'RH_SERVIDOR_ID_RH_SERVIDOR_seq', allocationSize: 1, initialValue: 1)]
    private $idRhServidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_RHSERVIDOR', type: 'date', nullable: true, options: ['comment' => 'Data em que foi feito o cadastro do servidor público no sistema alocado em um determinado RH.'])]
    private $dtInicioRhservidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_RHSERVIDOR', type: 'date', nullable: true, options: ['comment' => 'Data em que foi feito a rescisão (Vacância) do servidor público no sistema, assim o servidor não estará mais ativo na folha do RH.'])]
    private $dtFimRhservidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: true, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: true, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

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
     * @return int
     */
    public function getIdRhServidor(): int
    {
        return $this->idRhServidor;
    }

    /**
     * @param int $idRhServidor
     */
    public function setIdRhServidor(int $idRhServidor): void
    {
        $this->idRhServidor = $idRhServidor;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioRhservidor(): ?\DateTime
    {
        return $this->dtInicioRhservidor;
    }

    /**
     * @param DateTime|null $dtInicioRhservidor
     */
    public function setDtInicioRhservidor(?\DateTime $dtInicioRhservidor): void
    {
        $this->dtInicioRhservidor = $dtInicioRhservidor;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimRhservidor(): ?\DateTime
    {
        return $this->dtFimRhservidor;
    }

    /**
     * @param DateTime|null $dtFimRhservidor
     */
    public function setDtFimRhservidor(?\DateTime $dtFimRhservidor): void
    {
        $this->dtFimRhservidor = $dtFimRhservidor;
    }

    /**
     * @return DateTime|string|null
     */
    public function getDtOperacaoInclusao(): \DateTime|string|null
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime|string|null $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime|string|null $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return DateTime|string|null
     */
    public function getDtOperacaoAlteracao(): \DateTime|string|null
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime|string|null $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime|string|null $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfOperador(): ?string
    {
        return $this->nrCpfOperador;
    }

    /**
     * @param string|null $nrCpfOperador
     */
    public function setNrCpfOperador(?string $nrCpfOperador): void
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


}
