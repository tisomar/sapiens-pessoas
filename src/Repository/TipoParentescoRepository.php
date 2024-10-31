<?php
declare(strict_types=1);

/**
* /src/Repository/TipoParentescoRepository.php
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*/
namespace AguPessoas\Backend\Repository;
use AguPessoas\Backend\Entity\TipoParentesco  as Entity;
/**
* Class TipoParentescoRepository
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*
* @method Entity|null find(int $id, ?array $populate = null)
* @method Entity|null findOneBy(array $criteria, array $orderBy = null)
* @method Entity[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
* @method Entity[]    findByAdvanced(array $criteria, array $orderBy = null, int $limit = null, int $offset = null, array $search = null): array
* @method Entity[]    findAll()
*/
class TipoParentescoRepository extends BaseRepository{
    protected static string $entityName = Entity::class;
}
