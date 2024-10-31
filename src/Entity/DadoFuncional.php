<?php

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CPFOperador;
use AguPessoas\Backend\Entity\Traits\Softdeleteable;
use AguPessoas\Backend\Entity\Traits\Timeblameable;
use DateTime;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * DadoFuncional
 */
#[ORM\Table(name: 'DADO_FUNCIONAL')]
#[ORM\Index(name: 'ix_dado_func_cd_mat_siape', columns: ['CD_MATRICULA_SIAPE'])]
#[ORM\Index(name: 'IDX_8051A5CF70380AF8', columns: ['ID_AREA_ATUACAO'])]
#[ORM\Index(name: 'IDX_8051A5CF80E238B0', columns: ['ID_REGIME_JURIDICO'])]
#[ORM\Index(name: 'IDX_8051A5CFB74D9C93', columns: ['ID_RESCISAO_RAIS'])]
#[ORM\Index(name: 'IDX_8051A5CF10DD9DB6', columns: ['ID_RH'])]
#[ORM\Index(name: 'IDX_8051A5CFA4BCD32E', columns: ['ID_SERVIDOR'])]
#[ORM\Index(name: 'IDX_8051A5CFAB397F88', columns: ['ID_SITUACAO_RAIS'])]
#[ORM\Index(name: 'IDX_8051A5CFFBAEAF5F', columns: ['ID_TIPO_ADMISSAO'])]
#[ORM\Index(name: 'IDX_8051A5CF7B86EAD6', columns: ['ID_TIPO_SALARIO'])]
#[ORM\Index(name: 'IDX_8051A5CF1D3FF3DC', columns: ['ID_VINCULO_RAIS'])]
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'dataExclusao')]
class DadoFuncional implements EntityInterface
{
    use Softdeleteable;
    use Timeblameable;
    use CPFOperador;

    #[ORM\Column(name: 'ID_DADO_FUNCIONAL', type: 'integer', nullable: false, options: ['comment' => 'Identificador sequencial e único que especifica um registro na tabela DADO_FUNCIONAL.'])]
    #[ORM\Id]
    #[ORM\GeneratedValue(strategy: 'AUTO')]
    #[ORM\SequenceGenerator(sequenceName: 'SQ_DADO_FUNCIONAL', allocationSize: 1, initialValue: 1)]
    protected int $id;

    #[ORM\JoinColumn(name: 'ID_RESCISAO_RAIS', referencedColumnName: 'ID_RESCISAO_RAIS')]
    #[ORM\ManyToOne(targetEntity: 'RescisaoRais')]
    protected ?RescisaoRais $rescisaoRais;

    #[ORM\JoinColumn(name: 'ID_TIPO_ADMISSAO', referencedColumnName: 'ID_TIPO_ADMISSAO')]
    #[ORM\ManyToOne(targetEntity: 'TipoAdmissao')]
    protected ?TipoAdmissao $tipoAdmissao;

    #[ORM\JoinColumn(name: 'ID_SITUACAO_RAIS', referencedColumnName: 'ID_SITUACAO_RAIS')]
    #[ORM\ManyToOne(targetEntity: 'SituacaoRais')]
    protected ?SituacaoRais $situacaoRais;

    #[ORM\JoinColumn(name: 'ID_TIPO_SALARIO', referencedColumnName: 'ID_TIPO_SALARIO')]
    #[ORM\ManyToOne(targetEntity: 'TipoSalario')]
    protected ?TipoSalario $tipoSalario;

    #[ORM\JoinColumn(name: 'ID_VINCULO_RAIS', referencedColumnName: 'ID_VINCULO_RAIS')]
    #[ORM\ManyToOne(targetEntity: 'VinculoRais')]
    protected ?VinculoRais $vinculoRais;

    #[ORM\JoinColumn(name: 'ID_REGIME_JURIDICO', referencedColumnName: 'ID_REGIME_JURIDICO')]
    #[ORM\ManyToOne(targetEntity: 'RegimeJuridico')]
    protected ?RegimeJuridico $regimeJuridico;

    #[ORM\JoinColumn(name: 'ID_AREA_ATUACAO', referencedColumnName: 'ID_AREA_ATUACAO')]
    #[ORM\ManyToOne(targetEntity: 'AreaAtuacao')]
    protected ?AreaAtuacao $areaAtuacao;

    #[ORM\Column(name: 'DT_INGRESSO_ORGAO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor ingressou no orgão público federal, ou seja, obteve o vínculo jurídico estabelecido pela posse e exercício em um cargo público.'])]
    protected ?DateTime $dataIngressoOrgao = null;

    #[ORM\Column(name: 'CD_MATRICULA_SIAPE', type: 'string', length: 15, nullable: true, options: ['comment' => 'C??digo para a matricula SIAPE que é dado a um servidor público quando assumi um cargo público. É um Sistema Integrado de Administração Financeira do Governo Federal que controla todos os servidores que ingressaram no regime jurídico estatutário federal estabelecido pela Lei n.º 8.112, de 11 de dezembro de 1990, que liga os servidores públicos civis da União, das autarquias e das fundações públicas federais com a administração pública federal no Brasil, estabelecendo seus direitos e deveres.'])]
    protected ?string $matriculaSiape;

