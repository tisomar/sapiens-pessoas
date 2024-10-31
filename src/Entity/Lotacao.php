<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Lotacao
 */
#[ORM\Table(name: 'LOTACAO')]
#[ORM\Index(name: 'IDX_732F3F45A7C92AD0', columns: ['ID_ENDERECO'])]
#[ORM\Index(name: 'IDX_732F3F4561185BB', columns: ['ID_LOTACAO_PAI'])]
#[ORM\Index(name: 'IDX_732F3F4510DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_732F3F45A7691D84', columns: ['ID_SERVIDOR_SUBSTITUTO'])]
#[ORM\Index(name: 'IDX_732F3F45AC568744', columns: ['ID_SERVIDOR_TITULAR'])]
#[ORM\Index(name: 'IDX_732F3F457E1B1FBF', columns: ['ID_TELEFONE'])]
#[ORM\Index(name: 'IDX_732F3F4555B7F88D', columns: ['ID_TIPO_LOTACAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Lotacao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_LOTACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela LOTACAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOTACAO_ID_LOTACAO_seq', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_LOTACAO', type: 'string', length: 20, nullable: true, options: ['comment' => 'Código SIAPE que é dado a uma unidade (Lotação) quando criada através de leí. O Sistema Integrado de Administração Financeira do Governo Federal que controla todos os servidores que ingressaram no regime jurídico estatutário federal estabelecido pela Lei n.º 8.112, de 11 de dezembro de 1990, que liga os servidores públicos civis da União, das autarquias e das fundações públicas federais com a administração pública federal no Brasil, estabelecendo seus direitos e deveres.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'SG_LOTACAO', type: 'string', length: 30, nullable: false, options: ['comment' => 'Sigla ou nome abreviado dado à lotação (Unidade) quando criada por lei através da presidência da república'])]
    protected string $sigla;

    #[ORM\Column(name: 'DS_LOTACAO', type: 'string', length: 200, nullable: false, options: ['comment' => 'Nome dado à lotação (Unidade) quando criada por lei através da presidência da república'])]
    protected string $descricao;

    #[ORM\Column(name: 'IN_ATIVO', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se a unidade está ativa. Codificação: 0 - NÃO e 1 - SIM.'])]
    protected string $inAtivo = '0';

    #[ORM\Column(name: 'DT_CRIACAO_LOTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que a unidade de lotação foi criada por determinação legal.'])]
    protected ?DateTime $dataCriacaoLotacao;

    #[ORM\Column(name: 'DT_EXTINCAO_LOTACAO', type: 'date', nullable: true, options: ['comment' => 'Data em que a unidade de lotação foi extinta por determinação legal.'])]
    protected ?DateTime $dataExtincaoLotacao;

    #[ORM\Column(name: 'NM_EMAIL_LOTACAO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o endereço eletrônico (email) da unidade de lotação.'])]
    protected ?string $emailLotacao;

    #[ORM\Column(name: 'CD_UORG', type: 'integer', nullable: true, options: ['comment' => 'Códgo da Unidade Organizacional - UORG. Permitir relacionar uma determinada Unidade Organizacional do SIAPE - UORG a uma UG Responsável do SIAFI. Este relacionamento permite  identificar,  no SIAFI, o responsável pelos gastos a nível de UORG.'])]
    protected ?int $codigoUorg;

    #[ORM\Column(name: 'IN_DIFICIL_PROVIMENTO', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se a unidade é de dificil provimento ou não.'])]
    protected ?string $inDificilProvimento;

    #[ORM\Column(name: 'DT_INICIO_UDP', type: 'date', nullable: true, options: ['comment' => 'Especifica a data onde a unidade começa a ser de difícil provimento.'])]
    protected ?DateTime $dataInicioUdp;

    #[ORM\Column(name: 'DT_EXPIRACAO_UDP', type: 'date', nullable: true, options: ['comment' => 'Especifica a data onde a unidade deixa de ser de difí­cil provimento.'])]
    protected ?DateTime $dataExpiracaoUdp;

    #[ORM\Column(name: 'IN_DIRECAO_SUPERIOR', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador boleano que especifica se a unidade é um órgão de direção superior (ODS).'])]
    protected ?string $inDirecaoSuperior;

    #[ORM\Column(name: 'CD_SIORG', type: 'string', length: 50, nullable: true, options: ['comment' => 'Código SIORG da unidade.'])]
    protected ?string $codigoSiorg;

    #[ORM\Column(name: 'IN_TIPO_NORMA_UDP', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador que especifica se o tipo da norma UDP é de início (I) ou fim (F).'])]
    protected ?string $tipoNormaUdp;

    #[ORM\Column(name: 'IN_TIPO_NORMA_ODS', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador que especifica se o tipo da norma ODS é de início (I) ou fim (F).'])]
    protected ?string $tipoNormaOds;

    #[ORM\JoinColumn(name: 'ID_ENDERECO', referencedColumnName: 'ID_ENDERECO')]
    #[ORM\ManyToOne(targetEntity: 'Endereco')]
    protected ?Endereco $endereco;

    #[ORM\JoinColumn(name: 'ID_LOTACAO_PAI', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    protected ?Lotacao $lotacaoPai;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    protected ?Rh $idRh;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR_SUBSTITUTO', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $idServidorSubstituto;

    /**
     * @var Servidor
     */
    #[ORM\JoinColumn(name: 'ID_SERVIDOR_TITULAR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $idServidorTitular;

    /**
     * @var Telefone
     */
    #[ORM\JoinColumn(name: 'ID_TELEFONE', referencedColumnName: 'ID_TELEFONE')]
    #[ORM\ManyToOne(targetEntity: 'Telefone')]
    protected ?Telefone $idTelefone;

    #[ORM\JoinColumn(name: 'ID_TIPO_LOTACAO', referencedColumnName: 'ID_TIPO_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoLotacao')]
    protected ?TipoLotacao $tipoLotacao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): void
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

    public function getInAtivo(): string
    {
        return $this->inAtivo;
    }

    public function setInAtivo(string $inAtivo): void
    {
        $this->inAtivo = $inAtivo;
    }

    public function getDataCriacaoLotacao(): ?\DateTime
    {
        return $this->dataCriacaoLotacao;
    }

    public function setDataCriacaoLotacao(?\DateTime $dtCriacaoLotacao): void
    {
        $this->dataCriacaoLotacao = $dtCriacaoLotacao;
    }

    public function getDataExtincaoLotacao(): ?\DateTime
    {
        return $this->dataExtincaoLotacao;
    }

    public function setDataExtincaoLotacao(?\DateTime $dataExtincaoLotacao): void
    {
        $this->dataExtincaoLotacao = $dataExtincaoLotacao;
    }

    public function getEmailLotacao(): ?string
    {
        return $this->emailLotacao;
    }

    public function setEmailLotacao(?string $emailLotacao): void
    {
        $this->emailLotacao = $emailLotacao;
    }

    public function getCodigoUorg(): ?int
    {
        return $this->codigoUorg;
    }

    public function setCodigoUorg(?int $codigoUorg): void
    {
        $this->codigoUorg = $codigoUorg;
    }

    public function getInDificilProvimento(): ?string
    {
        return $this->inDificilProvimento;
    }

    public function setInDificilProvimento(?string $inDificilProvimento): void
    {
        $this->inDificilProvimento = $inDificilProvimento;
    }

    public function getDataInicioUdp(): ?\DateTime
    {
        return $this->dataInicioUdp;
    }

    public function setDataInicioUdp(?\DateTime $dtInicioUdp): void
    {
        $this->dataInicioUdp = $dtInicioUdp;
    }

    public function getDataExpiracaoUdp(): ?\DateTime
    {
        return $this->dataExpiracaoUdp;
    }

    public function setDataExpiracaoUdp(?\DateTime $dataExpiracaoUdp): void
    {
        $this->dataExpiracaoUdp = $dataExpiracaoUdp;
    }

    public function getInDirecaoSuperior(): ?string
    {
        return $this->inDirecaoSuperior;
    }

    public function setInDirecaoSuperior(?string $inDirecaoSuperior): void
    {
        $this->inDirecaoSuperior = $inDirecaoSuperior;
    }

    public function getCodigoSiorg(): ?string
    {
        return $this->codigoSiorg;
    }

    public function setCodigoSiorg(?string $codigoSiorg): void
    {
        $this->codigoSiorg = $codigoSiorg;
    }

    public function getTipoNormaUdp(): ?string
    {
        return $this->tipoNormaUdp;
    }

    public function setTipoNormaUdp(?string $tipoNormaUdp): void
    {
        $this->tipoNormaUdp = $tipoNormaUdp;
    }

    public function getTipoNormaOds(): ?string
    {
        return $this->tipoNormaOds;
    }

    public function setTipoNormaOds(?string $tipoNormaOds): void
    {
        $this->tipoNormaOds = $tipoNormaOds;
    }

    public function getEndereco(): ?Endereco
    {
        return $this->endereco;
    }

    public function setEndereco(Endereco $endereco): void
    {
        $this->endereco = $endereco;
    }

    public function getLotacaoPai(): Lotacao
    {
        return $this->lotacaoPai;
    }

    public function setLotacaoPai(Lotacao $lotacaoPai): void
    {
        $this->lotacaoPai = $lotacaoPai;
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

    /**
     * @return Servidor
     */
    public function getIdServidorSubstituto(): ?Servidor
    {
        return $this->idServidorSubstituto;
    }

    /**
     * @param Servidor $idServidorSubstituto
     */
    public function setIdServidorSubstituto(?Servidor $idServidorSubstituto): void
    {
        $this->idServidorSubstituto = $idServidorSubstituto;
    }

    /**
     * @return Servidor
     */
    public function getIdServidorTitular(): ?Servidor
    {
        return $this->idServidorTitular;
    }

    /**
     * @param Servidor $idServidorTitular
     */
    public function setIdServidorTitular(?Servidor $idServidorTitular): void
    {
        $this->idServidorTitular = $idServidorTitular;
    }

    /**
     * @return Telefone
     */
    public function getIdTelefone(): ?Telefone
    {
        return $this->idTelefone;
    }

    /**
     * @param Telefone $idTelefone
     */
    public function setIdTelefone(?Telefone $idTelefone): void
    {
        $this->idTelefone = $idTelefone;
    }

    public function getTipoLotacao(): TipoLotacao
    {
        return $this->tipoLotacao;
    }

    public function setTipoLotacao(TipoLotacao $tipoLotacao): void
    {
        $this->tipoLotacao = $tipoLotacao;
    }


}
