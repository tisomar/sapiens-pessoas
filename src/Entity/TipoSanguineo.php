<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * TipoSanguineo
 */
#[ORM\Table(name: 'TIPO_SANGUINEO')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class TipoSanguineo implements EntityInterface
{

    use Id;
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TIPO_SANGUINEO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TIPO_SANGUINEO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    ##[ORM\SequenceGenerator(sequenceName: 'SQ_TIPO_SANGUINEO', allocationSize: 1, initialValue: 805)]
    protected ?int $id = null;

    #[ORM\Column(name: 'CD_TIPO_SANGUINEO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected ?string $codigo;

    #[ORM\Column(name: 'DS_TIPO_SANGUINEO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para os possíveis tipos sanguíneos existentes em uma instituíção bancária.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected ?string $descricao;

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

}
