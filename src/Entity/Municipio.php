<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Municipio
 */
#[ORM\Table(name: 'MUNICIPIO')]
#[ORM\Index(name: 'IDX_BA5AEB0FB8242676', columns: ['ID_UF'])]
#[ORM\UniqueConstraint(name: 'uk_municipio', columns: ['CD_MUNICIPIO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Municipio implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_MUNICIPIO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela MUNICIPIO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_MUNICIPIO', allocationSize: 1, initialValue: 1)]
    protected ?int $id;

    #[ORM\Column(name: 'CD_MUNICIPIO', type: 'string', length: 10, nullable: false, options: ['comment' => '"CódigoparaÁreaTerritorialOficialcriadopeloIBGEparacadamunicípiobrasíleiro'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'NM_MUNICIPIO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome representando a cidade de acordo com o cadastro do IBGE.'])]
    protected ?string $nome;

    #[ORM\Column(name: 'IN_CAPITAL', type: 'string', length: 1, nullable: false, options: ['fixed' => true, 'comment' => 'Identificador Boleano que especifica se o município é capital do estado (UF). Codificação: 1 - Sim e  0 - NÃO.'])]
    protected string $inCapital;

    #[ORM\JoinColumn(name: 'ID_UF', referencedColumnName: 'ID_UF')]
    #[ORM\ManyToOne(targetEntity: 'Uf')]
    protected Uf $uf;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
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

    public function getNome(): ?string
    {
        return $this->nome;
    }

    public function setNome(?string $nome): void
    {
        $this->nome = $nome;
    }

    public function getInCapital(): string
    {
        return $this->inCapital;
    }

    public function setInCapital(string $inCapital): void
    {
        $this->inCapital = $inCapital;
    }

    public function getUf(): Uf
    {
        return $this->uf;
    }

    public function setUf(Uf $uf): void
    {
        $this->uf = $uf;
    }


}
