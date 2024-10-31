<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/Nome.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity\Traits;

use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Trait Nome.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Nome
{
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    #[ORM\Column(name: 'NOME', type: 'string', length: 255, nullable: false, options: ['fixed' => true, 'comment' => 'Nome do tipo da certidão.'])]
    protected string $nome = '';

    public function setNome(string $nome): self
    {
        $this->nome = $nome;

        return $this;
    }

    public function getNome(): string
    {
        return $this->nome;
    }
}
