<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/SigepeServidor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use AguPessoas\Backend\Entity\SPSigepeServidor;
use DMS\Filter\Rules as Filter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait SigepeServidor.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait SigepeServidor
{
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\ManyToOne(targetEntity: 'SPSigepeServidor')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: false)]
    protected SPSigepeServidor $sigepeServidor;

    public function getSigepeServidor(): SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    public function setSigepeServidor(SPSigepeServidor $sigepeServidor): void
    {
        $this->sigepeServidor = $sigepeServidor;
    }
}
