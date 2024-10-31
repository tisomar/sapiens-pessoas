<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Requisicao
 */
#[ORM\Table(name: 'REQUISICAO')]
#[ORM\Index(name: 'ix_requisicao_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_EE2AA5D714F48F3B', columns: ['ID_CARGO'])]
#[ORM\Index(name: 'IDX_EE2AA5D711ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_EE2AA5D744E270D9', columns: ['ID_ORGAO_DESTINO'])]
#[ORM\Index(name: 'IDX_EE2AA5D74548D530', columns: ['ID_ORGAO_ORIGEM'])]
#[ORM\Index(name: 'IDX_EE2AA5D780E238B0', columns: ['ID_REGIME_JURIDICO'])]
#[ORM\Index(name: 'IDX_EE2AA5D710DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_EE2AA5D7ED67AB6C', columns: ['ID_TIPO_PADRAO'])]
#[ORM\UniqueConstraint(name: 'uk_requisicao', columns: ['ID_SERVIDOR', 'DT_INICIO_REQUISICAO', 'ID_CARGO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Requisicao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_REQUISICAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela REQUISICAO'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_REQUISICAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_INICIO_REQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor público iniciou os trabalhos no orgão que o requisitou.'])]
    protected ?DateTime $dataInicio;

    #[ORM\Column(name: 'DT_FIM_REQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor público encerrou os trabalhos no orgão que o requisitou e ingressou em outro orgão.'])]
    protected ?DateTime $dataFim;

    #[ORM\Column(name: 'ST_ONUS', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador da situação do ônus da requisição (Folha de Pagamento). Especifica o responsável pelo pagamento do salário do servidor requisitado, orgão de origem(quem cedeu) ou o orgão de destino(quem requisitou). Segue a codificação:
Valor	Descriçãol
0	ÔNUS TOTAL
1	ÔNUS PARCIAL
2	SEM ÔNUS'])]
    protected string $situacaoOnus;

    #[ORM\Column(name: 'DS_MATRICULA_ORIGEM', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a matrícula do servidor no orgão de origem, local onde ele foi cedido para um requisição.'])]
    protected ?string $matriculaOrigem;

    #[ORM\Column(name: 'IN_CANCELADO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica se o registro de requisição está cancelada. Codificação: 0 - Não e 1 - Sim.'])]
    protected string $inCancelado;

    #[ORM\Column(name: 'VL_PREVIDENCIA', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Valor pago à previdência privada pago ao servidor público caso exista.'])]
    protected ?float $valorPrevidencia;

    #[ORM\Column(name: 'VL_REMUNERACAO', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Valor pago ao servidor público como remuneração mensal pelo serviço prestado ao orgão público.'])]
    protected ?float $valorRemuneracao;

    #[ORM\Column(name: 'VL_BENEFICIO', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Valor extra pago ao servidor público como benefícios ou vantagens que foram acrescidos ao pagamento pelo cargo ou função acumulados.'])]
    protected ?float $valorBeneficio;

    #[ORM\Column(name: 'VL_TETO_REMUNERACAO', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Valor minímo da remuneração de acordo com o teto salarial da categoria ou classe a que o servidor público est???? enquadrado. '])]
    protected ?float $valorTetoRemuneracao;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de requisição de um servidor na AGU.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_CARGO', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToOne(targetEntity: 'Cargo')]
    protected ?Cargo $cargo;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    #[ORM\JoinColumn(name: 'ID_ORGAO_DESTINO', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $orgaoDestino;

    #[ORM\JoinColumn(name: 'ID_ORGAO_ORIGEM', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $orgaoOrigem;

    #[ORM\JoinColumn(name: 'ID_REGIME_JURIDICO', referencedColumnName: 'ID_REGIME_JURIDICO')]
    #[ORM\ManyToOne(targetEntity: 'RegimeJuridico')]
    protected ?RegimeJuridico $regimeJuridico;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_PADRAO', referencedColumnName: 'ID_TIPO_PADRAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoPadrao')]
    protected ?TipoPadrao $tipoPadrao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    public function setDataInicio(?DateTime $dataInicio): void
    {
        $this->dataInicio = $dataInicio;
    }

    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    public function setDataFim(?DateTime $dataFim): void
    {
        $this->dataFim = $dataFim;
    }

    public function getSituacaoOnus(): string
    {
        return $this->situacaoOnus;
    }

    public function setSituacaoOnus(string $situacaoOnus): void
    {
        $this->situacaoOnus = $situacaoOnus;
    }

    public function getMatriculaOrigem(): ?string
    {
        return $this->matriculaOrigem;
    }

    public function setMatriculaOrigem(?string $matriculaOrigem): void
    {
        $this->matriculaOrigem = $matriculaOrigem;
    }

    public function getInCancelado(): string
    {
        return $this->inCancelado;
    }

    public function setInCancelado(string $inCancelado): void
    {
        $this->inCancelado = $inCancelado;
    }

    public function getValorPrevidencia(): ?float
    {
        return $this->valorPrevidencia;
    }

    public function setValorPrevidencia(?float $valorPrevidencia): void
    {
        $this->valorPrevidencia = $valorPrevidencia;
    }

    public function getValorRemuneracao(): ?float
    {
        return $this->valorRemuneracao;
    }

    public function setValorRemuneracao(?float $valorRemuneracao): void
    {
        $this->valorRemuneracao = $valorRemuneracao;
    }

    public function getValorBeneficio(): ?float
    {
        return $this->valorBeneficio;
    }

    public function setValorBeneficio(?float $valorBeneficio): void
    {
        $this->valorBeneficio = $valorBeneficio;
    }

    public function getValorTetoRemuneracao(): ?float
    {
        return $this->valorTetoRemuneracao;
    }

    public function setValorTetoRemuneracao(?float $valorTetoRemuneracao): void
    {
        $this->valorTetoRemuneracao = $valorTetoRemuneracao;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getCargo(): ?Cargo
    {
        return $this->cargo;
    }

    public function setCargo(?Cargo $cargo): void
    {
        $this->cargo = $cargo;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getOrgaoDestino(): ?Orgao
    {
        return $this->orgaoDestino;
    }

    public function setOrgaoDestino(?Orgao $orgaoDestino): void
    {
        $this->orgaoDestino = $orgaoDestino;
    }

    public function getOrgaoOrigem(): ?Orgao
    {
        return $this->orgaoOrigem;
    }

    public function setOrgaoOrigem(?Orgao $orgaoOrigem): void
    {
        $this->orgaoOrigem = $orgaoOrigem;
    }

    public function getRegimeJuridico(): ?RegimeJuridico
    {
        return $this->regimeJuridico;
    }

    public function setRegimeJuridico(?RegimeJuridico $regimeJuridico): void
    {
        $this->regimeJuridico = $regimeJuridico;
    }

    public function getRh(): Rh
    {
        return $this->rh;
    }

    public function setRh(Rh $rh): void
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

    public function getTipoPadrao(): ?TipoPadrao
    {
        return $this->tipoPadrao;
    }

    public function setTipoPadrao(?TipoPadrao $tipoPadrao): void
    {
        $this->tipoPadrao = $tipoPadrao;
    }

}
