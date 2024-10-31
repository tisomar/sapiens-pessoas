<?php

declare(strict_types=1);
/**
 * /src/Rules/RuleInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rules;

use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Interface RuleInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface RuleInterface
{
    public function supports(): array;

    public function validate(
        ?RestDtoInterface $restDto,
        EntityInterface $entity,
        string $transactionId
    ): bool;

    public function getOrder(): int;
}
