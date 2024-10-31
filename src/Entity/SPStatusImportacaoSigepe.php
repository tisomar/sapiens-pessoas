<?php

declare(strict_types=1);
/**
 * /src/Entity/SPCor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\SigepeServidor;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
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
#[ORM\Table(name: 'sp_status_importacao_sigep')]
class SPStatusImportacaoSigepe implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use SigepeServidor;
    use SPTimestampable;

    #[ORM\JoinColumn(name: 'etapa_importacao_id', referencedColumnName: 'id')]
    #[ORM\ManyToOne(targetEntity: 'SPEtapaImportacaoSigepe')]
    protected ?SPEtapaImportacaoSigepe $etapaImportacao;

    public function __construct()
    {
        $this->setUuid();
    }

    public function getEtapaImportacao(): ?SPEtapaImportacaoSigepe
    {
        return $this->etapaImportacao;
    }

    public function setEtapaImportacao(?SPEtapaImportacaoSigepe $etapaImportacao): void
    {
        $this->etapaImportacao = $etapaImportacao;
    }

}
