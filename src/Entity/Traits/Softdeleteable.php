<?php

namespace AguPessoas\Backend\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Softdeleteable.
 *
 * @author Advocacia-Geral da União
 */
trait Softdeleteable
{
    #[ORM\Column(name: 'DT_OPERACAO_EXCLUSAO', type: 'datetime', nullable: true, options: ['comment' => 'Especifica a data de exclusão lógica do registro.'])]
    protected ?DateTime $dataExclusao = null;

    public function getDataExclusao(): ?DateTime
    {
        return $this->dataExclusao;
    }

    public function setDataExclusao(?DateTime $dataExclusao): self
    {
        $this->dataExclusao = $dataExclusao;
        return $this;
    }

}