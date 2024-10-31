<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * CargoFuncao
 */
#[ORM\Table(name: 'CARGO_FUNCAO')]
#[ORM\Index(name: 'cd_cargo_funcao', columns: ['CD_CARGO_FUNCAO'])]
#[ORM\Index(name: 'IDX_263883FCCB3B2D9F', columns: ['ID_COMISSAO_ESPECIFICA_RED'])]
#[ORM\Index(name: 'IDX_263883FCD4CAEA41', columns: ['ID_FUNCAO_GRATIFICADA'])]
#[ORM\Index(name: 'IDX_263883FC11ECF934', columns: ['ID_NORMA'])]
#[ORM\Index(name: 'IDX_263883FC10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_263883FC601E1746', columns: ['ID_LOTACAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class CargoFuncao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_CARGO_FUNCAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CARGO_FUNCAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CARGO_FUNCAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_CARGO_FUNCAO', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código gerado pelo sistema siape na criação de um determinado cargo em comissão baseado em lei e disponíbilizado a lotação.'])]
    protected string $codigo;

    #[ORM\Column(name: 'SG_CARGO_FUNCAO', type: 'string', length: 15, nullable: true, options: ['comment' => 'Sigla ou nome abreviado dado ao cargo em comissão disponível para a AGU.'])]
    protected ?string $sigla;

    #[ORM\Column(name: 'DS_CARGO_FUNCAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome do cargo em comissão criado por um ato (Norma).'])]
    protected string $descricao;

    #[ORM\Column(name: 'DT_CRIACAO_CARGO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi criado o cargo em comissão disponíbilizado a AGU.'])]
    protected ?DateTime $dataCriacaoCargo;

    #[ORM\Column(name: 'DT_EXTINCAO_CARGO', type: 'date', nullable: true, options: ['comment' => 'Data e que ocorreu a extinção do cargo em comissão da AGU..'])]
    protected ?DateTime $dataExtincaoCargo;

    #[ORM\Column(name: 'ST_TIPO_CARGO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador para o tipo de cargo em comissão disponível para AGU. Codificação: 0 - CARGO COMISSIONADO, 1 - FUNÇÃO GRATIFICADA e 2 - CARGO ESPECIAL'])]
    protected string $tipoCargo;

    #[ORM\Column(name: 'IN_OPCAO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especifica se a função em comissão permitirá a opção pelo cargo efetivo. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inOpcao;

    #[ORM\Column(name: 'IN_SUBSTITUTO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especifica se a função em comissão poderá ter substituto. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inSubstituto;

    #[ORM\Column(name: 'IN_VANTAGEM', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especifica se a função em comissão poderá incorporar vantagens pessoais.na carreira do servidor. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inVantagem;

    #[ORM\Column(name: 'IN_PROGRESSAO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano para especifica se a função em comissão permitirá e incedirá para  progressão funcional na carreira do servidor. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inProgressao;

    #[ORM\Column(name: 'DS_OBSEVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro do cargo em comissão da AGU.'])]
    protected ?string $observacao;

    #[ORM\JoinColumn(name: 'ID_COMISSAO_ESPECIFICA_RED', referencedColumnName: 'ID_COMISSAO_ESPECIFICA_RED')]
    #[ORM\ManyToOne(targetEntity: 'ComissaoEspecificaReduzida')]
    protected ?ComissaoEspecificaReduzida $comissaoEspecificaReduzida;

    #[ORM\JoinColumn(name: 'ID_FUNCAO_GRATIFICADA', referencedColumnName: 'ID_FUNCAO_GRATIFICADA')]
    #[ORM\ManyToOne(targetEntity: 'FuncaoGratificada')]
    protected ?FuncaoGratificada $funcaoGratificada;

    #[ORM\JoinColumn(name: 'ID_NORMA', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    protected ?Norma $norma;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $idRh;

    #[ORM\JoinColumn(name: 'ID_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacao;

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

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): void
    {
        $this->sigla = $sigla;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    function getDataCriacaoCargo(): ?\DateTime
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

    public function getTipoCargo(): string
    {
        return $this->tipoCargo;
    }

    public function setTipoCargo(string $tipoCargo): void
    {
        $this->tipoCargo = $tipoCargo;
    }

    public function getInOpcao(): string
    {
        return $this->inOpcao;
    }

    public function setInOpcao(string $inOpcao): void
    {
        $this->inOpcao = $inOpcao;
    }

    public function getInSubstituto(): string
    {
        return $this->inSubstituto;
    }

    public function setInSubstituto(string $inSubstituto): void
    {
        $this->inSubstituto = $inSubstituto;
    }

    public function getInVantagem(): string
    {
        return $this->inVantagem;
    }

    public function setInVantagem(string $inVantagem): void
    {
        $this->inVantagem = $inVantagem;
    }

    public function getInProgressao(): string
    {
        return $this->inProgressao;
    }

    public function setInProgressao(string $inProgressao): void
    {
        $this->inProgressao = $inProgressao;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getComissaoEspecificaReduzida(): ?ComissaoEspecificaReduzida
    {
        return $this->comissaoEspecificaReduzida;
    }

    public function setComissaoEspecificaReduzida(?ComissaoEspecificaReduzida $comissaoEspecificaReduzida): void
    {
        $this->comissaoEspecificaReduzida = $comissaoEspecificaReduzida;
    }

    public function getFuncaoGratificada(): ?FuncaoGratificada
    {
        return $this->funcaoGratificada;
    }

    public function setFuncaoGratificada(?FuncaoGratificada $funcaoGratificada): void
    {
        $this->funcaoGratificada = $funcaoGratificada;
    }

    public function getNorma(): ?Norma
    {
        return $this->norma;
    }

    public function setNorma(?Norma $norma): void
    {
        $this->norma = $norma;
    }

    /**
     * @return Rh
     */
    public function getIdRh(): ?Rh
    {
        return $this->idRh;
    }

    /**
     * @param Rh $idRh
     */
    public function setIdRh(?Rh $idRh): void
    {
        $this->idRh = $idRh;
    }

    public function getLotacao(): ?Lotacao
    {
        return $this->lotacao;
    }

    public function setLotacao(?Lotacao $lotacao): void
    {
        $this->lotacao = $lotacao;
    }


}
