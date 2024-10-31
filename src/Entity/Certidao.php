<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * SPCertidao
 */
#[ORM\Table(name: 'CERTIDAO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Certidao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;

    #[ORM\Column(name: 'ID_CERTIDAO', type: 'integer', nullable: false)]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_CERTIDAO', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'DS_CERTIDAO', type: 'string', length: 100, nullable: false)]
    protected string $descricao;

    #[ORM\Column(name: 'DT_CRIACAO', type: 'datetime', nullable: false)]
    protected DateTime $dataCriacao;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getDataCriacao(): DateTime
    {
        return $this->dataCriacao;
    }

    public function setDataCriacao(DateTime $dataCriacao): void
    {
        $this->dataCriacao = $dataCriacao;
    }

}
