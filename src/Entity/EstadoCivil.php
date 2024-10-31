<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use Gedmo\Mapping\Annotation as Gedmo;
use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * EstadoCivil
 */
#[ORM\Table(name: 'ESTADO_CIVIL')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class EstadoCivil implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_ESTADO_CIVIL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela ESTADO_CIVIL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_ESTADO_CIVIL', allocationSize: 1, initialValue: 1)]
    private int $id;

    #[ORM\Column(name: 'CD_ESTADO_CIVIL', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_ESTADO_CIVIL', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva do nome para o estado civil do servidor público: Casado(a), Separado(a), Divorciado(a) e Viúvo(a).'])]
    protected ?string $descricao;


    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $idEstadoCivil): void
    {
        $this->id = $idEstadoCivil;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $cdEstadoCivil): void
    {
        $this->codigo = $cdEstadoCivil;
    }

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $dsEstadoCivil): void
    {
        $this->descricao = $dsEstadoCivil;
    }

}
