<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Rh
 */
#[ORM\Table(name: 'RH')]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
#[ORM\Entity]
class Rh implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_RH', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela RH.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_RH', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DS_RH', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para o nome do RH - Recursos Humanos escolhido para o cadastro ou alteração de um servidor público.'])]
    protected ?string $descricao;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $idRh): void
    {
        $this->id = $idRh;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

}
