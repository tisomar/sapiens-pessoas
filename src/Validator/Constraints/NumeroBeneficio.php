<?php

declare(strict_types=1);
/**
 * /src/Validator/Constraints/NumeroBeneficiario.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Validator\Constraints;

use Attribute;
use Symfony\Component\Validator\Attribute\HasNamedArguments;
use Symfony\Component\Validator\Constraint;

/**
 * Class NumeroBeneficio.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[Attribute]
class NumeroBeneficio extends Constraint
{
    /**
     * @param string     $message
     * @param array|null $groups
     * @param mixed|null $payload
     */
    #[HasNamedArguments]
    public function __construct(
        public string $message = 'Numero do Benefício inválido!',
        array $groups = null,
        mixed $payload = null
    ) {
        parent::__construct([], $groups, $payload);
    }
}
