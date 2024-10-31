<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/Blameable.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;

/**
 * Trait Blameable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Blameable
{
    #[ORM\Column(name: 'NR_CPF_OPERADOR', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica CPF do usuário responsável pela inclusão ou alteração do registro.'])]
    private string $cpfOperador;

    public function getCpfOperador(): string
    {
        return $this->cpfOperador;
    }

    public function setCpfOperador(string $cpfOperador): void
    {
        $this->cpfOperador = $cpfOperador;
    }
}