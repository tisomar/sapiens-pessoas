<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Regiao
 */
#[ORM\Table(name: 'REGIAO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Regiao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_REGIAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela REGIAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_REGIAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_REGIAO', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected string $codigo;

    #[ORM\Column(name: 'SG_REGIAO', type: 'string', length: 2, nullable: false, options: ['comment' => 'Sigla ou nome abreviado para a região geográfica brasileira.'])]
    protected string $sigla;

    #[ORM\Column(name: 'DS_REGIAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome completo para a região geográfica brasileira.'])]
    protected string $descricao;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $idRegiao): void
    {
        $this->id = $idRegiao;
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
