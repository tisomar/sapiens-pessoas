<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * BaseLegal
 */
#[ORM\Table(name: 'BASE_LEGAL')]
#[ORM\Index(name: 'IDX_527A498B3EFDAD65', columns: ['ID_FORMA_DOCUMENTO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class BaseLegal implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_BASE_LEGAL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela BASE_LEGAL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_BASE_LEGAL', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_BASE_LEGAL', type: 'string', length: 11, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_BASE_LEGAL', type: 'string', length: 200, nullable: false, options: ['comment' => 'Especificação descritiva para a base legal, leis armazenada para o embasamento de um ato (Norma)..'])]
    protected string $descricao;

    #[ORM\JoinColumn(name: 'ID_FORMA_DOCUMENTO', referencedColumnName: 'ID_FORMA_DOCUMENTO')]
    #[ORM\ManyToOne(targetEntity: 'FormaDocumento')]
    protected ?FormaDocumento $formaDocumento;

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

    public function getFormaDocumento(): ?FormaDocumento
    {
        return $this->formaDocumento;
    }

    public function setFormaDocumento(?FormaDocumento $formaDocumento): void
    {
        $this->formaDocumento = $formaDocumento;
    }


}
