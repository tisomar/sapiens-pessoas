<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/Resource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits;

use AguPessoas\Backend\Rest\Traits\RestResourceCount;
use AguPessoas\Backend\Rest\Traits\RestResourceCreate;
use AguPessoas\Backend\Rest\Traits\RestResourceDelete;
use AguPessoas\Backend\Rest\Traits\RestResourceFind;
use AguPessoas\Backend\Rest\Traits\RestResourceFindOne;
use AguPessoas\Backend\Rest\Traits\RestResourceFindOneBy;
use AguPessoas\Backend\Rest\Traits\RestResourceIds;
use AguPessoas\Backend\Rest\Traits\RestResourceSave;
use AguPessoas\Backend\Rest\Traits\RestResourceUndelete;
use AguPessoas\Backend\Rest\Traits\RestResourceUpdate;

/**
 * Trait Resource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait RestResourceLifeCycles
{
    // Traits
    use RestResourceFind;
    use RestResourceFindOne;
    use RestResourceFindOneBy;
    use RestResourceCount;
    use RestResourceIds;
    use RestResourceCreate;
    use RestResourceUpdate;
    use RestResourceDelete;
    use RestResourceUndelete;
    use RestResourceSave;
}
