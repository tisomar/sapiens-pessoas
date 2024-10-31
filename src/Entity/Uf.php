<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Uf
 */
#[ORM\Table(name: 'UF')]
#[ORM\Index(name: 'IDX_19AA5F4BBF9E3E3', columns: ['ID_PAIS'])]
#[ORM\Index(name: 'IDX_19AA5F4B4BAE7EF0', columns: ['ID_REGIAO'])]
#[ORM\Index(name: 'IDX_19AA5F4B621F235D', columns: ['ID_REGIAO_ADMINISTRATIVA'])]
#[ORM\Index(name: 'IDX_19AA5F4B7A6217B9', columns: ['ID_REGIAO_JURIDICA'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Uf implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_UF', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela UF.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_UF', allocationSize: 1, initialValue: 1)]
    protected ?int $id;

    #[ORM\Column(name: 'CD_UF', type: 'string', length: 4, nullable: false, options: ['comment' => 'Especifica o código da UF.'])]
    protected string $codigo;

    #[ORM\Column(name: 'SG_UF', type: 'string', length: 2, nullable: false, options: ['comment' => 'Especifica a sigla referente a união federativa (UF) cadastrada pelo servidor.'])]
    protected string $sigla;

    #[ORM\Column(name: 'DS_UF', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especifica a descrição da UF selecionada.'])]
    protected string $descricao;

    #[ORM\Column(name: 'DS_NATURALIDADE', type: 'string', length: 30, nullable: true, options: ['comment' => 'Especifica a naturalidade das pessoas nascidas em determinada UF.'])]
    protected ?string $naturalidade;

    #[ORM\JoinColumn(name: 'ID_PAIS', referencedColumnName: 'ID_PAIS')]
    #[ORM\ManyToOne(targetEntity: 'Pais')]
    protected ?Pais $pais;

    #[ORM\JoinColumn(name: 'ID_REGIAO', referencedColumnName: 'ID_REGIAO')]
    #[ORM\ManyToOne(targetEntity: 'Regiao')]
    protected ?Regiao $regiao;

    #[ORM\JoinColumn(name: 'ID_REGIAO_ADMINISTRATIVA', referencedColumnName: 'ID_REGIAO_ADMINISTRATIVA')]
    #[ORM\ManyToOne(targetEntity: 'RegiaoAdministrativa')]
    protected ?RegiaoAdministrativa $regiaoAdministrativa;

    #[ORM\JoinColumn(name: 'ID_REGIAO_JURIDICA', referencedColumnName: 'ID_REGIAO_JURIDICA')]
    #[ORM\ManyToOne(targetEntity: 'RegiaoJuridica')]
    protected ?RegiaoJuridica $regiaoJuridica;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): void
    {
        $this->sigla = $sigla;
    }

    public function getNaturalidade(): ?string
    {
        return $this->naturalidade;
    }

    public function setNaturalidade(?string $naturalidade): void
    {
        $this->naturalidade = $naturalidade;
    }

    public function getPais(): ?Pais
    {
        return $this->pais;
    }

    public function setPais(?Pais $pais): void
    {
        $this->pais = $pais;
    }

    public function getRegiao(): ?Regiao
    {
        return $this->regiao;
    }

    public function setRegiao(?Regiao $regiao): void
    {
        $this->regiao = $regiao;
    }

    public function getRegiaoAdministrativa(): ?RegiaoAdministrativa
    {
        return $this->regiaoAdministrativa;
    }

    public function setRegiaoAdministrativa(?RegiaoAdministrativa $regiaoAdministrativa): void
    {
        $this->regiaoAdministrativa = $regiaoAdministrativa;
    }

    public function getRegiaoJuridica(): ?RegiaoJuridica
    {
        return $this->regiaoJuridica;
    }

    public function setRegiaoJuridica(?RegiaoJuridica $regiaoJuridica): void
    {
        $this->regiaoJuridica = $regiaoJuridica;
    }


}
