<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\Resource;

use AguPessoas\Backend\Api\V1\DTO\TipoPublicacao;
use AguPessoas\Backend\Api\V1\Resource\Traits\DownloadTrait;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\TipoPublicacao as TipoPublicacaoEntity;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Repository\TipoPublicacaoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoPublicacaoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoPublicacaoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoPublicacaoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoPublicacaoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoPublicacaoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoPublicacaoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoPublicacaoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoPublicacaoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoPublicacaoResource extends RestResource
{
    /**
     * TipoPublicacaoResource constructor.
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
        $this->setDtoClass(TipoPublicacao::class);
    }

}
