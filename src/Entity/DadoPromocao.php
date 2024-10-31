<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DadoPromocao
 */
#[ORM\Table(name: 'DADO_PROMOCAO')]
#[ORM\Index(name: 'IDX_7CE6886910DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_7CE68869A4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_7CE68869ED67AB6C', columns: ['ID_TIPO_PADRAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class DadoPromocao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DADO_PROMOCAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que representa um registro na tabela DADO_PROMOCAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DADO_PROMOCAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'QTD_CATEGORIA_FUNCIONAL', type: 'smallint', nullable: true, options: ['comment' => 'Quantitativo em dias específicando o tempo de serviço na categoria funcional (Cargo) que precedeu (Anterior) a carreira do servidor.'])]
    protected ?int $qtdDiasCategoriaFuncional;

    #[ORM\Column(name: 'QTD_SERVICO_CARREIRA', type: 'smallint', nullable: true, options: ['comment' => 'Quantitativo em dias especificando o tempo de serviço em outras carreiras ou cargos efetivos privativos de bacharel em direito de orgão e entidades da administração federal direta, autarquica e fundacional.'])]
    protected ?int $qtdDiasServicoCarreira;

    #[ORM\Column(name: 'QTD_SERVICO_PUBLICO', type: 'smallint', nullable: true, options: ['comment' => 'Quantitativo em dias especificando o tempo de serviço público federal que o servidor possui anterior ao ingresso na AGU.'])]
    protected ?int $qtdDiasServicoPublico;

    #[ORM\Column(name: 'QTD_SERVICO_MESARIO', type: 'smallint', nullable: true, options: ['comment' => 'Quantitativo em dias especificando o tempo de exercício que servidor possui prestando serviços a orgãos eleitorais na função de mesário ou componente de junta apuradora.'])]
    protected ?int $qtdDiasServicoMesario;

    #[ORM\Column(name: 'NR_CLASSIFICACAO_PNE', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Número para a classificação ou graú elevado para a necessidade especial portado pelo servidor público.'])]
    protected ?string $classificacaoPne;

    #[ORM\Column(name: 'DT_INGRESSO_CARREIRA', type: 'date', nullable: true, options: ['comment' => 'Especifica a data em que o servidor ingressou na carreira, ou seja, no mesmo cargo antes da posse na AGU. '])]
    protected ?DateTime $dataIngressoCarreira = null;

    #[ORM\Column(name: 'IN_ESTAGIO_CONFIRMATORIO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Representa se houve estágio confirmatório em 2 anos. (S- representa que HOUVE; N- representa que NÃO HOUVE)'])]
    protected ?string $inEstagioConfirmatorio;

    #[ORM\Column(name: 'IN_TEMPO_EMPRESA_PUBLICA', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identifica se houve tempo em Empresa Pública. (S- representa SIM, houve tempo; N- representa NÃO HOUVE tempo)'])]
    protected ?string $inTempoEmpresaPublica;

    #[ORM\Column(name: 'IN_SUBJUDICE', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador se há algo Sub-Judice. (S- Sim; N- para NÃO há)'])]
    protected ?string $inSubjudice;

    #[ORM\Column(name: 'IN_ELEGIVEL', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador se é Elegível ou Não (S- SIM é elegível; N- Não é Elegível)'])]
    protected ?string $inElegivel;

    #[ORM\Column(name: 'DT_CARREIRA_PRECEDENTE', type: 'date', nullable: true, options: ['comment' => 'Especifica a data em que precedeu a carreira do servidor, ou seja, data em que o servidor ingressou no mesmo cargo antes da posse na AGU.'])]
    protected ?DateTime $dataCarreiraPrecedente = null;

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

    public function getQtdDiasCategoriaFuncional(): ?int
    {
        return $this->qtdDiasCategoriaFuncional;
    }

    public function setQtdDiasCategoriaFuncional(?int $qtdDiasCategoriaFuncional): void
    {
        $this->qtdDiasCategoriaFuncional = $qtdDiasCategoriaFuncional;
    }

    public function getQtdDiasServicoCarreira(): ?int
    {
        return $this->qtdDiasServicoCarreira;
    }

    public function setQtdDiasServicoCarreira(?int $qtdDiasServicoCarreira): void
    {
        $this->qtdDiasServicoCarreira = $qtdDiasServicoCarreira;
    }

    public function getQtdDiasServicoPublico(): ?int
    {
        return $this->qtdDiasServicoPublico;
    }

    public function setQtdDiasServicoPublico(?int $qtdDiasServicoPublico): void
    {
        $this->qtdDiasServicoPublico = $qtdDiasServicoPublico;
    }

    public function getQtdDiasServicoMesario(): ?int
    {
        return $this->qtdDiasServicoMesario;
    }

    public function setQtdDiasServicoMesario(?int $qtdDiasServicoMesario): void
    {
        $this->qtdDiasServicoMesario = $qtdDiasServicoMesario;
    }

    public function getClassificacaoPne(): ?string
    {
        return $this->classificacaoPne;
    }

    public function setClassificacaoPne(?string $classificacaoPne): void
    {
        $this->classificacaoPne = $classificacaoPne;
    }

    public function getDataIngressoCarreira(): ?DateTime
    {
        return $this->dataIngressoCarreira;
    }

    public function setDataIngressoCarreira(?DateTime $dataIngressoCarreira): void
    {
        $this->dataIngressoCarreira = $dataIngressoCarreira;
    }

    public function getInEstagioConfirmatorio(): ?string
    {
        return $this->inEstagioConfirmatorio;
    }

    public function setInEstagioConfirmatorio(?string $inEstagioConfirmatorio): void
    {
        $this->inEstagioConfirmatorio = $inEstagioConfirmatorio;
    }

    public function getInTempoEmpresaPublica(): ?string
    {
        return $this->inTempoEmpresaPublica;
    }

    public function setInTempoEmpresaPublica(?string $inTempoEmpresaPublica): void
    {
        $this->inTempoEmpresaPublica = $inTempoEmpresaPublica;
    }

    public function getInSubjudice(): ?string
    {
        return $this->inSubjudice;
    }

    public function setInSubjudice(?string $inSubjudice): void
    {
        $this->inSubjudice = $inSubjudice;
    }

    public function getInElegivel(): ?string
    {
        return $this->inElegivel;
    }

    public function setInElegivel(?string $inElegivel): void
    {
        $this->inElegivel = $inElegivel;
    }

    public function getDataCarreiraPrecedente(): ?DateTime
    {
        return $this->dataCarreiraPrecedente;
    }

    public function setDataCarreiraPrecedente(?DateTime $dataCarreiraPrecedente): void
    {
        $this->dataCarreiraPrecedente = $dataCarreiraPrecedente;
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

    public function getTipoPadrao(): ?TipoPadrao
    {
        return $this->tipoPadrao;
    }

    public function setTipoPadrao(?TipoPadrao $tipoPadrao): void
    {
        $this->tipoPadrao = $tipoPadrao;
    }


}
