<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/CodigoSigepe.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use DMS\Filter\Rules as Filter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait CogigoSigepe.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait CodigoSigepe
{
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\Column(type: 'string', length: 255, nullable: false)]
    protected string $codigoSigepe = '';

    public function setCodigoSigepe(string $codigoSigepe): self
    {
        $this->codigoSigepe = $codigoSigepe;

        return $this;
    }

    public function getCodigoSigepe(): string
    {
        return $this->codigoSigepe;
    }
}
