<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * RegiaoJuridica
 */
#[ORM\Table(name: 'REGIAO_JURIDICA')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class RegiaoJuridica implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_REGIAO_JURIDICA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela REGIAO_JURIDICA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SEQ_REGIAO_JURIDICA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_REGIAO_JURIDICA', type: 'string', length: 10, nullable: false, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    protected string $codigo;

    #[ORM\Column(name: 'SG_REGIAO_JURIDICA', type: 'string', length: 10, nullable: false, options: ['comment' => 'Sigla ou nome abreviado para a região juridica subdivididas por uma definição logística da AGU.'])]
    protected string $sigla;

    #[ORM\Column(name: 'DS_REGIAO_JURIDICA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Nome completo para a região juridica subdivididas por uma definição logística da AGU.'])]
    protected string $descricao;

    #[ORM\Column(name: 'CD_UNID_REPRESENT_JUR', type: 'string', length: 4, nullable: true, options: ['comment' => 'Código interno de representação da unidade de distribuíção juridica da AGU.'])]
    protected ?string $codigoInterno = null;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getCodigo(): string
    {
        return $this->codigo;
    }

    public function setCodigo(string $codigo): void
    {
        $this->codigo = $codigo;
    }

    public function getSigla(): string
    {
        return $this->sigla;
    }

    public function setSigla(string $sigla): void
    {
        $this->sigla = $sigla;
    }

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getCodigoInterno(): ?string
    {
        return $this->codigoInterno;
    }

    public function setCodigoInterno(?string $codigoInterno): void
    {
        $this->codigoInterno = $codigoInterno;
    }

}
