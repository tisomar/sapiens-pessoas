<?php

declare(strict_types=1);
/**
 * /src/Triggers/TriggerWriteInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Triggers;

use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Interface TriggerWriteInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface TriggerWriteInterface extends TriggerInterface
{
    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface       $entity
     * @param string                $transactionId
     */
    public function execute(
        ?RestDtoInterface $restDto,
        EntityInterface $entity,
        string $transactionId
    ): void;

    /**
     * @return int
     */
    public function getOrder(): int;
}
