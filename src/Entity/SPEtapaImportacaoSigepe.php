<?php

declare(strict_types=1);
/**
 * /src/Entity/SPCor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\Codigo;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Nome;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SPCor.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_etapas_importacao_sigep')]
class SPEtapaImportacaoSigepe implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use Codigo;
    use Nome;

    public function __construct()
    {
        $this->setUuid();
    }
}
