<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

/**
 * Class MvcsIngresso1ACategoria.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'mvcs_ingresso_1a_categoria')]
class MvcsIngresso1ACategoria
{
    #[ManyToOne(targetEntity: Servidor::class)]
    #[JoinColumn(name: 'id_servidor', referencedColumnName: 'id')]
    private Servidor|null $servidor = null;

    /**
     * @return Servidor|null
     */
    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    /**
     * @param Servidor|null $servidor
     */
    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }
}