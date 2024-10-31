<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Cessao
 */
#[ORM\Table(name: 'CESSAO')]
#[ORM\Entity]
class Cessao implements EntityInterface
{
    use Timeblameable;
    use Softdeleteable;
    use CPFOperador;

    #[ORM\Id]
    #[ORM\Column(name: 'ID_CESSAO', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CESSAO', allocationSize: 1, initialValue: 1)]
    private ?int $id = null;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_ORGAO_ORIGEM', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $orgaoOrigem;

    #[ORM\JoinColumn(name: 'ID_ORGAO_DESTINO', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $orgaoDestino;

    #[ORM\Column(name: 'DT_INICIO_CESSAO', type: 'date', nullable: false)]
    protected DateTime $dataInicioCessao;

    #[ORM\Column(name: 'DT_FIM_CESSAO', type: 'date', nullable: true)]
    protected ?DateTime $dataFimCessao;

    #[ORM\Column(name: 'DS_CARGO_DESTINO', type: 'string', length: 200, nullable: true)]
    protected ?string $dsCargoDestino;

    #[ORM\JoinColumn(name: 'ID_REGIME_JURIDICO_DESTINO', referencedColumnName: 'ID_REGIME_JURIDICO')]
    #[ORM\ManyToOne(targetEntity: 'RegimeJuridico')]
    protected ?RegimeJuridico $regimeJuridicoDestino;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    #[ORM\Column(name: 'ST_ONUS', type: 'string', length: 1, nullable: true)]
    protected ?string $stOnus;

    #[ORM\Column(name: 'IN_CANCELADO', type: 'string', length: 1, nullable: true)]
    protected ?string $inCancelado;

    #[ORM\Column(name: 'VL_PREVIDENCIA', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    protected ?float $vlPrevidencia;

    #[ORM\Column(name: 'VL_BENEFICIOS', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    protected ?float $vlBeneficios;

    #[ORM\Column(name: 'VL_REMUNERACAO', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    protected ?float $vlRemuneracao;

    #[ORM\Column(name: 'VL_TETO_REMUNERACAO', type: 'decimal', precision: 12, scale: 2, nullable: true)]
    protected ?float $vlTetoRemuneracao;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true)]
    protected ?string $dsObservacao;

    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $rh;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
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

    public function getOrgaoOrigem(): ?Orgao
    {
        return $this->orgaoOrigem;
    }

    public function setOrgaoOrigem(?Orgao $orgaoOrigem): void
    {
        $this->orgaoOrigem = $orgaoOrigem;
    }

    public function getOrgaoDestino(): ?Orgao
    {
        return $this->orgaoDestino;
    }

    public function setOrgaoDestino(?Orgao $orgaoDestino): void
    {
        $this->orgaoDestino = $orgaoDestino;
    }

    public function getDataInicioCessao(): DateTime
    {
        return $this->dataInicioCessao;
    }

    public function setDataInicioCessao(DateTime $dataInicioCessao): void
    {
        $this->dataInicioCessao = $dataInicioCessao;
    }

    public function getDataFimCessao(): ?DateTime
    {
        return $this->dataFimCessao;
    }

    public function setDataFimCessao(?DateTime $dataFimCessao): void
    {
        $this->dataFimCessao = $dataFimCessao;
    }

    public function getDsCargoDestino(): ?string
    {
        return $this->dsCargoDestino;
    }

    public function setDsCargoDestino(?string $dsCargoDestino): void
    {
        $this->dsCargoDestino = $dsCargoDestino;
    }

    public function getRegimeJuridicoDestino(): ?RegimeJuridico
    {
        return $this->regimeJuridicoDestino;
    }

    public function setRegimeJuridicoDestino(?RegimeJuridico $regimeJuridicoDestino): void
    {
        $this->regimeJuridicoDestino = $regimeJuridicoDestino;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getStOnus(): ?string
    {
        return $this->stOnus;
    }

    public function setStOnus(?string $stOnus): void
    {
        $this->stOnus = $stOnus;
    }

    public function getInCancelado(): ?string
    {
        return $this->inCancelado;
    }

    public function setInCancelado(?string $inCancelado): void
    {
        $this->inCancelado = $inCancelado;
    }

    public function getVlPrevidencia(): ?int
    {
        return $this->vlPrevidencia;
    }

    public function setVlPrevidencia(?int $vlPrevidencia): void
    {
        $this->vlPrevidencia = $vlPrevidencia;
    }

    public function getVlBeneficios(): ?int
    {
        return $this->vlBeneficios;
    }

    public function setVlBeneficios(?int $vlBeneficios): void
    {
        $this->vlBeneficios = $vlBeneficios;
    }

    public function getVlRemuneracao(): ?int
    {
        return $this->vlRemuneracao;
    }

    public function setVlRemuneracao(?int $vlRemuneracao): void
    {
        $this->vlRemuneracao = $vlRemuneracao;
    }

    public function getVlTetoRemuneracao(): ?int
    {
        return $this->vlTetoRemuneracao;
    }

    public function setVlTetoRemuneracao(?int $vlTetoRemuneracao): void
    {
        $this->vlTetoRemuneracao = $vlTetoRemuneracao;
    }

    public function getDsObservacao(): ?string
    {
        return $this->dsObservacao;
    }

    public function setDsObservacao(?string $dsObservacao): void
    {
        $this->dsObservacao = $dsObservacao;
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