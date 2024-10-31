<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Funcao
 */
#[ORM\Table(name: 'FUNCAO')]
#[ORM\Entity]
class Funcao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_FUNCAO_COMISSIONADA', type: 'integer', nullable: false)]
    private $idFuncaoComissionada;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_OPCAO', type: 'integer', nullable: false)]
    private $idTipoOpcao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CARGO_FUNCAO', type: 'integer', nullable: false)]
    private $idCargoFuncao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA_NOMEACAO', type: 'integer', nullable: true)]
    private $idNormaNomeacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA_OPCAO', type: 'integer', nullable: true)]
    private $idNormaOpcao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_NORMA_EXONERACAO', type: 'integer', nullable: true)]
    private $idNormaExoneracao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_OCUPACAO', type: 'integer', nullable: false)]
    private $idTipoOcupacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_DIREITO_ADQUIRIDO', type: 'string', length: 1, nullable: false, options: ['fixed' => true])]
    private $inDireitoAdquirido;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_NOMEACAO', type: 'date', nullable: true)]
    private $dtNomeacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_POSSE', type: 'date', nullable: true)]
    private $dtPosse;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERCICIO', type: 'date', nullable: true)]
    private $dtExercicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXONERACAO', type: 'date', nullable: true)]
    private $dtExoneracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true)]
    private $dsObservacao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false)]
    private $dtOperacaoInclusao;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false)]
    private $dtOperacaoAlteracao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true)]
    private $dtOperacaoExclusao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'FUNCAO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdFuncaoComissionada(): int
    {
        return $this->idFuncaoComissionada;
    }

    /**
     * @param int $idFuncaoComissionada
     */
    public function setIdFuncaoComissionada(int $idFuncaoComissionada): void
    {
        $this->idFuncaoComissionada = $idFuncaoComissionada;
    }

    /**
     * @return int
     */
    public function getIdServidor(): int
    {
        return $this->idServidor;
    }

    /**
     * @param int $idServidor
     */
    public function setIdServidor(int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return int
     */
    public function getIdTipoOpcao(): int
    {
        return $this->idTipoOpcao;
    }

    /**
     * @param int $idTipoOpcao
     */
    public function setIdTipoOpcao(int $idTipoOpcao): void
    {
        $this->idTipoOpcao = $idTipoOpcao;
    }

    /**
     * @return int
     */
    public function getIdCargoFuncao(): int
    {
        return $this->idCargoFuncao;
    }

    /**
     * @param int $idCargoFuncao
     */
    public function setIdCargoFuncao(int $idCargoFuncao): void
    {
        $this->idCargoFuncao = $idCargoFuncao;
    }

    /**
     * @return int|null
     */
    public function getIdNormaNomeacao(): ?int
    {
        return $this->idNormaNomeacao;
    }

    /**
     * @param int|null $idNormaNomeacao
     */
    public function setIdNormaNomeacao(?int $idNormaNomeacao): void
    {
        $this->idNormaNomeacao = $idNormaNomeacao;
    }

    /**
     * @return int|null
     */
    public function getIdNormaOpcao(): ?int
    {
        return $this->idNormaOpcao;
    }

    /**
     * @param int|null $idNormaOpcao
     */
    public function setIdNormaOpcao(?int $idNormaOpcao): void
    {
        $this->idNormaOpcao = $idNormaOpcao;
    }

    /**
     * @return int|null
     */
    public function getIdNormaExoneracao(): ?int
    {
        return $this->idNormaExoneracao;
    }

    /**
     * @param int|null $idNormaExoneracao
     */
    public function setIdNormaExoneracao(?int $idNormaExoneracao): void
    {
        $this->idNormaExoneracao = $idNormaExoneracao;
    }

    /**
     * @return int
     */
    public function getIdTipoOcupacao(): int
    {
        return $this->idTipoOcupacao;
    }

    /**
     * @param int $idTipoOcupacao
     */
    public function setIdTipoOcupacao(int $idTipoOcupacao): void
    {
        $this->idTipoOcupacao = $idTipoOcupacao;
    }

    /**
     * @return string
     */
    public function getInDireitoAdquirido(): string
    {
        return $this->inDireitoAdquirido;
    }

    /**
     * @param string $inDireitoAdquirido
     */
    public function setInDireitoAdquirido(string $inDireitoAdquirido): void
    {
        $this->inDireitoAdquirido = $inDireitoAdquirido;
    }

    /**
     * @return DateTime|null
     */
    public function getDtNomeacao(): ?\DateTime
    {
        return $this->dtNomeacao;
    }

    /**
     * @param DateTime|null $dtNomeacao
     */
    public function setDtNomeacao(?\DateTime $dtNomeacao): void
    {
        $this->dtNomeacao = $dtNomeacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPosse(): ?\DateTime
    {
        return $this->dtPosse;
    }

    /**
     * @param DateTime|null $dtPosse
     */
    public function setDtPosse(?\DateTime $dtPosse): void
    {
        $this->dtPosse = $dtPosse;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExercicio(): ?\DateTime
    {
        return $this->dtExercicio;
    }

    /**
     * @param DateTime|null $dtExercicio
     */
    public function setDtExercicio(?\DateTime $dtExercicio): void
    {
        $this->dtExercicio = $dtExercicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExoneracao(): ?\DateTime
    {
        return $this->dtExoneracao;
    }

    /**
     * @param DateTime|null $dtExoneracao
     */
    public function setDtExoneracao(?\DateTime $dtExoneracao): void
    {
        $this->dtExoneracao = $dtExoneracao;
    }

    /**
     * @return string|null
     */
    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    /**
     * @param string|null $dsObservacao
     */
    public function setDsObservacao(?string $dsObservacao): void
    {
        $this->dsObservacao = $dsObservacao;
    }

    /**
     * @return DateTime
     */
    public function getDtOperacaoInclusao(): \DateTime
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return DateTime
     */
    public function getDtOperacaoAlteracao(): \DateTime
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime $dtOperacaoAlteracao): void
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
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable): void
    {
        $this->idTable = $idTable;
    }


}
