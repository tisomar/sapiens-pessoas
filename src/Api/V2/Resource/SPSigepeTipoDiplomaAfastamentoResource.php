<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoDiplomaAfastamento;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\SPSigepeTipoDiplomaAfastamento as SPSigepeTipoDiplomaAfastamentoEntity;
use AguPessoas\Backend\Repository\SPSigepeTipoDiplomaAfastamentoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SPSigepeTipoDiplomaAfastamentoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method SPSigepeTipoDiplomaAfastamentoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method SPSigepeTipoDiplomaAfastamentoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method SPSigepeTipoDiplomaAfastamentoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method SPSigepeTipoDiplomaAfastamentoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method SPSigepeTipoDiplomaAfastamentoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method SPSigepeTipoDiplomaAfastamentoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method SPSigepeTipoDiplomaAfastamentoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class SPSigepeTipoDiplomaAfastamentoResource extends RestResource
{
    /**
     * SPSigepeTipoDiplomaAfastamentoResource constructor.
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
        $this->setDtoClass(SPSigepeTipoDiplomaAfastamento::class);
    }
}
