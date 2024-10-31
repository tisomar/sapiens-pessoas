<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * FuncaoGratificada
 */
#[ORM\Table(name: 'FUNCAO_GRATIFICADA')]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class FuncaoGratificada implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_FUNCAO_GRATIFICADA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FUNCAO_GRATIFICADA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_FUNCAO_GRATIFICADA', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\Column(name: 'CD_FUNCAO_GRATIFICADA', type: 'string', length: 10, nullable: false, options: ['comment' => 'Especifica o código da função gratificada. Este campo foi migrado do sistema MENTORH e foi utilizado para o DE X PARA na migração do sistema.'])]
    protected string $codigo;

    #[ORM\Column(name: 'DS_FUNCAO_GRATIFICADA', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para as funçções gratificadas disponíveis no orgão AGU.'])]
    protected string $descricao;

    #[ORM\Column(name: 'NR_NIVEL_COMISSAO_NACIONAL', type: 'integer', nullable: true, options: ['comment' => 'Especificação numerica de identificação do nível de comissão nacional que a pessoa será enquadrada em caso de viagens.'])]
    protected ?int $nivelComissaoNacional;

    #[ORM\Column(name: 'NR_NIVEL_COMISSAO_INTERNAC', type: 'integer', nullable: true, options: ['comment' => 'Especificação numerica de identificação do nível de comissão internacional que a pessoa será enquadrada em caso de viagens.'])]
    protected ?int $nivelComissaoInternacional;

    #[ORM\Column(name: 'VL_REMUNERACAO', type: 'decimal', precision: 12, scale: 2, nullable: true, options: ['comment' => 'Valor da FUNCAO_GRATIFICADA.'])]
    protected ?float $remuneracao;

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

    public function getDescricao(): string
    {
        return $this->descricao;
    }

    public function setDescricao(string $descricao): void
    {
        $this->descricao = $descricao;
    }

    public function getNivelComissaoNacional(): ?int
    {
        return $this->nivelComissaoNacional;
    }

    public function setNivelComissaoNacional(?int $nivelComissaoNacional): void
    {
        $this->nivelComissaoNacional = $nivelComissaoNacional;
    }

    public function getNivelComissaoInternacional(): ?int
    {
        return $this->nivelComissaoInternacional;
    }

    public function setNivelComissaoInternacional(?int $nivelComissaoInternacional): void
    {
        $this->nivelComissaoInternacional = $nivelComissaoInternacional;
    }

    public function getRemuneracao(): ?float
    {
        return $this->remuneracao;
    }

    public function setRemuneracao(?float $remuneracao): void
    {
        $this->remuneracao = $remuneracao;
    }


}
