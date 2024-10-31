<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbUnidRelNominal
 */
#[ORM\Table(name: 'TB_UNID_REL_NOMINAL')]
#[ORM\Entity]
class TbUnidRelNominal
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_UNID_REL_NOMINAL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único de relações nominais.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_UNID_REL_NOMINAL_ID_UNID_RE', allocationSize: 1, initialValue: 1)]
    private $idUnidRelNominal;

    /**
     * @var string
     */
    #[ORM\Column(name: 'CD_LOTACAO', type: 'string', length: 20, nullable: false, options: ['comment' => 'Código SIAPE que é dado a uma unidade (Lotação) quando criada através de leí. O Sistema Integrado de Administração Financeira do Governo Federal que controla todos os servidores que ingressaram no regime jurídico estatutário federal estabelecido pela Lei n.º 8.112, de 11 de dezembro de 1990, que liga os servidores públicos civis da União, das autarquias e das fundações públicas federais com a administração pública federal no Brasil, estabelecendo seus direitos e deveres.'])]
    private $cdLotacao;

    /**
     * @var string
     */
    #[ORM\Column(name: 'DS_UF', type: 'string', length: 100, nullable: false, options: ['comment' => 'Especifica a descrição da UF selecionada.'])]
    private $dsUf;

    /**
     * @return int
     */
    public function getIdUnidRelNominal(): int
    {
        return $this->idUnidRelNominal;
    }

    /**
     * @param int $idUnidRelNominal
     */
    public function setIdUnidRelNominal(int $idUnidRelNominal): void
    {
        $this->idUnidRelNominal = $idUnidRelNominal;
    }

    /**
     * @return string
     */
    public function getCdLotacao(): string
    {
        return $this->cdLotacao;
    }

    /**
     * @param string $cdLotacao
     */
    public function setCdLotacao(string $cdLotacao): void
    {
        $this->cdLotacao = $cdLotacao;
    }

    /**
     * @return string
     */
    public function getDsUf(): string
    {
        return $this->dsUf;
    }

    /**
     * @param string $dsUf
     */
    public function setDsUf(string $dsUf): void
    {
        $this->dsUf = $dsUf;
    }


}
