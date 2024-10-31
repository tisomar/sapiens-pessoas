<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\TipoAutoridade;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\TipoAutoridade as TipoAutoridadeEntity;
use AguPessoas\Backend\Repository\TipoAutoridadeRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoAutoridadeResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoAutoridadeEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoAutoridadeEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoAutoridadeEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoAutoridadeEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoAutoridadeEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoAutoridadeEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoAutoridadeEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoAutoridadeResource extends RestResource
{
    /**
     * TipoAutoridadeResource constructor.
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
        $this->setDtoClass(TipoAutoridade::class);
    }
}
