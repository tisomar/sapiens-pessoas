<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\SPEtapaImportacaoSigepe;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\SPEtapaImportacaoSigepe as Entity;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Repository\SPEtapaImportacaoSigepeRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class EtapaImportacaoSigepeResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method Entity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method Entity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method Entity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method Entity      delete(int $id, string $transactionId): EntityInterface
 * @method Entity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class EtapaImportacaoSigepeResource extends RestResource
{
    /**
     * EtapaImportacaoSigepeResource constructor.
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
        $this->setDtoClass(SPEtapaImportacaoSigepe::class);
    }
}

