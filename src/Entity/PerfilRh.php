<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * PerfilRh
 */
#[ORM\Table(name: 'PERFIL_RH')]
#[ORM\Index(name: 'IDX_8B26CAFA10DD9DB6', columns: ['ID_RH'])]
#[ORM\Entity]
class PerfilRh
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_PERFIL', type: 'integer', nullable: false, options: ['comment' => 'Identificador do PERFIL (do AGU_ACESSO) na qual o perfil especificado é vinculado a um RH específico'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    private $idPerfil;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'NONE')]
    #[ORM\OneToOne(targetEntity: 'Rh')]
    private $idRh;

    /**
     * @return int
     */
    public function getIdPerfil(): int
    {
        return $this->idPerfil;
    }

    /**
     * @param int $idPerfil
     */
    public function setIdPerfil(int $idPerfil): void
    {
        $this->idPerfil = $idPerfil;
    }

    /**
     * @return Rh
     */
    public function getIdRh(): Rh
    {
        return $this->idRh;
    }

    /**
     * @param Rh $idRh
     */
    public function setIdRh(Rh $idRh): void
    {
        $this->idRh = $idRh;
    }


}
