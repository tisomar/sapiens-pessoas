<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * PreRequisicao
 */
#[ORM\Table(name: 'PRE_REQUISICAO')]
#[ORM\Index(name: 'IDX_D14014C3DEB93758', columns: ['ID_CARGO_ATUAL'])]
#[ORM\Index(name: 'IDX_D14014C3601E1746', columns: ['ID_LOTACAO'])]
#[ORM\Index(name: 'IDX_D14014C34548D530', columns: ['ID_ORGAO_ORIGEM'])]
#[ORM\Index(name: 'IDX_D14014C35D2597DA', columns: ['ID_CARGO_PRETENDIDO'])]
#[ORM\Index(name: 'IDX_D14014C3D4CAEA41', columns: ['ID_FUNCAO_GRATIFICADA'])]
#[ORM\Index(name: 'IDX_D14014C33DEAE3DE', columns: ['ID_SITUACAO_REQUISICAO'])]
#[ORM\Entity]
class PreRequisicao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_PRE_REQUISICAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela PRÉ REQUISITADO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'PRE_REQUISICAO_ID_PRE_REQUISIC', allocationSize: 1, initialValue: 1)]
    private $idPreRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_CANDIDATO_REQUISICAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Nome do candidato a requisição para o orgão AGU.'])]
    private $nmCandidatoRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_SIAPE_CANDIDATO_REQUISICAO', type: 'string', length: 12, nullable: true, options: ['comment' => 'Número da matricula SIAPE do candidato a requisição para o orgão AGU.'])]
    private $nrSiapeCandidatoRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_CANDIDATO_REQUISICAO', type: 'string', length: 11, nullable: true, options: ['fixed' => true, 'comment' => 'Número do CPF do candidato a requisição para o orgão AGU.'])]
    private $nrCpfCandidatoRequisicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PRE_REQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que foi gerado a pr??-requisição do candidato a requisição para o orgão AGU.'])]
    private $dtPreRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_PERMANENCIA', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleando que especifica o tipo de permanencia no orgão da requisição do candidato. Codificação: 1 - DETERMINADO e 0 - INDENTERMINADO.'])]
    private $inPermanencia;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_STATUS_PREREQUISICAO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que representa se a pré requisição esta ATIVA. Codificação 0 - INATIVO e 1 - ATIVO.'])]
    private $inStatusPrerequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_AVISO_PREREQUISICAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para os detalhes sobre o término de seleção da pré requisição dos candidatos.'])]
    private $dsAvisoPrerequisicao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_AVISO_PREREQUISICAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu o aviso / comunicado da requisição do candidato a vaga.'])]
    private $dtAvisoPrerequisicao;

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
    #[ORM\Column(name: 'NR_PROCESSO_REQUISICAO', type: 'string', length: 20, nullable: true, options: ['comment' => 'Número de identificação do processo interno para a requisição do servidor público ao orgão de destino.'])]
    private $nrProcessoRequisicao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'IDSERVIDOR', type: 'integer', nullable: true)]
    private $idservidor;

    /**
     * @var Cargo
     */
    #[ORM\JoinColumn(name: 'ID_CARGO_ATUAL', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToOne(targetEntity: 'Cargo')]
    private $idCargoAtual;

    /**
     * @var Lotacao
     */
    #[ORM\JoinColumn(name: 'ID_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    private $idLotacao;

    /**
     * @var Orgao
     */
    #[ORM\JoinColumn(name: 'ID_ORGAO_ORIGEM', referencedColumnName: 'ID_ORGAO')]
    #[ORM\ManyToOne(targetEntity: 'Orgao')]
    private $idOrgaoOrigem;

    /**
     * @var Cargo
     */
    #[ORM\JoinColumn(name: 'ID_CARGO_PRETENDIDO', referencedColumnName: 'ID_CARGO')]
    #[ORM\ManyToOne(targetEntity: 'Cargo')]
    private $idCargoPretendido;

    /**
     * @var FuncaoGratificada
     */
    #[ORM\JoinColumn(name: 'ID_FUNCAO_GRATIFICADA', referencedColumnName: 'ID_FUNCAO_GRATIFICADA')]
    #[ORM\ManyToOne(targetEntity: 'FuncaoGratificada')]
    private $idFuncaoGratificada;

    /**
     * @var SituacaoRequisicao
     */
    #[ORM\JoinColumn(name: 'ID_SITUACAO_REQUISICAO', referencedColumnName: 'ID_SITUACAO_REQUISICAO')]
    #[ORM\ManyToOne(targetEntity: 'SituacaoRequisicao')]
    private $idSituacaoRequisicao;

    /**
     * @return int
     */
    public function getIdPreRequisicao(): int
    {
        return $this->idPreRequisicao;
    }

    /**
     * @param int $idPreRequisicao
     */
    public function setIdPreRequisicao(int $idPreRequisicao): void
    {
        $this->idPreRequisicao = $idPreRequisicao;
    }

    /**
     * @return string|null
     */
    public function getNmCandidatoRequisicao(): ?string
    {
        return $this->nmCandidatoRequisicao;
    }

    /**
     * @param string|null $nmCandidatoRequisicao
     */
    public function setNmCandidatoRequisicao(?string $nmCandidatoRequisicao): void
    {
        $this->nmCandidatoRequisicao = $nmCandidatoRequisicao;
    }

    /**
     * @return string|null
     */
    public function getNrSiapeCandidatoRequisicao(): ?string
    {
        return $this->nrSiapeCandidatoRequisicao;
    }

    /**
     * @param string|null $nrSiapeCandidatoRequisicao
     */
    public function setNrSiapeCandidatoRequisicao(?string $nrSiapeCandidatoRequisicao): void
    {
        $this->nrSiapeCandidatoRequisicao = $nrSiapeCandidatoRequisicao;
    }

    /**
     * @return string|null
     */
    public function getNrCpfCandidatoRequisicao(): ?string
    {
        return $this->nrCpfCandidatoRequisicao;
    }

    /**
     * @param string|null $nrCpfCandidatoRequisicao
     */
    public function setNrCpfCandidatoRequisicao(?string $nrCpfCandidatoRequisicao): void
    {
        $this->nrCpfCandidatoRequisicao = $nrCpfCandidatoRequisicao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPreRequisicao(): ?\DateTime
    {
        return $this->dtPreRequisicao;
    }

    /**
     * @param DateTime|null $dtPreRequisicao
     */
    public function setDtPreRequisicao(?\DateTime $dtPreRequisicao): void
    {
        $this->dtPreRequisicao = $dtPreRequisicao;
    }

    /**
     * @return string|null
     */
    public function getInPermanencia(): ?string
    {
        return $this->inPermanencia;
    }

    /**
     * @param string|null $inPermanencia
     */
    public function setInPermanencia(?string $inPermanencia): void
    {
        $this->inPermanencia = $inPermanencia;
    }

    /**
     * @return string
     */
    public function getInStatusPrerequisicao(): string
    {
        return $this->inStatusPrerequisicao;
    }

    /**
     * @param string $inStatusPrerequisicao
     */
    public function setInStatusPrerequisicao(string $inStatusPrerequisicao): void
    {
        $this->inStatusPrerequisicao = $inStatusPrerequisicao;
    }

    /**
     * @return string|null
     */
    public function getDsAvisoPrerequisicao(): ?string
    {
        return $this->dsAvisoPrerequisicao;
    }

    /**
     * @param string|null $dsAvisoPrerequisicao
     */
    public function setDsAvisoPrerequisicao(?string $dsAvisoPrerequisicao): void
    {
        $this->dsAvisoPrerequisicao = $dsAvisoPrerequisicao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtAvisoPrerequisicao(): ?\DateTime
    {
        return $this->dtAvisoPrerequisicao;
    }

    /**
     * @param DateTime|null $dtAvisoPrerequisicao
     */
    public function setDtAvisoPrerequisicao(?\DateTime $dtAvisoPrerequisicao): void
    {
        $this->dtAvisoPrerequisicao = $dtAvisoPrerequisicao;
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
    public function getNrProcessoRequisicao(): ?string
    {
        return $this->nrProcessoRequisicao;
    }

    /**
     * @param string|null $nrProcessoRequisicao
     */
    public function setNrProcessoRequisicao(?string $nrProcessoRequisicao): void
    {
        $this->nrProcessoRequisicao = $nrProcessoRequisicao;
    }

    /**
     * @return int|null
     */
    public function getIdservidor(): ?int
    {
        return $this->idservidor;
    }

    /**
     * @param int|null $idservidor
     */
    public function setIdservidor(?int $idservidor): void
    {
        $this->idservidor = $idservidor;
    }

    /**
     * @return Cargo
     */
    public function getIdCargoAtual(): Cargo
    {
        return $this->idCargoAtual;
    }

    /**
     * @param Cargo $idCargoAtual
     */
    public function setIdCargoAtual(Cargo $idCargoAtual): void
    {
        $this->idCargoAtual = $idCargoAtual;
    }

    /**
     * @return Lotacao
     */
    public function getIdLotacao(): Lotacao
    {
        return $this->idLotacao;
    }

    /**
     * @param Lotacao $idLotacao
     */
    public function setIdLotacao(Lotacao $idLotacao): void
    {
        $this->idLotacao = $idLotacao;
    }

    /**
     * @return Orgao
     */
    public function getIdOrgaoOrigem(): Orgao
    {
        return $this->idOrgaoOrigem;
    }

    /**
     * @param Orgao $idOrgaoOrigem
     */
    public function setIdOrgaoOrigem(Orgao $idOrgaoOrigem): void
    {
        $this->idOrgaoOrigem = $idOrgaoOrigem;
    }

    /**
     * @return Cargo
     */
    public function getIdCargoPretendido(): Cargo
    {
        return $this->idCargoPretendido;
    }

    /**
     * @param Cargo $idCargoPretendido
     */
    public function setIdCargoPretendido(Cargo $idCargoPretendido): void
    {
        $this->idCargoPretendido = $idCargoPretendido;
    }

    /**
     * @return FuncaoGratificada
     */
    public function getIdFuncaoGratificada(): FuncaoGratificada
    {
        return $this->idFuncaoGratificada;
    }

    /**
     * @param FuncaoGratificada $idFuncaoGratificada
     */
    public function setIdFuncaoGratificada(FuncaoGratificada $idFuncaoGratificada): void
    {
        $this->idFuncaoGratificada = $idFuncaoGratificada;
    }

    /**
     * @return SituacaoRequisicao
     */
    public function getIdSituacaoRequisicao(): SituacaoRequisicao
    {
        return $this->idSituacaoRequisicao;
    }

    /**
     * @param SituacaoRequisicao $idSituacaoRequisicao
     */
    public function setIdSituacaoRequisicao(SituacaoRequisicao $idSituacaoRequisicao): void
    {
        $this->idSituacaoRequisicao = $idSituacaoRequisicao;
    }


}
