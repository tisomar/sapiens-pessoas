<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\Resource;

use AguPessoas\Backend\Api\V1\DTO\TipoPadrao;
use AguPessoas\Backend\Api\V1\Resource\Traits\DownloadTrait;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\TipoPadrao as TipoPadraoEntity;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Repository\TipoPadraoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoPadraoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoPadraoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoPadraoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoPadraoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoPadraoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoPadraoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoPadraoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoPadraoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoPadraoResource extends RestResource
{
    /**
     * TipoPadraoResource constructor.
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
        $this->setDtoClass(TipoPadrao::class);
    }

}
