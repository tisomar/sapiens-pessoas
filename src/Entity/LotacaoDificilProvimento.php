<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LotacaoDificilProvimento
 */
#[ORM\Table(name: 'LOTACAO_DIFICIL_PROVIMENTO')]
#[ORM\Index(name: 'IDX_89506890601E1746', columns: ['ID_LOTACAO'])]
#[ORM\Entity]
class LotacaoDificilProvimento
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOTACAO_DIFICIL_PROVIMENTO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial da tabela LOTACAO_DIFICIL_PROVIMENTO. Identifica unicamente um registro na tabela LOTACAO_DIFICIL_PROVIMENTO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOTACAO_DIFICIL_PROVIMENTO_ID_', allocationSize: 1, initialValue: 1)]
    private $idLotacaoDificilProvimento;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_INICIO', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de início da caracterização de determinada unidade como sendo de difícil provimento.'])]
    private $dtInicio;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_FIM', type: 'date', nullable: true, options: ['comment' => 'Especifica a data de fim da caracterização de determinada unidade como sendo de difícil provimento.'])]
    private $dtFim;

    /**
     * @var Lotacao
     */
    #[ORM\JoinColumn(name: 'ID_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    private $idLotacao;

    /**
     * @return int
     */
    public function getIdLotacaoDificilProvimento(): int
    {
        return $this->idLotacaoDificilProvimento;
    }

    /**
     * @param int $idLotacaoDificilProvimento
     */
    public function setIdLotacaoDificilProvimento(int $idLotacaoDificilProvimento): void
    {
        $this->idLotacaoDificilProvimento = $idLotacaoDificilProvimento;
    }

    /**
     * @return DateTime|null
     */
    public function getDtInicio(): ?\DateTime
    {
        return $this->dtInicio;
    }

    /**
     * @param DateTime|null $dtInicio
     */
    public function setDtInicio(?\DateTime $dtInicio): void
    {
        $this->dtInicio = $dtInicio;
    }

    /**
     * @return DateTime|null
     */
    public function getDtFim(): ?\DateTime
    {
        return $this->dtFim;
    }

    /**
     * @param DateTime|null $dtFim
     */
    public function setDtFim(?\DateTime $dtFim): void
    {
        $this->dtFim = $dtFim;
    }

    /**
     * @return Lotacao
     */
    public function getIdLotacao(): Lotacao
    {
        return $this->idLotacao;
    }

    /**
     * @param Lotacao $idLotacao
     */
    public function setIdLotacao(Lotacao $idLotacao): void
    {
        $this->idLotacao = $idLotacao;
    }


}
