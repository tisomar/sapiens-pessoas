<?php

declare(strict_types=1);
/**
 * /src/Api/V1/DTO/SPSigepeServidor.php.
 *
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Api\V2\DTO;

use AguPessoas\Backend\Api\V1\DTO\Endereco;
use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\CodigoSigepe;
use AguPessoas\Backend\DTO\Traits\Hash;
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
use AguPessoas\Backend\Entity\SPSigepeAtividadeFuncional;
use AguPessoas\Backend\Entity\SPSigepeCargo;
use AguPessoas\Backend\Entity\SPSigepeClasse;
use AguPessoas\Backend\Entity\SPSigepeFuncao;
use AguPessoas\Backend\Entity\SPSigepeJornada;
use AguPessoas\Backend\Entity\SPSigepeSituacaoFuncional;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAposentadoria;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaExclusao;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoOrgao;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoServicoPublico;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIsencaoIr;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaPss;
use AguPessoas\Backend\Entity\SPSigepeUorg;
use AguPessoas\Backend\Entity\SPSigepeUpag;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use DateTime;
use Nelmio\ApiDocBundle\Annotation\Model;
use Symfony\Component\Validator\Constraints as Assert;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use AguPessoas\Backend\Validator\Constraints as AppAssert;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Entity\EntityInterface;
use JMS\Serializer\Annotation as Serializer;

/**
 * Class SPSigepeServidor.
 *
 * @author Advocacia-Geral da União
 */
