<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\TipoConta;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\TipoConta as TipoContaEntity;
use AguPessoas\Backend\Repository\TipoContaRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoContaResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoContaEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoContaEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoContaEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoContaEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoContaEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoContaEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoContaEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoContaResource extends RestResource
{
    /**
     * TipoContaResource constructor.
     *
     * @param Repository         $repository
     * @param ValidatorInterface $validator
     */
    public function __construct(
        Repository $repository,
        ValidatorInterface $validator
    ) {
        $this->setRepository($repository);
        $this->setValidator($validator);
        $this->setDtoClass(TipoConta::class);
    }
}
