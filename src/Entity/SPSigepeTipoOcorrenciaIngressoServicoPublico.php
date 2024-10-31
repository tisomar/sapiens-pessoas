<?php

declare(strict_types=1);
/**
 * /src/Entity/SPCor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CodigoSigepe;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Nome;
use AguPessoas\Backend\Entity\Traits\Uuid;

/**
 * Class SPSigepeTipoOcorrenciaIngressoServicoPublico.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_sigep_tp_oco_ing_serv_pub')]
#[Gedmo\Loggable]
class SPSigepeTipoOcorrenciaIngressoServicoPublico implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use CodigoSigepe;
    use Nome;
    use SPTimestampable;
    use SPSoftdeleteable;

    public function __construct()
    {
        $this->setUuid();
    }
}
