<?php
declare(strict_types=1);

/**
* /src/Repository/TmpCargaPgf05092011Repository.php
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*/
namespace AguPessoas\Backend\Repository;
use AguPessoas\Backend\Entity\TmpCargaPgf05092011  as Entity;
/**
* Class TmpCargaPgf05092011Repository
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*
* @method Entity|null find(int $id, ?array $populate = null)
* @method Entity|null findOneBy(array $criteria, array $orderBy = null)
* @method Entity[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
* @method Entity[]    findByAdvanced(array $criteria, array $orderBy = null, int $limit = null, int $offset = null, array $search = null): array
* @method Entity[]    findAll()
*/
class TmpCargaPgf05092011Repository extends BaseRepository{
    protected static string $entityName = Entity::class;
}
