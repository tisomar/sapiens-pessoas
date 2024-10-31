<?php

declare(strict_types=1);
/**
 * /src/Entity/Traits/Timestampable.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
namespace AguPessoas\Backend\Entity\Traits;


use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * Trait Timestampable.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
trait Timestampable
{
    #[Gedmo\Timestampable(on: 'create')]
    #[ORM\Column(name: 'DT_OPERACAO_INCLUSAO', type: 'datetime', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de inclusão do registro. Retorna a data do sistema.'])]
    private ?DateTime $dataInclusao = null;

    #[Gedmo\Timestampable(on: 'update')]
    #[ORM\Column(name: 'DT_OPERACAO_ALTERACAO', type: 'datetime', nullable: false, options: ['default' => 'SYSDATE', 'comment' => 'Especifica a DATA da operação de alteração do registro. Retorna a data do sistema.'])]
    private ?DateTime $dataAlteracao = null;

    public function getDataInclusao(): ?DateTime
    {
        return $this->dataInclusao;
    }

    public function setDataInclusao(DateTime $dataInclusao): self
    {
        $this->dataInclusao = $dataInclusao;
        return $this;
    }

    public function getDataAlteracao(): ?DateTime
    {
        return $this->dataAlteracao;
    }

    public function setDataAlteracao(DateTime $dataAlteracao): self
    {
        $this->dataAlteracao = $dataAlteracao;
        return $this;
    }
}