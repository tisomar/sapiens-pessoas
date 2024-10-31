<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * NaturezaHistorico
 */
#[ORM\Table(name: 'NATUREZA_HISTORICO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class NaturezaHistorico implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_NATUREZA_HISTORICO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela NATUREZA_HISTORICO'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_NATUREZA_HISTORICO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_NATUREZA_HISTORICO', type: 'integer', nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?int $codigo;

    #[ORM\Column(name: 'DS_NATUREZA_HISTORICO', type: 'string', length: 100, nullable: true, options: ['comment' => 'Especificação descritiva para as causas possíveis para gerar o histórico funcional de um servidor público.'])]
    protected ?string $descricao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): ?int
    {
        return $this->codigo;
    }

    public function setCodigo(?int $codigo): void
    {
        $this->codigo = $codigo;
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
