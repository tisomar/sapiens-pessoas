<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * AfastamentosConsiderados
 */
#[ORM\Table(name: 'AFASTAMENTOS_CONSIDERADOS')]
#[ORM\Index(name: 'IDX_14A79E2B7A3FBF54', columns: ['ID_APURACAO'])]
#[ORM\Entity]
class AfastamentosConsiderados
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador do servidor no RH definido na tabela AGU_RH.SERVIDOR'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $idServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_PERIODO', type: 'string', length: 25, nullable: false, options: ['comment' => 'Tempo ao qual este afastamento deve ser aplicado.  {CARREIRA ATUAL, CATEGORIA ATUAL, CARREIRA ANTERIOR, CATEGORIA CARR ANTERIOR}'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $inPeriodo;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_SERVIDOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Número do CPF do servidor, com zeros à esquerda.'])]
    private $nrCpfServidor;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: false, options: ['comment' => 'Nome do servidor que está na lista de promoção e remoção.'])]
    private $nmServidor;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_INICIO_AFASTAMENTO', type: 'date', nullable: false, options: ['comment' => 'Data de início do afastamento.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $dtInicioAfastamento;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_FIM_AFASTAMENTO', type: 'date', nullable: false, options: ['comment' => 'Data de fim do afastamento.'])]
    private $dtFimAfastamento;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_REFERENCIA', type: 'date', nullable: false, options: ['comment' => 'Data de referência para a apuração da lista.'])]
    private $dtReferencia;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERC_CARR_ATUAL', type: 'date', nullable: true, options: ['comment' => 'Data de início de exercício do servidor no cargo da carreira atual.'])]
    private $dtExercCarrAtual;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CTG_CARR_ATUAL', type: 'date', nullable: true, options: ['comment' => 'Data de ingresso ou promoção para a categoria atual da carreira atual. '])]
    private $dtCtgCarrAtual;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CTG_CARR_ANT', type: 'date', nullable: true, options: ['comment' => 'Data de ingresso ou promoção para a última categoria da carreira anterior. '])]
    private $dtCtgCarrAnt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_VACANC_CARR_ANT', type: 'date', nullable: true, options: ['comment' => 'Data da vacância no cargo efetivo da carreira anterior.'])]
    private $dtVacancCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TIPO_AFASTAMENTO', type: 'string', length: 200, nullable: true, options: ['comment' => 'Descrição do tipo de afastamento.'])]
    private $dsTipoAfastamento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_CONSIDERADO', type: 'date', nullable: true, options: ['comment' => 'Data de início do afastamento ajustado ao período do Tipo de Afastamento que está sendo considerado. Esta é a data que vai ser usada para calcular a quantidade de dias em afastamento.'])]
    private $dtInicioConsiderado;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_CONSIDERADO', type: 'date', nullable: true, options: ['comment' => 'Data de fim do afastamento ajustado ao período do Tipo de Afastamento que está sendo considerado. Esta ?? a data que vai ser usada para calcular a quantidade de dias em afastamento.'])]
    private $dtFimConsiderado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_AFETA_TSPF', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => "Indicador do tipo S/N que informa se o afastamento afeta o Tempo no Serviço Público Federal. Codificação: 'S' - SIM ou 'N' - NÃO"])]
    private $inAfetaTspf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_AFETA_TFI', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => "Indicador do tipo S/N que informa se o afastamento afeta o Tempo na Função Institucional. Codificação: 'S' - SIM ou 'N' - NÃO"])]
    private $inAfetaTfi;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFASTADO_TSPF', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias neste afastamento que deverá ser descontado se o período for afetado pelo Tempo no Serviço Público Federal.'])]
    private $qtDiaAfastadoTspf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFASTADO_TFI', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias neste afastamento que deverá ser descontado se o período for afetado pelo Tempo na Função Institucional'])]
    private $qtDiaAfastadoTfi;

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
    public function getInPeriodo(): string
    {
        return $this->inPeriodo;
    }

    /**
     * @param string $inPeriodo
     */
    public function setInPeriodo(string $inPeriodo): void
    {
        $this->inPeriodo = $inPeriodo;
    }

    /**
     * @return string
     */
    public function getNrCpfServidor(): string
    {
        return $this->nrCpfServidor;
    }

    /**
     * @param string $nrCpfServidor
     */
    public function setNrCpfServidor(string $nrCpfServidor): void
    {
        $this->nrCpfServidor = $nrCpfServidor;
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
     * @return DateTime
     */
    public function getDtFimAfastamento(): \DateTime
    {
        return $this->dtFimAfastamento;
    }

    /**
     * @param DateTime $dtFimAfastamento
     */
    public function setDtFimAfastamento(\DateTime $dtFimAfastamento): void
    {
        $this->dtFimAfastamento = $dtFimAfastamento;
    }

    /**
     * @return DateTime
     */
    public function getDtReferencia(): \DateTime
    {
        return $this->dtReferencia;
    }

    /**
     * @param DateTime $dtReferencia
     */
    public function setDtReferencia(\DateTime $dtReferencia): void
    {
        $this->dtReferencia = $dtReferencia;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExercCarrAtual(): ?\DateTime
    {
        return $this->dtExercCarrAtual;
    }

    /**
     * @param DateTime|null $dtExercCarrAtual
     */
    public function setDtExercCarrAtual(?\DateTime $dtExercCarrAtual): void
    {
        $this->dtExercCarrAtual = $dtExercCarrAtual;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCtgCarrAtual(): ?\DateTime
    {
        return $this->dtCtgCarrAtual;
    }

    /**
     * @param DateTime|null $dtCtgCarrAtual
     */
    public function setDtCtgCarrAtual(?\DateTime $dtCtgCarrAtual): void
    {
        $this->dtCtgCarrAtual = $dtCtgCarrAtual;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCtgCarrAnt(): ?\DateTime
    {
        return $this->dtCtgCarrAnt;
    }

    /**
     * @param DateTime|null $dtCtgCarrAnt
     */
    public function setDtCtgCarrAnt(?\DateTime $dtCtgCarrAnt): void
    {
        $this->dtCtgCarrAnt = $dtCtgCarrAnt;
    }

    /**
     * @return DateTime|null
     */
    public function getDtVacancCarrAnt(): ?\DateTime
    {
        return $this->dtVacancCarrAnt;
    }

    /**
     * @param DateTime|null $dtVacancCarrAnt
     */
    public function setDtVacancCarrAnt(?\DateTime $dtVacancCarrAnt): void
    {
        $this->dtVacancCarrAnt = $dtVacancCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getDsTipoAfastamento(): ?string
    {
        return $this->dsTipoAfastamento;
    }

    /**
     * @param string|null $dsTipoAfastamento
     */
    public function setDsTipoAfastamento(?string $dsTipoAfastamento): void
    {
        $this->dsTipoAfastamento = $dsTipoAfastamento;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioConsiderado(): ?\DateTime
    {
        return $this->dtInicioConsiderado;
    }

    /**
     * @param DateTime|null $dtInicioConsiderado
     */
    public function setDtInicioConsiderado(?\DateTime $dtInicioConsiderado): void
    {
        $this->dtInicioConsiderado = $dtInicioConsiderado;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimConsiderado(): ?\DateTime
    {
        return $this->dtFimConsiderado;
    }

    /**
     * @param DateTime|null $dtFimConsiderado
     */
    public function setDtFimConsiderado(?\DateTime $dtFimConsiderado): void
    {
        $this->dtFimConsiderado = $dtFimConsiderado;
    }

    /**
     * @return string|null
     */
    public function getInAfetaTspf(): ?string
    {
        return $this->inAfetaTspf;
    }

    /**
     * @param string|null $inAfetaTspf
     */
    public function setInAfetaTspf(?string $inAfetaTspf): void
    {
        $this->inAfetaTspf = $inAfetaTspf;
    }

    /**
     * @return string|null
     */
    public function getInAfetaTfi(): ?string
    {
        return $this->inAfetaTfi;
    }

    /**
     * @param string|null $inAfetaTfi
     */
    public function setInAfetaTfi(?string $inAfetaTfi): void
    {
        $this->inAfetaTfi = $inAfetaTfi;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfastadoTspf(): ?int
    {
        return $this->qtDiaAfastadoTspf;
    }

    /**
     * @param int|null $qtDiaAfastadoTspf
     */
    public function setQtDiaAfastadoTspf(?int $qtDiaAfastadoTspf): void
    {
        $this->qtDiaAfastadoTspf = $qtDiaAfastadoTspf;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfastadoTfi(): ?int
    {
        return $this->qtDiaAfastadoTfi;
    }

    /**
     * @param int|null $qtDiaAfastadoTfi
     */
    public function setQtDiaAfastadoTfi(?int $qtDiaAfastadoTfi): void
    {
        $this->qtDiaAfastadoTfi = $qtDiaAfastadoTfi;
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
