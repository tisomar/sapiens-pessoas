<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Form\Attributes as Form;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TipoMovimentacao
 */
#[ORM\Table(name: 'TIPO_MOVIMENTACAO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class TipoMovimentacao implements EntityInterface
{

    use Id;
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TIPO_MOVIMENTACAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TIPO_MOVIMENTACAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    ##[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_MOVIMENTACAO', allocationSize: 1, initialValue: 805)]
    protected ?int $id = null;

    #[ORM\Column(name: 'CD_TIPO_MOVIMENTACAO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected $codigo;

    #[ORM\Column(name: 'DS_TIPO_MOVIMENTACAO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para as possíveis movimentacaos existentes em uma instituíção bancária.'])]
    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected $descricao;

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

    public function getUuid()
    {
        return $this->id;
    }

}
