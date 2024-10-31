<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Cargo
 */
#[ORM\Table(name: 'CARGO')]
#[ORM\Index(name: 'IDX_CCBA95C1E01461FF', columns: ['ID_CARREIRA'])]
#[ORM\Index(name: 'IDX_CCBA95C185E6F881', columns: ['ID_NIVEL'])]
#[ORM\Index(name: 'IDX_CCBA95C111ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_CCBA95C1DF1F5C56', columns: ['ID_ORGAO'])]
#[ORM\Index(name: 'IDX_CCBA95C17B86EAD6', columns: ['ID_TIPO_SALARIO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Cargo implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_CARGO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CARGO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CARGO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_CARGO_RH', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código gerado pelo sistema siape na criação de um determinado cargo público baseado em lei e disponíbilizado ao orgão público.'])]
    protected string $codigo;

    #[ORM\Column(name: 'DS_CARGO_RH', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o nome (Função) do cargo. '])]
    protected ?string $descricao;

    #[ORM\Column(name: 'QT_HORAS', type: 'smallint', nullable: true, options: ['comment' => 'Quantidade de horas de trabalho para o exercício do cargo de acordo com a leí (Regime).'])]
    protected ?int $qtdHoras;

    #[ORM\Column(name: 'CD_CBO_OCUPACAO', type: 'string', length: 7, nullable: false, options: ['comment' => 'Identifica o código brasileiro de ocupações (CBO), será a identificação dos sinonímos para os cargos. Representa unicamente as ocupações de acordo com o cadastro brasileiro de ocupações.'])]
    protected string $codigoCboOcupacao;

    #[ORM\Column(name: 'DS_TCU', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o cargo junto ao Tribunal de Contas da União.'])]
    protected ?string $descricaoTcu;

    #[ORM\Column(name: 'QT_VAGAS', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de vagas geradas para o cargo na criação do mesmo.'])]
    protected ?int $qtdVagas;

    #[ORM\Column(name: 'QT_VAGAS_OCUPADAS', type: 'integer', nullable: true, options: ['comment' => 'Quantidade de vagas já ocupadas no do orgão para um cargo específico.'])]
    protected ?int $qtdVagasOcupadas;

    #[ORM\Column(name: 'DT_CRIACAO_CARGO', type: 'date', nullable: true, options: ['comment' => 'Data em que o ocorreu a criação do cargo junto ao SIAPE - Serviço Federal de Processamento de Dados.'])]
    protected ?DateTime $dataCriacaoCargo;

    #[ORM\Column(name: 'DT_EXTINCAO_CARGO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a extinção do cargo junto ao siape - Serviço Federal de Processamento de Dados..'])]
    protected ?DateTime $dataExtincaoCargo;

    #[ORM\Column(name: 'IN_CARGO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especificar se o cargo esta ativo no orgão. Codificação 1 - SIM e 0 - NÃO.'])]
    protected string $inAtivo = '0';

    #[ORM\Column(name: 'IN_CARGO_AGU', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especificar se o cargo é do orgão AGU. Codificação 1 - SIM e 0 - NÃO.'])]
    protected string $inCargoAgu = '0';

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro do cargo do orgão AGU.'])]
    protected ?string $observacao;

    /**
     * @var Carreira
     */
    #[ORM\JoinColumn(name: 'ID_CARREIRA', referencedColumnName: 'ID_CARREIRA')]
    #[ORM\ManyToOne(targetEntity: 'Carreira')]
    protected ?Carreira $idCarreira;

    /**
     * @var Nivel
     */
    #[ORM\JoinColumn(name: 'ID_NIVEL', referencedColumnName: 'ID_NIVEL')]
    #[ORM\ManyToOne(targetEntity: 'Nivel')]
    protected ?Nivel $idNivel;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $idNorma;

    /**
     * @var Orgao
     */
    #[ORM\JoinColumn(name: 'ID_ORGAO', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    protected ?Orgao $idOrgao;

    /**
     * @var TipoSalario
     */
    #[ORM\JoinColumn(name: 'ID_TIPO_SALARIO', referencedColumnName: 'ID_TIPO_SALARIO')]
    #[ORM\ManyToOne(targetEntity: 'TipoSalario')]
    protected ?TipoSalario $tipoSalario;

    /**
     * @var Doctrine\Common\Collections\Collection
     */
    #[ORM\ManyToMany(targetEntity: 'TipoClasse', mappedBy: 'idCargo')]
    private $idTipoClasse = array();

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->idTipoClasse = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getQtdHoras(): ?int
    {
        return $this->qtdHoras;
    }

    public function setQtdHoras(?int $qtdHoras): void
    {
        $this->qtdHoras = $qtdHoras;
    }

    public function getCodigoCboOcupacao(): string
    {
        return $this->codigoCboOcupacao;
    }

    public function setCodigoCboOcupacao(string $codigoCboOcupacao): void
    {
        $this->codigoCboOcupacao = $codigoCboOcupacao;
    }

    public function getDescricaoTcu(): ?string
    {
        return $this->descricaoTcu;
    }

    public function setDescricaoTcu(?string $descricaoTcu): void
    {
        $this->descricaoTcu = $descricaoTcu;
    }

    public function getQtdVagas(): ?int
    {
        return $this->qtdVagas;
    }

    public function setQtdVagas(?int $qtdVagas): void
    {
        $this->qtdVagas = $qtdVagas;
    }

    public function getQtdVagasOcupadas(): ?int
    {
        return $this->qtdVagasOcupadas;
    }

    public function setQtdVagasOcupadas(?int $qtdVagasOcupadas): void
    {
        $this->qtdVagasOcupadas = $qtdVagasOcupadas;
    }

    public function getDataCriacaoCargo(): ?\DateTime
    {
        return $this->dataCriacaoCargo;
    }

    public function setDataCriacaoCargo(?\DateTime $dataCriacaoCargo): void
    {
        $this->dataCriacaoCargo = $dataCriacaoCargo;
    }

    public function getDataExtincaoCargo(): ?\DateTime
    {
        return $this->dataExtincaoCargo;
    }

    public function setDataExtincaoCargo(?\DateTime $dataExtincaoCargo): void
    {
        $this->dataExtincaoCargo = $dataExtincaoCargo;
    }

    public function getInAtivo(): string
    {
        return $this->inAtivo;
    }

    public function setInAtivo(string $inAtivo): void
    {
        $this->inAtivo = $inAtivo;
    }

    public function getInCargoAgu(): string
    {
        return $this->inCargoAgu;
    }

    public function setInCargoAgu(string $inCargoAgu): void
    {
        $this->inCargoAgu = $inCargoAgu;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }


    /**
     * @return Carreira
     */
    public function getIdCarreira(): ?Carreira
    {
        return $this->idCarreira;
    }

    /**
     * @param Carreira $idCarreira
     */
    public function setIdCarreira(?Carreira $idCarreira): void
    {
        $this->idCarreira = $idCarreira;
    }

    /**
     * @return Nivel
     */
    public function getIdNivel(): ?Nivel
    {
        return $this->idNivel;
    }

    /**
     * @param Nivel $idNivel
     */
    public function setIdNivel(?Nivel $idNivel): void
    {
        $this->idNivel = $idNivel;
    }

    /**
     * @return Norma
     */
    public function getIdNorma(): ?Norma
    {
        return $this->idNorma;
    }

    /**
     * @param Norma $idNorma
     */
    public function setIdNorma(?Norma $idNorma): void
    {
        $this->idNorma = $idNorma;
    }

    /**
     * @return Orgao
     */
    public function getIdOrgao(): ?Orgao
    {
        return $this->idOrgao;
    }

    /**
     * @param Orgao $idOrgao
     */
    public function setIdOrgao(?Orgao $idOrgao): void
    {
        $this->idOrgao = $idOrgao;
    }

    public function getTipoSalario(): ?TipoSalario
    {
        return $this->tipoSalario;
    }

    public function setIdTipoSalario(?TipoSalario $tipoSalario): void
    {
        $this->tipoSalario = $tipoSalario;
    }

    /**
     * @return Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
     */
    public function getIdTipoClasse(): \Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection
    {
        return $this->idTipoClasse;
    }

    /**
     * @param Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $idTipoClasse
     */
    public function setIdTipoClasse(\Doctrine\Common\Collections\ArrayCollection|\Doctrine\Common\Collections\Collection $idTipoClasse): void
    {
        $this->idTipoClasse = $idTipoClasse;
    }

}
