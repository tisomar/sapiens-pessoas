<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DadoFinanceiro
 */
#[ORM\Table(name: 'DADO_FINANCEIRO')]
#[ORM\Index(name: 'IDX_37F7A99BCE2C85BA', columns: ['ID_HORARIO'])]
#[ORM\Index(name: 'IDX_37F7A99BB2D63DBE', columns: ['ID_REGIME_PREV'])]
#[ORM\Index(name: 'IDX_37F7A99B10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_37F7A99BA4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class DadoFinanceiro implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DADO_FINANCEIRO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que representa o dado financeiro do servidor.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DADO_FINANCEIRO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'IN_CALCULA_FOLHA_PAG', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para cálculo na folha de pagamento. SIM ou NÃO'])]
    protected string $inCalculaFolhaPagamento;

    #[ORM\Column(name: 'DT_ONUS_ORGAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de especificação de ônus para o orgão.'])]
    protected ?DateTime $dataOnusOrgao = null;

    #[ORM\Column(name: 'DT_SUSPENSAO_PAGAMENTO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de especificação para suspensão no pagamento do servidor.'])]
    protected ?DateTime $dataSuspensaoPagamento = null;

    #[ORM\Column(name: 'NR_PERCENTUAL_TEMP_SERVICO', type: 'decimal', precision: 5, scale: 2, nullable: true, options: ['comment' => 'Especifica o percentual adcional referente ao tempo de serviço do servidor.'])]
    protected ?int $percentualTempoServico;

    #[ORM\Column(name: 'NR_DEPENDENTE_SAL_FAMILIA', type: 'integer', nullable: true, options: ['comment' => 'Especifica o numero quantitativo de dependentes para recebimento do salário família descontado em folha no pagamento do servidor.'])]
    protected ?int $qtdDependentes;

    #[ORM\Column(name: 'NR_DEPENDENTE_IRRF', type: 'integer', nullable: true, options: ['comment' => 'Especifica o número quantitativo de dependentes declarado no IRRF do servidor.'])]
    protected ?int $qtdDependentesIrrf;

    #[ORM\Column(name: 'VL_ABATIMENTO_IRRF', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Especifica o valor do abatimento no IRRF do servidor.'])]
    protected ?int $valorAbatimentoIrrf;

    #[ORM\Column(name: 'NR_HORA_BASE_MENSAL', type: 'integer', nullable: true, options: ['comment' => 'Especifica as horas mensais baseadas no trabalho mensal do servidor.'])]
    protected ?int $horaBaseMensal;

    #[ORM\JoinColumn(name: 'ID_HORARIO', referencedColumnName: 'ID_HORARIO')]
    #[ORM\ManyToOne(targetEntity: 'Horario')]
    protected ?Horario $horario;

    #[ORM\JoinColumn(name: 'ID_REGIME_PREV', referencedColumnName: 'ID_REGIME_PREV')]
    #[ORM\ManyToOne(targetEntity: 'RegimePrevidenciario')]
    protected ?RegimePrevidenciario $regimePrevidenciario;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getInCalculaFolhaPagamento(): string
    {
        return $this->inCalculaFolhaPagamento;
    }

    public function setInCalculaFolhaPagamento(string $inCalculaFolhaPagamento): void
    {
        $this->inCalculaFolhaPagamento = $inCalculaFolhaPagamento;
    }

    public function getDataOnusOrgao(): ?DateTime
    {
        return $this->dataOnusOrgao;
    }

    public function setDataOnusOrgao(?DateTime $dataOnusOrgao): void
    {
        $this->dataOnusOrgao = $dataOnusOrgao;
    }

    public function getDataSuspensaoPagamento(): ?DateTime
    {
        return $this->dataSuspensaoPagamento;
    }

    public function setDataSuspensaoPagamento(?DateTime $dataSuspensaoPagamento): void
    {
        $this->dataSuspensaoPagamento = $dataSuspensaoPagamento;
    }

    public function getPercentualTempoServico(): ?int
    {
        return $this->percentualTempoServico;
    }

    public function setPercentualTempoServico(?int $percentualTempoServico): void
    {
        $this->percentualTempoServico = $percentualTempoServico;
    }

    public function getQtdDependentes(): ?int
    {
        return $this->qtdDependentes;
    }

    public function setQtdDependentes(?int $qtdDependentes): void
    {
        $this->qtdDependentes = $qtdDependentes;
    }

    public function getQtdDependentesIrrf(): ?int
    {
        return $this->qtdDependentesIrrf;
    }

    public function setQtdDependentesIrrf(?int $qtdDependentesIrrf): void
    {
        $this->qtdDependentesIrrf = $qtdDependentesIrrf;
    }

    public function getValorAbatimentoIrrf(): ?int
    {
        return $this->valorAbatimentoIrrf;
    }

    public function setValorAbatimentoIrrf(?int $valorAbatimentoIrrf): void
    {
        $this->valorAbatimentoIrrf = $valorAbatimentoIrrf;
    }

    public function getHoraBaseMensal(): ?int
    {
        return $this->horaBaseMensal;
    }

    public function setHoraBaseMensal(?int $horaBaseMensal): void
    {
        $this->horaBaseMensal = $horaBaseMensal;
    }

    public function getHorario(): ?Horario
    {
        return $this->horario;
    }

    public function setHorario(?Horario $horario): void
    {
        $this->horario = $horario;
    }

    public function getRegimePrevidenciario(): ?RegimePrevidenciario
    {
        return $this->regimePrevidenciario;
    }

    public function setRegimePrevidenciario(?RegimePrevidenciario $regimePrevidenciario): void
    {
        $this->regimePrevidenciario = $regimePrevidenciario;
    }

    /**
     * @return Rh
     */
    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }


}
