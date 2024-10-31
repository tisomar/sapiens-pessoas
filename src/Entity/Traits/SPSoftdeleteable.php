<?php

namespace AguPessoas\Backend\Entity\Traits;

use AguPessoas\Backend\Entity\User;
use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Blameable.
 *
 * @author Advocacia-Geral da União
 */
trait SPSoftdeleteable
{
    #[ORM\Column(name: 'apagado_em', type: 'datetime', nullable: true)]
    protected ?DateTime $apagadoEm = null;

    ##[ORM\ManyToOne(targetEntity: 'AguPessoas\Backend\Entity\User')]
    ##[ORM\JoinColumn(name: 'apagado_por', referencedColumnName: 'id', nullable: true)]
    #protected ?User $apagadoPor = null;

    public function setApagadoEm(?DateTime $apagadoEm): self
    {
        $this->apagadoEm = $apagadoEm;

        return $this;
    }

    public function getApagadoEm(): ?DateTime
    {
        return $this->apagadoEm;
    }

//    public function getApagadoPor(): ?User
//    {
//        return $this->apagadoPor;
//    }
//
//    public function setApagadoPor(?User $apagadoPor = null): self
//    {
//        $this->apagadoPor = $apagadoPor;
//
//        return $this;
//    }

}