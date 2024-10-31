<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\Resource;

use AguPessoas\Backend\Api\V1\DTO\TipoAposentadoria;
use AguPessoas\Backend\Api\V1\Resource\Traits\DownloadTrait;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\TipoAposentadoria as TipoAposentadoriaEntity;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Repository\TipoAposentadoriaRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoAposentadoriaResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoAposentadoriaEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoAposentadoriaEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoAposentadoriaEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoAposentadoriaEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoAposentadoriaEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoAposentadoriaEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoAposentadoriaEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoAposentadoriaResource extends RestResource
{
    /**
     * TipoAposentadoriaResource constructor.
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
        $this->setDtoClass(TipoAposentadoria::class);
    }

}
