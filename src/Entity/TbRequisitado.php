<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbRequisitado
 */
#[ORM\Table(name: 'TBREQUISITADO')]
#[ORM\Entity]
class TbRequisitado
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IDSERVIDOR', type: 'string', length: 20, nullable: true)]
    private $idservidor;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_REQUISICAO', type: 'date', nullable: true)]
    private $dtRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SIAPE', type: 'string', length: 7, nullable: true)]
    private $siape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF', type: 'string', length: 11, nullable: true)]
    private $cpf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME', type: 'string', length: 50, nullable: true)]
    private $nome;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ORIGEM', type: 'string', length: 20, nullable: true)]
    private $origem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CARGO_ORIGEM', type: 'string', length: 50, nullable: true)]
    private $cargoOrigem;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ANTIGAHIERQUNID', type: 'string', length: 15, nullable: true)]
    private $antigahierqunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOVAHIERQUNID', type: 'string', length: 15, nullable: true)]
    private $novahierqunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNID', type: 'string', length: 20, nullable: true)]
    private $hierqunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNID1', type: 'string', length: 15, nullable: true)]
    private $hierqunid1;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNIDCPO', type: 'string', length: 15, nullable: true)]
    private $hierqunidcpo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COMISSAO', type: 'string', length: 18, nullable: true)]
    private $comissao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SITUACAO_REQUISICAO', type: 'string', length: 80, nullable: true)]
    private $situacaoRequisicao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'AVISO', type: 'string', length: 50, nullable: true)]
    private $aviso;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_AVISO', type: 'date', nullable: true)]
    private $dtAviso;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PUBLIC_DOU_CESSAO', type: 'date', nullable: true)]
    private $dtPublicDouCessao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'PORTARIA_DESIGNACAO', type: 'string', length: 30, nullable: true)]
    private $portariaDesignacao;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_PORTARIA_DESIGNACAO', type: 'date', nullable: true)]
    private $dtPortariaDesignacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'ENCERRADO', type: 'string', length: 5, nullable: true)]
    private $encerrado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COMPLEM_ENCERRADO', type: 'string', length: 100, nullable: true)]
    private $complemEncerrado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TIPO_PERMANENCIA', type: 'string', length: 13, nullable: true)]
    private $tipoPermanencia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'REDISTRIBUIDO', type: 'string', length: 5, nullable: true)]
    private $redistribuido;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBREQUISITADO_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getIdservidor(): ?string
    {
        return $this->idservidor;
    }

    /**
     * @param string|null $idservidor
     */
    public function setIdservidor(?string $idservidor): void
    {
        $this->idservidor = $idservidor;
    }

    /**
     * @return DateTime|null
     */
    public function getDtRequisicao(): ?\DateTime
    {
        return $this->dtRequisicao;
    }

    /**
     * @param DateTime|null $dtRequisicao
     */
    public function setDtRequisicao(?\DateTime $dtRequisicao): void
    {
        $this->dtRequisicao = $dtRequisicao;
    }

    /**
     * @return string|null
     */
    public function getSiape(): ?string
    {
        return $this->siape;
    }

    /**
     * @param string|null $siape
     */
    public function setSiape(?string $siape): void
    {
        $this->siape = $siape;
    }

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    /**
     * @param string|null $cpf
     */
    public function setCpf(?string $cpf): void
    {
        $this->cpf = $cpf;
    }

    /**
     * @return string|null
     */
    public function getNome(): ?string
    {
        return $this->nome;
    }

    /**
     * @param string|null $nome
     */
    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    /**
     * @return string|null
     */
    public function getOrigem(): ?string
    {
        return $this->origem;
    }

    /**
     * @param string|null $origem
     */
    public function setOrigem(?string $origem): void
    {
        $this->origem = $origem;
    }

    /**
     * @return string|null
     */
    public function getCargoOrigem(): ?string
    {
        return $this->cargoOrigem;
    }

    /**
     * @param string|null $cargoOrigem
     */
    public function setCargoOrigem(?string $cargoOrigem): void
    {
        $this->cargoOrigem = $cargoOrigem;
    }

    /**
     * @return string|null
     */
    public function getAntigahierqunid(): ?string
    {
        return $this->antigahierqunid;
    }

    /**
     * @param string|null $antigahierqunid
     */
    public function setAntigahierqunid(?string $antigahierqunid): void
    {
        $this->antigahierqunid = $antigahierqunid;
    }

    /**
     * @return string|null
     */
    public function getNovahierqunid(): ?string
    {
        return $this->novahierqunid;
    }

    /**
     * @param string|null $novahierqunid
     */
    public function setNovahierqunid(?string $novahierqunid): void
    {
        $this->novahierqunid = $novahierqunid;
    }

    /**
     * @return string|null
     */
    public function getHierqunid(): ?string
    {
        return $this->hierqunid;
    }

    /**
     * @param string|null $hierqunid
     */
    public function setHierqunid(?string $hierqunid): void
    {
        $this->hierqunid = $hierqunid;
    }

    /**
     * @return string|null
     */
    public function getHierqunid1(): ?string
    {
        return $this->hierqunid1;
    }

    /**
     * @param string|null $hierqunid1
     */
    public function setHierqunid1(?string $hierqunid1): void
    {
        $this->hierqunid1 = $hierqunid1;
    }

    /**
     * @return string|null
     */
    public function getHierqunidcpo(): ?string
    {
        return $this->hierqunidcpo;
    }

    /**
     * @param string|null $hierqunidcpo
     */
    public function setHierqunidcpo(?string $hierqunidcpo): void
    {
        $this->hierqunidcpo = $hierqunidcpo;
    }

    /**
     * @return string|null
     */
    public function getComissao(): ?string
    {
        return $this->comissao;
    }

    /**
     * @param string|null $comissao
     */
    public function setComissao(?string $comissao): void
    {
        $this->comissao = $comissao;
    }

    /**
     * @return string|null
     */
    public function getSituacaoRequisicao(): ?string
    {
        return $this->situacaoRequisicao;
    }

    /**
     * @param string|null $situacaoRequisicao
     */
    public function setSituacaoRequisicao(?string $situacaoRequisicao): void
    {
        $this->situacaoRequisicao = $situacaoRequisicao;
    }

    /**
     * @return string|null
     */
    public function getAviso(): ?string
    {
        return $this->aviso;
    }

    /**
     * @param string|null $aviso
     */
    public function setAviso(?string $aviso): void
    {
        $this->aviso = $aviso;
    }

    /**
     * @return DateTime|null
     */
    public function getDtAviso(): ?\DateTime
    {
        return $this->dtAviso;
    }

    /**
     * @param DateTime|null $dtAviso
     */
    public function setDtAviso(?\DateTime $dtAviso): void
    {
        $this->dtAviso = $dtAviso;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPublicDouCessao(): ?\DateTime
    {
        return $this->dtPublicDouCessao;
    }

    /**
     * @param DateTime|null $dtPublicDouCessao
     */
    public function setDtPublicDouCessao(?\DateTime $dtPublicDouCessao): void
    {
        $this->dtPublicDouCessao = $dtPublicDouCessao;
    }

    /**
     * @return string|null
     */
    public function getPortariaDesignacao(): ?string
    {
        return $this->portariaDesignacao;
    }

    /**
     * @param string|null $portariaDesignacao
     */
    public function setPortariaDesignacao(?string $portariaDesignacao): void
    {
        $this->portariaDesignacao = $portariaDesignacao;
    }

    /**
     * @return DateTime|null
     */
    public function getDtPortariaDesignacao(): ?\DateTime
    {
        return $this->dtPortariaDesignacao;
    }

    /**
     * @param DateTime|null $dtPortariaDesignacao
     */
    public function setDtPortariaDesignacao(?\DateTime $dtPortariaDesignacao): void
    {
        $this->dtPortariaDesignacao = $dtPortariaDesignacao;
    }

    /**
     * @return string|null
     */
    public function getEncerrado(): ?string
    {
        return $this->encerrado;
    }

    /**
     * @param string|null $encerrado
     */
    public function setEncerrado(?string $encerrado): void
    {
        $this->encerrado = $encerrado;
    }

    /**
     * @return string|null
     */
    public function getComplemEncerrado(): ?string
    {
        return $this->complemEncerrado;
    }

    /**
     * @param string|null $complemEncerrado
     */
    public function setComplemEncerrado(?string $complemEncerrado): void
    {
        $this->complemEncerrado = $complemEncerrado;
    }

    /**
     * @return string|null
     */
    public function getTipoPermanencia(): ?string
    {
        return $this->tipoPermanencia;
    }

    /**
     * @param string|null $tipoPermanencia
     */
    public function setTipoPermanencia(?string $tipoPermanencia): void
    {
        $this->tipoPermanencia = $tipoPermanencia;
    }

    /**
     * @return string|null
     */
    public function getRedistribuido(): ?string
    {
        return $this->redistribuido;
    }

    /**
     * @param string|null $redistribuido
     */
    public function setRedistribuido(?string $redistribuido): void
    {
        $this->redistribuido = $redistribuido;
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
