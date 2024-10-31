<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Apuracao
 */
#[ORM\Table(name: 'APURACAO')]
#[ORM\Index(name: 'IDX_E325DFC676836FE9', columns: ['ID_MODELO_APURACAO_USADO'])]
#[ORM\Entity]
class Apuracao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_APURACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único de apurações de listas realizadas.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'APURACAO_ID_APURACAO_seq', allocationSize: 1, initialValue: 1)]
    private $idApuracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_MODELO_APURACAO_USADA', type: 'string', length: 200, nullable: true, options: ['comment' => 'Nome do modelo de apuração quando a apuração foi realizada.'])]
    private $nmModeloApuracaoUsada;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_AUTOR_MODELO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'CPF do servidor responsável pelo cadatramento ou alteração do nome da apuração vigente quando ela foi usada.'])]
    private $nrCpfAutorModelo;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_APURACAO', type: 'date', nullable: false, options: ['comment' => 'Data em que foi feita a apuração.'])]
    private $dtApuracao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_APURACAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'CPF do servidor que solicitou (realizou) a apuração.'])]
    private $nrCpfApuracao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'IN_APURACAO_BLOQUEADA', type: 'integer', nullable: false, options: ['comment' => 'Indica se esta apuração deve ser preservada ou se está passível de ser excluída em futuros processos de limpeza.'])]
    private $inApuracaoBloqueada = '0';

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_CARREIRA', type: 'string', length: 5, nullable: true, options: ['comment' => 'Sigla da carreira para a qual será elaborada a lista. Ex: { AU, PF, PFN, ADM, CONT, QSUPL }'])]
    private $sgCarreira;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_LISTA_CPF', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Lista de CPFs avulsos para elaborar listas.'])]
    private $dsListaCpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SG_CATEGORIAS_SOLICITADA', type: 'string', length: 5, nullable: true, options: ['comment' => "Siglas das categorias desejadas (uma letra para cada) sem delimitador. Ex:'12E'  Categorias válidas {1,2,A,B,C,D,E,F}"])]
    private $sgCategoriasSolicitada;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_REFERENCIA', type: 'date', nullable: false, options: ['comment' => 'Data de referência para a apuração ou o concurso.'])]
    private $dtReferencia;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_CONCURSO', type: 'integer', nullable: true, options: ['comment' => 'Número do concurso de promoção ou remoção, junto ao qual estão os inscritos.'])]
    private $nrConcurso;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TITULO', type: 'string', length: 200, nullable: true, options: ['comment' => 'Título principal do relatório de apuração.'])]
    private $dsTitulo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_SUBTITULO', type: 'string', length: 200, nullable: true, options: ['comment' => 'Título auxiliar do relatório de apuração.'])]
    private $dsSubtitulo;

    /**
     * @var ModeloApuracao
     */
    #[ORM\JoinColumn(name: 'ID_MODELO_APURACAO_USADO', referencedColumnName: 'ID_MODELO_APURACAO')]
    #[ORM\ManyToOne(targetEntity: 'ModeloApuracao')]
    private $idModeloApuracaoUsado;

    /**
     * @return int
     */
    public function getIdApuracao(): int
    {
        return $this->idApuracao;
    }

    /**
     * @param int $idApuracao
     */
    public function setIdApuracao(int $idApuracao): void
    {
        $this->idApuracao = $idApuracao;
    }

    /**
     * @return string|null
     */
    public function getNmModeloApuracaoUsada(): ?string
    {
        return $this->nmModeloApuracaoUsada;
    }

    /**
     * @param string|null $nmModeloApuracaoUsada
     */
    public function setNmModeloApuracaoUsada(?string $nmModeloApuracaoUsada): void
    {
        $this->nmModeloApuracaoUsada = $nmModeloApuracaoUsada;
    }

    /**
     * @return string|null
     */
    public function getNrCpfAutorModelo(): ?string
    {
        return $this->nrCpfAutorModelo;
    }

    /**
     * @param string|null $nrCpfAutorModelo
     */
    public function setNrCpfAutorModelo(?string $nrCpfAutorModelo): void
    {
        $this->nrCpfAutorModelo = $nrCpfAutorModelo;
    }

    /**
     * @return DateTime
     */
    public function getDtApuracao(): \DateTime
    {
        return $this->dtApuracao;
    }

    /**
     * @param DateTime $dtApuracao
     */
    public function setDtApuracao(\DateTime $dtApuracao): void
    {
        $this->dtApuracao = $dtApuracao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfApuracao(): ?string
    {
        return $this->nrCpfApuracao;
    }

    /**
     * @param string|null $nrCpfApuracao
     */
    public function setNrCpfApuracao(?string $nrCpfApuracao): void
    {
        $this->nrCpfApuracao = $nrCpfApuracao;
    }

    /**
     * @return int|string
     */
    public function getInApuracaoBloqueada(): int|string
    {
        return $this->inApuracaoBloqueada;
    }

    /**
     * @param int|string $inApuracaoBloqueada
     */
    public function setInApuracaoBloqueada(int|string $inApuracaoBloqueada): void
    {
        $this->inApuracaoBloqueada = $inApuracaoBloqueada;
    }

    /**
     * @return string|null
     */
    public function getSgCarreira(): ?string
    {
        return $this->sgCarreira;
    }

    /**
     * @param string|null $sgCarreira
     */
    public function setSgCarreira(?string $sgCarreira): void
    {
        $this->sgCarreira = $sgCarreira;
    }

    /**
     * @return string|null
     */
    public function getDsListaCpf(): ?string
    {
        return $this->dsListaCpf;
    }

    /**
     * @param string|null $dsListaCpf
     */
    public function setDsListaCpf(?string $dsListaCpf): void
    {
        $this->dsListaCpf = $dsListaCpf;
    }

    /**
     * @return string|null
     */
    public function getSgCategoriasSolicitada(): ?string
    {
        return $this->sgCategoriasSolicitada;
    }

    /**
     * @param string|null $sgCategoriasSolicitada
     */
    public function setSgCategoriasSolicitada(?string $sgCategoriasSolicitada): void
    {
        $this->sgCategoriasSolicitada = $sgCategoriasSolicitada;
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
     * @return int|null
     */
    public function getNrConcurso(): ?int
    {
        return $this->nrConcurso;
    }

    /**
     * @param int|null $nrConcurso
     */
    public function setNrConcurso(?int $nrConcurso): void
    {
        $this->nrConcurso = $nrConcurso;
    }

    /**
     * @return string|null
     */
    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    /**
     * @param string|null $dsTitulo
     */
    public function setDsTitulo(?string $dsTitulo): void
    {
        $this->dsTitulo = $dsTitulo;
    }

    /**
     * @return string|null
     */
    public function getDsSubtitulo(): ?string
    {
        return $this->dsSubtitulo;
    }

    /**
     * @param string|null $dsSubtitulo
     */
    public function setDsSubtitulo(?string $dsSubtitulo): void
    {
        $this->dsSubtitulo = $dsSubtitulo;
    }

    /**
     * @return ModeloApuracao
     */
    public function getIdModeloApuracaoUsado(): ModeloApuracao
    {
        return $this->idModeloApuracaoUsado;
    }

    /**
     * @param ModeloApuracao $idModeloApuracaoUsado
     */
    public function setIdModeloApuracaoUsado(ModeloApuracao $idModeloApuracaoUsado): void
    {
        $this->idModeloApuracaoUsado = $idModeloApuracaoUsado;
    }


}
