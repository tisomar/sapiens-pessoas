<?php

declare(strict_types=1);
/**
 * /src/Rest/Traits/RestResourceSave.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Rest\Traits;

use AguPessoas\Backend\Entity\EntityInterface;

/**
 * Trait RestResourceSave.
 *
 * @SuppressWarnings("unused")
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait RestResourceSave
{
    /**
     * Before lifecycle method for save method.
     *
     * Notes:   If you make changes to entity in this lifecycle method by default it will be saved on end of current
     *          request. To prevent this you need to detach current entity from entity manager.
     *
     *          Also note that if you've made some changes to entity and you eg. throw an exception within this method
     *          your entity will be saved if it has eg Blameable / Timestampable traits attached.
     */
    public function beforeSave(EntityInterface $entity, string $transactionId): void
    {
    }

    /**
     * After lifecycle method for save method.
     *
     * Notes:   If you make changes to entity in this lifecycle method by default it will be saved on end of current
     *          request. To prevent this you need to detach current entity from entity manager.
     *
     *          Also note that if you've made some changes to entity and you eg. throw an exception within this method
     *          your entity will be saved if it has eg Blameable / Timestampable traits attached.
     */
    public function afterSave(EntityInterface $entity, string $transactionId): void
    {
    }
}
