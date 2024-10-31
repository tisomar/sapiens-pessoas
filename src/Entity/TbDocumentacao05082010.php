<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbDocumentacao05082010
 */
#[ORM\Table(name: 'TB_DOCUMENTACAO_05082010')]
#[ORM\Entity]
class TbDocumentacao05082010
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_DOCUMENTACAO', type: 'integer', nullable: false)]
    private $idDocumentacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: false)]
    private $idServidor;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_UF_DOCUMENTACAO', type: 'integer', nullable: true)]
    private $idUfDocumentacao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TIPO_DOCUMENTACAO', type: 'integer', nullable: false)]
    private $idTipoDocumentacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'IN_SITUACAO_DOCUMENTACAO', type: 'string', length: 1, nullable: false, options: ['default' => '1', 'fixed' => true])]
    private $inSituacaoDocumentacao = '1';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_DOCUMENTACAO', type: 'string', length: 50, nullable: false)]
    private $nrDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ORG_EXP_DOCUMENTACAO', type: 'string', length: 100, nullable: true)]
    private $dsOrgExpDocumentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_EXP_DOCUMENTACAO', type: 'date', nullable: true)]
    private $dtExpDocumentacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_VALIDADE_DOCUMENTACAO', type: 'date', nullable: true)]
    private $dtValidadeDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_CATEGORIA_DOCUMENTACAO', type: 'string', length: 100, nullable: true)]
    private $dsCategoriaDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ZONA_DOCUMENTACAO', type: 'string', length: 100, nullable: true)]
    private $dsZonaDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_SERIE_DOCUMENTACAO', type: 'string', length: 100, nullable: true)]
    private $dsSerieDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_SECAO_DOCUMENTACAO', type: 'string', length: 100, nullable: true)]
    private $dsSecaoDocumentacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_ENTIDADE_CLASSE', type: 'string', length: 100, nullable: true)]
    private $dsEntidadeClasse;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_REGIAO', type: 'string', length: 100, nullable: true)]
    private $dsRegiao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_REGISTRO', type: 'string', length: 50, nullable: true)]
    private $nrRegistro;

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE'])]
    private $dtOperacaoInclusao = 'SYSDATE';

    /**
     * @var DateTime
     */
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'date', nullable: false, options: ['default' => 'SYSDATE'])]
    private $dtOperacaoAlteracao = 'SYSDATE';

    /**
     * @var string
     */
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true])]
    private $nrCpfOperador;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'date', nullable: true)]
    private $dtOperacaoExclusao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_DOCUMENTACAO_05082010_ID_TA', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int
     */
    public function getIdDocumentacao(): int
    {
        return $this->idDocumentacao;
    }

    /**
     * @param int $idDocumentacao
     */
    public function setIdDocumentacao(int $idDocumentacao): void
    {
        $this->idDocumentacao = $idDocumentacao;
    }

    /**
     * @return int
     */
    public function getIdServidor(): int
    {
        return $this->idServidor;
    }

    /**
     * @param int $idServidor
     */
    public function setIdServidor(int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return int|null
     */
    public function getIdUfDocumentacao(): ?int
    {
        return $this->idUfDocumentacao;
    }

    /**
     * @param int|null $idUfDocumentacao
     */
    public function setIdUfDocumentacao(?int $idUfDocumentacao): void
    {
        $this->idUfDocumentacao = $idUfDocumentacao;
    }

    /**
     * @return int
     */
    public function getIdTipoDocumentacao(): int
    {
        return $this->idTipoDocumentacao;
    }

    /**
     * @param int $idTipoDocumentacao
     */
    public function setIdTipoDocumentacao(int $idTipoDocumentacao): void
    {
        $this->idTipoDocumentacao = $idTipoDocumentacao;
    }

    /**
     * @return string
     */
    public function getInSituacaoDocumentacao(): string
    {
        return $this->inSituacaoDocumentacao;
    }

    /**
     * @param string $inSituacaoDocumentacao
     */
    public function setInSituacaoDocumentacao(string $inSituacaoDocumentacao): void
    {
        $this->inSituacaoDocumentacao = $inSituacaoDocumentacao;
    }

    /**
     * @return string
     */
    public function getNrDocumentacao(): string
    {
        return $this->nrDocumentacao;
    }

    /**
     * @param string $nrDocumentacao
     */
    public function setNrDocumentacao(string $nrDocumentacao): void
    {
        $this->nrDocumentacao = $nrDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsOrgExpDocumentacao(): ?string
    {
        return $this->dsOrgExpDocumentacao;
    }

    /**
     * @param string|null $dsOrgExpDocumentacao
     */
    public function setDsOrgExpDocumentacao(?string $dsOrgExpDocumentacao): void
    {
        $this->dsOrgExpDocumentacao = $dsOrgExpDocumentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtExpDocumentacao(): ?\DateTime
    {
        return $this->dtExpDocumentacao;
    }

    /**
     * @param DateTime|null $dtExpDocumentacao
     */
    public function setDtExpDocumentacao(?\DateTime $dtExpDocumentacao): void
    {
        $this->dtExpDocumentacao = $dtExpDocumentacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtValidadeDocumentacao(): ?\DateTime
    {
        return $this->dtValidadeDocumentacao;
    }

    /**
     * @param DateTime|null $dtValidadeDocumentacao
     */
    public function setDtValidadeDocumentacao(?\DateTime $dtValidadeDocumentacao): void
    {
        $this->dtValidadeDocumentacao = $dtValidadeDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsCategoriaDocumentacao(): ?string
    {
        return $this->dsCategoriaDocumentacao;
    }

    /**
     * @param string|null $dsCategoriaDocumentacao
     */
    public function setDsCategoriaDocumentacao(?string $dsCategoriaDocumentacao): void
    {
        $this->dsCategoriaDocumentacao = $dsCategoriaDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsZonaDocumentacao(): ?string
    {
        return $this->dsZonaDocumentacao;
    }

    /**
     * @param string|null $dsZonaDocumentacao
     */
    public function setDsZonaDocumentacao(?string $dsZonaDocumentacao): void
    {
        $this->dsZonaDocumentacao = $dsZonaDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsSerieDocumentacao(): ?string
    {
        return $this->dsSerieDocumentacao;
    }

    /**
     * @param string|null $dsSerieDocumentacao
     */
    public function setDsSerieDocumentacao(?string $dsSerieDocumentacao): void
    {
        $this->dsSerieDocumentacao = $dsSerieDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsSecaoDocumentacao(): ?string
    {
        return $this->dsSecaoDocumentacao;
    }

    /**
     * @param string|null $dsSecaoDocumentacao
     */
    public function setDsSecaoDocumentacao(?string $dsSecaoDocumentacao): void
    {
        $this->dsSecaoDocumentacao = $dsSecaoDocumentacao;
    }

    /**
     * @return string|null
     */
    public function getDsEntidadeClasse(): ?string
    {
        return $this->dsEntidadeClasse;
    }

    /**
     * @param string|null $dsEntidadeClasse
     */
    public function setDsEntidadeClasse(?string $dsEntidadeClasse): void
    {
        $this->dsEntidadeClasse = $dsEntidadeClasse;
    }

    /**
     * @return string|null
     */
    public function getDsRegiao(): ?string
    {
        return $this->dsRegiao;
    }

    /**
     * @param string|null $dsRegiao
     */
    public function setDsRegiao(?string $dsRegiao): void
    {
        $this->dsRegiao = $dsRegiao;
    }

    /**
     * @return string|null
     */
    public function getNrRegistro(): ?string
    {
        return $this->nrRegistro;
    }

    /**
     * @param string|null $nrRegistro
     */
    public function setNrRegistro(?string $nrRegistro): void
    {
        $this->nrRegistro = $nrRegistro;
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
     * @return int
     */
    public function getIdTable(): int
    {
        return $this->idTable;
    }

    /**
     * @param int $idTable
     */
    public function setIdTable(int $idTable): void
    {
        $this->idTable = $idTable;
    }


}
