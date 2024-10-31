<?php

declare(strict_types=1);
/**
 * /src/Entity/SPCertidaoResource.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Entity;

use AguPessoas\Backend\Entity\Traits\CodigoSigepe;
use AguPessoas\Backend\Entity\Traits\Descricao;
use AguPessoas\Backend\Entity\Traits\SigepeServidor;
use AguPessoas\Backend\Entity\Traits\SPTimestampable;
use AguPessoas\Backend\Entity\Traits\SPSoftdeleteable;
use DateTime;
use Doctrine\ORM\Mapping as ORM;
use Exception;
use Gedmo\Mapping\Annotation as Gedmo;
use AguPessoas\Backend\Entity\Traits\Id;
use AguPessoas\Backend\Entity\Traits\Nome;
use AguPessoas\Backend\Entity\Traits\Uuid;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;

/**
 * Class SPCertidaoResource.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */
#[ORM\Entity]
#[Gedmo\SoftDeleteable(fieldName: 'apagadoEm')]
#[ORM\Table(name: 'sp_certidao')]
#[Gedmo\Loggable]
class SPCertidao implements EntityInterface
{
    // Traits
    use Id;
    use Uuid;
//    use SigepeServidor;
    use SPTimestampable;
    use SPSoftdeleteable;

    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[ORM\ManyToOne(targetEntity: 'SPServidor')]
    #[ORM\JoinColumn(name: 'sp_servidor_id', referencedColumnName: 'id', nullable: false)]
    protected SPServidor $SPServidor;

    public function getSPServidor(): SPServidor
    {
        return $this->SPServidor;
    }

