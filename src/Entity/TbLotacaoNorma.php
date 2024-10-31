<?php

namespace AguPessoas\Backend\Entity;

use DateTime;

use Doctrine\ORM\Mapping as ORM;

/**
 * TbLotacaoNorma
 */
#[ORM\Table(name: 'TB_LOTACAO_NORMA')]
#[ORM\Index(name: 'IDX_7DDDEE08773C878F', columns: ['CD_LOTACAO'])]
#[ORM\Index(name: 'IDX_7DDDEE08188BD380', columns: ['CD_NORMA_ODS'])]
#[ORM\Index(name: 'IDX_7DDDEE089033A49C', columns: ['CD_NORMA_UDP'])]
#[ORM\Entity]
class TbLotacaoNorma
{
    /**
     * @var int
     */
    #[ORM\Column(name: 'CD_LOTACAO_NORMA', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica o registro da table LOTACAO_NORMA.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'SEQUENCE')]
    #[ORM\SequenceGenerator(sequenceName: 'TB_LOTACAO_NORMA_CD_LOTACAO_NO', allocationSize: 1, initialValue: 1)]
    private $cdLotacaoNorma;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_TIPO_NORMA_UDP', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador que especifica se o tipo da norma UDP é de início (I) ou fim (F).'])]
    private $inTipoNormaUdp;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'IN_TIPO_NORMA_ODS', type: 'string', length: 1, nullable: true, options: ['fixed' => true, 'comment' => 'Identificador que especifica se o tipo da norma ODS é de início (I) ou fim (F).'])]
    private $inTipoNormaOds;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_NORMA', type: 'string', length: 500, nullable: true, options: ['comment' => 'Descrição da norma incluida para a lotação.'])]
    private $dsNorma;

    /**
     * @var DateTime|null
     */
    #[ORM\Column(name: 'DT_UDP', type: 'date', nullable: true, options: ['comment' => 'Especifica a data onde a unidade começa ou deixa de ser de difícil provimento.'])]
    private $dtUdp;

    /**
     * @var string|null
     */
    #[ORM\Column(name: 'DS_PUBLICACAO', type: 'string', length: 500, nullable: true, options: ['comment' => 'Descrição da publicação incluida para a norma.'])]
    private $dsPublicacao;

    /**
     * @var Lotacao
     */
    #[ORM\JoinColumn(name: 'CD_LOTACAO', referencedColumnName: 'ID_LOTACAO')]
    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    private $cdLotacao;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'CD_NORMA_ODS', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $cdNormaOds;

    /**
     * @var Norma
     */
    #[ORM\JoinColumn(name: 'CD_NORMA_UDP', referencedColumnName: 'ID_NORMA')]
    #[ORM\ManyToOne(targetEntity: 'Norma')]
    private $cdNormaUdp;

    /**
     * @return int
     */
    public function getCdLotacaoNorma(): int
    {
        return $this->cdLotacaoNorma;
    }

    /**
     * @param int $cdLotacaoNorma
     */
    public function setCdLotacaoNorma(int $cdLotacaoNorma): void
    {
        $this->cdLotacaoNorma = $cdLotacaoNorma;
    }

    /**
     * @return string|null
     */
    public function getInTipoNormaUdp(): ?string
    {
        return $this->inTipoNormaUdp;
    }

    /**
     * @param string|null $inTipoNormaUdp
     */
    public function setInTipoNormaUdp(?string $inTipoNormaUdp): void
    {
        $this->inTipoNormaUdp = $inTipoNormaUdp;
    }

    /**
     * @return string|null
     */
    public function getInTipoNormaOds(): ?string
    {
        return $this->inTipoNormaOds;
    }

    /**
     * @param string|null $inTipoNormaOds
     */
    public function setInTipoNormaOds(?string $inTipoNormaOds): void
    {
        $this->inTipoNormaOds = $inTipoNormaOds;
    }

    /**
     * @return string|null
     */
    public function getDsNorma(): ?string
    {
        return $this->dsNorma;
    }

    /**
     * @param string|null $dsNorma
     */
    public function setDsNorma(?string $dsNorma): void
    {
        $this->dsNorma = $dsNorma;
    }

    /**
     * @return DateTime|null
     */
    public function getDtUdp(): ?\DateTime
    {
        return $this->dtUdp;
    }

    /**
     * @param DateTime|null $dtUdp
     */
    public function setDtUdp(?\DateTime $dtUdp): void
    {
        $this->dtUdp = $dtUdp;
    }

    /**
     * @return string|null
     */
    public function getDsPublicacao(): ?string
    {
        return $this->dsPublicacao;
    }

    /**
     * @param string|null $dsPublicacao
     */
    public function setDsPublicacao(?string $dsPublicacao): void
    {
        $this->dsPublicacao = $dsPublicacao;
    }

    /**
     * @return Lotacao
     */
    public function getCdLotacao(): Lotacao
    {
        return $this->cdLotacao;
    }

    /**
     * @param Lotacao $cdLotacao
     */
    public function setCdLotacao(Lotacao $cdLotacao): void
    {
        $this->cdLotacao = $cdLotacao;
    }

    /**
     * @return Norma
     */
    public function getCdNormaOds(): Norma
    {
        return $this->cdNormaOds;
    }

    /**
     * @param Norma $cdNormaOds
     */
    public function setCdNormaOds(Norma $cdNormaOds): void
    {
        $this->cdNormaOds = $cdNormaOds;
    }

    /**
     * @return Norma
     */
    public function getCdNormaUdp(): Norma
    {
        return $this->cdNormaUdp;
    }

    /**
     * @param Norma $cdNormaUdp
     */
    public function setCdNormaUdp(Norma $cdNormaUdp): void
    {
        $this->cdNormaUdp = $cdNormaUdp;
    }


}
