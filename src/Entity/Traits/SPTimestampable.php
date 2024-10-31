<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/SGTimestampable.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
namespace AguPessoas\Backend\Entity\Traits;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Trait SPTimestampable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait SPTimestampable
{
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'criado_em', type: 'datetime', nullable: true)]
    protected ?DateTime $criadoEm = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(name: 'atualizado_em', type: 'datetime', nullable: true)]
    protected ?DateTime $atualizadoEm = null;

    public function setCriadoEm(DateTime $criadoEm): self
    {
        $this->criadoEm = $criadoEm;

        return $this;
    }

    public function getCriadoEm(): ?DateTime
    {
        return $this->criadoEm;
    }

    public function setAtualizadoEm(DateTime $atualizadoEm): self
    {
        $this->atualizadoEm = $atualizadoEm;

        return $this;
    }

    public function getAtualizadoEm(): ?DateTime
    {
        return $this->atualizadoEm;
    }
}