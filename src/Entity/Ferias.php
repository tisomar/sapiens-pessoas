<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ferias
 */
#[ORM\Table(name: 'FERIAS')]
#[ORM\Index(name: 'ix_ferias_exercicio', columns: ['NR_ANO_EXERCICIO'])]
#[ORM\Index(name: 'ix_ferias_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_FD9F9087E041F05A', columns: ['ID_FERIAS_PARAMETRO'])]
#[ORM\Index(name: 'IDX_FD9F908711ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_FD9F908710DD9DB6', columns: ['ID_RH'])]
#[ORM\Entity]
class Ferias implements EntityInterface
{

    use Timeblameable;
    use CPFOperador;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_FERIAS', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FERIAS.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'FERIAS_ID_FERIAS_seq', allocationSize: 1, initialValue: 1)]
    private $id;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_FERIAS_PARAMETRO', referencedColumnName: 'ID_FERIAS_PARAMETRO')]
    #[ORM\ManyToOne(targetEntity: 'FeriasParametro')]
    protected ?FeriasParametro $feriasParametro;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_ANO_EXERCICIO', type: 'string', length: 4, nullable: false, options: ['comment' => 'Número identificando o ano de execírcio no qual foi contemplado o direito de férias do servidor público.'])]
    private $anoExercicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_AQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o início do período para o direito (Gozo) da aquisição de férias de um servidor público.'])]
    private $dataInicioAquisicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_AQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o encerramento do período para o direito (Gozo) da aquisição de férias de um servidor público.'])]
    private $dataFimAquisicao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'QT_DIAS_SOLICITADO', type: 'smallint', nullable: true, options: ['comment' => 'Quantidade em dias solicitado pelo servidor público para o gozar o afastamento do trabalho (Férias).'])]
    private $diasSolicitado;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_ABONO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor solicitou o abono para gozar suas férias. Codificação: 0 - NÃO e 1 - SIM'])]
    private $abono;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_DECIMO_TER_SALARIO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor público solicitou o adiantamento do 13° salário para o gozo de férias. Codificação: 0 - NÃO e 1 - SIM.'])]
    private $decimoTerceiroSalario;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_PROTOCOLO', type: 'integer', nullable: true, options: ['comment' => 'Número gerado pelo sistema SIAPE para o RH da AGU para a liberação do gozo de férias do servidor público.'])]
    private $protocolo;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PAG_CONSTITUCIONAL', type: 'date', nullable: true, options: ['comment' => 'Data em que foi efetuado o pagamento constitucional ao servidor público pelo período (Gozo) de férias.'])]
    private $dataPagamentoConstitucional;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PAG_GR_NATAL', type: 'date', nullable: true, options: ['comment' => 'Data em que foi efetuado o pagamento da gratificação natalina ao servidor público que gozará suas férias.'])]
    private $dataPagamentoGratificacaoNatal;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PAG_ABONO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi efetuado o pagamento do abono pecuniário ao servidor público que gozará suas férias.'])]
    private $dataPagamentoAbono;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PROTOCOLO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi gerado pelo sistema SIAPE o protocolo para a liberação do gozo de férias do servidor público.'])]
    private $dataProtocolo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro do gozo de férias de um servidor na AGU.'])]
    private $observacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIAL_ABONO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o início do Abono (Benefício) providenciado a um servidor público como direito adquirido sobre um período aquisitivo de férias.'])]
    private $dataInicialAbono;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_ABONO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o encerramento do Abono (Benefício) providenciado a um servidor público como direito adquirido sobre um período aquisitivo de férias.'])]
    private $dataFimAbono;

    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getFeriasParametro(): ?FeriasParametro
    {
        return $this->feriasParametro;
    }

    public function setFeriasParametro(?FeriasParametro $feriasParametro): void
    {
        $this->feriasParametro = $feriasParametro;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getAnoExercicio(): string
    {
        return $this->anoExercicio;
    }

    public function setAnoExercicio(string $anoExercicio): void
    {
        $this->anoExercicio = $anoExercicio;
    }

    public function getDataInicioAquisicao(): ?DateTime
    {
        return $this->dataInicioAquisicao;
    }

    public function setDataInicioAquisicao(?DateTime $dataInicioAquisicao): void
    {
        $this->dataInicioAquisicao = $dataInicioAquisicao;
    }

    public function getDataFimAquisicao(): ?DateTime
    {
        return $this->dataFimAquisicao;
    }

    public function setDataFimAquisicao(?DateTime $dataFimAquisicao): void
    {
        $this->dataFimAquisicao = $dataFimAquisicao;
    }

    public function getDiasSolicitado(): ?int
    {
        return $this->diasSolicitado;
    }

    public function setDiasSolicitado(?int $diasSolicitado): void
    {
        $this->diasSolicitado = $diasSolicitado;
    }

    public function getAbono(): string
    {
        return $this->abono;
    }

    public function setAbono(string $abono): void
    {
        $this->abono = $abono;
    }

    public function getDecimoTerceiroSalario(): string
    {
        return $this->decimoTerceiroSalario;
    }

    public function setDecimoTerceiroSalario(string $decimoTerceiroSalario): void
    {
        $this->decimoTerceiroSalario = $decimoTerceiroSalario;
    }

    public function getProtocolo(): ?int
    {
        return $this->protocolo;
    }

    public function setProtocolo(?int $protocolo): void
    {
        $this->protocolo = $protocolo;
    }

    public function getDataPagamentoConstitucional(): ?DateTime
    {
        return $this->dataPagamentoConstitucional;
    }

    public function setDataPagamentoConstitucional(?DateTime $dataPagamentoConstitucional): void
    {
        $this->dataPagamentoConstitucional = $dataPagamentoConstitucional;
    }

    public function getDataPagamentoGratificacaoNatal(): ?DateTime
    {
        return $this->dataPagamentoGratificacaoNatal;
    }

    public function setDataPagamentoGratificacaoNatal(?DateTime $dataPagamentoGratificacaoNatal): void
    {
        $this->dataPagamentoGratificacaoNatal = $dataPagamentoGratificacaoNatal;
    }

    public function getDataPagamentoAbono(): ?DateTime
    {
        return $this->dataPagamentoAbono;
    }

    public function setDataPagamentoAbono(?DateTime $dataPagamentoAbono): void
    {
        $this->dataPagamentoAbono = $dataPagamentoAbono;
    }

    public function getDataProtocolo(): ?DateTime
    {
        return $this->dataProtocolo;
    }

    public function setDataProtocolo(?DateTime $dataProtocolo): void
    {
        $this->dataProtocolo = $dataProtocolo;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getDataInicialAbono(): ?DateTime
    {
        return $this->dataInicialAbono;
    }

    public function setDataInicialAbono(?DateTime $dataInicialAbono): void
    {
        $this->dataInicialAbono = $dataInicialAbono;
    }

    public function getDataFimAbono(): ?DateTime
    {
        return $this->dataFimAbono;
    }

    public function setDataFimAbono(?DateTime $dataFimAbono): void
    {
        $this->dataFimAbono = $dataFimAbono;
    }

    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }


}
