<?php

declare(strict_types=1);
/**
 * /src/Entity/SPSigepeTipoDiplomaAfastamento.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CodigoSigepe;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Nome;
use AguPessoas\Backend\Entity\Traits\Uuid;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Class SPSigepeTipoDiplomaAfastamento.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'SP_SIGEPE_TIPO_DIPLOMA_AFASTA ')]
#[Gedmo\Loggable]
class SPSigepeTipoDiplomaAfastamento implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use CodigoSigepe;
    use Nome;
    use SPTimestampable;
    use SPSoftdeleteable;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $numeroDiploma = null;

    #[ORM\Column(name: 'data_publicacao', type: 'date', nullable: true)]
    protected ?DateTime $dataPublicacao = null;

    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return string|null
     */
    public function getNumeroDiploma(): ?string
    {
        return $this->numeroDiploma;
    }

    /**
     * @param string|null $numeroDiploma
     * @return SPSigepeTipoDiplomaAfastamento
     */
    public function setNumeroDiploma(?string $numeroDiploma): SPSigepeTipoDiplomaAfastamento
    {
        $this->numeroDiploma = $numeroDiploma;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataPublicacao(): ?DateTime
    {
        return $this->dataPublicacao;
    }

    /**
     * @param DateTime|null $dataPublicacao
     * @return SPSigepeTipoDiplomaAfastamento
     */
    public function setDataPublicacao(?DateTime $dataPublicacao): SPSigepeTipoDiplomaAfastamento
    {
        $this->dataPublicacao = $dataPublicacao;
        return $this;
    }
}
