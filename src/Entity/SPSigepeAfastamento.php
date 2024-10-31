<?php

declare(strict_types=1);
/**
 * /src/Entity/SPCor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Uuid;

use DateTime;
use Symfony\Component\Validator\Constraints as Assert;
use Gedmo\Mapping\Annotation as Gedmo;
use Doctrine\ORM\Mapping as ORM;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class SPSigepeTipoDiplomaAfastamento.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_sigepe_afastamento')]
#[Gedmo\Loggable]
class SPSigepeAfastamento implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeServidor')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeServidor $sigepeServidor = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $hash = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} digitos')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[ORM\Column(type: 'string', nullable: true)]
    protected ?string $matricula = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoDiplomaAfastamento')]
    #[ORM\JoinColumn(name: 'tipo_diploma_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoDiplomaAfastamento $tipoDiploma = null;

    #[ORM\ManyToOne(targetEntity: 'SPSigepeTipoOcorrenciaAfastamento')]
    #[ORM\JoinColumn(name: 'tipo_ocorrencia_id', referencedColumnName: 'id', nullable: true)]
    protected ?SPSigepeTipoOcorrenciaAfastamento $tipo = null;


    #[ORM\Column(name: 'data_inicio', type: 'date', nullable: true)]
    protected ?DateTime $dataInicio = null;

    #[ORM\Column(name: 'data_fim', type: 'date', nullable: true)]
    protected ?DateTime $dataFim = null;


    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return SPSigepeServidor|null
     */
    public function getSigepeServidor(): ?SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    /**
     * @param SPSigepeServidor|null $sigepeServidor
     * @return SPSigepeAfastamento
     */
    public function setSigepeServidor(?SPSigepeServidor $sigepeServidor): SPSigepeAfastamento
    {
        $this->sigepeServidor = $sigepeServidor;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getHash(): ?string
    {
        return $this->hash;
    }

    /**
     * @param string|null $hash
     * @return SPSigepeAfastamento
     */
    public function setHash(?string $hash): SPSigepeAfastamento
    {
        $this->hash = $hash;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeAfastamento
     */
    public function setMatricula(?string $matricula): SPSigepeAfastamento
    {
        $this->matricula = $matricula;
        return $this;
    }

    /**
     * @return SPSigepeTipoDiplomaAfastamento|null
     */
    public function getTipoDiploma(): ?SPSigepeTipoDiplomaAfastamento
    {
        return $this->tipoDiploma;
    }

    /**
     * @param SPSigepeTipoDiplomaAfastamento|null $tipoDiploma
     * @return SPSigepeAfastamento
     */
    public function setTipoDiploma(?SPSigepeTipoDiplomaAfastamento $tipoDiploma): SPSigepeAfastamento
    {
        $this->tipoDiploma = $tipoDiploma;
        return $this;
    }

    /**
     * @return SPSigepeTipoOcorrenciaAfastamento|null
     */
    public function getTipo(): ?SPSigepeTipoOcorrenciaAfastamento
    {
        return $this->tipo;
    }

    /**
     * @param SPSigepeTipoOcorrenciaAfastamento|null $tipo
     * @return SPSigepeAfastamento
     */
    public function setTipo(?SPSigepeTipoOcorrenciaAfastamento $tipo): SPSigepeAfastamento
    {
        $this->tipo = $tipo;
        return $this;
    }


    /**
     * @return DateTime|null
     */
    public function getDataInicio(): ?DateTime
    {
        return $this->dataInicio;
    }

    /**
     * @param DateTime|null $dataInicio
     * @return SPSigepeAfastamento
     */
    public function setDataInicio(?DateTime $dataInicio): SPSigepeAfastamento
    {
        $this->dataInicio = $dataInicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFim(): ?DateTime
    {
        return $this->dataFim;
    }

    /**
     * @param DateTime|null $dataFim
     * @return SPSigepeAfastamento
     */
    public function setDataFim(?DateTime $dataFim): SPSigepeAfastamento
    {
        $this->dataFim = $dataFim;
        return $this;
    }


}
