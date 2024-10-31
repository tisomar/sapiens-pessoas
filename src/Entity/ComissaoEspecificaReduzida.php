<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * ComissaoEspecificaReduzida
 */
#[ORM\Table(name: 'COMISSAO_ESPECIFICA_REDUZIDA')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class ComissaoEspecificaReduzida implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_COMISSAO_ESPECIFICA_RED', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único representando um registro na tabela COMISSAO_ESPECIFICA_REDUZIDA'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_COMISSAO_ESPECIFICA_REDUZIDA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'NM_COMISSAO_ESPECIFICA_RED', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva representando a nomenclatura dada ao cargo função. '])]
    protected string $nome;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): void
    {
        $this->nome = $nome;
    }

}
