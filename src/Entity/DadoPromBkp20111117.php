<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DadoPromBkp20111117
 */
#[ORM\Table(name: 'DADO_PROM_BKP20111117')]
#[ORM\Entity]
class DadoPromBkp20111117
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DADO_PROMOCAO', type: 'integer', nullable: false)]
    private $idDadoPromocao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_CATEGORIA_FUNCIONAL', type: 'smallint', nullable: true)]
    private $qtdCategoriaFuncional;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_SERVICO_CARREIRA', type: 'smallint', nullable: true)]
    private $qtdServicoCarreira;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_SERVICO_PUBLICO', type: 'smallint', nullable: true)]
    private $qtdServicoPublico;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QTD_SERVICO_MESARIO', type: 'smallint', nullable: true)]
    private $qtdServicoMesario;

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
     * @var int|null
     */
    #[ORM\Column(name: 'ID_TIPO_PADRAO', type: 'integer', nullable: true)]
    private $idTipoPadrao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO_PNE', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    private $nrClassificacaoPne;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_RH', type: 'integer', nullable: false)]
    private $idRh;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INGRESSO_CARREIRA', type: 'date', nullable: true)]
    private $dtIngressoCarreira;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_ESTAGIO_CONFIRMATORIO', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $inEstagioConfirmatorio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_TEMPO_EMPRESA_PUBLICA', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $inTempoEmpresaPublica;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_SUBJUDICE', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $inSubjudice;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_ELEGIVEL', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $inElegivel;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CARREIRA_PRECEDENTE', type: 'date', nullable: true)]
    private $dtCarreiraPrecedente;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DADO_PROM_BKP20111117_ID_TABLE', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdDadoPromocao(): int
    {
        return $this->idDadoPromocao;
    }

    /**
     * @param int $idDadoPromocao
     */
    public function setIdDadoPromocao(int $idDadoPromocao): void
    {
        $this->idDadoPromocao = $idDadoPromocao;
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
     * @return int|null
     */
    public function getQtdCategoriaFuncional(): ?int
    {
        return $this->qtdCategoriaFuncional;
    }

    /**
     * @param int|null $qtdCategoriaFuncional
     */
    public function setQtdCategoriaFuncional(?int $qtdCategoriaFuncional): void
    {
        $this->qtdCategoriaFuncional = $qtdCategoriaFuncional;
    }

    /**
     * @return int|null
     */
    public function getQtdServicoCarreira(): ?int
    {
        return $this->qtdServicoCarreira;
    }

    /**
     * @param int|null $qtdServicoCarreira
     */
    public function setQtdServicoCarreira(?int $qtdServicoCarreira): void
    {
        $this->qtdServicoCarreira = $qtdServicoCarreira;
    }

    /**
     * @return int|null
     */
    public function getQtdServicoPublico(): ?int
    {
        return $this->qtdServicoPublico;
    }

    /**
     * @param int|null $qtdServicoPublico
     */
    public function setQtdServicoPublico(?int $qtdServicoPublico): void
    {
        $this->qtdServicoPublico = $qtdServicoPublico;
    }

    /**
     * @return int|null
     */
    public function getQtdServicoMesario(): ?int
    {
        return $this->qtdServicoMesario;
    }

    /**
     * @param int|null $qtdServicoMesario
     */
    public function setQtdServicoMesario(?int $qtdServicoMesario): void
    {
        $this->qtdServicoMesario = $qtdServicoMesario;
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
     * @return int|null
     */
    public function getIdTipoPadrao(): ?int
    {
        return $this->idTipoPadrao;
    }

    /**
     * @param int|null $idTipoPadrao
     */
    public function setIdTipoPadrao(?int $idTipoPadrao): void
    {
        $this->idTipoPadrao = $idTipoPadrao;
    }

    /**
     * @return string|null
     */
    public function getNrClassificacaoPne(): ?string
    {
        return $this->nrClassificacaoPne;
    }

    /**
     * @param string|null $nrClassificacaoPne
     */
    public function setNrClassificacaoPne(?string $nrClassificacaoPne): void
    {
        $this->nrClassificacaoPne = $nrClassificacaoPne;
    }

    /**
     * @return int
     */
    public function getIdRh(): int
    {
        return $this->idRh;
    }

    /**
     * @param int $idRh
     */
    public function setIdRh(int $idRh): void
    {
        $this->idRh = $idRh;
    }

    /**
     * @return DateTime|null
     */
    public function getDtIngressoCarreira(): ?\DateTime
    {
        return $this->dtIngressoCarreira;
    }

    /**
     * @param DateTime|null $dtIngressoCarreira
     */
    public function setDtIngressoCarreira(?\DateTime $dtIngressoCarreira): void
    {
        $this->dtIngressoCarreira = $dtIngressoCarreira;
    }

    /**
     * @return string|null
     */
    public function getInEstagioConfirmatorio(): ?string
    {
        return $this->inEstagioConfirmatorio;
    }

    /**
     * @param string|null $inEstagioConfirmatorio
     */
    public function setInEstagioConfirmatorio(?string $inEstagioConfirmatorio): void
    {
        $this->inEstagioConfirmatorio = $inEstagioConfirmatorio;
    }

    /**
     * @return string|null
     */
    public function getInTempoEmpresaPublica(): ?string
    {
        return $this->inTempoEmpresaPublica;
    }

    /**
     * @param string|null $inTempoEmpresaPublica
     */
    public function setInTempoEmpresaPublica(?string $inTempoEmpresaPublica): void
    {
        $this->inTempoEmpresaPublica = $inTempoEmpresaPublica;
    }

    /**
     * @return string|null
     */
    public function getInSubjudice(): ?string
    {
        return $this->inSubjudice;
    }

    /**
     * @param string|null $inSubjudice
     */
    public function setInSubjudice(?string $inSubjudice): void
    {
        $this->inSubjudice = $inSubjudice;
    }

    /**
     * @return string|null
     */
    public function getInElegivel(): ?string
    {
        return $this->inElegivel;
    }

    /**
     * @param string|null $inElegivel
     */
    public function setInElegivel(?string $inElegivel): void
    {
        $this->inElegivel = $inElegivel;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCarreiraPrecedente(): ?\DateTime
    {
        return $this->dtCarreiraPrecedente;
    }

    /**
     * @param DateTime|null $dtCarreiraPrecedente
     */
    public function setDtCarreiraPrecedente(?\DateTime $dtCarreiraPrecedente): void
    {
        $this->dtCarreiraPrecedente = $dtCarreiraPrecedente;
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
