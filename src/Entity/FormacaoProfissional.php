<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FormacaoProfissional
 */
#[ORM\Table(name: 'FORMACAO_PROFISSIONAL')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class FormacaoProfissional implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_FORMACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FORMACAO_PROFISSIONAL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_FORMACAO_PROFISSIONAL', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_FORMACAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_FORMACAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para a formação no seu contexto geral (atividades). É a metodologia que difere da '])]
    protected ?string $descricao;

    #[ORM\Column(name: 'CD_SIAPE', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do SIAPE. Este campo é utilizado na migração como DE X PARA.'])]
    protected ?string $codigoSiape = null;


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

    public function getDescricao(): ?string
    {
        return $this->descricao;
    }

    public function setDescricao(?string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getCodigoSiape(): ?string
    {
        return $this->codigoSiape;
    }

    public function setCodigoSiape(?string $codigoSiape): void
    {
        $this->codigoSiape = $codigoSiape;
    }

}
