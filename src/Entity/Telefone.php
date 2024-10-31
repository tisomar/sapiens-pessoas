<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Telefone
 */
#[ORM\Table(name: 'TELEFONE')]
#[ORM\Index(name: 'ix_telefone_servidor', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_E7017F2DBF9E3E3', columns: ['ID_PAIS'])]
#[ORM\Index(name: 'IDX_E7017F2D7298AD68', columns: ['ID_TIPO_TELEFONE'])]
#[ORM\UniqueConstraint(name: 'uk_telefone', columns: ['ID_SERVIDOR', 'ID_TIPO_TELEFONE', 'NR_DDD', 'NR_TELEFONE', 'DT_OPERACAO_EXCLUSAO'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class Telefone implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_TELEFONE', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela TELEFONE.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_TELEFONE', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'NR_DDD', type: 'string', length: 2, nullable: false, options: ['comment' => 'Número para a Discagem direta a distância (DDD), que é adotado para discagem interurbana através da inserção de prefixos regionais da localidade para onde a pessoa deseja ligar.'])]
    protected ?string $ddd = null;

    #[ORM\Column(name: 'NR_TELEFONE', type: 'string', length: 30, nullable: false, options: ['comment' => 'Número de contato para o telefone cadastrado de acordo com o tipo de telefone.'])]
    protected ?string $numero = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro de telefones cadastrados para um servidor ou unidade da AGU.'])]
    protected ?string $observacao = null;

    /**
     * @var Pais
     */
    #[ORM\JoinColumn(name: 'ID_PAIS', referencedColumnName: 'ID_PAIS')]
    #[ORM\ManyToOne(targetEntity: 'Pais')]
    protected ?Pais $pais;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    #[ORM\JoinColumn(name: 'ID_TIPO_TELEFONE', referencedColumnName: 'ID_TIPO_TELEFONE')]
    #[ORM\ManyToOne(targetEntity: 'TipoTelefone')]
    protected ?TipoTelefone $tipoTelefone;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getDdd(): ?string
    {
        return $this->ddd;
    }

    public function setDdd(?string $ddd): void
    {
        $this->ddd = $ddd;
    }

    public function getNumero(): ?string
    {
        return $this->numero;
    }

    public function setNumero(?string $nrTelefone): void
    {
        $this->numero = $nrTelefone;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }


    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    /**
     * @return Pais
     */
    public function getPais(): ?Pais
    {
        return $this->pais;
    }

    /**
     * @param Pais $pais
     */
    public function setPais(?Pais $pais): void
    {
        $this->pais = $pais;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }

    public function getTipoTelefone(): TipoTelefone
    {
        return $this->tipoTelefone;
    }

    public function setTipoTelefone(TipoTelefone $tipoTelefone): void
    {
        $this->tipoTelefone = $tipoTelefone;
    }


}
