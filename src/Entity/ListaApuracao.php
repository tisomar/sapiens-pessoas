<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ListaApuracao
 */
#[ORM\Table(name: 'LISTA_APURACAO')]
#[ORM\Index(name: 'IDX_59F940947A3FBF54', columns: ['ID_APURACAO'])]
#[ORM\Entity]
class ListaApuracao
{
    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_SERVIDOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'CPF do servidor, com zeros à esquerda.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $nrCpfServidor;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false, options: ['comment' => 'Identificador do servidor no RH definido na tabela AGU_RH.SERVIDOR'])]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_SIAPE', type: 'string', length: 15, nullable: true, options: ['comment' => 'Matrícula SIAPE do servidor.'])]
    private $nrSiape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_SERVIDOR', type: 'string', length: 70, nullable: true, options: ['comment' => 'Nome do Servidor que estará na lista de promoção ou remoção.'])]
    private $nmServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_CARGO_EFETIVO', type: 'integer', nullable: true, options: ['comment' => 'Código do cargo efetivo do servidor no RH, definido na tabela AGU_RH.CARGO_EFETIVO'])]
    private $idCargoEfetivo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_CARGO_EFETIVO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código do cargo efetivo no SIAPE, mesmo código de Cargo Efetivo que tem no XAGU_ESTRUTURA'])]
    private $cdCargoEfetivo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_EFETIVO_RH', type: 'string', length: 100, nullable: true, options: ['comment' => 'Descrição do cargo efetivo do servidor.'])]
    private $dsCargoEfetivoRh;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_CARR_ATUAL', type: 'string', length: 50, nullable: true, options: ['comment' => 'Nome da Carreira a qual pertence o cargo efetivo atual.'])]
    private $nmCarrAtual;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CONCURSO', type: 'string', length: 50, nullable: true, options: ['comment' => 'Número de ordem do concurso de ingresso do servidor no cargo efetivo atual.'])]
    private $nrConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ANO_CONCURSO', type: 'integer', nullable: true, options: ['comment' => 'Ano de homologação do resultado do concurso de ingresso do servidor no cargo efetivo atual.'])]
    private $nrAnoConcurso;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CLASSIFICACAO_CONCURSO', type: 'integer', nullable: true, options: ['comment' => 'Número de classificação no concurso de ingresso para o cargo efetivo atual.'])]
    private $nrClassificacaoConcurso;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERC_CARR_ATUAL', type: 'date', nullable: true, options: ['comment' => 'Data de início do exercício no cargo efetivo atual.'])]
    private $dtExercCarrAtual;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CARR_ATUAL_TSPF', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias em afastamento na carreira atual que afetem o tempo no serviço público federal.'])]
    private $qtDiaAfstCarrAtualTspf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CARR_ATUAL_TFI', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias em afastamento na carreira atual que afetem o tempo na função institucional.'])]
    private $qtDiaAfstCarrAtualTfi;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_CARREIRA_DESC_AFST', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias na carreira atual descontado os afastamentos (TSPF ou TFI).'])]
    private $qtDiaCarreiraDescAfst;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CTG_ATUAL', type: 'date', nullable: true, options: ['comment' => 'Data de entrada (promoção) para a Categoria Atual'])]
    private $dtCtgAtual;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_CTG_ATUAL_TP_PADRAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Descritivo curto da Categoria Atual do servidor (Ex: 1ª CAT. 2ª CAT, CAT ESP...). Não é bem padronizado.'])]
    private $cdCtgAtualTpPadrao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'CD_CTG_ATUAL_TP_CLASSE', type: 'integer', nullable: true, options: ['comment' => 'Código numérico do Padrão definido em TIPO_PADRAO.CD_TIPO_CLASSE.  No caso de servidores jurídicos, está vindo a Classe.'])]
    private $cdCtgAtualTpClasse;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_CTG_ATUAL', type: 'string', length: 10, nullable: true, options: ['comment' => 'Sigla do Padr??o.  No caso de servidores jurídicos, está vindo a Classe.'])]
    private $sgCtgAtual;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CTG_ATUAL', type: 'string', length: 30, nullable: true, options: ['comment' => 'Descrição por extenso da Classe/Categoria do servidor.'])]
    private $dsCtgAtual;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'VL_CTG_ATUAL', type: 'integer', nullable: true, options: ['comment' => 'Valor numérico sequencial que mostra a ordem crescente dos  padrões dentro das classes. Usado como critério de ordenação.'])]
    private $vlCtgAtual;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CTG_ATUAL_TSPF', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias em afastamento na categoria atual que afetem o tempo no serviço público federal.'])]
    private $qtDiaAfstCtgAtualTspf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CTG_ATUAL_TFI', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias em afastamento na categoria atual que afetem o tempo na função institucional.'])]
    private $qtDiaAfstCtgAtualTfi;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_CTG_DESC_AFST', type: 'integer', nullable: true, options: ['comment' => 'Quantidade total de dias na categoria atual descontado os afastamentos (TSPF ou TFI).'])]
    private $qtDiaCtgDescAfst;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_CARGO_EFETIVO_CARR_ANT', type: 'integer', nullable: true, options: ['comment' => 'Código do RH para o cargo efetivo da carreira anterior à atual, definido na tabela AGU_RH.CARGO_EFETIVO'])]
    private $idCargoEfetivoCarrAnt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_CARGO_CARR_ANT', type: 'integer', nullable: true, options: ['comment' => 'Identificador do cargo da carreira anterior  definido na tabela AGU_RH.CARGO_EFETIVO'])]
    private $idCargoCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CARGO_CARR_ANT', type: 'string', length: 100, nullable: true, options: ['comment' => 'Descrição do cargo efetivo da carreira anterior do servidor.'])]
    private $dsCargoCarrAnt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_PROVIM_CARR_ANT', type: 'integer', nullable: true, options: ['comment' => 'Identificador do ato de provimento do servidor no cargo efetivo da carreira anterior.'])]
    private $idProvimCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_CTG_CARR_ANT', type: 'string', length: 100, nullable: true, options: ['comment' => 'Sigla da categoria do servidor na carreira anterior.'])]
    private $sgCtgCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CTG_CARR_ANT', type: 'string', length: 30, nullable: true, options: ['comment' => 'Descrição da Classe/Categoria da carreira anterior.'])]
    private $dsCtgCarrAnt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'VL_CTG_CARR_ANT', type: 'integer', nullable: true, options: ['comment' => 'Valor numérico sequencial que mostra a ordem crescente dos  padrões dentro das classes/categorias. Usado como critério de ordenação.'])]
    private $vlCtgCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_PADR_CARR_ANT', type: 'string', length: 10, nullable: true, options: ['comment' => 'Sigla do padrão na categoria da carreira anterior.'])]
    private $sgPadrCarrAnt;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_PADR_CARR_ANT', type: 'string', length: 100, nullable: true, options: ['comment' => 'Descrição do padrão na categoria da carreira anterior.'])]
    private $dsPadrCarrAnt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'VL_PADR_CARR_ANT', type: 'integer', nullable: true, options: ['comment' => 'Valor numérico sequencial que mostra a ordem crescente dos  padrões dentro das classes/categorias da carreira anterior. Usado como critério de ordenação.'])]
    private $vlPadrCarrAnt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXERC_CARR_ANT', type: 'date', nullable: true, options: ['comment' => 'Data de início de exercício no cargo efetivo da carreira anterior.'])]
    private $dtExercCarrAnt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CLASSE_CARR_ANT', type: 'date', nullable: true, options: ['comment' => 'Data de entrada na última classe da cargo efetivo da carreira anterior.'])]
    private $dtClasseCarrAnt;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_VACANC_CARR_ANT', type: 'date', nullable: true, options: ['comment' => 'Data de vacância do cargo efetivo da carreira anterior.'])]
    private $dtVacancCarrAnt;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CTG_CARR_ANT_TSPF', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias em afastamento na ultima categoria (mais recente) do cargo da carreira anterior descontando afastamentos que afetam o Tempo no Serviço Público Federal.'])]
    private $qtDiaAfstCtgCarrAntTspf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFST_CTG_CARR_ANT_TFI', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias em afastamento na ultima categoria (mais recente) do cargo da carreira anterior descontando afastamentos que afetam o Tempo na Função Institucional.'])]
    private $qtDiaAfstCtgCarrAntTfi;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_CTG_CARR_ANT_DESC_AFST', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias na ultima categoria (mais recente) do cargo da carreira anterior descontados afastamentos (TSPF ou TFI).'])]
    private $qtDiaCtgCarrAntDescAfst;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_CARGO_BCH_DIR', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias em outras carreiras ou cargos efetivos privativos de bacharel de Direito de órgãos e entidades da Adm.Federal direta, autárquica e fundacional.'])]
    private $qtDiaCargoBchDir;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_TSPF', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias no serviço público federal antes da AGU'])]
    private $qtDiaTspf;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_TSPF_AGU', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias no serviço público federal incluindo o tempo na AGU'])]
    private $qtDiaTspfAgu;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_MESARIO', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias em que foi mesário a serviço da Justiça Eleitoral.'])]
    private $qtDiaMesario;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_NASCIMENTO', type: 'date', nullable: true, options: ['comment' => 'Data de nascimento do servidor.'])]
    private $dtNascimento;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_IDADE', type: 'integer', nullable: true, options: ['comment' => 'Idade do servidor expressa em dias.'])]
    private $qtDiaIdade;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIAS_UDP', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias em unidades de Unidades de Difícil Provimento, sem descontar os afastamentos'])]
    private $qtDiasUdp;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIA_AFAST_UDP', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de dias de afastamento em  Unidades de Difícil Provimento.'])]
    private $qtDiaAfastUdp;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SN_2ANOS_UDP', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'comment' => 'Ter acumulado 2 anos de serviço em Unidades de Difícil Provimento, descontados os afastamentos)'])]
    private $sn2anosUdp;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SN_3ANOS_UDP', type: 'string', length: 3, nullable: true, options: ['fixed' => true, 'comment' => 'Ter acumulado 3 anos de serviço em Unidades de Dif??cil Provimento, descontados os afastamentos)'])]
    private $sn3anosUdp;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_ORDEM_CLASSE_PADRAO', type: 'integer', nullable: true, options: ['comment' => 'Ordenação para a categoria funcional CLASSE/PADR??O precedente, ou seja, precedeu a carreira do servidor.'])]
    private $nrOrdemClassePadrao;

    /**
     * @var Apuracao
     */
    #[ORM\JoinColumn(name: 'ID_APURACAO', referencedColumnName: 'ID_APURACAO')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Apuracao')]
    private $idApuracao;

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
     * @return string|null
     */
    public function getNrSiape(): ?string
    {
        return $this->nrSiape;
    }

    /**
     * @param string|null $nrSiape
     */
    public function setNrSiape(?string $nrSiape): void
    {
        $this->nrSiape = $nrSiape;
    }

    /**
     * @return string|null
     */
    public function getNmServidor(): ?string
    {
        return $this->nmServidor;
    }

    /**
     * @param string|null $nmServidor
     */
    public function setNmServidor(?string $nmServidor): void
    {
        $this->nmServidor = $nmServidor;
    }

    /**
     * @return int|null
     */
    public function getIdCargoEfetivo(): ?int
    {
        return $this->idCargoEfetivo;
    }

    /**
     * @param int|null $idCargoEfetivo
     */
    public function setIdCargoEfetivo(?int $idCargoEfetivo): void
    {
        $this->idCargoEfetivo = $idCargoEfetivo;
    }

    /**
     * @return string|null
     */
    public function getCdCargoEfetivo(): ?string
    {
        return $this->cdCargoEfetivo;
    }

    /**
     * @param string|null $cdCargoEfetivo
     */
    public function setCdCargoEfetivo(?string $cdCargoEfetivo): void
    {
        $this->cdCargoEfetivo = $cdCargoEfetivo;
    }

    /**
     * @return string|null
     */
    public function getDsCargoEfetivoRh(): ?string
    {
        return $this->dsCargoEfetivoRh;
    }

    /**
     * @param string|null $dsCargoEfetivoRh
     */
    public function setDsCargoEfetivoRh(?string $dsCargoEfetivoRh): void
    {
        $this->dsCargoEfetivoRh = $dsCargoEfetivoRh;
    }

    /**
     * @return string|null
     */
    public function getNmCarrAtual(): ?string
    {
        return $this->nmCarrAtual;
    }

    /**
     * @param string|null $nmCarrAtual
     */
    public function setNmCarrAtual(?string $nmCarrAtual): void
    {
        $this->nmCarrAtual = $nmCarrAtual;
    }

    /**
     * @return string|null
     */
    public function getNrConcurso(): ?string
    {
        return $this->nrConcurso;
    }

    /**
     * @param string|null $nrConcurso
     */
    public function setNrConcurso(?string $nrConcurso): void
    {
        $this->nrConcurso = $nrConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrAnoConcurso(): ?int
    {
        return $this->nrAnoConcurso;
    }

    /**
     * @param int|null $nrAnoConcurso
     */
    public function setNrAnoConcurso(?int $nrAnoConcurso): void
    {
        $this->nrAnoConcurso = $nrAnoConcurso;
    }

    /**
     * @return int|null
     */
    public function getNrClassificacaoConcurso(): ?int
    {
        return $this->nrClassificacaoConcurso;
    }

    /**
     * @param int|null $nrClassificacaoConcurso
     */
    public function setNrClassificacaoConcurso(?int $nrClassificacaoConcurso): void
    {
        $this->nrClassificacaoConcurso = $nrClassificacaoConcurso;
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
     * @return int|null
     */
    public function getQtDiaAfstCarrAtualTspf(): ?int
    {
        return $this->qtDiaAfstCarrAtualTspf;
    }

    /**
     * @param int|null $qtDiaAfstCarrAtualTspf
     */
    public function setQtDiaAfstCarrAtualTspf(?int $qtDiaAfstCarrAtualTspf): void
    {
        $this->qtDiaAfstCarrAtualTspf = $qtDiaAfstCarrAtualTspf;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfstCarrAtualTfi(): ?int
    {
        return $this->qtDiaAfstCarrAtualTfi;
    }

    /**
     * @param int|null $qtDiaAfstCarrAtualTfi
     */
    public function setQtDiaAfstCarrAtualTfi(?int $qtDiaAfstCarrAtualTfi): void
    {
        $this->qtDiaAfstCarrAtualTfi = $qtDiaAfstCarrAtualTfi;
    }

    /**
     * @return int|null
     */
    public function getQtDiaCarreiraDescAfst(): ?int
    {
        return $this->qtDiaCarreiraDescAfst;
    }

    /**
     * @param int|null $qtDiaCarreiraDescAfst
     */
    public function setQtDiaCarreiraDescAfst(?int $qtDiaCarreiraDescAfst): void
    {
        $this->qtDiaCarreiraDescAfst = $qtDiaCarreiraDescAfst;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCtgAtual(): ?\DateTime
    {
        return $this->dtCtgAtual;
    }

    /**
     * @param DateTime|null $dtCtgAtual
     */
    public function setDtCtgAtual(?\DateTime $dtCtgAtual): void
    {
        $this->dtCtgAtual = $dtCtgAtual;
    }

    /**
     * @return string|null
     */
    public function getCdCtgAtualTpPadrao(): ?string
    {
        return $this->cdCtgAtualTpPadrao;
    }

    /**
     * @param string|null $cdCtgAtualTpPadrao
     */
    public function setCdCtgAtualTpPadrao(?string $cdCtgAtualTpPadrao): void
    {
        $this->cdCtgAtualTpPadrao = $cdCtgAtualTpPadrao;
    }

    /**
     * @return int|null
     */
    public function getCdCtgAtualTpClasse(): ?int
    {
        return $this->cdCtgAtualTpClasse;
    }

    /**
     * @param int|null $cdCtgAtualTpClasse
     */
    public function setCdCtgAtualTpClasse(?int $cdCtgAtualTpClasse): void
    {
        $this->cdCtgAtualTpClasse = $cdCtgAtualTpClasse;
    }

    /**
     * @return string|null
     */
    public function getSgCtgAtual(): ?string
    {
        return $this->sgCtgAtual;
    }

    /**
     * @param string|null $sgCtgAtual
     */
    public function setSgCtgAtual(?string $sgCtgAtual): void
    {
        $this->sgCtgAtual = $sgCtgAtual;
    }

    /**
     * @return string|null
     */
    public function getDsCtgAtual(): ?string
    {
        return $this->dsCtgAtual;
    }

    /**
     * @param string|null $dsCtgAtual
     */
    public function setDsCtgAtual(?string $dsCtgAtual): void
    {
        $this->dsCtgAtual = $dsCtgAtual;
    }

    /**
     * @return int|null
     */
    public function getVlCtgAtual(): ?int
    {
        return $this->vlCtgAtual;
    }

    /**
     * @param int|null $vlCtgAtual
     */
    public function setVlCtgAtual(?int $vlCtgAtual): void
    {
        $this->vlCtgAtual = $vlCtgAtual;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfstCtgAtualTspf(): ?int
    {
        return $this->qtDiaAfstCtgAtualTspf;
    }

    /**
     * @param int|null $qtDiaAfstCtgAtualTspf
     */
    public function setQtDiaAfstCtgAtualTspf(?int $qtDiaAfstCtgAtualTspf): void
    {
        $this->qtDiaAfstCtgAtualTspf = $qtDiaAfstCtgAtualTspf;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfstCtgAtualTfi(): ?int
    {
        return $this->qtDiaAfstCtgAtualTfi;
    }

    /**
     * @param int|null $qtDiaAfstCtgAtualTfi
     */
    public function setQtDiaAfstCtgAtualTfi(?int $qtDiaAfstCtgAtualTfi): void
    {
        $this->qtDiaAfstCtgAtualTfi = $qtDiaAfstCtgAtualTfi;
    }

    /**
     * @return int|null
     */
    public function getQtDiaCtgDescAfst(): ?int
    {
        return $this->qtDiaCtgDescAfst;
    }

    /**
     * @param int|null $qtDiaCtgDescAfst
     */
    public function setQtDiaCtgDescAfst(?int $qtDiaCtgDescAfst): void
    {
        $this->qtDiaCtgDescAfst = $qtDiaCtgDescAfst;
    }

    /**
     * @return int|null
     */
    public function getIdCargoEfetivoCarrAnt(): ?int
    {
        return $this->idCargoEfetivoCarrAnt;
    }

    /**
     * @param int|null $idCargoEfetivoCarrAnt
     */
    public function setIdCargoEfetivoCarrAnt(?int $idCargoEfetivoCarrAnt): void
    {
        $this->idCargoEfetivoCarrAnt = $idCargoEfetivoCarrAnt;
    }

    /**
     * @return int|null
     */
    public function getIdCargoCarrAnt(): ?int
    {
        return $this->idCargoCarrAnt;
    }

    /**
     * @param int|null $idCargoCarrAnt
     */
    public function setIdCargoCarrAnt(?int $idCargoCarrAnt): void
    {
        $this->idCargoCarrAnt = $idCargoCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getDsCargoCarrAnt(): ?string
    {
        return $this->dsCargoCarrAnt;
    }

    /**
     * @param string|null $dsCargoCarrAnt
     */
    public function setDsCargoCarrAnt(?string $dsCargoCarrAnt): void
    {
        $this->dsCargoCarrAnt = $dsCargoCarrAnt;
    }

    /**
     * @return int|null
     */
    public function getIdProvimCarrAnt(): ?int
    {
        return $this->idProvimCarrAnt;
    }

    /**
     * @param int|null $idProvimCarrAnt
     */
    public function setIdProvimCarrAnt(?int $idProvimCarrAnt): void
    {
        $this->idProvimCarrAnt = $idProvimCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getSgCtgCarrAnt(): ?string
    {
        return $this->sgCtgCarrAnt;
    }

    /**
     * @param string|null $sgCtgCarrAnt
     */
    public function setSgCtgCarrAnt(?string $sgCtgCarrAnt): void
    {
        $this->sgCtgCarrAnt = $sgCtgCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getDsCtgCarrAnt(): ?string
    {
        return $this->dsCtgCarrAnt;
    }

    /**
     * @param string|null $dsCtgCarrAnt
     */
    public function setDsCtgCarrAnt(?string $dsCtgCarrAnt): void
    {
        $this->dsCtgCarrAnt = $dsCtgCarrAnt;
    }

    /**
     * @return int|null
     */
    public function getVlCtgCarrAnt(): ?int
    {
        return $this->vlCtgCarrAnt;
    }

    /**
     * @param int|null $vlCtgCarrAnt
     */
    public function setVlCtgCarrAnt(?int $vlCtgCarrAnt): void
    {
        $this->vlCtgCarrAnt = $vlCtgCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getSgPadrCarrAnt(): ?string
    {
        return $this->sgPadrCarrAnt;
    }

    /**
     * @param string|null $sgPadrCarrAnt
     */
    public function setSgPadrCarrAnt(?string $sgPadrCarrAnt): void
    {
        $this->sgPadrCarrAnt = $sgPadrCarrAnt;
    }

    /**
     * @return string|null
     */
    public function getDsPadrCarrAnt(): ?string
    {
        return $this->dsPadrCarrAnt;
    }

    /**
     * @param string|null $dsPadrCarrAnt
     */
    public function setDsPadrCarrAnt(?string $dsPadrCarrAnt): void
    {
        $this->dsPadrCarrAnt = $dsPadrCarrAnt;
    }

    /**
     * @return int|null
     */
    public function getVlPadrCarrAnt(): ?int
    {
        return $this->vlPadrCarrAnt;
    }

    /**
     * @param int|null $vlPadrCarrAnt
     */
    public function setVlPadrCarrAnt(?int $vlPadrCarrAnt): void
    {
        $this->vlPadrCarrAnt = $vlPadrCarrAnt;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExercCarrAnt(): ?\DateTime
    {
        return $this->dtExercCarrAnt;
    }

    /**
     * @param DateTime|null $dtExercCarrAnt
     */
    public function setDtExercCarrAnt(?\DateTime $dtExercCarrAnt): void
    {
        $this->dtExercCarrAnt = $dtExercCarrAnt;
    }

    /**
     * @return DateTime|null
     */
    public function getDtClasseCarrAnt(): ?\DateTime
    {
        return $this->dtClasseCarrAnt;
    }

    /**
     * @param DateTime|null $dtClasseCarrAnt
     */
    public function setDtClasseCarrAnt(?\DateTime $dtClasseCarrAnt): void
    {
        $this->dtClasseCarrAnt = $dtClasseCarrAnt;
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
     * @return int|null
     */
    public function getQtDiaAfstCtgCarrAntTspf(): ?int
    {
        return $this->qtDiaAfstCtgCarrAntTspf;
    }

    /**
     * @param int|null $qtDiaAfstCtgCarrAntTspf
     */
    public function setQtDiaAfstCtgCarrAntTspf(?int $qtDiaAfstCtgCarrAntTspf): void
    {
        $this->qtDiaAfstCtgCarrAntTspf = $qtDiaAfstCtgCarrAntTspf;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfstCtgCarrAntTfi(): ?int
    {
        return $this->qtDiaAfstCtgCarrAntTfi;
    }

    /**
     * @param int|null $qtDiaAfstCtgCarrAntTfi
     */
    public function setQtDiaAfstCtgCarrAntTfi(?int $qtDiaAfstCtgCarrAntTfi): void
    {
        $this->qtDiaAfstCtgCarrAntTfi = $qtDiaAfstCtgCarrAntTfi;
    }

    /**
     * @return int|null
     */
    public function getQtDiaCtgCarrAntDescAfst(): ?int
    {
        return $this->qtDiaCtgCarrAntDescAfst;
    }

    /**
     * @param int|null $qtDiaCtgCarrAntDescAfst
     */
    public function setQtDiaCtgCarrAntDescAfst(?int $qtDiaCtgCarrAntDescAfst): void
    {
        $this->qtDiaCtgCarrAntDescAfst = $qtDiaCtgCarrAntDescAfst;
    }

    /**
     * @return int|null
     */
    public function getQtDiaCargoBchDir(): ?int
    {
        return $this->qtDiaCargoBchDir;
    }

    /**
     * @param int|null $qtDiaCargoBchDir
     */
    public function setQtDiaCargoBchDir(?int $qtDiaCargoBchDir): void
    {
        $this->qtDiaCargoBchDir = $qtDiaCargoBchDir;
    }

    /**
     * @return int|null
     */
    public function getQtDiaTspf(): ?int
    {
        return $this->qtDiaTspf;
    }

    /**
     * @param int|null $qtDiaTspf
     */
    public function setQtDiaTspf(?int $qtDiaTspf): void
    {
        $this->qtDiaTspf = $qtDiaTspf;
    }

    /**
     * @return int|null
     */
    public function getQtDiaTspfAgu(): ?int
    {
        return $this->qtDiaTspfAgu;
    }

    /**
     * @param int|null $qtDiaTspfAgu
     */
    public function setQtDiaTspfAgu(?int $qtDiaTspfAgu): void
    {
        $this->qtDiaTspfAgu = $qtDiaTspfAgu;
    }

    /**
     * @return int|null
     */
    public function getQtDiaMesario(): ?int
    {
        return $this->qtDiaMesario;
    }

    /**
     * @param int|null $qtDiaMesario
     */
    public function setQtDiaMesario(?int $qtDiaMesario): void
    {
        $this->qtDiaMesario = $qtDiaMesario;
    }

    /**
     * @return DateTime|null
     */
    public function getDtNascimento(): ?\DateTime
    {
        return $this->dtNascimento;
    }

    /**
     * @param DateTime|null $dtNascimento
     */
    public function setDtNascimento(?\DateTime $dtNascimento): void
    {
        $this->dtNascimento = $dtNascimento;
    }

    /**
     * @return int|null
     */
    public function getQtDiaIdade(): ?int
    {
        return $this->qtDiaIdade;
    }

    /**
     * @param int|null $qtDiaIdade
     */
    public function setQtDiaIdade(?int $qtDiaIdade): void
    {
        $this->qtDiaIdade = $qtDiaIdade;
    }

    /**
     * @return int|null
     */
    public function getQtDiasUdp(): ?int
    {
        return $this->qtDiasUdp;
    }

    /**
     * @param int|null $qtDiasUdp
     */
    public function setQtDiasUdp(?int $qtDiasUdp): void
    {
        $this->qtDiasUdp = $qtDiasUdp;
    }

    /**
     * @return int|null
     */
    public function getQtDiaAfastUdp(): ?int
    {
        return $this->qtDiaAfastUdp;
    }

    /**
     * @param int|null $qtDiaAfastUdp
     */
    public function setQtDiaAfastUdp(?int $qtDiaAfastUdp): void
    {
        $this->qtDiaAfastUdp = $qtDiaAfastUdp;
    }

    /**
     * @return string|null
     */
    public function getSn2anosUdp(): ?string
    {
        return $this->sn2anosUdp;
    }

    /**
     * @param string|null $sn2anosUdp
     */
    public function setSn2anosUdp(?string $sn2anosUdp): void
    {
        $this->sn2anosUdp = $sn2anosUdp;
    }

    /**
     * @return string|null
     */
    public function getSn3anosUdp(): ?string
    {
        return $this->sn3anosUdp;
    }

    /**
     * @param string|null $sn3anosUdp
     */
    public function setSn3anosUdp(?string $sn3anosUdp): void
    {
        $this->sn3anosUdp = $sn3anosUdp;
    }

    /**
     * @return int|null
     */
    public function getNrOrdemClassePadrao(): ?int
    {
        return $this->nrOrdemClassePadrao;
    }

    /**
     * @param int|null $nrOrdemClassePadrao
     */
    public function setNrOrdemClassePadrao(?int $nrOrdemClassePadrao): void
    {
        $this->nrOrdemClassePadrao = $nrOrdemClassePadrao;
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
