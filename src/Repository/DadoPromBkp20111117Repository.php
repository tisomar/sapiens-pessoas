<?php
declare(strict_types=1);

/**
* /src/Repository/DadoPromBkp20111117Repository.php
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*/
namespace AguPessoas\Backend\Repository;
use AguPessoas\Backend\Entity\DadoPromBkp20111117  as Entity;
/**
* Class DadoPromBkp20111117Repository
*
* Author: Advocacia-Geral da Uniao <supp@agu.gov.br>
*
* @method Entity|null find(int $id, ?array $populate = null)
* @method Entity|null findOneBy(array $criteria, array $orderBy = null)
* @method Entity[]    findBy(array $criteria, array $orderBy = null, int $limit = null, int $offset = null)
* @method Entity[]    findByAdvanced(array $criteria, array $orderBy = null, int $limit = null, int $offset = null, array $search = null): array
* @method Entity[]    findAll()
*/
class DadoPromBkp20111117Repository extends BaseRepository{
    protected static string $entityName = Entity::class;
}
