<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/Codigo.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use DMS\Filter\Rules as Filter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait Codigo.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Codigo
{
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    protected string $codigo = '';

    public function setCodigo(string $codigo): self
    {
        $this->codigo = $codigo;

        return $this;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }
}
