<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Uuid;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Entity\EntityInterface;
use AguPessoas\Backend\DTO\Traits\SigepeServidor;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;

/**
 * Class SPCertidao.
 *
 * @package AguPessoas\Backend\Api\V2\DTO
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/certidao/{id}',
    jsonLDType: 'SPCertidao',
    jsonLDContext: '/api/doc/#model-SPCertidao'
)]
#[Form\Form]
class SPCertidao extends RestDto
{
    use Timeblameable;
    use Id;
    use Softdeleteable;
    use Uuid;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[DTOMapper\Property]
    protected ?string $tipoCertidao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[DTOMapper\Property]
    protected ?string $nup = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?\DateTime $dataSolicitacao;


    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?string $justificativaSolicitacao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?array $infoAdicionais = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?\DateTime $dataAvaliacao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[DTOMapper\Property]
    protected ?string $resultadoAvaliacao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[DTOMapper\Property]
    protected ?string $status = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?\DateTime $nupDataCriacaoTarefa;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?\DateTime $nupDataAnexoCertidao;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[DTOMapper\Property]
    protected ?array $nupLog = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPServidor',
            'required' => true,
        ]
    )]
    #[OA\Property(ref: new Model(type: SPServidor::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPServidor')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    protected ?EntityInterface $SPServidor = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[DTOMapper\Property]
    protected ?int $idProcesso = null;

    public function getIdProcesso(): ?int
    {
        return $this->idProcesso;
    }

    public function setIdProcesso(?int $idProcesso): self
    {
        $this->idProcesso = $idProcesso;
        $this->setVisited('idProcesso');
        return $this;
    }

    public function getIdTarefa(): ?int
    {
        return $this->idTarefa;
    }

    public function setIdTarefa(?int $idTarefa): self
    {
        $this->idTarefa = $idTarefa;
        $this->setVisited('idTarefa');
        return $this;
    }

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\NumberType',
        options: [
            'required' => false,
        ]
    )]
    #[Filter\StripTags]
    #[DTOMapper\Property]
    protected ?int $idTarefa = null;

    public function getSPServidor(): ?EntityInterface
    {
        return $this->SPServidor;
    }

    public function setSPServidor(?EntityInterface $SPServidor): void
    {;
        $this->SPServidor = $SPServidor;
    }

    public function getNupLog(): ?array
    {
        return $this->nupLog;
    }

    public function setNupLog(?array $nupLog): void
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
    public function getDataSolicitacao(): ?\DateTime
    {
        return $this->dataSolicitacao;
    }

    /**
     * Set the value of dataSolicitacao
     */
    public function setDataSolicitacao(?\DateTime $dataSolicitacao): self
    {
        $this->dataSolicitacao = $dataSolicitacao;

        return $this;
    }

    /**
     * Get the value of justificativasSolicitacao
     */
    public function getJustificativaSolicitacao(): ?string
    {
        return $this->justificativaSolicitacao;
    }

    /**
     * Set the value of justificativasSolicitacao
     */
    public function setJustificativaSolicitacao(?string $justificativaSolicitacao): self
    {
        $this->justificativaSolicitacao = $justificativaSolicitacao;

        return $this;
    }

    /**
     * Get the value of infoAdicionais
     */
    public function getInfoAdicionais(): ?array
    {
        return $this->infoAdicionais;
    }

    /**
     * Set the value of infoAdicionais
     */
    public function setInfoAdicionais(?array $infoAdicionais): self
    {
        $this->infoAdicionais = $infoAdicionais;

        return $this;
    }

    /**
     * Get the value of dataAvaliacao
     */
    public function getDataAvaliacao(): ?\DateTimeInterface
    {
        return $this->dataAvaliacao;
    }

    /**
     * Set the value of dataAvaliacao
     */
    public function setDataAvaliacao(?\DateTimeInterface $dataAvaliacao): self
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
    public function getNupDataCriacaoTarefa(): ?\DateTimeInterface
    {
        return $this->nupDataCriacaoTarefa;
    }

    /**
     * Set the value of nupDataCriacaoTarefa
     */
    public function setNupDataCriacaoTarefa(?\DateTimeInterface $nupDataCriacaoTarefa): self
    {
        $this->nupDataCriacaoTarefa = $nupDataCriacaoTarefa;

        return $this;
    }

    /**
     * Get the value of nupDataAnexoCertidao
     */
    public function getNupDataAnexoCertidao(): ?\DateTimeInterface
    {
        return $this->nupDataAnexoCertidao;
    }

    /**
     * Set the value of nupDataAnexoCertidao
     */
    public function setNupDataAnexoCertidao(?\DateTimeInterface $nupDataAnexoCertidao): self
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
