<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;
use AguPessoas\Backend\Form\Attributes as Form;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * TipoAssunto
 */
#[ORM\Table(name: 'TIPO_ASSUNTO')]
#[ORM\Entity]
class TipoAssunto implements EntityInterface
{

    #[ORM\Column(name: 'ID_TIPO_ASSUNTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial do tipo de assunto de um texto padrão específico.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_ASSUNTO', allocationSize: 1, initialValue: 1)]
    protected ?int $id = null;


    #[ORM\Column(name: 'DS_TIPO_ASSUNTO', type: 'string', length: 200, nullable: false, options: ['comment' => 'Descrição do assunto para os textos das demadas.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected $descricao;

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getId(): ?int
    {
        return $this->id;
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
