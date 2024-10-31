<?php

declare(strict_types=1);

namespace AguPessoas\Backend\Api\V1\DTO;

use AguPessoas\Backend\DTO\RestDto;
use AguPessoas\Backend\DTO\Traits\Codigo;
use AguPessoas\Backend\DTO\Traits\CPFOperador;
use AguPessoas\Backend\DTO\Traits\Descricao;
use AguPessoas\Backend\DTO\Traits\Id;
use AguPessoas\Backend\DTO\Traits\Softdeleteable;
use AguPessoas\Backend\DTO\Traits\Timeblameable;
use AguPessoas\Backend\Form\Attributes as Form;
use AguPessoas\Backend\Mapper\Attributes as DTOMapper;
use AguPessoas\Backend\Bundles\DMS\Filter\Rules as Filter;
use Nelmio\ApiDocBundle\Annotation\Model;
use AguPessoas\Backend\Entity\EntityInterface;
use Symfony\Component\Validator\Constraints as Assert;
use OpenApi\Attributes as OA;
use DateTime;
use JMS\Serializer\Annotation as Serializer;

#[DTOMapper\JsonLD(
    jsonLDId: '/v1/servidor/{id}',
    jsonLDType: 'Servidor',
    jsonLDContext: '/api/doc/#model-Servidor'
)]
#[Form\Form]
class Servidor extends RestDto
{
    use Id;
    use Timeblameable;
    use Softdeleteable;
    Use CPFOperador;


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
    #[Assert\NotBlank(message: 'Campo nome não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nome não pode ser nulo!')]
    #[DTOMapper\Property]
    protected string $nome;

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
    #[Assert\NotBlank(message: 'Campo nome não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nome não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $codigo = null;

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
    #[Assert\NotBlank(message: 'Campo nome simples não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nome simples não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $nomeSimples;

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
    #[Assert\NotBlank(message: 'Campo apelido não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo apelido não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $apelido;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoServidor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoServidor')]
    protected ?EntityInterface $tipoServidor = null;

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
    protected ?string $sexo;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo email não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo email não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $email;

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
    protected ?string $emailInstitucional;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo nomePai não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nomePai não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $nomePai;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo nomeMae não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nomeMae não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $nomeMae;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\TextType',
        options: [
            'required' => true,
        ]
    )]
    #[Filter\StripTags]
    #[Filter\Trim]
    #[Filter\ToUpper(encoding: 'UTF-8')]
    #[Assert\NotBlank(message: 'Campo nomeConjuge não pode estar em branco.')]
    #[Assert\NotNull(message: 'O campo nomeConjuge não pode ser nulo!')]
    #[DTOMapper\Property]
    protected ?string $nomeConjuge;

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
    protected ?string $status;

    #[OA\Property(type: 'integer')]
    #[DTOMapper\Property]
    protected ?int $servidor = null;
    #[OA\Property(type: 'integer')]
    public function getServidor(): ?int
    {
        return $this->servidor;
    }

    public function setServidor(?int $servidor): self
    {
        $this->servidor = $servidor;
        $this->setVisited('servidor');
        return $this;
    }

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\EstadoCivil',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\EstadoCivil')]
    protected ?EntityInterface $estadoCivil = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Escolaridade',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Escolaridade')]
    protected ?EntityInterface $escolaridade = null;

    #[Form\Field(
        'Symfony\Component\Form\Extension\Core\Type\DateTimeType',
        options: [
            'widget' => 'single_text',
            'required' => false,
        ]
    )]
    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataNascimento = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\FormacaoProfissional',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FormacaoProfissional')]
    protected ?EntityInterface $formacaoProfissional = null;

    #[OA\Property(type: 'string', format: 'date-time')]
    #[DTOMapper\Property]
    protected ?DateTime $dataObito = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Etnia',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Etnia')]
    protected ?EntityInterface $etnia = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Cor',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Cor')]
    protected ?EntityInterface $cor = null;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\TipoSanguineo',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\TipoSanguineo')]
    protected ?EntityInterface $tipoSanguineo = null;

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
    protected ?string $inDoador;

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
    protected ?string $inPortadorNecessidadeEspecial;

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
    protected ?string $nomeNecessidadeEspecial;

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Municipio',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Municipio')]
    protected ?EntityInterface $municipioNascimento = null;

    /**
     * @var Documentacao[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Documentacao',
        dtoGetter: 'getDocumentos',
        dtoSetter: 'addDocumento',
        collection: true
    )]
    protected $documentos = [];

    /**
     * @var DadoFuncional[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\DadoFuncional',
        dtoGetter: 'getDadosFuncionais',
        dtoSetter: 'addDadoFuncional',
        collection: true
    )]
    protected $dadosFuncionais = [];

    /**
     * @var Endereco[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Endereco',
        dtoGetter: 'getEnderecos',
        dtoSetter: 'addEndereco',
        collection: true
    )]
    protected $enderecos = [];

    /**
     * @var Telefone[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Telefone',
        dtoGetter: 'getTelefones',
        dtoSetter: 'addTelefone',
        collection: true
    )]
    protected $telefones = [];

    /**
     * @var DadoFinanceiro[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\DadoFinanceiro',
        dtoGetter: 'getDadosFinanceiro',
        dtoSetter: 'addDadoFinanceiro',
        collection: true
    )]
    protected $dadosFinanceiro = [];

    /**
     * @var DadoBancario[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\DadoBancario',
        dtoGetter: 'getDadosBancario',
        dtoSetter: 'addDadoBancario',
        collection: true
    )]
    protected $dadosBancario = [];

    /**
     * @var CargoEfetivo[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\CargoEfetivo',
        dtoGetter: 'getCargosEfetivo',
        dtoSetter: 'addCargoEfetivo',
        collection: true
    )]
    protected $cargosEfetivo = [];

    /**
     * @var FuncaoComissionada[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\FuncaoComissionada',
        dtoGetter: 'getFuncoesComissionada',
        dtoSetter: 'addFuncaoComissionada',
        collection: true
    )]
    protected $funcoesComissionada = [];

    /**
     * @var Aposentadoria[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Aposentadoria',
        dtoGetter: 'getAposentadorias',
        dtoSetter: 'addAposentadoria',
        collection: true
    )]
    protected $aposentadorias = [];

    /**
     * @var Movimentacao[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Movimentacao',
        dtoGetter: 'getMovimentacoes',
        dtoSetter: 'addMovimentacao',
        collection: true
    )]
    protected $movimentacoes = [];

    /**
     * @var DadoPromocao[]
     */
    #[Serializer\SkipWhenEmpty]
    #[DTOMapper\Property(
        dtoClass: 'AguPessoas\Backend\Api\V1\DTO\DadoPromocao',
        dtoGetter: 'getDadosPromocao',
        dtoSetter: 'addDadoPromocao',
        collection: true
    )]
    protected $dadosPromocao = [];

    #[Form\Field(
        'Symfony\Bridge\Doctrine\Form\Type\EntityType',
        options: [
            'class' => 'AguPessoas\Backend\Entity\Rh',
            'required' => false,
        ]
    )]
    #[DTOMapper\Property(dtoClass: 'AguPessoas\Backend\Api\V1\DTO\Rh')]
    #[OA\Property(ref: new Model(type: Rh::class))]
    protected ?EntityInterface $rh = null;

    public function getNome(): string
    {
        return $this->nome;
    }

    public function setNome(string $nome): self
    {
        $this->nome = $nome;
        $this->setVisited('nome');
        return $this;
    }

    public function getNomeSimples(): ?string
    {
        return $this->nomeSimples;
    }

    public function setNomeSimples(?string $nomeSimples): self
    {
        $this->nomeSimples = $nomeSimples;
        $this->setVisited('nomeSimples');
        return $this;
    }

    public function getApelido(): ?string
    {
        return $this->apelido;
    }

    public function setApelido(?string $apelido): self
    {
        $this->apelido = $apelido;
        $this->setVisited('apelido');
        return $this;
    }

    public function getTipoServidor(): ?EntityInterface
    {
        return $this->tipoServidor;
    }

    public function setTipoServidor(?EntityInterface $tipoServidor): self
    {
        $this->setVisited('tipoServidor');
        $this->tipoServidor = $tipoServidor;

        return $this;
    }

    public function getSexo(): ?string
    {
        return $this->sexo;
    }

    public function setSexo(string $sexo): self
    {
        $this->sexo = $sexo;
        $this->setVisited('sexo');
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;
        $this->setVisited('email');
        return $this;
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

    public function getStatus(): string
    {
        return $this->status;
    }

    public function setStatus(string $status): self
    {
        $this->status = $status;
        $this->setVisited('status');
        return $this;
    }

    public function getEstadoCivil(): ?EntityInterface
    {
        return $this->estadoCivil;
    }

    public function setEstadoCivil(?EntityInterface $estadoCivil): self
    {
        $this->setVisited('estadoCivil');
        $this->estadoCivil = $estadoCivil;

        return $this;
    }

    public function getEscolaridade(): ?EntityInterface
    {
        return $this->escolaridade;
    }

    public function setEscolaridade(?EntityInterface $escolaridade): self
    {
        $this->setVisited('escolaridade');
        $this->escolaridade = $escolaridade;

        return $this;
    }

    public function getDataNascimento(): DateTime|string|null
    {
        return $this->dataNascimento;
    }

    public function setDataNascimento(?DateTime $dataNascimento): self
    {
        $this->setVisited('dataNascimento');
        $this->dataNascimento = $dataNascimento;
        return $this;
    }

    public function getFormacaoProfissional(): ?EntityInterface
    {
        return $this->formacaoProfissional;
    }

    public function setFormacaoProfissional(?EntityInterface $formacaoProfissional): self
    {
        $this->setVisited('formacaoProfissional');
        $this->formacaoProfissional = $formacaoProfissional;
        return $this;
    }

    public function getDataObito(): DateTime|string|null
    {
        return $this->dataObito;
    }

    public function setDataObito(?DateTime $dataObito): self
    {
        $this->setVisited('dataObito');
        $this->dataObito = $dataObito;
        return $this;
    }

    public function getEtnia(): ?EntityInterface
    {
        return $this->etnia;
    }

    public function setEtnia(?EntityInterface $etnia): self
    {
        $this->setVisited('etnia');
        $this->etnia = $etnia;

        return $this;
    }

    public function getCor(): ?EntityInterface
    {
        return $this->cor;
    }

    public function setCor(?EntityInterface $cor): self
    {
        $this->setVisited('cor');
        $this->cor = $cor;

        return $this;
    }

    public function getTipoSanguineo(): ?EntityInterface
    {
        return $this->tipoSanguineo;
    }

    public function setTipoSanguineo(?EntityInterface $tipoSanguineo): self
    {
        $this->setVisited('tipoSanguineo');
        $this->tipoSanguineo = $tipoSanguineo;

        return $this;
    }

    public function getInDoador(): ?string
    {
        return $this->inDoador;
    }

    public function setInDoador(string $inDoador): self
    {
        $this->inDoador = $inDoador;
        $this->setVisited('inDoador');
        return $this;
    }

    public function getInPortadorNecessidadeEspecial(): ?string
    {
        return $this->inPortadorNecessidadeEspecial;
    }

    public function setInPortadorNecessidadeEspecial(string $inPortadorNecessidadeEspecial): self
    {
        $this->inPortadorNecessidadeEspecial = $inPortadorNecessidadeEspecial;
        $this->setVisited('inPortadorNecessidadeEspecial');
        return $this;
    }

    public function getNomeNecessidadeEspecial(): ?string
    {
        return $this->nomeNecessidadeEspecial;
    }

    public function setNomeNecessidadeEspecial(?string $nomeNecessidadeEspecial): self
    {
        $this->nomeNecessidadeEspecial = $nomeNecessidadeEspecial;
        $this->setVisited('nomeNecessidadeEspecial');
        return $this;
    }

    public function getMunicipioNascimento(): ?EntityInterface
    {
        return $this->municipioNascimento;
    }

    public function setMunicipioNascimento(?EntityInterface $municipioNascimento): self
    {
        $this->setVisited('municipioNascimento');
        $this->municipioNascimento = $municipioNascimento;

        return $this;
    }
    public function getNomePai(): ?string
    {
        return $this->nomePai;
    }

    public function setNomePai(?string $nmPai): self
    {
        $this->setVisited('municipioNascimento');
        $this->nomePai = $nmPai;

        return $this;
    }

    public function getNomeMae(): ?string
    {
        return $this->nomeMae;
    }

    public function setNomeMae(?string $nmMae): self
    {
        $this->setVisited('nomeMae');
        $this->nomeMae = $nmMae;

        return $this;
    }

    public function getNomeConjuge(): ?string
    {
        return $this->nomeConjuge;
    }

    public function setNomeConjuge(?string $nmConjuge): self
    {
        $this->setVisited('nomeConjuge');
        $this->nomeConjuge = $nmConjuge;

        return $this;
    }

    public function addDocumento(Documentacao $documentacao): self
    {
        $this->documentos[] = $documentacao;

        return $this;
    }

    public function getDocumentos(): array
    {
        return $this->documentos;
    }

    public function addDadoFuncional(DadoFuncional $dadoFuncional): self
    {
        $this->dadosFuncionais[] = $dadoFuncional;

        return $this;
    }

    public function getDadosFuncionais(): array
    {
        return $this->dadosFuncionais;
    }

    public function addEndereco(Endereco $endereco): self
    {
        $this->enderecos[] = $endereco;

        return $this;
    }

    public function getEnderecos(): array
    {
        return $this->enderecos;
    }

    public function addTelefone(Telefone $telefone): self
    {
        $this->telefones[] = $telefone;

        return $this;
    }

    public function getTelefones(): array
    {
        return $this->telefones;
    }

    public function addDadoFinanceiro(DadoFinanceiro $dadoFinanceiro): self
    {
        $this->dadosFinanceiro[] = $dadoFinanceiro;

        return $this;
    }

    public function getDadosFinanceiro(): array
    {
        return $this->dadosFinanceiro;
    }

    public function addDadoBancario(DadoBancario $dadoBancario): self
    {
        $this->dadosBancario[] = $dadoBancario;

        return $this;
    }

    public function getDadosBancario(): array
    {
        return $this->dadosBancario;
    }

    public function addCargoEfetivo(CargoEfetivo $cargoEfetivo): self
    {
        $this->cargosEfetivo[] = $cargoEfetivo;

        return $this;
    }

    public function getCargosEfetivo(): array
    {
        return $this->cargosEfetivo;
    }

    public function addFuncaoComissionada(FuncaoComissionada $funcaoComissionada): self
    {
        $this->funcoesComissionada[] = $funcaoComissionada;

        return $this;
    }

    public function getFuncoesComissionada(): array
    {
        return $this->funcoesComissionada;
    }

    public function addAposentadoria(Aposentadoria $aposentadoria): self
    {
        $this->aposentadorias[] = $aposentadoria;

        return $this;
    }

    public function getAposentadorias(): array
    {
        return $this->aposentadorias;
    }

    public function addMovimentacao(Movimentacao $movimentacao): self
    {
        $this->movimentacoes[] = $movimentacao;

        return $this;
    }

    public function getMovimentacoes(): array
    {
        return $this->movimentacoes;
    }

    public function addDadoPromocao(DadoPromocao $dadoPromocao): self
    {
        $this->dadosPromocao[] = $dadoPromocao;

        return $this;
    }

    public function getDadosPromocao(): array
    {
        return $this->dadosPromocao;
    }

    public function getCodigo(): ?string
    {
        return $this->codigo;
    }

    public function setCodigo(?string $codigo): self
    {
        $this->codigo = $codigo;
        $this->setVisited('codigo');
        return $this;
    }

    public function getRh(): ?EntityInterface
    {
        return $this->rh;
    }

    public function setRh(?EntityInterface $rh): self
    {
        $this->rh = $rh;
        $this->setVisited('rh');
        return $this;
    }

}
