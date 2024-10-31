<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FuncaoComissionadaSubstituto
 */
#[ORM\Table(name: 'FUNCAO_COMISSIONADA_SUBST')]
#[ORM\Index(name: 'ix_funcao_comiss_subst', columns: ['ID_SERVIDOR_SUBSTITUTO', 'DT_INICIO_SUBSTITUICAO'])]
#[ORM\Index(name: 'IDX_D8E28ACABBEC0EB', columns: ['ID_NORMA_FIM_SUBST'])]
#[ORM\Index(name: 'IDX_D8E28AC2CA6E47', columns: ['ID_NORMA_INICIO_SUBST'])]
#[ORM\Index(name: 'IDX_D8E28AC4058B0C8', columns: ['ID_CARGO_FUNCAO'])]
#[ORM\Index(name: 'IDX_D8E28ACA7691D84', columns: ['ID_SERVIDOR_SUBSTITUTO'])]
#[ORM\Index(name: 'IDX_D8E28AC10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_D8E28AC4FC0CA82', columns: ['ID_TIPO_OCUPACAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class FuncaoComissionadaSubstituto implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_FUNCAO_COMISSIONADA_SUBST', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FUNCAO COMISSIONADA SUBSTITUTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_FUNCAO_COMISSIONADA_SUBST', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_INICIO_SUBSTITUICAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Data em que ocorrerá o início da substituição do titular da função comissionada.'])]
    protected ?DateTime $dataInicio;

    #[ORM\Column(name: 'DT_FINAL_SUBSTITUICAO', type: 'date', nullable: true, options: ['default' => 'SYSDATE', 'comment' => 'Data em que ocorrerá o encerramento da substituição do titular da função comissionada.'])]
    protected ?DateTime $dataFinal;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de função comissionada ocupada por um substituto.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_NORMA_INICIO_SUBST', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $normaInicio;

    #[ORM\JoinColumn(name: 'ID_NORMA_FIM_SUBST', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $normaFim;

    #[ORM\JoinColumn(name: 'ID_CARGO_FUNCAO', referencedColumnName: 'ID_CARGO_FUNCAO')]
    #[ORM\ManyToOne(targetEntity: 'CargoFuncao')]
    protected ?CargoFuncao $cargoFuncao;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR_SUBSTITUTO', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidorSubstituto;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_TIPO_OCUPACAO', referencedColumnName: 'ID_TIPO_OCUPACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoOcupacao')]
    protected ?TipoOcupacao $tipoOcupacao;

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

    public function getDataFinal(): ?DateTime
    {
        return $this->dataFinal;
    }

    public function setDataFinal(?DateTime $dataFinal): void
    {
        $this->dataFinal = $dataFinal;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getNormaFim(): ?Norma
    {
        return $this->normaFim;
    }

    public function setNormaFim(?Norma $normaFim): void
    {
        $this->normaFim = $normaFim;
    }

    public function getNormaInicio(): ?Norma
    {
        return $this->normaInicio;
    }

    public function setNormaInicio(?Norma $normaInicio): void
    {
        $this->normaInicio = $normaInicio;
    }

    public function getCargoFuncao(): ?CargoFuncao
    {
        return $this->cargoFuncao;
    }

    public function setCargoFuncao(?CargoFuncao $cargoFuncao): void
    {
        $this->cargoFuncao = $cargoFuncao;
    }

    public function getServidorSubstituto(): ?Servidor
    {
        return $this->servidorSubstituto;
    }

    public function setServidorSubstituto(?Servidor $servidorSubstituto): void
    {
        $this->servidorSubstituto = $servidorSubstituto;
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

    public function getTipoOcupacao(): ?TipoOcupacao
    {
        return $this->tipoOcupacao;
    }

    public function setTipoOcupacao(?TipoOcupacao $tipoOcupacao): void
    {
        $this->tipoOcupacao = $tipoOcupacao;
    }


}
