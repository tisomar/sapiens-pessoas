<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SigepeServidor;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use AguPessoas\Backend\Entity\Traits\Uuid;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Telefone
 */
#[ORM\Entity]
#[ORM\ChangeTrackingPolicy('DEFERRED_EXPLICIT')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_telefone')]
class SPTelefone implements EntityInterface
{
    use Id;
    use Uuid;
    // use Blameable;
    use SPTimestampable;
    use SPSoftdeleteable;
    use SigepeServidor;


    #[ORM\Column(name: 'ddd', type: 'string', length: 2, nullable: false, options: ['comment' => 'Número para a Discagem direta a distância (DDD), que é adotado para discagem interurbana através da inserção de prefixos regionais da localidade para onde a pessoa deseja ligar.'])]
    protected string $ddd;

    #[ORM\Column(name: 'numero', type: 'string', length: 30, nullable: false, options: ['comment' => 'Número de contato para o telefone cadastrado de acordo com o tipo de telefone.'])]
    protected string $numero;

    #[ORM\Column(name: 'observacao', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de telefones cadastrados para um servidor ou unidade da AGU.'])]
    protected ?string $observacao = null;

    #[ORM\Column(type: 'boolean', nullable: false)]
    protected bool $origemSigepe = false;

    #[ORM\JoinColumn(name: 'tipo_telefone_id', referencedColumnName: 'ID_TIPO_TELEFONE')]
    #[ORM\ManyToOne(targetEntity: 'TipoTelefone')]
    protected ?TipoTelefone $tipo = null;

    public function __construct()
    {
        $this->setUuid();
    }

    public function getDdd(): string
    {
        return $this->ddd;
    }

    public function setDdd(string $ddd): self
    {
        $this->ddd = $ddd;
        return $this;
    }

    public function getNumero(): string
    {
        return $this->numero;
    }

    public function setNumero(string $nrTelefone): self
    {
        $this->numero = $nrTelefone;
        return $this;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }


    public function setObservacao(?string $observacao): self
    {
        $this->observacao = $observacao;
        return $this;
    }

    public function getOrigemSigepe(): ?bool
    {
        return $this->origemSigepe;
    }


    public function setOrigemSigepe(?bool $origemSigepe): self
    {
        $this->origemSigepe = $origemSigepe;
        return $this;
    }

    public function getTipo(): ?TipoTelefone
    {
        return $this->tipo;
    }

    public function setTipo(?TipoTelefone $tipoTelefone): self
    {
        $this->tipo = $tipoTelefone;
        return $this;
    }

}