    public function setSPServidor(SPServidor $SPServidor): void
    {
        $this->SPServidor = $SPServidor;
    }

    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(name: 'TIPO_ID', type: 'string', nullable: true, length: 4000)]
    protected ?string $tipoCertidao = null;

    #[Assert\Length(max: 255, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(name: 'NUP_NUMERO', type: 'string', nullable: true)]
    protected ?string $nup = null;

    #[ORM\Column(name: 'DATA_SOLICITACAO', type: 'date', nullable: true)]
    protected ?DateTime $dataSolicitacao = null;

    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: true, length: 4000)]
    protected ?string $justificativaSolicitacao = null;

    #[ORM\Column(name: 'info_adicionais', type: 'json', nullable: true)]
    protected mixed $infoAdicionais = null;

    #[Gedmo\Versioned]
    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $dataAvaliacao = null;

    #[Assert\Length(max: 4000, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: true, length: 4000)]
    protected ?string $resultadoAvaliacao = null;

    #[Assert\Length(max: 3, maxMessage: 'Campo deve ter no máximo {{ limit }} letras')]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Gedmo\Versioned]
    #[ORM\Column(type: 'string', nullable: true, length: 3)]
    protected ?string $status = 'AA';
    //AA - AGUARDANDO ANALISE, AS- AGUARDANDO SS, EM - EMITIDA, NG - NEGADA

    #[Gedmo\Versioned]
    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $nupDataCriacaoTarefa = null;

    #[Gedmo\Versioned]
    #[ORM\Column(type: 'date', nullable: true)]
    protected ?DateTime $nupDataAnexoCertidao = null;

    #[ORM\Column(name: 'nup_log', type: 'json', nullable: true)]
    protected mixed $nupLog = null;

    #[ORM\Column(name: 'ID_PROCESSO', type: 'integer', nullable: false, options: ['comment' => 'Identificador único do processo do Super Sapiens.'])]
    protected ?int $idProcesso;

    public function getIdProcesso(): ?int
    {
        return $this->idProcesso;
    }

    public function setIdProcesso(?int $idProcesso): self
    {
        $this->idProcesso = $idProcesso;
        return $this;
    }

    public function getIdTarefa(): ?int
    {
        return $this->idTarefa;
    }

    public function setIdTarefa(?int $idTarefa): self
    {
        $this->idTarefa = $idTarefa;
        return $this;
    }

    #[ORM\Column(name: 'ID_TAREFA', type: 'integer', nullable: false, options: ['comment' => 'Identificador único da tarefa vinculada ao processo do Super Sapiens.'])]
    protected ?int $idTarefa;

    public function __construct()
    {
        $this->setUuid();
    }

    public function getNupLog(): mixed
    {
        return $this->nupLog;
    }

    public function setNupLog(mixed $nupLog): void
    {
        $this->nupLog = $nupLog;
    }


    /**
     * Get the value of tipoCertidao
     */
    public function getTipoCertidao(): ?string
    {
        return $this->tipoCertidao;
    }

    /**
     * Set the value of tipoCertidao
     */
    public function setTipoCertidao(?string $tipoCertidao): self
    {
        $this->tipoCertidao = $tipoCertidao;

        return $this;
    }

    /**
     * Get the value of nupNumero
     */
    public function getNup(): ?string
    {
        return $this->nup;
    }

    /**
     * Set the value of nupNumero
     */
    public function setNup(?string $nup): self
    {
        $this->nup = $nup;

        return $this;
    }

    /**
     * Get the value of dataSolicitacao
     */
    public function getDataSolicitacao(): ?DateTime
    {
        return $this->dataSolicitacao;
    }

    /**
     * Set the value of dataSolicitacao
     */
    public function setDataSolicitacao(?DateTime $dataSolicitacao): self
    {
        $this->dataSolicitacao = $dataSolicitacao;

        return $this;
    }

    /**
     * Get the value of justificativaSolicitacao
     */
    public function getJustificativaSolicitacao(): ?string
    {
        return $this->justificativaSolicitacao;
    }

    /**
     * Set the value of justificativaSolicitacao
     */
    public function setJustificativaSolicitacao(?string $justificativaSolicitacao): self
    {
        $this->justificativaSolicitacao = $justificativaSolicitacao;

        return $this;
    }

    /**
     * Get the value of infoAdicionais
     */
    public function getInfoAdicionais(): mixed
    {
        return $this->infoAdicionais;
    }

    /**
     * Set the value of infoAdicionais
     */
    public function setInfoAdicionais($infoAdicionais): self
    {
        $this->infoAdicionais = $infoAdicionais;

        return $this;
    }

    /**
     * Get the value of dataAvaliacao
     */
    public function getDataAvaliacao(): ?DateTime
    {
        return $this->dataAvaliacao;
    }

    /**
     * Set the value of dataAvaliacao
     */
    public function setDataAvaliacao(?DateTime $dataAvaliacao): self
    {
        $this->dataAvaliacao = $dataAvaliacao;

        return $this;
    }

    /**
     * Get the value of resultadoAvaliacao
     */
    public function getResultadoAvaliacao(): ?string
    {
        return $this->resultadoAvaliacao;
    }

    /**
     * Set the value of resultadoAvaliacao
     */
    public function setResultadoAvaliacao(?string $resultadoAvaliacao): self
    {
        $this->resultadoAvaliacao = $resultadoAvaliacao;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus(): ?string
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus(?string $status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of nupDataCriacaoTarefa
     */
    public function getNupDataCriacaoTarefa(): ?DateTime
    {
        return $this->nupDataCriacaoTarefa;
    }

    /**
     * Set the value of nupDataCriacaoTarefa
     */
    public function setNupDataCriacaoTarefa(?DateTime $nupDataCriacaoTarefa): self
    {
        $this->nupDataCriacaoTarefa = $nupDataCriacaoTarefa;

        return $this;
    }

    /**
     * Get the value of nupDataAnexoCertidao
     */
    public function getNupDataAnexoCertidao(): ?DateTime
    {
        return $this->nupDataAnexoCertidao;
    }

    /**
     * Set the value of nupDataAnexoCertidao
     */
    public function setNupDataAnexoCertidao(?DateTime $nupDataAnexoCertidao): self
    {
        $this->nupDataAnexoCertidao = $nupDataAnexoCertidao;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'tipoCertidao' => $this->tipoCertidao,
            'NUP' => $this->nup,
            'dataSolicitacao' => $this->dataSolicitacao ? $this->dataSolicitacao->format('Y-m-d H:i:s') : null,
            'justificativaSolicitacao' => $this->justificativaSolicitacao,
            'infoAdicionais' => $this->infoAdicionais,
            'dataAvaliacao' => $this->dataAvaliacao ? $this->dataAvaliacao->format('Y-m-d H:i:s') : null,
            'resultadoAvaliacao' => $this->resultadoAvaliacao,
            'status' => $this->status,
            'dataCriacaoTarefa' => $this->nupDataCriacaoTarefa ? $this->nupDataCriacaoTarefa->format('Y-m-d H:i:s') : null,
            'dataAnexoCertidao' => $this->nupDataAnexoCertidao ? $this->nupDataAnexoCertidao->format('Y-m-d H:i:s') : null,
            'id' => $this->id,
            'uuid' => $this->uuid,
            'idProcesso' => $this->idProcesso,
            'idTarefa' => $this->idTarefa,
        ];
    }
}
