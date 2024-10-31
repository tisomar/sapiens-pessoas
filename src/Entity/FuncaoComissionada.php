<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FuncaoComissionada
 */
#[ORM\Table(name: 'FUNCAO_COMISSIONADA')]
#[ORM\Index(name: 'ix_funcaocomissionada_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_940EACDF8E9B9C96', columns: ['ID_NORMA_EXONERACAO'])]
#[ORM\Index(name: 'IDX_940EACDF4FC0CA82', columns: ['ID_TIPO_OCUPACAO'])]
#[ORM\Index(name: 'IDX_940EACDF10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_940EACDF594F7650', columns: ['ID_TIPO_OPCAO'])]
#[ORM\Index(name: 'IDX_940EACDF4058B0C8', columns: ['ID_CARGO_FUNCAO'])]
#[ORM\Index(name: 'IDX_940EACDF7BEB8A37', columns: ['ID_NORMA_OPCAO'])]
#[ORM\Index(name: 'IDX_940EACDF27652CAB', columns: ['ID_NORMA_NOMEACAO'])]
#[ORM\UniqueConstraint(name: 'uk_funcao_comissionada', columns: ['ID_SERVIDOR', 'ID_CARGO_FUNCAO', 'DT_NOMEACAO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class FuncaoComissionada implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Id]
    #[ORM\Column(name: 'ID_FUNCAO_COMISSIONADA', type: 'integer', nullable: false, options: ['comment' => '"IdentificadorsequencialeúnicoqueespecificaumregistronatabelaFUNCAO_COMISSIONADA'])]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_FUNCAO_COMISSIONADA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'IN_DIREITO_ADQUIRIDO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se é direito adquirido da pessoa a ocupação da função comissionada. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inDireitoAdquirido;

    #[ORM\Column(name: 'DT_NOMEACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi publicado a nomeação do servidor público ou pessoa sem vínculo em uma determinada função em comissão.'])]
    protected ?DateTime $dataNomeacao = null;

    #[ORM\Column(name: 'DT_POSSE', type: 'date', nullable: true, options: ['comment' => 'Data em que foi publicado a posse de um servidor público ou pessoa sem vínculo em uma determinada fun????o em comissão.'])]
    protected ?DateTime $dataPosse = null;

    #[ORM\Column(name: 'DT_EXERCICIO', type: 'date', nullable: true, options: ['comment' => 'Data em que um servidor público ou pessoa sem vínculo iniciou o exercício de suas atividade na função em comissão lotado em uma unidade da AGU.'])]
    protected ?DateTime $dataExercicio = null;

    #[ORM\Column(name: 'DT_EXONERACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi publicado a exoneração de um servidor público ou pessoa sem vínculo em uma determinada função em comissão.'])]
    protected ?DateTime $dataExoneracao = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de função comissionada ocupada por uma pessoa.'])]
    protected ?string $observacao = null;

    #[ORM\JoinColumn(name: 'ID_NORMA_EXONERACAO', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $normaExoneracao;

    #[ORM\JoinColumn(name: 'ID_TIPO_OCUPACAO', referencedColumnName: 'ID_TIPO_OCUPACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoOcupacao')]
    protected ?TipoOcupacao $tipoOcupacao;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private ?Rh $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_OPCAO', referencedColumnName: 'ID_TIPO_OPCAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoOpcao')]
    protected ?TipoOpcao $tipoOpcao;

    #[ORM\JoinColumn(name: 'ID_CARGO_FUNCAO', referencedColumnName: 'ID_CARGO_FUNCAO')]
    #[ORM\ManyToOne(targetEntity: 'CargoFuncao')]
    protected ?CargoFuncao $cargoFuncao;

    #[ORM\JoinColumn(name: 'ID_NORMA_OPCAO', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $normaOpcao;

    #[ORM\JoinColumn(name: 'ID_NORMA_NOMEACAO', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $normaNomeacao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getInDireitoAdquirido(): string
    {
        return $this->inDireitoAdquirido;
    }

    public function setInDireitoAdquirido(string $inDireitoAdquirido): void
    {
        $this->inDireitoAdquirido = $inDireitoAdquirido;
    }

    public function getDataNomeacao(): ?DateTime
    {
        return $this->dataNomeacao;
    }

    public function setDataNomeacao(?DateTime $dataNomeacao): void
    {
        $this->dataNomeacao = $dataNomeacao;
    }

    public function getDataPosse(): ?DateTime
    {
        return $this->dataPosse;
    }

    public function setDataPosse(?DateTime $dataPosse): void
    {
        $this->dataPosse = $dataPosse;
    }

    public function getDataExercicio(): ?DateTime
    {
        return $this->dataExercicio;
    }

    public function setDataExercicio(?DateTime $dataExercicio): void
    {
        $this->dataExercicio = $dataExercicio;
    }

    public function getDataExoneracao(): ?DateTime
    {
        return $this->dataExoneracao;
    }

    public function setDataExoneracao(?DateTime $dataExoneracao): void
    {
        $this->dataExoneracao = $dataExoneracao;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }


    public function getNormaExoneracao(): ?Norma
    {
        return $this->normaExoneracao;
    }

    public function setNormaExoneracao(?Norma $normaExoneracao): void
    {
        $this->normaExoneracao = $normaExoneracao;
    }

    public function getTipoOcupacao(): ?TipoOcupacao
    {
        return $this->tipoOcupacao;
    }

    public function setTipoOcupacao(?TipoOcupacao $tipoOcupacao): void
    {
        $this->tipoOcupacao = $tipoOcupacao;
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

    public function getTipoOpcao(): ?TipoOpcao
    {
        return $this->tipoOpcao;
    }

    public function setTipoOpcao(?TipoOpcao $tipoOpcao): void
    {
        $this->tipoOpcao = $tipoOpcao;
    }

    public function getCargoFuncao(): ?CargoFuncao
    {
        return $this->cargoFuncao;
    }

    public function setCargoFuncao(?CargoFuncao $cargoFuncao): void
    {
        $this->cargoFuncao = $cargoFuncao;
    }

    public function getNormaOpcao(): ?Norma
    {
        return $this->normaOpcao;
    }

    public function setNormaOpcao(?Norma $normaOpcao): void
    {
        $this->normaOpcao = $normaOpcao;
    }

    public function getNormaNomeacao(): ?Norma
    {
        return $this->normaNomeacao;
    }

    public function setNormaNomeacao(?Norma $normaNomeacao): void
    {
        $this->normaNomeacao = $normaNomeacao;
    }


}
