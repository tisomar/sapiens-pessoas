<?php

namespace AguPessoas\Backend\Entity;

/**
 * Class ClasseCategorias.
 *
 * @author Advocacia-Geral da União <agupessoas@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[ORM\Table(name: 'CLASSE_CATEGORIAS')]
class ClasseCategorias
{
    #[ManyToOne(targetEntity: TipoClasse::class)]
    #[JoinColumn(name: 'id_tipo_classe', referencedColumnName: 'id')]
    private TipoClasse|null $tipoClasse = null;
}