    #[ORM\Column(name: 'DT_INGRESSO_REGIME_JURIDICO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor ingressou no regime jurídico estatutário federal, ou seja, obteve o vínculo jurídico estabelecido pela Lei n.º 8.112, de 11 de dezembro de 1990, que liga os servidores públicos civis da União, das autarquias e das fundações públicas federais com a administração pública federal no Brasil, estabelecendo seus direitos e deveres.'])]
    protected ?DateTime $dataIngressoRegimeJuridico = null;

    #[ORM\Column(name: 'DS_OBSERVACAO', type: 'string', length: 4000, nullable: true, options: ['comment' => 'Especificação descritiva para informações a mais relativas ao registro dos dados funcionais de um servidor na AGU.'])]
    protected ?string $observacao;

    #[ORM\Column(name: 'DT_RESCISAO', type: 'date', nullable: true, options: ['comment' => 'Data em que ocorreu a vacância (Rescisão) de um servidor efetivado em um determinado cargo.'])]
    protected ?DateTime $dataRescisao = null;

    #[ORM\Column(name: 'DT_INGRESSO_SERVICO_PUBLICO', type: 'date', nullable: true, options: ['comment' => 'Data em que o servidor ingressou no serviço público federal, ou seja, obteve o vínculo jurídico estabelecido pela posse em um cargo público.'])]
    protected ?DateTime $dataIngressoServicoPublico = null;

    /**
     * @var Rh
     */
    #[ORM\JoinColumn(name: 'ID_RH', referencedColumnName: 'ID_RH')]
    #[ORM\ManyToOne(targetEntity: 'Rh')]
    private $rh;

    #[ORM\JoinColumn(name: 'ID_SERVIDOR', referencedColumnName: 'ID_SERVIDOR')]
    #[ORM\ManyToOne(targetEntity: 'Servidor')]
    protected ?Servidor $servidor;

    public function getId(): int
    {
        return $this->id;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getRescisaoRais(): ?RescisaoRais
    {
        return $this->rescisaoRais;
    }

    public function setRescisaoRais(?RescisaoRais $rescisaoRais): void
    {
        $this->rescisaoRais = $rescisaoRais;
    }

    public function getTipoAdmissao(): ?TipoAdmissao
    {
        return $this->tipoAdmissao;
    }

    public function setTipoAdmissao(?TipoAdmissao $tipoAdmissao): void
    {
        $this->tipoAdmissao = $tipoAdmissao;
    }

    public function getSituacaoRais(): ?SituacaoRais
    {
        return $this->situacaoRais;
    }

    public function setSituacaoRais(SituacaoRais $situacaoRais): void
    {
        $this->situacaoRais = $situacaoRais;
    }

    public function getTipoSalario(): ?TipoSalario
    {
        return $this->tipoSalario;
    }

    public function setTipoSalario(?TipoSalario $tipoSalario): void
    {
        $this->tipoSalario = $tipoSalario;
    }

    public function getVinculoRais(): ?VinculoRais
    {
        return $this->vinculoRais;
    }

    public function setVinculoRais(?VinculoRais $vinculoRais): void
    {
        $this->vinculoRais = $vinculoRais;
    }

    public function getRegimeJuridico(): ?RegimeJuridico
    {
        return $this->regimeJuridico;
    }

    public function setRegimeJuridico(?RegimeJuridico $regimeJuridico): void
    {
        $this->regimeJuridico = $regimeJuridico;
    }

    public function getAreaAtuacao(): ?AreaAtuacao
    {
        return $this->areaAtuacao;
    }

    public function setAreaAtuacao(?AreaAtuacao $areaAtuacao): void
    {
        $this->areaAtuacao = $areaAtuacao;
    }

    public function getDataIngressoOrgao(): ?\DateTime
    {
        return $this->dataIngressoOrgao;
    }

    public function setDataIngressoOrgao(?\DateTime $dataIngressoOrgao): void
    {
        $this->dataIngressoOrgao = $dataIngressoOrgao;
    }

    public function getMatriculaSiape(): ?string
    {
        return $this->matriculaSiape;
    }

    public function setMatriculaSiape(?string $matriculaSiape): void
    {
        $this->matriculaSiape = $matriculaSiape;
    }

    public function getDataIngressoRegimeJuridico(): ?\DateTime
    {
        return $this->dataIngressoRegimeJuridico;
    }

    public function setDataIngressoRegimeJuridico(?\DateTime $dataIngressoRegimeJuridico): void
    {
        $this->dataIngressoRegimeJuridico = $dataIngressoRegimeJuridico;
    }

    public function getObservacao(): ?string
    {
        return $this->observacao;
    }

    public function setObservacao(?string $observacao): void
    {
        $this->observacao = $observacao;
    }

    public function getDataRescisao(): ?\DateTime
    {
        return $this->dataRescisao;
    }

    public function setDataRescisao(?\DateTime $dataRescisao): void
    {
        $this->dataRescisao = $dataRescisao;
    }

    public function getDataIngressoServicoPublico(): ?\DateTime
    {
        return $this->dataIngressoServicoPublico;
    }

    public function setDataIngressoServicoPublico(?\DateTime $dataIngressoServicoPublico): void
    {
        $this->dataIngressoServicoPublico = $dataIngressoServicoPublico;
    }


    /**
     * @return Rh
     */
    public function getRh(): ?Rh
    {
        return $this->rh;
    }

    public function setRh(?Rh $rh): void
    {
        $this->rh = $rh;
    }

    public function getServidor(): ?Servidor
    {
        return $this->servidor;
    }

    public function setServidor(?Servidor $servidor): void
    {
        $this->servidor = $servidor;
    }


}
