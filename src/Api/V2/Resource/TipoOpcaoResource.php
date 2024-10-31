<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\TipoOpcao;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\TipoOpcao as TipoOpcaoEntity;
use AguPessoas\Backend\Repository\TipoOpcaoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoOpcaoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method TipoOpcaoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method TipoOpcaoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoOpcaoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method TipoOpcaoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoOpcaoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method TipoOpcaoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method TipoOpcaoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class TipoOpcaoResource extends RestResource
{
    /**
     * TipoOpcaoResource constructor.
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
        $this->setDtoClass(TipoOpcao::class);
    }
}
