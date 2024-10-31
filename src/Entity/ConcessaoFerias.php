<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ConcessaoFerias
 */
#[ORM\Table(name: 'CONCESSAO_FERIAS')]
#[ORM\Index(name: 'IDX_4430C758C04FCB8F', columns: ['ID_MOTIVO_INTERRUPCAO'])]
#[ORM\Index(name: 'IDX_4430C758A02FC59F', columns: ['ID_FERIAS'])]
#[ORM\Index(name: 'IDX_4430C7588A38FBC', columns: ['ID_NORMA_AQUISICAO'])]
#[ORM\Index(name: 'IDX_4430C75810DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_4430C75896642F60', columns: ['ID_NORMA_INTERRUPCAO'])]
#[ORM\UniqueConstraint(name: 'uk_concessao_ferias', columns: ['ID_FERIAS', 'DT_INICIO_MARCACAO', 'DT_FIM_MARCACAO', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
class ConcessaoFerias
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CONCESSAO_FERIAS', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CONCESSAO_FERIAS.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'CONCESSAO_FERIAS_ID_CONCESSAO_', allocationSize: 1, initialValue: 1)]
    private $idConcessaoFerias;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_ADIANTAMENTO_REMUNERACAO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se o servidor solicita o adiantamento da remuneração paga ao servidor (1/3 de Férias). Codificação: 0 -  FALSO e 1 - VERDADEIRO.'])]
    private $inAdiantamentoRemuneracao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_DEVOLUCAO_QTDEPARCELAS', type: 'integer', nullable: true, options: ['comment' => 'Número especificando  a quantidade de parcelas que o servidor deverá devolver, correspondente ao valor do adiantamento de férias após a sua interrupção. '])]
    private $nrDevolucaoQtdeparcelas;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_AVISO', type: 'integer', nullable: true, options: ['comment' => 'Número especificando a quantidade de avisos que o servidor recebeu informando o período para o gozo de suas férias. O RH não utiliza atualmente e não soube informa o por quê.'])]
    private $nrAviso;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_MARCACAO', type: 'date', nullable: true, options: ['comment' => 'Data em ocorreu o início para o prazo da marcação das férias dos servidores públicos da AGU.'])]
    private $dtInicioMarcacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_MARCACAO', type: 'date', nullable: true, options: ['comment' => 'Data em ocorreu o encerramento para o prazo da marcação das férias dos servidores públicos da AGU.'])]
    private $dtFimMarcacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO_INTERRUPCAO', type: 'date', nullable: true, options: ['comment' => 'Data em que se deu o início da interrupção das férias do servidor público.'])]
    private $dtInicioInterrupcao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM_INTERRUPCAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor retornou para as suas férias e ouve o encerramento da interrupção de suas férias.'])]
    private $dtFimInterrupcao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PAGAMENTO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi efetuado o pagamento do adiantamento da remuneração paga ao servidor pela a concessão de férias.'])]
    private $dtPagamento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO_AQUISICAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro da aquisição de férias de um servidor na AGU.'])]
    private $dsObservacaoAquisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO_INTERRUPCAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro da interrupção de férias de um servidor na AGU.'])]
    private $dsObservacaoInterrupcao;

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
     * @var string|null
     */
    #[ORM\Column(name: 'IN_SITUACAO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Especifica a descrição da situação de uma férias. / null - Inserida/ 0 - Enviada / 1 - Aprovada / 2 - Rejeitada / 3 - Alterada'])]
    private $inSituacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_OBSERVACAO_REJEICAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especifica a descrição do motivo pelo qual as férias do servidor foi rejeitada.'])]
    private $dsObservacaoRejeicao;

    /**
     * @var MotivoInterrupcao
     */
    #[ORM\JoinColumn(name: 'ID_MOTIVO_INTERRUPCAO', referencedColumnName: 'ID_MOTIVO_INTERRUPCAO')]
    #[ORM\ManyToOne(targetEntity: 'MotivoInterrupcao')]
    private $idMotivoInterrupcao;

    /**
     * @var Ferias
     */
    #[ORM\JoinColumn(name: 'ID_FERIAS', referencedColumnName: 'ID_FERIAS')]
    #[ORM\ManyToOne(targetEntity: 'Ferias')]
    private $idFerias;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'ID_NORMA_AQUISICAO', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $idNormaAquisicao;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $idRh;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'ID_NORMA_INTERRUPCAO', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $idNormaInterrupcao;

    /**
     * @return int
     */
    public function getIdConcessaoFerias(): int
    {
        return $this->idConcessaoFerias;
    }

    /**
     * @param int $idConcessaoFerias
     */
    public function setIdConcessaoFerias(int $idConcessaoFerias): void
    {
        $this->idConcessaoFerias = $idConcessaoFerias;
    }

    /**
     * @return string
     */
    public function getInAdiantamentoRemuneracao(): string
    {
        return $this->inAdiantamentoRemuneracao;
    }

    /**
     * @param string $inAdiantamentoRemuneracao
     */
    public function setInAdiantamentoRemuneracao(string $inAdiantamentoRemuneracao): void
    {
        $this->inAdiantamentoRemuneracao = $inAdiantamentoRemuneracao;
    }

    /**
     * @return int|null
     */
    public function getNrDevolucaoQtdeparcelas(): ?int
    {
        return $this->nrDevolucaoQtdeparcelas;
    }

    /**
     * @param int|null $nrDevolucaoQtdeparcelas
     */
    public function setNrDevolucaoQtdeparcelas(?int $nrDevolucaoQtdeparcelas): void
    {
        $this->nrDevolucaoQtdeparcelas = $nrDevolucaoQtdeparcelas;
    }

    /**
     * @return int|null
     */
    public function getNrAviso(): ?int
    {
        return $this->nrAviso;
    }

    /**
     * @param int|null $nrAviso
     */
    public function setNrAviso(?int $nrAviso): void
    {
        $this->nrAviso = $nrAviso;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioMarcacao(): ?\DateTime
    {
        return $this->dtInicioMarcacao;
    }

    /**
     * @param DateTime|null $dtInicioMarcacao
     */
    public function setDtInicioMarcacao(?\DateTime $dtInicioMarcacao): void
    {
        $this->dtInicioMarcacao = $dtInicioMarcacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimMarcacao(): ?\DateTime
    {
        return $this->dtFimMarcacao;
    }

    /**
     * @param DateTime|null $dtFimMarcacao
     */
    public function setDtFimMarcacao(?\DateTime $dtFimMarcacao): void
    {
        $this->dtFimMarcacao = $dtFimMarcacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicioInterrupcao(): ?\DateTime
    {
        return $this->dtInicioInterrupcao;
    }

    /**
     * @param DateTime|null $dtInicioInterrupcao
     */
    public function setDtInicioInterrupcao(?\DateTime $dtInicioInterrupcao): void
    {
        $this->dtInicioInterrupcao = $dtInicioInterrupcao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFimInterrupcao(): ?\DateTime
    {
        return $this->dtFimInterrupcao;
    }

    /**
     * @param DateTime|null $dtFimInterrupcao
     */
    public function setDtFimInterrupcao(?\DateTime $dtFimInterrupcao): void
    {
        $this->dtFimInterrupcao = $dtFimInterrupcao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPagamento(): ?\DateTime
    {
        return $this->dtPagamento;
    }

    /**
     * @param DateTime|null $dtPagamento
     */
    public function setDtPagamento(?\DateTime $dtPagamento): void
    {
        $this->dtPagamento = $dtPagamento;
    }

    /**
     * @return string|null
     */
    public function getDsObservacaoAquisicao(): ?string
    {
        return $this->dsObservacaoAquisicao;
    }

    /**
     * @param string|null $dsObservacaoAquisicao
     */
    public function setDsObservacaoAquisicao(?string $dsObservacaoAquisicao): void
    {
        $this->dsObservacaoAquisicao = $dsObservacaoAquisicao;
    }

    /**
     * @return string|null
     */
    public function getDsObservacaoInterrupcao(): ?string
    {
        return $this->dsObservacaoInterrupcao;
    }

    /**
     * @param string|null $dsObservacaoInterrupcao
     */
    public function setDsObservacaoInterrupcao(?string $dsObservacaoInterrupcao): void
    {
        $this->dsObservacaoInterrupcao = $dsObservacaoInterrupcao;
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
     * @return string|null
     */
    public function getInSituacao(): ?string
    {
        return $this->inSituacao;
    }

    /**
     * @param string|null $inSituacao
     */
    public function setInSituacao(?string $inSituacao): void
    {
        $this->inSituacao = $inSituacao;
    }

    /**
     * @return string|null
     */
    public function getDsObservacaoRejeicao(): ?string
    {
        return $this->dsObservacaoRejeicao;
    }

    /**
     * @param string|null $dsObservacaoRejeicao
     */
    public function setDsObservacaoRejeicao(?string $dsObservacaoRejeicao): void
    {
        $this->dsObservacaoRejeicao = $dsObservacaoRejeicao;
    }

    /**
     * @return MotivoInterrupcao
     */
    public function getIdMotivoInterrupcao():MotivoInterrupcao
    {
        return $this->idMotivoInterrupcao;
    }

    /**
     * @param MotivoInterrupcao $idMotivoInterrupcao
     */
    public function setIdMotivoInterrupcao(MotivoInterrupcao $idMotivoInterrupcao): void
    {
        $this->idMotivoInterrupcao = $idMotivoInterrupcao;
    }

    /**
     * @return Ferias
     */
    public function getIdFerias(): Ferias
    {
        return $this->idFerias;
    }

    /**
     * @param Ferias $idFerias
     */
    public function setIdFerias(Ferias $idFerias): void
    {
        $this->idFerias = $idFerias;
    }

    /**
     * @return Norma
     */
    public function getIdNormaAquisicao(): Norma
    {
        return $this->idNormaAquisicao;
    }

    /**
     * @param Norma $idNormaAquisicao
     */
    public function setIdNormaAquisicao(Norma $idNormaAquisicao): void
    {
        $this->idNormaAquisicao = $idNormaAquisicao;
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

    /**
     * @return Norma
     */
    public function getIdNormaInterrupcao(): Norma
    {
        return $this->idNormaInterrupcao;
    }

    /**
     * @param Norma $idNormaInterrupcao
     */
    public function setIdNormaInterrupcao(Norma $idNormaInterrupcao): void
    {
        $this->idNormaInterrupcao = $idNormaInterrupcao;
    }


}
