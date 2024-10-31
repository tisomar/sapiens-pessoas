<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tb#41799Migracao08112011
 *
 * @ORM\Table(name="TB_#41799_MIGRACAO_08112011")
 * @ORM\Entity
 */
class Tb#41799Migracao08112011
{
    /**
     * @var string|null
     *
     * @ORM\Column(name="MATRICULA", type="string", length=15, nullable=true)
     */
    private $matricula;

    /**
     * @var string|null
     *
     * @ORM\Column(name="NOME", type="string", length=150, nullable=true)
     */
    private $nome;

    /**
     * @var DateTime|null
     *
     * @ORM\Column(name="DT_INGRESSO_SERVICO_PUBLICO", type="date", nullable=true)
     */
    private $dtIngressoServicoPublico;

    /**
     * @var int
     *
     * @ORM\Column(name="ID_TABLE", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="SEQUENCE")
     * @ORM\SequenceGenerator(sequenceName="TB_#41799_MIGRACAO_08112011_ID", allocationSize=1, initialValue=1)
     */
    private $idTable;


}
