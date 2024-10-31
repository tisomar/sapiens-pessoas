<?php
/**
 * @noinspection LongLine
 * @phpcs:disable Generic.Files.LineLength.TooLong
 */
declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\Resource;

use AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaAfastamento;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAfastamento as SPSigepeTipoOcorrenciaAfastamentoEntity;
use AguPessoas\Backend\Repository\SPSigepeTipoOcorrenciaAfastamentoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class SPSigepeTipoOcorrenciaAfastamentoResource.
 *
 * @author  Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository        getRepository(): Repository
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity[]    find(array $criteria = null, array $orderBy = null, int $limit = null, int $offset = null, array $search = null, array $populate = null): array
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity|null findOne(int $id, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity|null findOneBy(array $criteria, array $orderBy = null, bool $throwExceptionIfNotFound = null): ?EntityInterface
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity      create(RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity      update(int $id, RestDtoInterface $dto, string $transactionId, bool $skipValidation = null): EntityInterface
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity      delete(int $id, string $transactionId): EntityInterface
 * @method SPSigepeTipoOcorrenciaAfastamentoEntity      save(EntityInterface $entity, string $transactionId, bool $skipValidation = null): EntityInterface
 *
 * @codingStandardsIgnoreEnd
 */
class SPSigepeTipoOcorrenciaAfastamentoResource extends RestResource
{
    /**
     * SPSigepeTipoOcorrenciaAfastamentoResource constructor.
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
        $this->setDtoClass(SPSigepeTipoOcorrenciaAfastamento::class);
    }
}
