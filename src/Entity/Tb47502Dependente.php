<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb47502Dependente
 */
#[ORM\Table(name: 'TB_47502_DEPENDENTE')]
#[ORM\Entity]
class Tb47502Dependente
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME_SERVIDOR', type: 'string', length: 100, nullable: true)]
    private $nomeServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SIAPE_SERVIDOR', type: 'string', length: 100, nullable: true)]
    private $siapeServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF_SERVIDOR', type: 'string', length: 20, nullable: true)]
    private $cpfServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CPF_FORMATADO', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $cpfFormatado;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NOME_DEPENDENTE', type: 'string', length: 100, nullable: true)]
    private $nomeDependente;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'TIPO_PARENTESCO', type: 'string', length: 100, nullable: true)]
    private $tipoParentesco;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DATA_NASC', type: 'date', nullable: true)]
    private $dataNasc;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'SEXO', type: 'string', length: 1, nullable: true, options: ['fixed' => true])]
    private $sexo;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_DEP', type: 'string', length: 100, nullable: true)]
    private $nrCpfDep;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CPF_FORMAT', type: 'string', length: 11, nullable: true, options: ['fixed' => true])]
    private $nrCpfFormat;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_PAI', type: 'string', length: 100, nullable: true)]
    private $nmPai;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NM_MAE', type: 'string', length: 100, nullable: true)]
    private $nmMae;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO', type: 'date', nullable: true)]
    private $dtInicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM', type: 'date', nullable: true)]
    private $dtFim;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'MOTIVO', type: 'string', length: 100, nullable: true)]
    private $motivo;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_CERTIDAO', type: 'date', nullable: true)]
    private $dtCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $nrCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'LIVRO_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $livroCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'FOLHA_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $folhaCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CARTORIO_CERTIDAO', type: 'string', length: 100, nullable: true)]
    private $cartorioCertidao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'MINICIPIO_CARTORIO', type: 'string', length: 100, nullable: true)]
    private $minicipioCartorio;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'NR_MATR_CERTIDAO', type: 'string', length: 50, nullable: true)]
    private $nrMatrCertidao;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_47502_DEPENDENTE_ID_TABLE_s', allocationSize: 1, initialValue: 1)]
    private $idTable;

    /**
     * @return int|null
     */
    public function getIdServidor(): ?int
    {
        return $this->idServidor;
    }

    /**
     * @param int|null $idServidor
     */
    public function setIdServidor(?int $idServidor): void
    {
        $this->idServidor = $idServidor;
    }

    /**
     * @return string|null
     */
    public function getNomeServidor(): ?string
    {
        return $this->nomeServidor;
    }

    /**
     * @param string|null $nomeServidor
     */
    public function setNomeServidor(?string $nomeServidor): void
    {
        $this->nomeServidor = $nomeServidor;
    }

    /**
     * @return string|null
     */
    public function getSiapeServidor(): ?string
    {
        return $this->siapeServidor;
    }

    /**
     * @param string|null $siapeServidor
     */
    public function setSiapeServidor(?string $siapeServidor): void
    {
        $this->siapeServidor = $siapeServidor;
    }

    /**
     * @return string|null
     */
    public function getCpfServidor(): ?string
    {
        return $this->cpfServidor;
    }

    /**
     * @param string|null $cpfServidor
     */
    public function setCpfServidor(?string $cpfServidor): void
    {
        $this->cpfServidor = $cpfServidor;
    }

    /**
     * @return string|null
     */
    public function getCpfFormatado(): ?string
    {
        return $this->cpfFormatado;
    }

    /**
     * @param string|null $cpfFormatado
     */
    public function setCpfFormatado(?string $cpfFormatado): void
    {
        $this->cpfFormatado = $cpfFormatado;
    }

    /**
     * @return string|null
     */
    public function getNomeDependente(): ?string
    {
        return $this->nomeDependente;
    }

    /**
     * @param string|null $nomeDependente
     */
    public function setNomeDependente(?string $nomeDependente): void
    {
        $this->nomeDependente = $nomeDependente;
    }

    /**
     * @return string|null
     */
    public function getTipoParentesco(): ?string
    {
        return $this->tipoParentesco;
    }

    /**
     * @param string|null $tipoParentesco
     */
    public function setTipoParentesco(?string $tipoParentesco): void
    {
        $this->tipoParentesco = $tipoParentesco;
    }

    /**
     * @return DateTime|null
     */
    public function getDataNasc(): ?\DateTime
    {
        return $this->dataNasc;
    }

    /**
     * @param DateTime|null $dataNasc
     */
    public function setDataNasc(?\DateTime $dataNasc): void
    {
        $this->dataNasc = $dataNasc;
    }

    /**
     * @return string|null
     */
    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    /**
     * @param string|null $sexo
     */
    public function setSexo(?string $sexo): void
    {
        $this->sexo = $sexo;
    }

    /**
     * @return string|null
     */
    public function getNrCpfDep(): ?string
    {
        return $this->nrCpfDep;
    }

    /**
     * @param string|null $nrCpfDep
     */
    public function setNrCpfDep(?string $nrCpfDep): void
    {
        $this->nrCpfDep = $nrCpfDep;
    }

    /**
     * @return string|null
     */
    public function getNrCpfFormat(): ?string
    {
        return $this->nrCpfFormat;
    }

    /**
     * @param string|null $nrCpfFormat
     */
    public function setNrCpfFormat(?string $nrCpfFormat): void
    {
        $this->nrCpfFormat = $nrCpfFormat;
    }

    /**
     * @return string|null
     */
    public function getNmPai(): ?string
    {
        return $this->nmPai;
    }

    /**
     * @param string|null $nmPai
     */
    public function setNmPai(?string $nmPai): void
    {
        $this->nmPai = $nmPai;
    }

    /**
     * @return string|null
     */
    public function getNmMae(): ?string
    {
        return $this->nmMae;
    }

    /**
     * @param string|null $nmMae
     */
    public function setNmMae(?string $nmMae): void
    {
        $this->nmMae = $nmMae;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicio(): ?\DateTime
    {
        return $this->dtInicio;
    }

    /**
     * @param DateTime|null $dtInicio
     */
    public function setDtInicio(?\DateTime $dtInicio): void
    {
        $this->dtInicio = $dtInicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFim(): ?\DateTime
    {
        return $this->dtFim;
    }

    /**
     * @param DateTime|null $dtFim
     */
    public function setDtFim(?\DateTime $dtFim): void
    {
        $this->dtFim = $dtFim;
    }

    /**
     * @return string|null
     */
    public function getMotivo(): ?string
    {
        return $this->motivo;
    }

    /**
     * @param string|null $motivo
     */
    public function setMotivo(?string $motivo): void
    {
        $this->motivo = $motivo;
    }

    /**
     * @return DateTime|null
     */
    public function getDtCertidao(): ?\DateTime
    {
        return $this->dtCertidao;
    }

    /**
     * @param DateTime|null $dtCertidao
     */
    public function setDtCertidao(?\DateTime $dtCertidao): void
    {
        $this->dtCertidao = $dtCertidao;
    }

    /**
     * @return string|null
     */
    public function getNrCertidao(): ?string
    {
        return $this->nrCertidao;
    }

    /**
     * @param string|null $nrCertidao
     */
    public function setNrCertidao(?string $nrCertidao): void
    {
        $this->nrCertidao = $nrCertidao;
    }

    /**
     * @return string|null
     */
    public function getLivroCertidao(): ?string
    {
        return $this->livroCertidao;
    }

    /**
     * @param string|null $livroCertidao
     */
    public function setLivroCertidao(?string $livroCertidao): void
    {
        $this->livroCertidao = $livroCertidao;
    }

    /**
     * @return string|null
     */
    public function getFolhaCertidao(): ?string
    {
        return $this->folhaCertidao;
    }

    /**
     * @param string|null $folhaCertidao
     */
    public function setFolhaCertidao(?string $folhaCertidao): void
    {
        $this->folhaCertidao = $folhaCertidao;
    }

    /**
     * @return string|null
     */
    public function getCartorioCertidao(): ?string
    {
        return $this->cartorioCertidao;
    }

    /**
     * @param string|null $cartorioCertidao
     */
    public function setCartorioCertidao(?string $cartorioCertidao): void
    {
        $this->cartorioCertidao = $cartorioCertidao;
    }

    /**
     * @return string|null
     */
    public function getMinicipioCartorio(): ?string
    {
        return $this->minicipioCartorio;
    }

    /**
     * @param string|null $minicipioCartorio
     */
    public function setMinicipioCartorio(?string $minicipioCartorio): void
    {
        $this->minicipioCartorio = $minicipioCartorio;
    }

    /**
     * @return string|null
     */
    public function getNrMatrCertidao(): ?string
    {
        return $this->nrMatrCertidao;
    }

    /**
     * @param string|null $nrMatrCertidao
     */
    public function setNrMatrCertidao(?string $nrMatrCertidao): void
    {
        $this->nrMatrCertidao = $nrMatrCertidao;
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
