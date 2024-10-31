<?php

namespace AguPessoas\Backend\Entity\Traits;

use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait Blameable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait CPFOperador
{
    #[ORM\Column(name: 'NR_CPF_OPERADOR', type: 'string', length: 11, nullable: false, options: ['fixed' => true, 'comment' => 'Especifica o número do CPF do operador que realizou a ultima operação do registro no sistema.'])]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    protected ?string $cpfOperador = '12300045699';

    public function getCpfOperador(): ?string
    {
        return $this->cpfOperador;
    }

    public function setCpfOperador(?string $cpf): self
    {
        $this->cpfOperador = $cpf;
        return $this;
    }
}