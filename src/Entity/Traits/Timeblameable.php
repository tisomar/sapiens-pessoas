<?php

namespace AguPessoas\Backend\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Trait Timeblameable.
 *
 * @author Advocacia-Geral da União
 */
trait Timeblameable
{
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'datetime', nullable: false, options: ['comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    protected ?DateTime $dataInclusao;


    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'datetime', nullable: false, options: ['comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    #[Gedmo\Timestampable(on: 'update')]
    protected ?DateTime $dataAlteracao;

    public function getDataInclusao(): ?DateTime
    {
        return $this->dataInclusao;
    }

    public function setDataInclusao(?DateTime $dataInclusao): self
    {

        $this->dataInclusao = $dataInclusao;
        return $this;
    }

    public function getDataAlteracao(): ?DateTime
    {
        return $this->dataAlteracao;
    }

    public function setDataAlteracao(?DateTime $dataAlteracao): self
    {
        $this->dataAlteracao = $dataAlteracao;

        return $this;
    }

}