<?php

declare(strict_types=1);
/**
 * /src/Entity/SPTipoCertidao.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CodigoSigepe;
use AguPessoas\Backend\Entity\Traits\Descricao;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Nome;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SPTipoCertidao.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_tipo_certidao')]
#[Gedmo\Loggable]
class SPTipoCertidao implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use Nome;
    use Descricao;
    use SPTimestampable;
    use SPSoftdeleteable;

    #[ORM\Column(name: 'ativo', type: 'boolean', nullable: false)]
    protected bool $ativo = true;

    #[ORM\Column(name: 'requer_nup', type: 'boolean', nullable: false)]
    protected bool $requerNup = true;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return bool
     */
    public function isAtivo(): bool
    {
        return $this->ativo;
    }

    /**
     * @param bool $ativo
     * @return SPTipoCertidao
     */
    public function setAtivo(bool $ativo): SPTipoCertidao
    {
        $this->ativo = $ativo;
        return $this;
    }

    /**
     * @return bool
     */
    public function isRequerNup(): bool
    {
        return $this->requerNup;
    }

    /**
     * @param bool $requerNup
     * @return SPTipoCertidao
     */
    public function setRequerNup(bool $requerNup): SPTipoCertidao
    {
        $this->requerNup = $requerNup;
        return $this;
    }
}
