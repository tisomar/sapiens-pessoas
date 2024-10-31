<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * ClassificacaoTipoAfastamento
 */
#[ORM\Table(name: 'CLASSIFICACAO_TIPO_AFASTAMENTO')]
#[ORM\Entity]
class ClassificacaoTipoAfastamento
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_CLASS_TIPO_AFASTAMENTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela CLASSIFICACAO_TIPO_AFASTAMENTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'CLASSIFICACAO_TIPO_AFASTAMENTO', allocationSize: 1, initialValue: 1)]
    private $idClassTipoAfastamento;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_CLASS_TIPO_AFASTAMENTO', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especificação descritiva para o nome dado as classificações para um grupo de tipos de afastamentos.'])]
    private $dsClassTipoAfastamento;

    /**
     * @return int
     */
    public function getIdClassTipoAfastamento(): int
    {
        return $this->idClassTipoAfastamento;
    }

    /**
     * @param int $idClassTipoAfastamento
     */
    public function setIdClassTipoAfastamento(int $idClassTipoAfastamento): void
    {
        $this->idClassTipoAfastamento = $idClassTipoAfastamento;
    }

    /**
     * @return string
     */
    public function getDsClassTipoAfastamento(): string
    {
        return $this->dsClassTipoAfastamento;
    }

    /**
     * @param string $dsClassTipoAfastamento
     */
    public function setDsClassTipoAfastamento(string $dsClassTipoAfastamento): void
    {
        $this->dsClassTipoAfastamento = $dsClassTipoAfastamento;
    }


}
