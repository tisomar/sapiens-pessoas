<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use AguPessoas\Backend\Form\Attributes as Form;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TipoAdmissao
 */
#[ORM\Table(name: 'TIPO_ADMISSAO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class TipoAdmissao implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TIPO_ADMISSAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TIPO _ADMISSAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_ADMISSAO', allocationSize: 1, initialValue: 1)]
    protected int $id;


    #[ORM\Column(name: 'CD_TIPO_ADMISSAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected string $codigo;

    #[ORM\Column(name: 'DS_TIPO_ADMISSAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para os tipos de adminissões que a pessoa poderar ter para assmir um cargo ou função pública.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected string $descricao;

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function setCodigo(?string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }
    public function getDescricao(): string
    {
        return $this->descricao;
    }

}
