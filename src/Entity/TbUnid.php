<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUnid
 */
#[ORM\Table(name: 'TBUNID')]
#[ORM\Entity]
class TbUnid
{
    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNID', type: 'string', length: 20, nullable: true)]
    private $hierqunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNID_CPO_OUT2000', type: 'string', length: 15, nullable: true)]
    private $hierqunidCpoOut2000;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNID2', type: 'string', length: 15, nullable: true)]
    private $hierqunid2;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERQUNIDNOVO', type: 'string', length: 50, nullable: true)]
    private $hierqunidnovo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPO1', type: 'string', length: 5, nullable: true)]
    private $cpo1;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'INTERNET', type: 'string', length: 1, nullable: true)]
    private $internet;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'HIERARQUIA', type: 'string', length: 15, nullable: true)]
    private $hierarquia;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'REGIMENTAL', type: 'string', length: 50, nullable: true)]
    private $regimental;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SENAPRO', type: 'string', length: 13, nullable: true)]
    private $senapro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DESCUNID', type: 'string', length: 80, nullable: true)]
    private $descunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SIGLA', type: 'string', length: 15, nullable: true)]
    private $sigla;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'END1', type: 'string', length: 80, nullable: true)]
    private $end1;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CMPLEND', type: 'string', length: 50, nullable: true)]
    private $cmplend;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'BAIRRO', type: 'string', length: 50, nullable: true)]
    private $bairro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CIDADE', type: 'string', length: 25, nullable: true)]
    private $cidade;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'UF', type: 'string', length: 2, nullable: true)]
    private $uf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CEP', type: 'string', length: 9, nullable: true)]
    private $cep;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOVOCEP', type: 'string', length: 20, nullable: true)]
    private $novocep;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DDD', type: 'string', length: 8, nullable: true)]
    private $ddd;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'REGIAO', type: 'string', length: 10, nullable: true)]
    private $regiao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'EMAILUNID', type: 'string', length: 50, nullable: true)]
    private $emailunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'WWWUNID', type: 'string', length: 50, nullable: true)]
    private $wwwunid;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPFTIT', type: 'string', length: 18, nullable: true)]
    private $cpftit;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'FUNC', type: 'string', length: 50, nullable: true)]
    private $func;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CODFUNC', type: 'string', length: 15, nullable: true)]
    private $codfunc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPFSUBST', type: 'string', length: 18, nullable: true)]
    private $cpfsubst;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'JUNCAO', type: 'string', length: 50, nullable: true)]
    private $juncao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TRAT', type: 'string', length: 20, nullable: true)]
    private $trat;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'VOCAT', type: 'string', length: 20, nullable: true)]
    private $vocat;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'FECHO', type: 'string', length: 20, nullable: true)]
    private $fecho;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NATUREZA', type: 'string', length: 20, nullable: true)]
    private $natureza;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TBUNID_ID_TABLE_seq', allocationSize: 1, initialValue: 1)]
    private $idTable;

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
    public function getHierqunidCpoOut2000(): ?string
    {
        return $this->hierqunidCpoOut2000;
    }

    /**
     * @param string|null $hierqunidCpoOut2000
     */
    public function setHierqunidCpoOut2000(?string $hierqunidCpoOut2000): void
    {
        $this->hierqunidCpoOut2000 = $hierqunidCpoOut2000;
    }

    /**
     * @return string|null
     */
    public function getHierqunid2(): ?string
    {
        return $this->hierqunid2;
    }

    /**
     * @param string|null $hierqunid2
     */
    public function setHierqunid2(?string $hierqunid2): void
    {
        $this->hierqunid2 = $hierqunid2;
    }

    /**
     * @return string|null
     */
    public function getHierqunidnovo(): ?string
    {
        return $this->hierqunidnovo;
    }

    /**
     * @param string|null $hierqunidnovo
     */
    public function setHierqunidnovo(?string $hierqunidnovo): void
    {
        $this->hierqunidnovo = $hierqunidnovo;
    }

    /**
     * @return string|null
     */
    public function getCpo1(): ?string
    {
        return $this->cpo1;
    }

    /**
     * @param string|null $cpo1
     */
    public function setCpo1(?string $cpo1): void
    {
        $this->cpo1 = $cpo1;
    }

    /**
     * @return string|null
     */
    public function getInternet(): ?string
    {
        return $this->internet;
    }

    /**
     * @param string|null $internet
     */
    public function setInternet(?string $internet): void
    {
        $this->internet = $internet;
    }

    /**
     * @return string|null
     */
    public function getHierarquia(): ?string
    {
        return $this->hierarquia;
    }

    /**
     * @param string|null $hierarquia
     */
    public function setHierarquia(?string $hierarquia): void
    {
        $this->hierarquia = $hierarquia;
    }

    /**
     * @return string|null
     */
    public function getRegimental(): ?string
    {
        return $this->regimental;
    }

    /**
     * @param string|null $regimental
     */
    public function setRegimental(?string $regimental): void
    {
        $this->regimental = $regimental;
    }

    /**
     * @return string|null
     */
    public function getSenapro(): ?string
    {
        return $this->senapro;
    }

    /**
     * @param string|null $senapro
     */
    public function setSenapro(?string $senapro): void
    {
        $this->senapro = $senapro;
    }

    /**
     * @return string|null
     */
    public function getDescunid(): ?string
    {
        return $this->descunid;
    }

    /**
     * @param string|null $descunid
     */
    public function setDescunid(?string $descunid): void
    {
        $this->descunid = $descunid;
    }

    /**
     * @return string|null
     */
    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    /**
     * @param string|null $sigla
     */
    public function setSigla(?string $sigla): void
    {
        $this->sigla = $sigla;
    }

    /**
     * @return string|null
     */
    public function getEnd1(): ?string
    {
        return $this->end1;
    }

    /**
     * @param string|null $end1
     */
    public function setEnd1(?string $end1): void
    {
        $this->end1 = $end1;
    }

    /**
     * @return string|null
     */
    public function getCmplend(): ?string
    {
        return $this->cmplend;
    }

    /**
     * @param string|null $cmplend
     */
    public function setCmplend(?string $cmplend): void
    {
        $this->cmplend = $cmplend;
    }

    /**
     * @return string|null
     */
    public function getBairro(): ?string
    {
        return $this->bairro;
    }

    /**
     * @param string|null $bairro
     */
    public function setBairro(?string $bairro): void
    {
        $this->bairro = $bairro;
    }

    /**
     * @return string|null
     */
    public function getCidade(): ?string
    {
        return $this->cidade;
    }

    /**
     * @param string|null $cidade
     */
    public function setCidade(?string $cidade): void
    {
        $this->cidade = $cidade;
    }

    /**
     * @return string|null
     */
    public function getUf(): ?string
    {
        return $this->uf;
    }

    /**
     * @param string|null $uf
     */
    public function setUf(?string $uf): void
    {
        $this->uf = $uf;
    }

    /**
     * @return string|null
     */
    public function getCep(): ?string
    {
        return $this->cep;
    }

    /**
     * @param string|null $cep
     */
    public function setCep(?string $cep): void
    {
        $this->cep = $cep;
    }

    /**
     * @return string|null
     */
    public function getNovocep(): ?string
    {
        return $this->novocep;
    }

    /**
     * @param string|null $novocep
     */
    public function setNovocep(?string $novocep): void
    {
        $this->novocep = $novocep;
    }

    /**
     * @return string|null
     */
    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    /**
     * @param string|null $ddd
     */
    public function setDdd(?string $ddd): void
    {
        $this->ddd = $ddd;
    }

    /**
     * @return string|null
     */
    public function getRegiao(): ?string
    {
        return $this->regiao;
    }

    /**
     * @param string|null $regiao
     */
    public function setRegiao(?string $regiao): void
    {
        $this->regiao = $regiao;
    }

    /**
     * @return string|null
     */
    public function getEmailunid(): ?string
    {
        return $this->emailunid;
    }

    /**
     * @param string|null $emailunid
     */
    public function setEmailunid(?string $emailunid): void
    {
        $this->emailunid = $emailunid;
    }

    /**
     * @return string|null
     */
    public function getWwwunid(): ?string
    {
        return $this->wwwunid;
    }

    /**
     * @param string|null $wwwunid
     */
    public function setWwwunid(?string $wwwunid): void
    {
        $this->wwwunid = $wwwunid;
    }

    /**
     * @return string|null
     */
    public function getCpftit(): ?string
    {
        return $this->cpftit;
    }

    /**
     * @param string|null $cpftit
     */
    public function setCpftit(?string $cpftit): void
    {
        $this->cpftit = $cpftit;
    }

    /**
     * @return string|null
     */
    public function getFunc(): ?string
    {
        return $this->func;
    }

    /**
     * @param string|null $func
     */
    public function setFunc(?string $func): void
    {
        $this->func = $func;
    }

    /**
     * @return string|null
     */
    public function getCodfunc(): ?string
    {
        return $this->codfunc;
    }

    /**
     * @param string|null $codfunc
     */
    public function setCodfunc(?string $codfunc): void
    {
        $this->codfunc = $codfunc;
    }

    /**
     * @return string|null
     */
    public function getCpfsubst(): ?string
    {
        return $this->cpfsubst;
    }

    /**
     * @param string|null $cpfsubst
     */
    public function setCpfsubst(?string $cpfsubst): void
    {
        $this->cpfsubst = $cpfsubst;
    }

    /**
     * @return string|null
     */
    public function getJuncao(): ?string
    {
        return $this->juncao;
    }

    /**
     * @param string|null $juncao
     */
    public function setJuncao(?string $juncao): void
    {
        $this->juncao = $juncao;
    }

    /**
     * @return string|null
     */
    public function getTrat(): ?string
    {
        return $this->trat;
    }

    /**
     * @param string|null $trat
     */
    public function setTrat(?string $trat): void
    {
        $this->trat = $trat;
    }

    /**
     * @return string|null
     */
    public function getVocat(): ?string
    {
        return $this->vocat;
    }

    /**
     * @param string|null $vocat
     */
    public function setVocat(?string $vocat): void
    {
        $this->vocat = $vocat;
    }

    /**
     * @return string|null
     */
    public function getFecho(): ?string
    {
        return $this->fecho;
    }

    /**
     * @param string|null $fecho
     */
    public function setFecho(?string $fecho): void
    {
        $this->fecho = $fecho;
    }

    /**
     * @return string|null
     */
    public function getNatureza(): ?string
    {
        return $this->natureza;
    }

    /**
     * @param string|null $natureza
     */
    public function setNatureza(?string $natureza): void
    {
        $this->natureza = $natureza;
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
