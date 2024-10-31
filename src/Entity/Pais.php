<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Pais
 */
#[ORM\Table(name: 'PAIS')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Pais implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_PAIS', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela PAIS.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SEQ_PAIS', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_PAIS', type: 'string', length: 4, nullable: false, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected string $codigo;

    #[ORM\Column(name: 'DS_PAIS', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome do pais de acordo com a códificação internacional.'])]
    protected string $descricao;
    #[ORM\Column(name: 'DS_NACIONALIDADE', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para a nomeclatura usada pela nacionalidade de uma pessoa no pais.'])]
    protected ?string $nacionalidade = null;


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

    public function getNacionalidade(): ?string
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(?string $nacionalidade): void
    {
        $this->nacionalidade = $nacionalidade;
    }
}
