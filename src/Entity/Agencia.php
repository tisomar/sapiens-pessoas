<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Agencia
 */
#[ORM\Table(name: 'AGENCIA')]
#[ORM\Index(name: 'ix_agencia_municipio', columns: ['ID_MUNICIPIO_AGENCIA'])]
#[ORM\Index(name: 'IDX_D429D58358C4399B', columns: ['ID_BANCO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Agencia implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_AGENCIA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela AGENCIA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_AGENCIA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_AGENCIA', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código identificador da agência bancária. É o controle para um mecanismo de autenticação utilizado para identificação do banco e agência, evitando dessa forma fraudes ou erros de transmissão de informações.'])]
    protected string $codigo;

    #[ORM\Column(name: 'NR_DV_AGENCIA', type: 'string', length: 10, nullable: true, options: ['comment' => 'Dígito verificador das agências bancárias. É o número de Identificação utilizado na identificação de contas bancárias domiciliadas e que permite uma maior segurança e rapidez no encaminhamento na transferência a crédito de fundos.'])]
    protected ?string $digitoVerificador = null;

    #[ORM\Column(name: 'DS_AGENCIA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome e informações a mais relativas ao registro da agência bancária.'])]
    protected ?string $descricao = null;

    #[ORM\JoinColumn(name: 'ID_BANCO', referencedColumnName: 'ID_BANCO')]
    #[ORM\ManyToOne(targetEntity: 'Banco')]
    protected ?Banco $banco = null;

    #[ORM\JoinColumn(name: 'ID_MUNICIPIO_AGENCIA', referencedColumnName: 'ID_MUNICIPIO')]
    #[ORM\ManyToOne(targetEntity: 'Municipio')]
    protected ?Municipio $municipio = null;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getDigitoVerificador(): ?string
    {
        return $this->digitoVerificador;
    }

    public function setDigitoVerificador(?string $digitoVerificador): void
    {
        $this->digitoVerificador = $digitoVerificador;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getBanco(): ?Banco
    {
        return $this->banco;
    }

    public function setBanco(?Banco $banco): void
    {
        $this->banco = $banco;
    }

    public function getMunicipio(): ?Municipio
    {
        return $this->municipio;
    }

    public function setMunicipio(?Municipio $municipio): void
    {
        $this->municipio = $municipio;
    }


}
