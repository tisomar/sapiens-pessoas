<?php
declare(strict_types=1);

/**
* /src/Repository/TbFuncaoComissionadaOldRepository.php
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*/
namespace AguPessoas\Backend\Repository;
use AguPessoas\Backend\Entity\TbfuncaoComissionadaOld  as Entity;
/**
* Class TbFuncaoComissionadaOldRepository
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*
* @method Entity|null find(int $id, ?array $populate = null)
* @method Entity|null findOneBy(array $criteria, array $orderBy = null)
* @method Entity[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
* @method Entity[]    findByAdvanced(array $criteria, array $orderBy = null, int $limit = null, int $offset = null, array $search = null): array
* @method Entity[]    findAll()
*/
class TbFuncaoComissionadaOldRepository extends BaseRepository{
    protected static string $entityName = Entity::class;
}
