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
use AguPessoas\Backend\DTO\Traits\IdUuid;
use AguPessoas\Backend\DTO\Traits\Nome;
use AguPessoas\Backend\DTO\Traits\SPSoftdeleteable;
use AguPessoas\Backend\DTO\Traits\SPTimeblameable;
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
    jsonLDId: '/v2/sigepe_servidor/{id}',
    jsonLDType: 'SigepeServidor',
    jsonLDContext: '/api/doc/#model-SPSigepeServidor'
)]
#[Form\Form]
//#[Form\Cacheable(expire: 86400)]
class SPSigepeServidor extends RestDto
{
    use IdUuid;
    use CodigoSigepe;
    use Nome;
    use SPTimeblameable;
    use SPSoftdeleteable;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    ##[Filter\Digits(allowWhitespace: false)]
    #[AppAssert\CpfCnpj]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $cpf = null;

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
    protected ?DateTime $dataNascimento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomePai = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\Length(
        min: 3,
        max: 255,
        minMessage: 'O campo deve ter no mínimo 3 caracteres!',
        maxMessage: 'O campo deve ter no máximo 255 caracteres!'
    )]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomeMae = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeSexo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeSexo')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeSexo::class))]
    protected ?EntityInterface $sexo = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeCor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeCor')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeCor::class))]
    protected ?EntityInterface $cor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeDeficienciaFisica',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeDeficienciaFisica')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeDeficienciaFisica::class))]
    protected ?EntityInterface $deficienciaFisica = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeEstadoCivil',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeEstadoCivil')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeEstadoCivil::class))]
    protected ?EntityInterface $estadoCivil = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\SPSigepeNacionalidade',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPSigepeNacionalidade')]
    #[Assert\NotNull(message: 'O campo não pode ser nulo!')]
    #[OA\Property(ref: new Model(type: SPSigepeNacionalidade::class))]
    protected ?EntityInterface $nacionalidade = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataChegadaBrasil = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomePais = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $grupoSaguineo = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomeMunicipioNascimento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $nomeUfNascimento = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\StripNewlines]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[OA\Property(type: 'string')]
    #[DTOMapper\Property]
    protected ?string $pisPasep = null;

    #[OA\Property(ref: new Model(type: SPServidor::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPServidor')]
    protected ?EntityInterface $servidor = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $emailInstitucional = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[DTOMapper\Property]
    protected ?string $identificacaoUnica = null;

    #[OA\Property(ref: new Model(type: SPDadoFuncionalDadosComplementares::class))]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPDadoFuncionalDadosComplementares')]
    protected ?EntityInterface $dadoFuncionalComplementar = null;

    /**
     * @var SPEndereco[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPEndereco',
        dtoGetter: 'getEnderecos',
        dtoSetter: 'addEndereco',
        collection: true
    )]
    protected $enderecos = [];

    /**
     * @var SPTelefone[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V2\DTO\SPTelefone',
        dtoGetter: 'getTelefones',
        dtoSetter: 'addTelefone',
        collection: true
    )]
    protected $telefones = [];

    /**
     * @return string|null
     */
    public function getCpf(): ?string
    {
        return $this->cpf;
    }

    public function setCpf(?string $cpf): self
    {
        $this->cpf = $cpf;
        $this->setVisited('cpf');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataNascimento(): ?DateTime
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?DateTime $dataNascimento): self
    {
        $this->dataNascimento = $dataNascimento;
        $this->setVisited('dataNascimento');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomePai(): ?string
    {
        return $this->nomePai;
    }

    public function setNomePai(?string $nomePai): self
    {
        $this->nomePai = $nomePai;
        $this->setVisited('nomePai');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeMae(): ?string
    {
        return $this->nomeMae;
    }

    public function setNomeMae(?string $nomeMae): self
    {
        $this->nomeMae = $nomeMae;
        $this->setVisited('nomeMae');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getSexo(): ?EntityInterface
    {
        return $this->sexo;
    }

    public function setSexo(?EntityInterface $sexo): self
    {
        $this->sexo = $sexo;
        $this->setVisited('sexo');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getCor(): ?EntityInterface
    {
        return $this->cor;
    }

    public function setCor(?EntityInterface $cor): self
    {
        $this->cor = $cor;
        $this->setVisited('cor');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getDeficienciaFisica(): ?EntityInterface
    {
        return $this->deficienciaFisica;
    }

    public function setDeficienciaFisica(?EntityInterface $deficienciaFisica): self
    {
        $this->deficienciaFisica = $deficienciaFisica;
        $this->setVisited('deficienciaFisica');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getEstadoCivil(): ?EntityInterface
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(?EntityInterface $estadoCivil): self
    {
        $this->estadoCivil = $estadoCivil;
        $this->setVisited('estadoCivil');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getNacionalidade(): ?EntityInterface
    {
        return $this->nacionalidade;
    }

    public function setNacionalidade(?EntityInterface $nacionalidade): self
    {
        $this->nacionalidade = $nacionalidade;
        $this->setVisited('nacionalidade');
        return $this;
    }

    /**
     * @return DateTime|null
     */
    public function getDataChegadaBrasil(): ?DateTime
    {
        return $this->dataChegadaBrasil;
    }

    public function setDataChegadaBrasil(?DateTime $dataChegadaBrasil): self
    {
        $this->dataChegadaBrasil = $dataChegadaBrasil;
        $this->setVisited('dataChegadaBrasil');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomePais(): ?string
    {
        return $this->nomePais;
    }

    public function setNomePais(?string $nomePais): self
    {
        $this->nomePais = $nomePais;
        $this->setVisited('nomePais');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getGrupoSaguineo(): ?string
    {
        return $this->grupoSaguineo;
    }

    public function setGrupoSaguineo(?string $grupoSaguineo): self
    {
        $this->grupoSaguineo = $grupoSaguineo;
        $this->setVisited('grupoSaguineo');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeMunicipioNascimento(): ?string
    {
        return $this->nomeMunicipioNascimento;
    }

    public function setNomeMunicipioNascimento(?string $nomeMunicipioNascimento): self
    {
        $this->nomeMunicipioNascimento = $nomeMunicipioNascimento;
        $this->setVisited('nomeMunicipioNascimento');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getNomeUfNascimento(): ?string
    {
        return $this->nomeUfNascimento;
    }

    public function setNomeUfNascimento(?string $nomeUfNascimento): self
    {
        $this->nomeUfNascimento = $nomeUfNascimento;
        $this->setVisited('nomeUfNascimento');
        return $this;
    }

    /**
     * @return string|null
     */
    public function getPisPasep(): ?string
    {
        return $this->pisPasep;
    }

    public function setPisPasep(?string $pisPasep): self
    {
        $this->pisPasep = $pisPasep;
        $this->setVisited('pisPasep');
        return $this;
    }

    public function getServidor(): ?EntityInterface
    {
        return $this->servidor;
    }

    public function setServidor(?EntityInterface $servidor): self
    {
        $this->servidor = $servidor;
        $this->setVisited('servidor');
        return $this;
    }

    public function addEndereco(SPEndereco $endereco): self
    {
        $this->enderecos[] = $endereco;

        return $this;
    }

    public function getEnderecos(): array
    {
        return $this->enderecos;
    }

    public function addTelefone(SPTelefone $telefone): self
    {
        $this->telefones[] = $telefone;

        return $this;
    }

    public function getTelefones(): array
    {
        return $this->telefones;
    }

    public function getEmailInstitucional(): ?string
    {
        return $this->emailInstitucional;
    }

    public function setEmailInstitucional(?string $emailInstitucional): self
    {
        $this->emailInstitucional = $emailInstitucional;
        $this->setVisited('emailInstituicional');
        return $this;
    }

    public function getIdentificacaoUnica(): ?string
    {
        return $this->identificacaoUnica;
    }

    public function setIdentificacaoUnica(?string $identificacaoUnica): self
    {
        $this->identificacaoUnica = $identificacaoUnica;
        $this->setVisited('identificacaoUnica');
        return $this;
    }

    /**
     * @return EntityInterface|null
     */
    public function getDadoFuncionalComplementar(): ?EntityInterface
    {
        return $this->dadoFuncionalComplementar;
    }

    /**
     * @param EntityInterface|null $dadoFuncionalComplementar
     * @return SPSigepeServidor
     */
    public function setDadoFuncionalComplementar(?EntityInterface $dadoFuncionalComplementar): SPSigepeServidor
    {
        $this->dadoFuncionalComplementar = $dadoFuncionalComplementar;
        $this->setVisited('dadoFuncionalComplementar');
        return $this;
    }



}
