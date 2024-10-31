<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LotacaoMentorhRobo
 */
#[ORM\Table(name: 'LOTACAO_MENTORH_ROBO')]
#[ORM\Entity]
class LotacaoMentorhRobo
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_ID_UNIDADE', type: 'string', length: 12, nullable: true, options: ['comment' => 'T135_ID_UNIDADE'])]
    private $t135IdUnidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_NOME_UNIDADE', type: 'string', length: 105, nullable: true, options: ['comment' => 'T135_NOME_UNIDADE'])]
    private $t135NomeUnidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_ID_TITULAR', type: 'string', length: 20, nullable: true, options: ['comment' => 'T135_ID_TITULAR'])]
    private $t135IdTitular;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_ID_SUBSTITUTO', type: 'string', length: 20, nullable: true, options: ['comment' => 'T135_ID_SUBSTITUTO'])]
    private $t135IdSubstituto;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_ENDERECO', type: 'string', length: 100, nullable: true, options: ['comment' => 'T135_ENDERECO'])]
    private $t135Endereco;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_BAIRRO', type: 'string', length: 50, nullable: true, options: ['comment' => 'T135_BAIRRO'])]
    private $t135Bairro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_CIDADE', type: 'string', length: 50, nullable: true, options: ['comment' => 'T135_CIDADE'])]
    private $t135Cidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_UF', type: 'string', length: 2, nullable: true, options: ['comment' => 'T135_UF'])]
    private $t135Uf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_CEP', type: 'string', length: 8, nullable: true, options: ['comment' => 'T135_CEP'])]
    private $t135Cep;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_SIGLA_UNIDADE', type: 'string', length: 30, nullable: true, options: ['comment' => 'T135_SIGLA_UNIDADE'])]
    private $t135SiglaUnidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_LOTACAO_ATIVA', type: 'string', length: 3, nullable: true, options: ['comment' => 'T135_LOTACAO_ATIVA'])]
    private $t135LotacaoAtiva;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_ID_LOTACAO', type: 'string', length: 9, nullable: true, options: ['comment' => 'T135_ID_LOTACAO'])]
    private $t135IdLotacao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_COD_SIAPE', type: 'string', length: 9, nullable: true, options: ['comment' => 'T135_COD_SIAPE'])]
    private $t135CodSiape;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'T135_TIPO_UNIDADE', type: 'string', length: 2, nullable: true, options: ['comment' => 'T135_TIPO_UNIDADE'])]
    private $t135TipoUnidade;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'T135_DT_IMPORTACAO', type: 'date', nullable: true, options: ['comment' => 'T135_DT_IMPORTACAO'])]
    private $t135DtImportacao;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'T135_COD_SEVERIDADE', type: 'integer', nullable: true, options: ['comment' => 'T135_COD_SEVERIDADE'])]
    private $t135CodSeveridade;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOTACAO_MENTORH_ROBO_ID_TABLE_', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return string|null
     */
    public function getT135IdUnidade(): ?string
    {
        return $this->t135IdUnidade;
    }

    /**
     * @param string|null $t135IdUnidade
     */
    public function setT135IdUnidade(?string $t135IdUnidade): void
    {
        $this->t135IdUnidade = $t135IdUnidade;
    }

    /**
     * @return string|null
     */
    public function getT135NomeUnidade(): ?string
    {
        return $this->t135NomeUnidade;
    }

    /**
     * @param string|null $t135NomeUnidade
     */
    public function setT135NomeUnidade(?string $t135NomeUnidade): void
    {
        $this->t135NomeUnidade = $t135NomeUnidade;
    }

    /**
     * @return string|null
     */
    public function getT135IdTitular(): ?string
    {
        return $this->t135IdTitular;
    }

    /**
     * @param string|null $t135IdTitular
     */
    public function setT135IdTitular(?string $t135IdTitular): void
    {
        $this->t135IdTitular = $t135IdTitular;
    }

    /**
     * @return string|null
     */
    public function getT135IdSubstituto(): ?string
    {
        return $this->t135IdSubstituto;
    }

    /**
     * @param string|null $t135IdSubstituto
     */
    public function setT135IdSubstituto(?string $t135IdSubstituto): void
    {
        $this->t135IdSubstituto = $t135IdSubstituto;
    }

    /**
     * @return string|null
     */
    public function getT135Endereco(): ?string
    {
        return $this->t135Endereco;
    }

    /**
     * @param string|null $t135Endereco
     */
    public function setT135Endereco(?string $t135Endereco): void
    {
        $this->t135Endereco = $t135Endereco;
    }

    /**
     * @return string|null
     */
    public function getT135Bairro(): ?string
    {
        return $this->t135Bairro;
    }

    /**
     * @param string|null $t135Bairro
     */
    public function setT135Bairro(?string $t135Bairro): void
    {
        $this->t135Bairro = $t135Bairro;
    }

    /**
     * @return string|null
     */
    public function getT135Cidade(): ?string
    {
        return $this->t135Cidade;
    }

    /**
     * @param string|null $t135Cidade
     */
    public function setT135Cidade(?string $t135Cidade): void
    {
        $this->t135Cidade = $t135Cidade;
    }

    /**
     * @return string|null
     */
    public function getT135Uf(): ?string
    {
        return $this->t135Uf;
    }

    /**
     * @param string|null $t135Uf
     */
    public function setT135Uf(?string $t135Uf): void
    {
        $this->t135Uf = $t135Uf;
    }

    /**
     * @return string|null
     */
    public function getT135Cep(): ?string
    {
        return $this->t135Cep;
    }

    /**
     * @param string|null $t135Cep
     */
    public function setT135Cep(?string $t135Cep): void
    {
        $this->t135Cep = $t135Cep;
    }

    /**
     * @return string|null
     */
    public function getT135SiglaUnidade(): ?string
    {
        return $this->t135SiglaUnidade;
    }

    /**
     * @param string|null $t135SiglaUnidade
     */
    public function setT135SiglaUnidade(?string $t135SiglaUnidade): void
    {
        $this->t135SiglaUnidade = $t135SiglaUnidade;
    }

    /**
     * @return string|null
     */
    public function getT135LotacaoAtiva(): ?string
    {
        return $this->t135LotacaoAtiva;
    }

    /**
     * @param string|null $t135LotacaoAtiva
     */
    public function setT135LotacaoAtiva(?string $t135LotacaoAtiva): void
    {
        $this->t135LotacaoAtiva = $t135LotacaoAtiva;
    }

    /**
     * @return string|null
     */
    public function getT135IdLotacao(): ?string
    {
        return $this->t135IdLotacao;
    }

    /**
     * @param string|null $t135IdLotacao
     */
    public function setT135IdLotacao(?string $t135IdLotacao): void
    {
        $this->t135IdLotacao = $t135IdLotacao;
    }

    /**
     * @return string|null
     */
    public function getT135CodSiape(): ?string
    {
        return $this->t135CodSiape;
    }

    /**
     * @param string|null $t135CodSiape
     */
    public function setT135CodSiape(?string $t135CodSiape): void
    {
        $this->t135CodSiape = $t135CodSiape;
    }

    /**
     * @return string|null
     */
    public function getT135TipoUnidade(): ?string
    {
        return $this->t135TipoUnidade;
    }

    /**
     * @param string|null $t135TipoUnidade
     */
    public function setT135TipoUnidade(?string $t135TipoUnidade): void
    {
        $this->t135TipoUnidade = $t135TipoUnidade;
    }

    /**
     * @return DateTime|null
     */
    public function getT135DtImportacao(): ?\DateTime
    {
        return $this->t135DtImportacao;
    }

    /**
     * @param DateTime|null $t135DtImportacao
     */
    public function setT135DtImportacao(?\DateTime $t135DtImportacao): void
    {
        $this->t135DtImportacao = $t135DtImportacao;
    }

    /**
     * @return int|null
     */
    public function getT135CodSeveridade(): ?int
    {
        return $this->t135CodSeveridade;
    }

    /**
     * @param int|null $t135CodSeveridade
     */
    public function setT135CodSeveridade(?int $t135CodSeveridade): void
    {
        $this->t135CodSeveridade = $t135CodSeveridade;
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