#[DTOMapper\JsonLD(
    jsonLDId: '/v2/dado_funcional/{id}',
    jsonLDType: 'SigepeDadoFuncional',
    jsonLDContext: '/api/doc/#model-SigepeDadoFuncional'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeDadoFuncional extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use SPTimeblameable;
    use SPSoftdeleteable;
    use Hash;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Orgao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Orgao::class))]
    protected ?EntityInterface $orgao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $matricula = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeAtividadeFuncional',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeAtividadeFuncional')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeAtividadeFuncional::class))]
    protected ?EntityInterface $atividadeFuncional = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeCargo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeCargo')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeCargo::class))]
    protected ?EntityInterface $sigepeCargo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeClasse',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeClasse')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeClasse::class))]
    protected ?EntityInterface $sigepeClasse = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeFuncao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeFuncao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeFuncao::class))]
    protected ?EntityInterface $sigepeFuncao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeJornada',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeJornada')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeJornada::class))]
    protected ?EntityInterface $jornada = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAposentadoria',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaAposentadoria')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaAposentadoria::class))]
    protected ?EntityInterface $ocorrenciaAposentadoria = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataAposentadoria = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaExclusao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaExclusao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaExclusao::class))]
    protected ?EntityInterface $ocorrenciaExclusao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExclusao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoOrgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaIngressoOrgao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaIngressoOrgao::class))]
    protected ?EntityInterface $ocorrenciaIngressoOrgao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoOrgao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoServicoPublico',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaIngressoServicoPublico')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaIngressoServicoPublico::class))]
    protected ?EntityInterface $ocorrenciaIngressoServicoPublico = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoServicoPublico = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIsencaoIr',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaIsencaoIr')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaIsencaoIr::class))]
    protected ?EntityInterface $ocorrenciaIsencaoIr = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioIsencaoIR = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimIsencaoIR = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaPss',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeTipoOcorrenciaPss')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeTipoOcorrenciaPss::class))]
    protected ?EntityInterface $ocorrenciaPss = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataInicioPSS = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataFimPSS = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $codigoPadrao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeSituacaoFuncional',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeSituacaoFuncional')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeSituacaoFuncional::class))]
    protected ?EntityInterface $situacaoFuncional = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeUorg',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeUorg')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeUorg::class))]
    protected ?EntityInterface $uorgExercicio = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeUorg',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeUorg')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeUorg::class))]
    protected ?EntityInterface $uorgLotacao = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeUpag',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeUpag')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeUpag::class))]
    protected ?EntityInterface $upag = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $valeTransporteCodigo = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $valeTransporteValor = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $valeArTipo = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $valeArDataInicio = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $valeArDataFim = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Orgao',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\Orgao')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: Orgao::class))]
    protected ?EntityInterface $orgaoOrigem = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $chefiaImediataCPF = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $chefiaImediataEmail = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataExercicioOrgao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoFuncao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => true,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[Assert\NotBlank(message: 'O campo não pode estar em branco!')]
    #[DTOMapper\Property]
    protected ?DateTime $dataIngressoNovaFuncao = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $percentualTS = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $pontuacaoDesempenho = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nivelCargoSigla = null;

    /**
     * @return EntityInterface|null
     */
    public function getOrgao(): ?EntityInterface
    {
        return $this->orgao;
    }

    /**
     * @param EntityInterface|null $orgao
     * @return SPSigepeDadoFuncional
     */
    public function setOrgao(?EntityInterface $orgao): SPSigepeDadoFuncional
    {
        $this->orgao = $orgao;
        $this->setVisited('orgao');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getMatricula(): ?string
    {
        return $this->matricula;
    }

    /**
     * @param string|null $matricula
     * @return SPSigepeDadoFuncional
     */
    public function setMatricula(?string $matricula): SPSigepeDadoFuncional
    {
        $this->matricula = $matricula;
        $this->setVisited('matricula');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getAtividadeFuncional(): ?EntityInterface
    {
        return $this->atividadeFuncional;
    }

    /**
     * @param EntityInterface|null $atividadeFuncional
     * @return SPSigepeDadoFuncional
     */
    public function setAtividadeFuncional(?EntityInterface $atividadeFuncional): SPSigepeDadoFuncional
    {
        $this->atividadeFuncional = $atividadeFuncional;
        $this->setVisited('atividadeFuncional');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSigepeCargo(): ?EntityInterface
    {
        return $this->sigepeCargo;
    }

    /**
     * @param EntityInterface|null $sigepeCargo
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeCargo(?EntityInterface $sigepeCargo): SPSigepeDadoFuncional
    {
        $this->sigepeCargo = $sigepeCargo;
        $this->setVisited('sigepeCargo');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSigepeClasse(): ?EntityInterface
    {
        return $this->sigepeClasse;
    }

    /**
     * @param EntityInterface|null $sigepeClasse
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeClasse(?EntityInterface $sigepeClasse): SPSigepeDadoFuncional
    {
        $this->sigepeClasse = $sigepeClasse;
        $this->setVisited('sigepeClasse');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSigepeFuncao(): ?EntityInterface
    {
        return $this->sigepeFuncao;
    }

    /**
     * @param EntityInterface|null $sigepeFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setSigepeFuncao(?EntityInterface $sigepeFuncao): SPSigepeDadoFuncional
    {
        $this->sigepeFuncao = $sigepeFuncao;
        $this->setVisited('sigepeFuncao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getJornada(): ?EntityInterface
    {
        return $this->jornada;
    }

    /**
     * @param EntityInterface|null $jornada
     * @return SPSigepeDadoFuncional
     */
    public function setJornada(?EntityInterface $jornada): SPSigepeDadoFuncional
    {
        $this->jornada = $jornada;
        $this->setVisited('jornada');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaAposentadoria(): ?EntityInterface
    {
        return $this->ocorrenciaAposentadoria;
    }

    /**
     * @param EntityInterface|null $ocorrenciaAposentadoria
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaAposentadoria(?EntityInterface $ocorrenciaAposentadoria): SPSigepeDadoFuncional
    {
        $this->ocorrenciaAposentadoria = $ocorrenciaAposentadoria;
        $this->setVisited('ocorrenciaAposentadoria');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataAposentadoria(): ?DateTime
    {
        return $this->dataAposentadoria;
    }

    /**
     * @param DateTime|null $dataAposentadoria
     * @return SPSigepeDadoFuncional
     */
    public function setDataAposentadoria(?DateTime $dataAposentadoria): SPSigepeDadoFuncional
    {
        $this->dataAposentadoria = $dataAposentadoria;
        $this->setVisited('dataAposentadoria');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaExclusao(): ?EntityInterface
    {
        return $this->ocorrenciaExclusao;
    }

    /**
     * @param EntityInterface|null $ocorrenciaExclusao
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaExclusao(?EntityInterface $ocorrenciaExclusao): SPSigepeDadoFuncional
    {
        $this->ocorrenciaExclusao = $ocorrenciaExclusao;
        $this->setVisited('ocorrenciaExclusao');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataExclusao(): ?DateTime
    {
        return $this->dataExclusao;
    }

    /**
     * @param DateTime|null $dataExclusao
     * @return SPSigepeDadoFuncional
     */
    public function setDataExclusao(?DateTime $dataExclusao): SPSigepeDadoFuncional
    {
        $this->dataExclusao = $dataExclusao;
        $this->setVisited('dataExclusao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaIngressoOrgao(): ?EntityInterface
    {
        return $this->ocorrenciaIngressoOrgao;
    }

    /**
     * @param EntityInterface|null $ocorrenciaIngressoOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIngressoOrgao(?EntityInterface $ocorrenciaIngressoOrgao): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIngressoOrgao = $ocorrenciaIngressoOrgao;
        $this->setVisited('ocorrenciaIngressoOrgao');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoOrgao(): ?DateTime
    {
        return $this->dataIngressoOrgao;
    }

    /**
     * @param DateTime|null $dataIngressoOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoOrgao(?DateTime $dataIngressoOrgao): SPSigepeDadoFuncional
    {
        $this->dataIngressoOrgao = $dataIngressoOrgao;
        $this->setVisited('dataIngressoOrgao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaIngressoServicoPublico(): ?EntityInterface
    {
        return $this->ocorrenciaIngressoServicoPublico;
    }

    /**
     * @param EntityInterface|null $ocorrenciaIngressoServicoPublico
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIngressoServicoPublico(?EntityInterface $ocorrenciaIngressoServicoPublico): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIngressoServicoPublico = $ocorrenciaIngressoServicoPublico;
        $this->setVisited('ocorrenciaIngressoServicoPublico');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoServicoPublico(): ?DateTime
    {
        return $this->dataIngressoServicoPublico;
    }

    /**
     * @param DateTime|null $dataIngressoServicoPublico
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoServicoPublico(?DateTime $dataIngressoServicoPublico): SPSigepeDadoFuncional
    {
        $this->dataIngressoServicoPublico = $dataIngressoServicoPublico;
        $this->setVisited('dataIngressoServicoPublico');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaIsencaoIr(): ?EntityInterface
    {
        return $this->ocorrenciaIsencaoIr;
    }

    /**
     * @param EntityInterface|null $ocorrenciaIsencaoIr
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaIsencaoIr(?EntityInterface $ocorrenciaIsencaoIr): SPSigepeDadoFuncional
    {
        $this->ocorrenciaIsencaoIr = $ocorrenciaIsencaoIr;
        $this->setVisited('ocorrenciaIsencaoIr');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioIsencaoIR(): ?DateTime
    {
        return $this->dataInicioIsencaoIR;
    }

    /**
     * @param DateTime|null $dataInicioIsencaoIR
     * @return SPSigepeDadoFuncional
     */
    public function setDataInicioIsencaoIR(?DateTime $dataInicioIsencaoIR): SPSigepeDadoFuncional
    {
        $this->dataInicioIsencaoIR = $dataInicioIsencaoIR;
        $this->setVisited('dataInicioIsencaoIR');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimIsencaoIR(): ?DateTime
    {
        return $this->dataFimIsencaoIR;
    }

    /**
     * @param DateTime|null $dataFimIsencaoIR
     * @return SPSigepeDadoFuncional
     */
    public function setDataFimIsencaoIR(?DateTime $dataFimIsencaoIR): SPSigepeDadoFuncional
    {
        $this->dataFimIsencaoIR = $dataFimIsencaoIR;
        $this->setVisited('dataFimIsencaoIR');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOcorrenciaPss(): ?EntityInterface
    {
        return $this->ocorrenciaPss;
    }

    /**
     * @param EntityInterface|null $ocorrenciaPss
     * @return SPSigepeDadoFuncional
     */
    public function setOcorrenciaPss(?EntityInterface $ocorrenciaPss): SPSigepeDadoFuncional
    {
        $this->ocorrenciaPss = $ocorrenciaPss;
        $this->setVisited('ocorrenciaPss');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataInicioPSS(): ?DateTime
    {
        return $this->dataInicioPSS;
    }

    /**
     * @param DateTime|null $dataInicioPSS
     * @return SPSigepeDadoFuncional
     */
    public function setDataInicioPSS(?DateTime $dataInicioPSS): SPSigepeDadoFuncional
    {
        $this->dataInicioPSS = $dataInicioPSS;
        $this->setVisited('dataInicioPSS');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataFimPSS(): ?DateTime
    {
        return $this->dataFimPSS;
    }

    /**
     * @param DateTime|null $dataFimPSS
     * @return SPSigepeDadoFuncional
     */
    public function setDataFimPSS(?DateTime $dataFimPSS): SPSigepeDadoFuncional
    {
        $this->dataFimPSS = $dataFimPSS;
        $this->setVisited('dataFimPSS');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getCodigoPadrao(): ?string
    {
        return $this->codigoPadrao;
    }

    /**
     * @param string|null $codigoPadrao
     * @return SPSigepeDadoFuncional
     */
    public function setCodigoPadrao(?string $codigoPadrao): SPSigepeDadoFuncional
    {
        $this->codigoPadrao = $codigoPadrao;
        $this->setVisited('codigoPadrao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSituacaoFuncional(): ?EntityInterface
    {
        return $this->situacaoFuncional;
    }

    /**
     * @param EntityInterface|null $situacaoFuncional
     * @return SPSigepeDadoFuncional
     */
    public function setSituacaoFuncional(?EntityInterface $situacaoFuncional): SPSigepeDadoFuncional
    {
        $this->situacaoFuncional = $situacaoFuncional;
        $this->setVisited('situacaoFuncional');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getUorgExercicio(): ?EntityInterface
    {
        return $this->uorgExercicio;
    }

    /**
     * @param EntityInterface|null $uorgExercicio
     * @return SPSigepeDadoFuncional
     */
    public function setUorgExercicio(?EntityInterface $uorgExercicio): SPSigepeDadoFuncional
    {
        $this->uorgExercicio = $uorgExercicio;
        $this->setVisited('uorgExercicio');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getUorgLotacao(): ?EntityInterface
    {
        return $this->uorgLotacao;
    }

    /**
     * @param EntityInterface|null $uorgLotacao
     * @return SPSigepeDadoFuncional
     */
    public function setUorgLotacao(?EntityInterface $uorgLotacao): SPSigepeDadoFuncional
    {
        $this->uorgLotacao = $uorgLotacao;
        $this->setVisited('uorgLotacao');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getUpag(): ?EntityInterface
    {
        return $this->upag;
    }

    /**
     * @param EntityInterface|null $upag
     * @return SPSigepeDadoFuncional
     */
    public function setUpag(?EntityInterface $upag): SPSigepeDadoFuncional
    {
        $this->upag = $upag;
        $this->setVisited('upag');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeTransporteCodigo(): ?string
    {
        return $this->valeTransporteCodigo;
    }

    /**
     * @param string|null $valeTransporteCodigo
     * @return SPSigepeDadoFuncional
     */
    public function setValeTransporteCodigo(?string $valeTransporteCodigo): SPSigepeDadoFuncional
    {
        $this->valeTransporteCodigo = $valeTransporteCodigo;
        $this->setVisited('valeTransporteCodigo');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeTransporteValor(): ?string
    {
        return $this->valeTransporteValor;
    }

    /**
     * @param string|null $valeTransporteValor
     * @return SPSigepeDadoFuncional
     */
    public function setValeTransporteValor(?string $valeTransporteValor): SPSigepeDadoFuncional
    {
        $this->valeTransporteValor = $valeTransporteValor;
        $this->setVisited('valeTransporteValor');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getValeArTipo(): ?string
    {
        return $this->valeArTipo;
    }

    /**
     * @param string|null $valeArTipo
     * @return SPSigepeDadoFuncional
     */
    public function setValeArTipo(?string $valeArTipo): SPSigepeDadoFuncional
    {
        $this->valeArTipo = $valeArTipo;
        $this->setVisited('valeArTipo');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getValeArDataInicio(): ?DateTime
    {
        return $this->valeArDataInicio;
    }

    /**
     * @param DateTime|null $valeArDataInicio
     * @return SPSigepeDadoFuncional
     */
    public function setValeArDataInicio(?DateTime $valeArDataInicio): SPSigepeDadoFuncional
    {
        $this->valeArDataInicio = $valeArDataInicio;
        $this->setVisited('valeArDataInicio');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getValeArDataFim(): ?DateTime
    {
        return $this->valeArDataFim;
    }

    /**
     * @param DateTime|null $valeArDataFim
     * @return SPSigepeDadoFuncional
     */
    public function setValeArDataFim(?DateTime $valeArDataFim): SPSigepeDadoFuncional
    {
        $this->valeArDataFim = $valeArDataFim;
        $this->setVisited('valeArDataFim');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getOrgaoOrigem(): ?EntityInterface
    {
        return $this->orgaoOrigem;
    }

    /**
     * @param EntityInterface|null $orgaoOrigem
     * @return SPSigepeDadoFuncional
     */
    public function setOrgaoOrigem(?EntityInterface $orgaoOrigem): SPSigepeDadoFuncional
    {
        $this->orgaoOrigem = $orgaoOrigem;
        $this->setVisited('orgaoOrigem');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChefiaImediataCPF(): ?string
    {
        return $this->chefiaImediataCPF;
    }

    /**
     * @param string|null $chefiaImediataCPF
     * @return SPSigepeDadoFuncional
     */
    public function setChefiaImediataCPF(?string $chefiaImediataCPF): SPSigepeDadoFuncional
    {
        $this->chefiaImediataCPF = $chefiaImediataCPF;
        $this->setVisited('chefiaImediataCPF');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getChefiaImediataEmail(): ?string
    {
        return $this->chefiaImediataEmail;
    }

    /**
     * @param string|null $chefiaImediataEmail
     * @return SPSigepeDadoFuncional
     */
    public function setChefiaImediataEmail(?string $chefiaImediataEmail): SPSigepeDadoFuncional
    {
        $this->chefiaImediataEmail = $chefiaImediataEmail;
        $this->setVisited('chefiaImediataEmail');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataExercicioOrgao(): ?DateTime
    {
        return $this->dataExercicioOrgao;
    }

    /**
     * @param DateTime|null $dataExercicioOrgao
     * @return SPSigepeDadoFuncional
     */
    public function setDataExercicioOrgao(?DateTime $dataExercicioOrgao): SPSigepeDadoFuncional
    {
        $this->dataExercicioOrgao = $dataExercicioOrgao;
        $this->setVisited('dataExercicioOrgao');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoFuncao(): ?DateTime
    {
        return $this->dataIngressoFuncao;
    }

    /**
     * @param DateTime|null $dataIngressoFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoFuncao(?DateTime $dataIngressoFuncao): SPSigepeDadoFuncional
    {
        $this->dataIngressoFuncao = $dataIngressoFuncao;
        $this->setVisited('dataIngressoFuncao');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataIngressoNovaFuncao(): ?DateTime
    {
        return $this->dataIngressoNovaFuncao;
    }

    /**
     * @param DateTime|null $dataIngressoNovaFuncao
     * @return SPSigepeDadoFuncional
     */
    public function setDataIngressoNovaFuncao(?DateTime $dataIngressoNovaFuncao): SPSigepeDadoFuncional
    {
        $this->dataIngressoNovaFuncao = $dataIngressoNovaFuncao;
        $this->setVisited('dataIngressoNovaFuncao');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPercentualTS(): ?string
    {
        return $this->percentualTS;
    }

    /**
     * @param string|null $percentualTS
     * @return SPSigepeDadoFuncional
     */
    public function setPercentualTS(?string $percentualTS): SPSigepeDadoFuncional
    {
        $this->percentualTS = $percentualTS;
        $this->setVisited('percentualTS');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPontuacaoDesempenho(): ?string
    {
        return $this->pontuacaoDesempenho;
    }

    /**
     * @param string|null $pontuacaoDesempenho
     * @return SPSigepeDadoFuncional
     */
    public function setPontuacaoDesempenho(?string $pontuacaoDesempenho): SPSigepeDadoFuncional
    {
        $this->pontuacaoDesempenho = $pontuacaoDesempenho;
        $this->setVisited('pontuacaoDesempenho');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNivelCargoSigla(): ?string
    {
        return $this->nivelCargoSigla;
    }

    /**
     * @param string|null $nivelCargoSigla
     * @return SPSigepeDadoFuncional
     */
    public function setNivelCargoSigla(?string $nivelCargoSigla): SPSigepeDadoFuncional
    {
        $this->nivelCargoSigla = $nivelCargoSigla;
        $this->setVisited('nivelCargoSigla');
        return $this;
    }

}
