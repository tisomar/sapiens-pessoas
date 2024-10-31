<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Orgao
 */
#[ORM\Table(name: 'ORGAO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Orgao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_ORGAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela ORGAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_ORGAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_ORGAO', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código SIAPE que é dado a um orgão quando criado através de lei. O Sistema Integrado de Administração Financeira do Governo Federal que controla os orgãos públicos, autarquias e fundações públicas federais, estabelecendo seus direitos e deveres.'])]
    protected string $codigo;

    #[ORM\Column(name: 'SG_ORGAO', type: 'string', length: 20, nullable: false, options: ['comment' => 'Sigla ou nome abreviado dado ao orgão quando criado por lei através da presidência da república'])]
    protected string $sigla;

    #[ORM\Column(name: 'DS_ORGAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome dado ao orgão quando criado por lei através da presidência da república.'])]
    protected string $descricao;

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

}
