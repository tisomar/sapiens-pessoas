<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/Id.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Id.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Id
{
    #[ORM\Id]
    #[ORM\Column(name: 'id', type: 'integer', nullable: false)]
    #[ORM\GeneratedValue('AUTO')]
    protected ?int $id = null;

    public function getId(): ?int
    {
        return $this->id;
    }
}
