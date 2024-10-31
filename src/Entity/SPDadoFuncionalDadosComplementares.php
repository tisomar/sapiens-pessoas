<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Traits\Blameable;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Validator\Constraints as AppAssert;
use Symfony\Component\Validator\Constraints as Assert;

use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
//use DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * SPDadoFuncionalDadosComplementares
 */
#[ORM\Entity]
#[ORM\Table(name: 'sp_dado_funcional_dados_compl')]
#[UniqueEntity(fields: ['sigepeServidor'], message: 'Dados do SigepeServidor já cadastrado!')]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[Gedmo\Loggable]
class SPDadoFuncionalDadosComplementares implements EntityInterface
{
    use Id;
    use Uuid;
    use SPTimestampable;
    use SPSoftdeleteable;
    //use Blameable;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\OneToOne(targetEntity: 'SPSigepeServidor', inversedBy: 'dadoFuncionalComplementar')]
    #[ORM\JoinColumn(name: 'sigepe_servidor_id', referencedColumnName: 'id', nullable: false)]
    protected SPSigepeServidor $sigepeServidor;

    #[ORM\ManyToOne(targetEntity: 'RescisaoRais')]
    #[ORM\JoinColumn(name: 'rescisao_rais_id', referencedColumnName: 'ID_RESCISAO_RAIS', nullable: true)]
    protected ?RescisaoRais $rescisaoRais = null;

    #[ORM\ManyToOne(targetEntity: 'SituacaoRais')]
    #[ORM\JoinColumn(name: 'situacao_rais_id', referencedColumnName: 'ID_SITUACAO_RAIS', nullable: true)]
    protected ?SituacaoRais $situacaoRais = null;

    #[ORM\ManyToOne(targetEntity: 'VinculoRais')]
    #[ORM\JoinColumn(name: 'vinculo_rais_id', referencedColumnName: 'ID_VINCULO_RAIS', nullable: true)]
    protected ?VinculoRais $vinculoRais = null;

    #[ORM\ManyToOne(targetEntity: 'TipoAdmissao')]
    #[ORM\JoinColumn(name: 'tipo_admissao_id', referencedColumnName: 'ID_TIPO_ADMISSAO', nullable: true)]
    protected ?TipoAdmissao $tipoAdmissao = null;

    #[ORM\ManyToOne(targetEntity: 'TipoSalario')]
    #[ORM\JoinColumn(name: 'tipo_salario_id', referencedColumnName: 'ID_TIPO_SALARIO', nullable: true)]
    protected ?TipoSalario $tipoSalario = null;

    #[ORM\ManyToOne(targetEntity: 'AreaAtuacao')]
    #[ORM\JoinColumn(name: 'area_atuacao_id', referencedColumnName: 'ID_AREA_ATUACAO', nullable: true)]
    protected ?AreaAtuacao $areaAtuacao = null;

    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    #[ORM\JoinColumn(name: 'lotacao_origem_id', referencedColumnName: 'ID_LOTACAO', nullable: true)]
    protected ?Lotacao $lotacaoOrigem = null;

    #[ORM\ManyToOne(targetEntity: 'Lotacao')]
    #[ORM\JoinColumn(name: 'lotacao_exercicio_id', referencedColumnName: 'ID_LOTACAO', nullable: true)]
    protected ?Lotacao $lotacaoExercicio = null;

    #[ORM\Column(name: 'data_rescisao', type: 'date', nullable: true)]
    protected ?DateTime $dataRescisao = null;


    public function __construct()
    {
        $this->setUuid();
    }

    /**
     * @return SPSigepeServidor
     */
    public function getSigepeServidor(): SPSigepeServidor
    {
        return $this->sigepeServidor;
    }

    /**
     * @param SPSigepeServidor $sigepeServidor
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setSigepeServidor(SPSigepeServidor $sigepeServidor): SPDadoFuncionalDadosComplementares
    {
        $this->sigepeServidor = $sigepeServidor;
        return $this;
    }

    /**
     * @return RescisaoRais|null
     */
    public function getRescisaoRais(): ?RescisaoRais
    {
        return $this->rescisaoRais;
    }

    /**
     * @param RescisaoRais|null $rescisaoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setRescisaoRais(?RescisaoRais $rescisaoRais): SPDadoFuncionalDadosComplementares
    {
        $this->rescisaoRais = $rescisaoRais;
        return $this;
    }

    /**
     * @return SituacaoRais|null
     */
    public function getSituacaoRais(): ?SituacaoRais
    {
        return $this->situacaoRais;
    }

    /**
     * @param SituacaoRais|null $situacaoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setSituacaoRais(?SituacaoRais $situacaoRais): SPDadoFuncionalDadosComplementares
    {
        $this->situacaoRais = $situacaoRais;
        return $this;
    }

    /**
     * @return VinculoRais|null
     */
    public function getVinculoRais(): ?VinculoRais
    {
        return $this->vinculoRais;
    }

    /**
     * @param VinculoRais|null $vinculoRais
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setVinculoRais(?VinculoRais $vinculoRais): SPDadoFuncionalDadosComplementares
    {
        $this->vinculoRais = $vinculoRais;
        return $this;
    }

    /**
     * @return TipoAdmissao|null
     */
    public function getTipoAdmissao(): ?TipoAdmissao
    {
        return $this->tipoAdmissao;
    }

    /**
     * @param TipoAdmissao|null $tipoAdmissao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setTipoAdmissao(?TipoAdmissao $tipoAdmissao): SPDadoFuncionalDadosComplementares
    {
        $this->tipoAdmissao = $tipoAdmissao;
        return $this;
    }

    /**
     * @return TipoSalario|null
     */
    public function getTipoSalario(): ?TipoSalario
    {
        return $this->tipoSalario;
    }

    /**
     * @param TipoSalario|null $tipoSalario
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setTipoSalario(?TipoSalario $tipoSalario): SPDadoFuncionalDadosComplementares
    {
        $this->tipoSalario = $tipoSalario;
        return $this;
    }

    /**
     * @return AreaAtuacao|null
     */
    public function getAreaAtuacao(): ?AreaAtuacao
    {
        return $this->areaAtuacao;
    }

    /**
     * @param AreaAtuacao|null $areaAtuacao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setAreaAtuacao(?AreaAtuacao $areaAtuacao): SPDadoFuncionalDadosComplementares
    {
        $this->areaAtuacao = $areaAtuacao;
        return $this;
    }

    /**
     * @return Lotacao|null
     */
    public function getLotacaoOrigem(): ?Lotacao
    {
        return $this->lotacaoOrigem;
    }

    /**
     * @param Lotacao|null $lotacaoOrigem
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setLotacaoOrigem(?Lotacao $lotacaoOrigem): SPDadoFuncionalDadosComplementares
    {
        $this->lotacaoOrigem = $lotacaoOrigem;
        return $this;
    }

    /**
     * @return Lotacao|null
     */
    public function getLotacaoExercicio(): ?Lotacao
    {
        return $this->lotacaoExercicio;
    }

    /**
     * @param Lotacao|null $lotacaoExercicio
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setLotacaoExercicio(?Lotacao $lotacaoExercicio): SPDadoFuncionalDadosComplementares
    {
        $this->lotacaoExercicio = $lotacaoExercicio;
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataRescisao(): ?DateTime
    {
        return $this->dataRescisao;
    }

    /**
     * @param DateTime|null $dataRescisao
     * @return SPDadoFuncionalDadosComplementares
     */
    public function setDataRescisao(?DateTime $dataRescisao): SPDadoFuncionalDadosComplementares
    {
        $this->dataRescisao = $dataRescisao;
        return $this;
    }


}
