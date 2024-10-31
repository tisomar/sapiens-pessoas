<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * DocPreRequisicao
 */
#[ORM\Table(name: 'DOC_PRE_REQUISICAO')]
#[ORM\Index(name: 'IDX_90A636A93EFDAD65', columns: ['ID_FORMA_DOCUMENTO'])]
#[ORM\Index(name: 'IDX_90A636A9D5BAE042', columns: ['ID_PRE_REQUISICAO'])]
#[ORM\Entity]
class DocPreRequisicao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DOC_PREREQUISICAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DOC_PRÉREQUISITADO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'DOC_PRE_REQUISICAO_ID_DOC_PRER', allocationSize: 1, initialValue: 1)]
    private $idDocPrerequisicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_DOCUMENTO', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que o documento para pré requisição foi apresentado ao orgão no qual será desempenhado os trabalho.'])]
    private $dtDocumento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_DOCUMENTO', type: 'string', length: 255, nullable: true, options: ['comment' => 'Especificação descritiva para o detalhamento da pré requisição, dados, delarações e questionários que serão analisados para uma futura requisição.'])]
    private $dsDocumento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_RESPOSTA', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica o tipo de resposta. Codificação: 1 - VERDADEIRO e 0 - FALSO'])]
    private $inResposta;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_AUT_REDISTRIBUICAO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica a autorização do orgão para redistribuição do servidor público. Codificação: 1 - VERDADEIRO e 0 - FALSO'])]
    private $inAutRedistribuicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_AUTORIZACAO', type: 'string', length: 255, nullable: true, options: ['comment' => 'Especificação descritiva para as autorizações declarada pelo orgão de origem para pré-requisição de um servidor público.'])]
    private $dsAutorizacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_AUTORIZACAO', type: 'date', nullable: true, options: ['comment' => 'Data/Hora em que foi publicado a autorizado para o servidor se inscrever na pré-requisição para uma requisição.'])]
    private $dtAutorizacao;

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
    #[ORM\Column(name: 'DS_AVISO_REDISTRIBUICAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o aviso ou comunicado para o caso de redistribuição do servidor público.'])]
    private $dsAvisoRedistribuicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_TIPO_REDISTRIBUICAO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica o tipo de redistribuição utilizada. Codificação: 1 - CESSÃO e 0 - REQUISIÇÃO'])]
    private $inTipoRedistribuicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_PERIODO_REDISTRIBUICAO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica o período de redistribuição utilizada pelo servidor. Codificação 1 - DETERMINADO e 0 - INDETERMINADO'])]
    private $inPeriodoRedistribuicao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'NR_QTD_PERIODO', type: 'integer', nullable: true, options: ['comment' => 'Número para a quantidade em dia para o tempo em que se dará a requisição ou cessão do servidor público no orgão de exercício da função.'])]
    private $nrQtdPeriodo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_TIPO_DOCUMENTO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica o tipo ou forma de documento que originou a requisição ou cessão do servidor públicoo. Codificação: 0 - Aviso e 1 - Ofício'])]
    private $inTipoDocumento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_TEXTO_APRESENTACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva onde o usuário poderá usar o texto padrão útilizado na apresentação dos templates ou alter??-lo conforme sua vontade.'])]
    private $dsTextoApresentacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_MIDIA', type: 'integer', nullable: true, options: ['comment' => 'Identificador para a mídia que é o arquivo entregue pelo servidor para a declaração de pré-inscrição para uma futura requisição.'])]
    private $idMidia;

    /**
     * @var FormaDocumento
     */
    #[ORM\JoinColumn(name: 'ID_FORMA_DOCUMENTO', referencedColumnName: 'ID_FORMA_DOCUMENTO')]
    #[ORM\ManyToOne(targetEntity: 'FormaDocumento')]
    private $idFormaDocumento;

    /**
     * @var PreRequisicao
     */
    #[ORM\JoinColumn(name: 'ID_PRE_REQUISICAO', referencedColumnName: 'ID_PRE_REQUISICAO')]
    #[ORM\ManyToOne(targetEntity: 'PreRequisicao')]
    private $idPreRequisicao;

    /**
     * @return int
     */
    public function getIdDocPrerequisicao(): int
    {
        return $this->idDocPrerequisicao;
    }

    /**
     * @param int $idDocPrerequisicao
     */
    public function setIdDocPrerequisicao(int $idDocPrerequisicao): void
    {
        $this->idDocPrerequisicao = $idDocPrerequisicao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtDocumento(): ?\DateTime
    {
        return $this->dtDocumento;
    }

    /**
     * @param DateTime|null $dtDocumento
     */
    public function setDtDocumento(?\DateTime $dtDocumento): void
    {
        $this->dtDocumento = $dtDocumento;
    }

    /**
     * @return string|null
     */
    public function getDsDocumento(): ?string
    {
        return $this->dsDocumento;
    }

    /**
     * @param string|null $dsDocumento
     */
    public function setDsDocumento(?string $dsDocumento): void
    {
        $this->dsDocumento = $dsDocumento;
    }

    /**
     * @return string|null
     */
    public function getInResposta(): ?string
    {
        return $this->inResposta;
    }

    /**
     * @param string|null $inResposta
     */
    public function setInResposta(?string $inResposta): void
    {
        $this->inResposta = $inResposta;
    }

    /**
     * @return string|null
     */
    public function getInAutRedistribuicao(): ?string
    {
        return $this->inAutRedistribuicao;
    }

    /**
     * @param string|null $inAutRedistribuicao
     */
    public function setInAutRedistribuicao(?string $inAutRedistribuicao): void
    {
        $this->inAutRedistribuicao = $inAutRedistribuicao;
    }

    /**
     * @return string|null
     */
    public function getDsAutorizacao(): ?string
    {
        return $this->dsAutorizacao;
    }

    /**
     * @param string|null $dsAutorizacao
     */
    public function setDsAutorizacao(?string $dsAutorizacao): void
    {
        $this->dsAutorizacao = $dsAutorizacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtAutorizacao(): ?\DateTime
    {
        return $this->dtAutorizacao;
    }

    /**
     * @param DateTime|null $dtAutorizacao
     */
    public function setDtAutorizacao(?\DateTime $dtAutorizacao): void
    {
        $this->dtAutorizacao = $dtAutorizacao;
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
    public function getDsAvisoRedistribuicao(): ?string
    {
        return $this->dsAvisoRedistribuicao;
    }

    /**
     * @param string|null $dsAvisoRedistribuicao
     */
    public function setDsAvisoRedistribuicao(?string $dsAvisoRedistribuicao): void
    {
        $this->dsAvisoRedistribuicao = $dsAvisoRedistribuicao;
    }

    /**
     * @return string|null
     */
    public function getInTipoRedistribuicao(): ?string
    {
        return $this->inTipoRedistribuicao;
    }

    /**
     * @param string|null $inTipoRedistribuicao
     */
    public function setInTipoRedistribuicao(?string $inTipoRedistribuicao): void
    {
        $this->inTipoRedistribuicao = $inTipoRedistribuicao;
    }

    /**
     * @return string|null
     */
    public function getInPeriodoRedistribuicao(): ?string
    {
        return $this->inPeriodoRedistribuicao;
    }

    /**
     * @param string|null $inPeriodoRedistribuicao
     */
    public function setInPeriodoRedistribuicao(?string $inPeriodoRedistribuicao): void
    {
        $this->inPeriodoRedistribuicao = $inPeriodoRedistribuicao;
    }

    /**
     * @return int|null
     */
    public function getNrQtdPeriodo(): ?int
    {
        return $this->nrQtdPeriodo;
    }

    /**
     * @param int|null $nrQtdPeriodo
     */
    public function setNrQtdPeriodo(?int $nrQtdPeriodo): void
    {
        $this->nrQtdPeriodo = $nrQtdPeriodo;
    }

    /**
     * @return string|null
     */
    public function getInTipoDocumento(): ?string
    {
        return $this->inTipoDocumento;
    }

    /**
     * @param string|null $inTipoDocumento
     */
    public function setInTipoDocumento(?string $inTipoDocumento): void
    {
        $this->inTipoDocumento = $inTipoDocumento;
    }

    /**
     * @return string|null
     */
    public function getDsTextoApresentacao(): ?string
    {
        return $this->dsTextoApresentacao;
    }

    /**
     * @param string|null $dsTextoApresentacao
     */
    public function setDsTextoApresentacao(?string $dsTextoApresentacao): void
    {
        $this->dsTextoApresentacao = $dsTextoApresentacao;
    }

    /**
     * @return int|null
     */
    public function getIdMidia(): ?int
    {
        return $this->idMidia;
    }

    /**
     * @param int|null $idMidia
     */
    public function setIdMidia(?int $idMidia): void
    {
        $this->idMidia = $idMidia;
    }

    /**
     * @return FormaDocumento
     */
    public function getIdFormaDocumento(): FormaDocumento
    {
        return $this->idFormaDocumento;
    }

    /**
     * @param FormaDocumento $idFormaDocumento
     */
    public function setIdFormaDocumento(FormaDocumento $idFormaDocumento): void
    {
        $this->idFormaDocumento = $idFormaDocumento;
    }

    /**
     * @return PreRequisicao
     */
    public function getIdPreRequisicao(): PreRequisicao
    {
        return $this->idPreRequisicao;
    }

    /**
     * @param PreRequisicao $idPreRequisicao
     */
    public function setIdPreRequisicao(PreRequisicao $idPreRequisicao): void
    {
        $this->idPreRequisicao = $idPreRequisicao;
    }


}
