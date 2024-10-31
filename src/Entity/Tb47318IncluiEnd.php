<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb47318IncluiEnd
 */
#[ORM\Table(name: 'TB_47318_INCLUI_END')]
#[ORM\Entity]
class Tb47318IncluiEnd
{
    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_SERVIDOR', type: 'integer', nullable: true)]
    private $idServidor;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'MATRICULA', type: 'string', length: 20, nullable: true)]
    private $matricula;

    /**
     * @var int|null
     */
    #[ORM\Column(name: 'ID_ENDERECO', type: 'integer', nullable: true)]
    private $idEndereco;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DESCRICAO', type: 'string', length: 100, nullable: true)]
    private $descricao;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'COMPLEMENTO', type: 'string', length: 100, nullable: true)]
    private $complemento;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'BAIRRO', type: 'string', length: 50, nullable: true)]
    private $bairro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CEP', type: 'string', length: 20, nullable: true)]
    private $cep;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'UF', type: 'string', length: 2, nullable: true)]
    private $uf;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CIDADE', type: 'string', length: 50, nullable: true)]
    private $cidade;

    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_TABLE', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_47318_INCLUI_END_ID_TABLE_s', allocationSize: 1, initialValue: 1)]
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
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     */
    public function setMatricula(?string $matricula): void
    {
        $this->matricula = $matricula;
    }

    /**
     * @return int|null
     */
    public function getIdEndereco(): ?int
    {
        return $this->idEndereco;
    }

    /**
     * @param int|null $idEndereco
     */
    public function setIdEndereco(?int $idEndereco): void
    {
        $this->idEndereco = $idEndereco;
    }

    /**
     * @return string|null
     */
    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    /**
     * @param string|null $descricao
     */
    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    /**
     * @return string|null
     */
    public function getComplemento(): ?string
    {
        return $this->complemento;
    }

    /**
     * @param string|null $complemento
     */
    public function setComplemento(?string $complemento): void
    {
        $this->complemento = $complemento;
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
