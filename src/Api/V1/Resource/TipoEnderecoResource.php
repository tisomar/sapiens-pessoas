<?php

declare(strict_types=1);
/**
 * /src/Api/V1/Resource/TipoEnderecoResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V1\Resource;

use AguPessoas\Backend\Api\V1\DTO\TipoAutoridade;
use AguPessoas\Backend\Api\V1\DTO\TipoEndereco;
use Doctrine\Common\Proxy\Proxy;
use Doctrine\ORM\Exception\ORMException;
use AguPessoas\Backend\DTO\RestDtoInterface;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\Entity\TipoEndereco as Entity;
use AguPessoas\Backend\Repository\TipoEnderecoRepository as Repository;
use AguPessoas\Backend\Rest\RestResource;
use AguPessoas\Backend\Utils\StringService;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/**
 * Class TipoEnderecoResource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @codingStandardsIgnoreStart
 *
 * @method Repository  getRepository(): Repository
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
class TipoEnderecoResource extends RestResource
{

    /**
     * TipoEnderecoResource constructor.
     */
    public function __construct(Repository $repository,
                                ValidatorInterface $validator,
                                private StringService $stringService)
    {
        $this->setRepository($repository);
        $this->setValidator($validator);
        $this->setDtoClass(TipoEndereco::class);
    }

}