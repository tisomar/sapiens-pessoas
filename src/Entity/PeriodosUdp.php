<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * PeriodosUdp
 */
#[ORM\Table(name: 'PERIODOS_UDP')]
#[ORM\Index(name: 'IDX_E8426E347A3FBF54', columns: ['ID_APURACAO'])]
#[ORM\Entity]
class PeriodosUdp
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador do servidor que teve permanência em unidades de difícil provimento.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $idServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false)]
    private $nmServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_LOTACAO_EXERCICIO', type: 'integer', nullable: true, options: ['comment' => 'Identificador da unidade de exercício que era considerada neste período como unidade de difícil provimento.'])]
    private $idLotacaoExercicio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_LOTACAO_EXERCICIO', type: 'string', length: 30, nullable: true, options: ['comment' => 'Sigla da unidade de exercício que era considerada neste período como unidade de difícil provimento.'])]
    private $sgLotacaoExercicio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LOTACAO_EXERCICIO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome da unidade de exercício que era considerada neste período como unidade de difícil provimento.'])]
    private $dsLotacaoExercicio;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INICIO_MOVIMENTACAO', type: 'date', nullable: false, options: ['comment' => 'Data da movimentação do servidor para a unidade de difícil provimento.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $dtInicioMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FINAL_MOVIMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data de remoção do servidor da unidade de difícil provimento.'])]
    private $dtFinalMovimentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_AJUSTADO', type: 'date', nullable: true, options: ['comment' => 'Data de início da permanência do servidor na unidade, ajustada à data de entrada na carreira.'])]
    private $dtInicioAjustado;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FINAL_AJUSTADO', type: 'date', nullable: true, options: ['comment' => 'Data de final da permanência do servidor na unidade, ajustada à data de referência.'])]
    private $dtFinalAjustado;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIAS', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias de permanência na unidade segundo as datas ajustadas.'])]
    private $qtDias;

    /**
     * @var Apuracao
     */
    #[ORM\JoinColumn(name: 'ID_APURACAO', referencedColumnName: 'ID_APURACAO')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Apuracao')]
    private $idApuracao;

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
     * @return string
     */
    public function getNmServidor(): string
    {
        return $this->nmServidor;
    }

    /**
     * @param string $nmServidor
     */
    public function setNmServidor(string $nmServidor): void
    {
        $this->nmServidor = $nmServidor;
    }

    /**
     * @return int|null
     */
    public function getIdLotacaoExercicio(): ?int
    {
        return $this->idLotacaoExercicio;
    }

    /**
     * @param int|null $idLotacaoExercicio
     */
    public function setIdLotacaoExercicio(?int $idLotacaoExercicio): void
    {
        $this->idLotacaoExercicio = $idLotacaoExercicio;
    }

    /**
     * @return string|null
     */
    public function getSgLotacaoExercicio(): ?string
    {
        return $this->sgLotacaoExercicio;
    }

    /**
     * @param string|null $sgLotacaoExercicio
     */
    public function setSgLotacaoExercicio(?string $sgLotacaoExercicio): void
    {
        $this->sgLotacaoExercicio = $sgLotacaoExercicio;
    }

    /**
     * @return string|null
     */
    public function getDsLotacaoExercicio(): ?string
    {
        return $this->dsLotacaoExercicio;
    }

    /**
     * @param string|null $dsLotacaoExercicio
     */
    public function setDsLotacaoExercicio(?string $dsLotacaoExercicio): void
    {
        $this->dsLotacaoExercicio = $dsLotacaoExercicio;
    }

    /**
     * @return DateTime
     */
    public function getDtInicioMovimentacao(): \DateTime
    {
        return $this->dtInicioMovimentacao;
    }

    /**
     * @param DateTime $dtInicioMovimentacao
     */
    public function setDtInicioMovimentacao(\DateTime $dtInicioMovimentacao): void
    {
        $this->dtInicioMovimentacao = $dtInicioMovimentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFinalMovimentacao(): ?\DateTime
    {
        return $this->dtFinalMovimentacao;
    }

    /**
     * @param DateTime|null $dtFinalMovimentacao
     */
    public function setDtFinalMovimentacao(?\DateTime $dtFinalMovimentacao): void
    {
        $this->dtFinalMovimentacao = $dtFinalMovimentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioAjustado(): ?\DateTime
    {
        return $this->dtInicioAjustado;
    }

    /**
     * @param DateTime|null $dtInicioAjustado
     */
    public function setDtInicioAjustado(?\DateTime $dtInicioAjustado): void
    {
        $this->dtInicioAjustado = $dtInicioAjustado;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFinalAjustado(): ?\DateTime
    {
        return $this->dtFinalAjustado;
    }

    /**
     * @param DateTime|null $dtFinalAjustado
     */
    public function setDtFinalAjustado(?\DateTime $dtFinalAjustado): void
    {
        $this->dtFinalAjustado = $dtFinalAjustado;
    }

    /**
     * @return int|null
     */
    public function getQtDias(): ?int
    {
        return $this->qtDias;
    }

    /**
     * @param int|null $qtDias
     */
    public function setQtDias(?int $qtDias): void
    {
        $this->qtDias = $qtDias;
    }

    /**
     * @return Apuracao
     */
    public function getIdApuracao(): Apuracao
    {
        return $this->idApuracao;
    }

    /**
     * @param Apuracao $idApuracao
     */
    public function setIdApuracao(Apuracao $idApuracao): void
    {
        $this->idApuracao = $idApuracao;
    }


}
