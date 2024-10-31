<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * FeriasParametro
 */
#[ORM\Table(name: 'FERIAS_PARAMETRO')]
#[ORM\Entity]
class FeriasParametro implements EntityInterface
{

    use Timeblameable;
    use CPFOperador;
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_FERIAS_PARAMETRO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela FERIAS_PARAMETRO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'FERIAS_PARAMETRO_ID_FERIAS_PAR', allocationSize: 1, initialValue: 1)]
    private $id;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'CD_FERIAS_PARAMETRO', type: 'string', length: 10, nullable: true, options: ['comment' => 'Código de identificação do registro nativo do sistema MENTORH (Banco Caché). Este campo foi utilizado na migração como DE X PARA.'])]
    private $codigoFeriasParametro;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_FERIAS_PARAMETRO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o noma dado ao parâmetro no qual se enquadra a concessão das férias do servidor público.'])]
    private $descricaoFeriasParametro;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_FERIAS_QTD_DIAS', type: 'string', length: 3, nullable: true, options: ['comment' => 'Especificação descritiva para a quantidade em dias para o gozo de férias de acordo com cada parâmetro de férias.'])]
    private $descricaoFeriasQuantidadeDias;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getCodigoFeriasParametro(): ?string
    {
        return $this->codigoFeriasParametro;
    }

    /**
     * @param string|null $codigoFeriasParametro
     */
    public function setCodigoFeriasParametro(?string $codigoFeriasParametro): void
    {
        $this->codigoFeriasParametro = $codigoFeriasParametro;
    }

    /**
     * @return string
     */
    public function getDescricaoFeriasParametro(): string
    {
        return $this->descricaoFeriasParametro;
    }

    /**
     * @param string $descricaoFeriasParametro
     */
    public function setDescricaoFeriasParametro(string $descricaoFeriasParametro): void
    {
        $this->descricaoFeriasParametro = $descricaoFeriasParametro;
    }

    /**
     * @return string|null
     */
    public function getDescricaoFeriasQuantidadeDias(): ?string
    {
        return $this->descricaoFeriasQuantidadeDias;
    }

    /**
     * @param string|null $descricaoFeriasQuantidadeDias
     */
    public function setDescricaoFeriasQuantidadeDias(?string $descricaoFeriasQuantidadeDias): void
    {
        $this->descricaoFeriasQuantidadeDias = $descricaoFeriasQuantidadeDias;
    }

}
