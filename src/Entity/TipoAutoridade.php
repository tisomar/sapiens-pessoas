<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

use DateTime;

/**
 * TipoAutoridade
 */
#[ORM\Table(name: 'TIPO_AUTORIDADE')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class TipoAutoridade implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TIPO_AUTORIDADE', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e Único que especifica um registro na tabela AUTORIDADE.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_AUTORIDADE', allocationSize: 1, initialValue: 1)]
    protected $id;

    #[ORM\Column(name: 'CD_TIPO_AUTORIDADE', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected $codigo;


    #[ORM\Column(name: 'DS_TIPO_AUTORIDADE', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o tipo de autoridade cadastrada.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected $descricao;


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

    public function getUuid()
    {
        return $this->id;
    }

}
