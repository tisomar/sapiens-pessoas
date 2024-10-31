<?php

declare(strict_types=1);
/**
 * /src/MapperPipes/PipeInterface.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Mapper\Pipes;

use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Interface PipeInterface.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
interface PipeInterface
{
    /**
     * @return array
     */
    public function supports(): array;

    /**
     * @param RestDtoInterface|null $restDto
     * @param EntityInterface       $entity
     */
    public function execute(?RestDtoInterface &$restDto, EntityInterface $entity): void;

    /**
     * @return int
     */
    public function getOrder(): int;
}
