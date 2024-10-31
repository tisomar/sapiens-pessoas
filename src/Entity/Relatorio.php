<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Relatorio
 */
#[ORM\Table(name: 'RELATORIO')]
#[ORM\Index(name: 'IDX_3A7B04E010DD9DB6', columns: ['ID_RH'])]
#[ORM\Entity]
class Relatorio
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_RELATORIO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela RELATORIO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'RELATORIO_ID_RELATORIO_seq', allocationSize: 1, initialValue: 1)]
    private $idRelatorio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_RELATORIO', type: 'string', length: 200, nullable: true, options: ['comment' => 'Especificação descritiva com as informações relativas ao conteúdo do relatório padrão solicitado pelo usuário.'])]
    private $dsRelatorio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TITULO', type: 'string', length: 200, nullable: true, options: ['comment' => 'Especificação descritiva com o título para o relatório padrão solicitado pelo usuário.'])]
    private $dsTitulo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TABELA', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva com nome do objeto de banco de dados (Tabela ou View) que será utilizado para elaboração do relatório padrão solicitado pelo usuário.'])]
    private $dsTabela;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_COLUNA', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva com nome das colunas dos objeto de banco de dados (Tabela ou View) que será utilizada para extração dos dados para o relatório padrão solicitado pelo usuário.'])]
    private $dsColuna;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CONDICAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para a condição (Filtro ou regra de negócio) utilizada para elaboração do relatório padrão solicitado pelo usuário.'])]
    private $dsCondicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ORDENACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para os campos no qual serão utilizados para ordenação dos dados extraído no relatório padrão solicitado pelo usuário.'])]
    private $dsOrdenacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_COLUNA_FORMATADA', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva com nome formatado das colunas de objetos de banco de dados (Tabela ou View) que serão apresentadas ao usuário na exibição do relatório padrão solicitado.'])]
    private $dsColunaFormatada;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TABELA_PRINCIPAL', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva com nome do objeto principal do banco de dados (Tabela ou View) no qual será o ponto de partida para a busca das informações apresentadas no relatório padrão solicitado.'])]
    private $dsTabelaPrincipal;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    private $dtOperacaoExclusao;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $idRh;

    /**
     * @return int
     */
    public function getIdRelatorio(): int
    {
        return $this->idRelatorio;
    }

    /**
     * @param int $idRelatorio
     */
    public function setIdRelatorio(int $idRelatorio): void
    {
        $this->idRelatorio = $idRelatorio;
    }

    /**
     * @return string|null
     */
    public function getDsRelatorio(): ?string
    {
        return $this->dsRelatorio;
    }

    /**
     * @param string|null $dsRelatorio
     */
    public function setDsRelatorio(?string $dsRelatorio): void
    {
        $this->dsRelatorio = $dsRelatorio;
    }

    /**
     * @return string|null
     */
    public function getDsTitulo(): ?string
    {
        return $this->dsTitulo;
    }

    /**
     * @param string|null $dsTitulo
     */
    public function setDsTitulo(?string $dsTitulo): void
    {
        $this->dsTitulo = $dsTitulo;
    }

    /**
     * @return string|null
     */
    public function getDsTabela(): ?string
    {
        return $this->dsTabela;
    }

    /**
     * @param string|null $dsTabela
     */
    public function setDsTabela(?string $dsTabela): void
    {
        $this->dsTabela = $dsTabela;
    }

    /**
     * @return string|null
     */
    public function getDsColuna(): ?string
    {
        return $this->dsColuna;
    }

    /**
     * @param string|null $dsColuna
     */
    public function setDsColuna(?string $dsColuna): void
    {
        $this->dsColuna = $dsColuna;
    }

    /**
     * @return string|null
     */
    public function getDsCondicao(): ?string
    {
        return $this->dsCondicao;
    }

    /**
     * @param string|null $dsCondicao
     */
    public function setDsCondicao(?string $dsCondicao): void
    {
        $this->dsCondicao = $dsCondicao;
    }

    /**
     * @return string|null
     */
    public function getDsOrdenacao(): ?string
    {
        return $this->dsOrdenacao;
    }

    /**
     * @param string|null $dsOrdenacao
     */
    public function setDsOrdenacao(?string $dsOrdenacao): void
    {
        $this->dsOrdenacao = $dsOrdenacao;
    }

    /**
     * @return string|null
     */
    public function getDsColunaFormatada(): ?string
    {
        return $this->dsColunaFormatada;
    }

    /**
     * @param string|null $dsColunaFormatada
     */
    public function setDsColunaFormatada(?string $dsColunaFormatada): void
    {
        $this->dsColunaFormatada = $dsColunaFormatada;
    }

    /**
     * @return string|null
     */
    public function getDsTabelaPrincipal(): ?string
    {
        return $this->dsTabelaPrincipal;
    }

    /**
     * @param string|null $dsTabelaPrincipal
     */
    public function setDsTabelaPrincipal(?string $dsTabelaPrincipal): void
    {
        $this->dsTabelaPrincipal = $dsTabelaPrincipal;
    }

    /**
     * @return DateTime|string
     */
    public function getDtOperacaoInclusao(): \DateTime|string
    {
        return $this->dtOperacaoInclusao;
    }

    /**
     * @param DateTime|string $dtOperacaoInclusao
     */
    public function setDtOperacaoInclusao(\DateTime|string $dtOperacaoInclusao): void
    {
        $this->dtOperacaoInclusao = $dtOperacaoInclusao;
    }

    /**
     * @return DateTime|string
     */
    public function getDtOperacaoAlteracao(): \DateTime|string
    {
        return $this->dtOperacaoAlteracao;
    }

    /**
     * @param DateTime|string $dtOperacaoAlteracao
     */
    public function setDtOperacaoAlteracao(\DateTime|string $dtOperacaoAlteracao): void
    {
        $this->dtOperacaoAlteracao = $dtOperacaoAlteracao;
    }

    /**
     * @return string
     */
    public function getNrCpfOperador(): string
    {
        return $this->nrCpfOperador;
    }

    /**
     * @param string $nrCpfOperador
     */
    public function setNrCpfOperador(string $nrCpfOperador): void
    {
        $this->nrCpfOperador = $nrCpfOperador;
    }

    /**
     * @return DateTime|null
     */
    public function getDtOperacaoExclusao(): ?\DateTime
    {
        return $this->dtOperacaoExclusao;
    }

    /**
     * @param DateTime|null $dtOperacaoExclusao
     */
    public function setDtOperacaoExclusao(?\DateTime $dtOperacaoExclusao): void
    {
        $this->dtOperacaoExclusao = $dtOperacaoExclusao;
    }

    /**
     * @return Rh
     */
    public function getIdRh(): Rh
    {
        return $this->idRh;
    }

    /**
     * @param Rh $idRh
     */
    public function setIdRh(Rh $idRh): void
    {
        $this->idRh = $idRh;
    }


}
