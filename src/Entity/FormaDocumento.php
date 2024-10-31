<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FormaDocumento
 */
#[ORM\Table(name: 'FORMA_DOCUMENTO')]
#[ORM\Index(name: 'IDX_A446E427D0C49C4E', columns: ['ID_FINALIDADE_NORMA'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class FormaDocumento implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_FORMA_DOCUMENTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FORMA_DOCUMENTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_FORMA_DOCUMENTO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_FORMA_DOCUMENTO', type: 'string', length: 11, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_FORMA_DOCUMENTO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome dado ao tipo ou forma de documento usado para declarar uma norma ou ato.'])]
    protected string $descricao;

    #[ORM\Column(name: 'SG_FORMA_DOCUMENTO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Sigla ou nome abreviado para o tipo ou forma de documento usado para declarar uma norma ou ato.'])]
    protected ?string $sigla;

    #[ORM\JoinColumn(name: 'ID_FINALIDADE_NORMA', referencedColumnName: 'ID_FINALIDADE_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'FinalidadeNorma')]
    protected ?FinalidadeNorma $finalidadeNorma;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getSigla(): ?string
    {
        return $this->sigla;
    }

    public function setSigla(?string $sigla): void
    {
        $this->sigla = $sigla;
    }

    public function getFinalidadeNorma(): ?FinalidadeNorma
    {
        return $this->finalidadeNorma;
    }

    public function setFinalidadeNorma(?FinalidadeNorma $finalidadeNorma): void
    {
        $this->finalidadeNorma = $finalidadeNorma;
    }


}
