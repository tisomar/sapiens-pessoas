<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Movimentacao
 */
#[ORM\Table(name: 'MOVIMENTACAO')]
#[ORM\Index(name: 'ix_movimentacao_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_548D7F7A11ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_548D7F7ADDC063B', columns: ['ID_ORGAO_MOVIMENTACAO'])]
#[ORM\Index(name: 'IDX_548D7F7A10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_548D7F7A56AC60B3', columns: ['ID_TIPO_MOVIMENTACAO'])]
#[ORM\Index(name: 'IDX_548D7F7A1BEF71F3', columns: ['ID_LOTACAO_EXERCICIO'])]
#[ORM\Index(name: 'IDX_548D7F7A3F78C42D', columns: ['ID_LOTACAO_ORIGEM'])]
#[ORM\Index(name: 'IDX_548D7F7A3E4C6746', columns: ['ID_LOTACAO_LOCALIZACAO'])]
#[ORM\UniqueConstraint(name: 'uk_movimentacao', columns: ['ID_SERVIDOR', 'ID_TIPO_MOVIMENTACAO', 'DT_INICIO_MOVIMENTACAO', 'DT_FINAL_MOVIMENTACAO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Movimentacao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_MOVIMENTACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela MOVIMENTACAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_MOVIMENTACAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DT_INICIO_MOVIMENTACAO', type: 'date', nullable: false, options: ['comment' => 'Data em que se deu o início da movimentação do servidor na lotação de exercício.'])]
    protected ?DateTime $dataInicio;

    #[ORM\Column(name: 'DT_FINAL_MOVIMENTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a término da movimentação do servidor na lotação de exercício, acorrendo assim o retorno a lotação de origem ou alteração da lotação de exercício.'])]
    protected ?DateTime $dataFinal;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de movimentação de um servidor na AGU.'])]
    protected ?string $observacao;

    #[ORM\Column(name: 'IN_LOTACAO_UDP', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor público está lotado em uma unidade de difícil provimento, ou seja, se sua atual unidade de lotação é uma unidade considerada como difícil provimento. Ex: 0 - FALSO ou 1 - VERDADEIRO.'])]
    protected ?string $inDificilProvimento;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;


    #[ORM\JoinColumn(name: 'ID_ORGAO_MOVIMENTACAO', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $orgao;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_TIPO_MOVIMENTACAO', referencedColumnName: 'ID_TIPO_MOVIMENTACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoMovimentacao')]
    protected ?TipoMovimentacao $tipo;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_EXERCICIO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoExercicio;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_ORIGEM', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoOrigem;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_LOCALIZACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoLocalizacao;


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

    public function getInDificilProvimento(): string
    {
        return $this->inDificilProvimento;
    }

    public function setInDificilProvimento(string $inDificilProvimento): void
    {
        $this->inDificilProvimento = $inDificilProvimento;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    public function getOrgao(): ?Orgao
    {
        return $this->orgao;
    }

    public function setOrgao(?Orgao $orgao): void
    {
        $this->orgao = $orgao;
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
    public function getTipo(): ?TipoMovimentacao
    {
        return $this->tipo;
    }

    public function setTipo(?TipoMovimentacao $tipo): void
    {
        $this->tipo = $tipo;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getLotacaoExercicio(): ?Lotacao
    {
        return $this->lotacaoExercicio;
    }

    public function setLotacaoExercicio(?Lotacao $lotacaoExercicio): void
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
    }

    public function getLotacaoOrigem(): ?Lotacao
    {
        return $this->lotacaoOrigem;
    }

    public function setLotacaoOrigem(?Lotacao $lotacaoOrigem): void
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
    }

    public function getLotacaoLocalizacao(): ?Lotacao
    {
        return $this->lotacaoLocalizacao;
    }

    public function setLotacaoLocalizacao(?Lotacao $lotacaoLocalizacao): void
    {
        $this->lotacaoLocalizacao = $lotacaoLocalizacao;
    }


}
