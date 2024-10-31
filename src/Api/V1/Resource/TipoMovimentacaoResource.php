<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\Resource;

use AguPessoas\Backend\Api\V1\DTO\TipoMovimentacao;
use AguPessoas\Backend\Api\V1\Resource\Traits\DownloadTrait;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\TipoMovimentacao as TipoMovimentacaoEntity;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Repository\TipoMovimentacaoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoMovimentacaoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoMovimentacaoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoMovimentacaoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoMovimentacaoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoMovimentacaoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoMovimentacaoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoMovimentacaoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoMovimentacaoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoMovimentacaoResource extends RestResource
{
    /**
     * TipoMovimentacaoResource constructor.
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
        $this->setDtoClass(TipoMovimentacao::class);
    }

}
