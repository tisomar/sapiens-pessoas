<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * LotacaoSituacaoRequisicao
 */
#[ORM\Table(name: 'LOTACAO_SITUACAO_REQUISICAO')]
#[ORM\Index(name: 'IDX_EC17C388601E1746', columns: ['ID_LOTACAO'])]
#[ORM\Index(name: 'IDX_EC17C3883DEAE3DE', columns: ['ID_SITUACAO_REQUISICAO'])]
#[ORM\Entity]
class LotacaoSituacaoRequisicao
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'ID_LOTACAO_SITUACAO_REQUISICAO', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que representa um registro na tabela LOTACAO_SITUACAO_REQUISICAO.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'LOTACAO_SITUACAO_REQUISICAO_ID', allocationSize: 1, initialValue: 1)]
    private $idLotacaoSituacaoRequisicao;

    /**
     * @var Lotacao
     */
    #[ORM\JoinColumn(name: 'ID_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    private $idLotacao;

    /**
     * @var SituacaoRequisicao
     */
    #[ORM\JoinColumn(name: 'ID_SITUACAO_REQUISICAO', referencedColumnName: 'ID_SITUACAO_REQUISICAO')]
    #[ORM\ManyToOne(targetEntity: 'SituacaoRequisicao')]
    private $idSituacaoRequisicao;

    /**
     * @return int
     */
    public function getIdLotacaoSituacaoRequisicao(): int
    {
        return $this->idLotacaoSituacaoRequisicao;
    }

    /**
     * @param int $idLotacaoSituacaoRequisicao
     */
    public function setIdLotacaoSituacaoRequisicao(int $idLotacaoSituacaoRequisicao): void
    {
        $this->idLotacaoSituacaoRequisicao = $idLotacaoSituacaoRequisicao;
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

    /**
     * @return SituacaoRequisicao
     */
    public function getIdSituacaoRequisicao(): SituacaoRequisicao
    {
        return $this->idSituacaoRequisicao;
    }

    /**
     * @param SituacaoRequisicao $idSituacaoRequisicao
     */
    public function setIdSituacaoRequisicao(SituacaoRequisicao $idSituacaoRequisicao): void
    {
        $this->idSituacaoRequisicao = $idSituacaoRequisicao;
    }


}
