<?php

namespace AguPessoas\Backend\Api\V2\Controller;

use AguPessoas\Backend\Annotation\RestApiDoc;
use AguPessoas\Backend\Api\V2\DTO\SPSigepeCor;
use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Api\V2\Resource\CorResource;
use AguPessoas\Backend\Api\V2\Service\ImportSigepe\ImportSigepe;
use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Servidor;
use AguPessoas\Backend\Entity\SPSigepeDeficienciaFisica;
use AguPessoas\Backend\Entity\SPSigepeDependente;
use AguPessoas\Backend\Entity\SPSigepeEstadoCivil;
use AguPessoas\Backend\Entity\SPSigepeNacionalidade;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPSigepeSexo;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Entity\SPEtapaImportacaoSigepe;
use AguPessoas\Backend\Entity\SPStatusImportacaoSigepe;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use AguPessoas\Backend\Message\Command\CadastrarServidor;
use AguPessoas\Backend\Repository\SPSigepeServidorRepository;
use AguPessoas\Backend\Rest\RequestHandler;
use AguPessoas\Backend\Rest\Traits\Methods\AbstractFormMethods;
use AguPessoas\Backend\Rest\Traits\Methods\AbstractGenericMethods;
use AguPessoas\Backend\Transaction\Context;
use DomainException;
use http\Exception;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\HttpKernel\Exception\MethodNotAllowedHttpException;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use OpenApi\Attributes as OA;
use AguPessoas\Backend\Api\V2\Resource\SigepeServidorResource;
use AguPessoas\Backend\Rest\Controller;
use AguPessoas\Backend\Rest\ResponseHandler;
use AguPessoas\Backend\Rest\Traits\Actions;
use AguPessoas\Backend\Api\V1\Service\RelatorioServidorService;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;
use Twig\Environment;
use AguPessoas\Backend\Api\V1\Enums\TipoPDFServidor;
use Doctrine\ORM\EntityManagerInterface;

/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 *
 * @method SigepeServidorResource getResource()
 */
#[Route(path: '/v2/sigepe_servidor')]
#[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
#[OA\Tag(name: 'SigepeServidor')]
class SigepeServidorController extends Controller
{

    use Actions\Authenticated\FindAction;
    use Actions\Authenticated\FindOneAction;
    //use Actions\Authenticated\CreateAction;
    //use Actions\Authenticated\UpdateAction;
    //use Actions\Authenticated\PatchAction;
    //use Actions\Authenticated\DeleteAction;
    use Actions\Authenticated\CountAction;

    public function __construct(
        SigepeServidorResource         $resource,
        ResponseHandler                $responseHandler,
        private SigepGateway           $sigepGateway,
        private CorResource            $corResource,
        private EntityManagerInterface $entityManager

    )
    {
        $this->init($resource, $responseHandler);
    }

    #[Route(path: '/check', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja consultar',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 002,
                    'message' => 'Servidor já cadastrado',
                ]
            )
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Objeto contendo os dados para conferência',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'codCor', description: 'Código da cor no SIGEPE', type: 'string'),
                    new OA\Property(property: 'codDefFisica', description: 'Código da deficiência física no SIGEPE', type: 'string'),
                    new OA\Property(property: 'codEstadoCivil', description: 'Código do estado civil no SIGEPE', type: 'string'),
                    new OA\Property(property: 'codNacionalidade', description: 'Código da nacionalidade no SIGEPE', type: 'string'),
                    new OA\Property(property: 'codSexo', description: 'Código do sexo no SIGEPE', type: 'string'),
                    new OA\Property(property: 'dataChegBrasil', description: 'Data da chegada no Brasil', type: 'string'),
                    new OA\Property(property: 'dataNascimento', type: 'string'),
                    new OA\Property(property: 'grupoSanguineo', type: 'string'),
                    new OA\Property(property: 'nome', description: 'Nome do servidor', type: 'string'),
                    new OA\Property(property: 'nomeCor', type: 'string'),
                    new OA\Property(property: 'nomeDefFisica', type: 'string'),
                    new OA\Property(property: 'nomeEstadoCivil', type: 'string'),
                    new OA\Property(property: 'nomeMae', type: 'string'),
                    new OA\Property(property: 'nomeMunicipNasc',  type: 'string'),
                    new OA\Property(property: 'nomeNacionalidade',  type: 'string'),
                    new OA\Property(property: 'nomePai',  type: 'string'),
                    new OA\Property(property: 'nomePais', description: 'Nome do país de origem (caso não seja Brasil)', type: 'string'),
                    new OA\Property(property: 'nomeSexo', type: 'string'),
                    new OA\Property(property: 'numPisPasep', type: 'string'),
                    new OA\Property(property: 'ufNascimento', type: 'string'),
                ],
                type: 'object',
                example: [
                    "codCor" => "1",
                    "codDefFisica" => "",
                    "codEstadoCivil" => "4",
                    "codNacionalidade" => "1",
                    "codSexo" => "M",
                    "dataChegBrasil" => "",
                    "dataNascimento" => "1941-02-22",
                    "grupoSanguineo" => "O +",
                    "nome" => "FULANO DA SILVA",
                    "nomeCor" => "BRANCA",
                    "nomeDefFisica" => "",
                    "nomeEstadoCivil" => "DIVORCIADO",
                    "nomeMae" => "MARIA DA SILVA",
                    "nomeMunicipNasc" => "XIQUE-XIQUE",
                    "nomeNacionalidade" => "BRASILEIRO NATO",
                    "nomePai" => "JOÃO PEREIRA",
                    "nomePais" => "",
                    "nomeSexo" => "MASCULINO",
                    "numPisPasep" => "000000000",
                    "ufNascimento" => "BA"
                ]
            )
        )
    )]
    public function getDadosSigepe(Request $request): Response
    {
        $input = $request->toArray();

        if(empty($input['cpf']) || is_null($input['cpf'])){
            return new Response(json_encode(['code' => 001, 'message' => 'Nenhum CPF informado!']), 400, ['Content-Type' => 'application/json']);
        }

        $qtdRegistroLocal = $this->resource->count(['cpf' => 'eq:'.$input['cpf']]);

        if($qtdRegistroLocal){
            return new Response(json_encode(['code' => 002, 'message' => 'Servidor já cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        try {
            $registroSigepe = $this->sigepGateway->getDadosPessoais($input['cpf']);

            $registroSigepe->dataNascimento = ImportSigepe::convertDataSigepeToDateTime($registroSigepe->dataNascimento)->format('Y-m-d');

            return new Response(json_encode($registroSigepe), 201, ['Content-Type' => 'application/json']);
        }catch (SemRegistrosParaOCPFException $e){
            return new Response(json_encode(['code' => 003, 'message' => 'Servidor não localizado na Base do SIGEPE']), 400, ['Content-Type' => 'application/json']);
        }

    }

    #[Route(path: '/confirm', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 002,
                    'message' => 'Servidor já cadastrado',
                ]
            )
        )
    )]
    #[OA\Response(
        response: 200,
        description: 'Confirmação de servidor importado com sucesso e objeto com algumas informações do servidor criado',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'id', description: 'Código interno atribuido ao novo servidor', type: 'int'),
                    new OA\Property(property: 'uuid', description: 'Código UUID interno atribuido ao novo servidor', type: 'string'),
                    new OA\Property(property: 'nome', type: 'string'),
                    new OA\Property(property: 'cpf', type: 'string')
                ],
                type: 'object',
                example: [
                    "id" => "1",
                    "uuid" => "57cfbbd1-8961-4299-8137-d727f1337827",
                    "nome" => "JOAO DA SILVA",
                    "cpf" => "00074800087"
                ]
            )
        )
    )]
    public function importServidor(Request $request, MessageBusInterface $bus): Response
    {
        $input = $request->toArray();

        try {
            $bus->dispatch(new CadastrarServidor($input['cpf']));

            $servidor = $this->resource->findOneBy(['cpf' => $input['cpf']]);

            $data = [
                'id'    => $servidor->getId(),
                'uuid'  => $servidor->getUuid(),
                'nome'  => $servidor->getNome(),
                'cpf'   => $servidor->getCpf()
            ];

            return new Response(json_encode($data), 200, ['Content-Type' => 'application/json']);

        }catch (HandlerFailedException  $e) {
            $tipo = $e->getPrevious();

            if(!is_object($tipo))
                throw $e;

            switch ($tipo::class) {
                case DomainException::class:
                    return new Response(json_encode(['code' => $tipo->getCode(), 'message' => $tipo->getMessage()]), 400, ['Content-Type' => 'application/json']);
                    break;
                case SemRegistrosParaOCPFException::class:
                    return new Response(json_encode(['code' => 003, 'message' => 'Servidor não localizado na base do SIGEPE']), 400, ['Content-Type' => 'application/json']);
                    break;
                default:
                    return new Response(json_encode(['code' => -1, 'message' => 'EXCECAO TRATAVEL MAS NAO TRATADA: '. $e->getMessage()]), 400, ['Content-Type' => 'application/json']);

            }

        }catch (\Exception $e){
            return new Response(json_encode(['code' => -1, 'message' => $e->getMessage()]), 400, ['Content-Type' => 'application/json']);
        }

    }

    #[Route(path: '/import/dados-pessoais', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados pessoais do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados pessoais importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDadosPessoais(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DADOS_PESSOAIS, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/dados-escolares', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados escolares do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados escolares importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDadosEscolares(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DADOS_ESCOLARES, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/endereco-telefone', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados de endereço e telefone do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados de endereço e telefone importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importEnderecoTelefone(Request $request): Response
    {
        $input = $request->toArray();

        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 002, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::ENDERECO_TELEFONE, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/documentacao', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados de documentação do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados de documentação importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDocumentacao(Request $request): Response
    {
        $input = $request->toArray();

        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 002, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DOCUMENTACAO, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/dados-bancarios', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados bancários do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados bancários importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDadosBancarios(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DADOS_BANCARIOS, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/dependentes', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dependentes do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dependentes importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDependentes(Request $request): Response
    {
        $input = $request->toArray();

        try {
            $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

            if(!$servidor){
                return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
            }

            $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DEPENDENTES, $servidor, $this->entityManager);
            $objImportSigepe->importar();

            return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
        }catch (SemRegistrosParaOCPFException $e){
            return new Response(json_encode(['code' => 005, 'message' => 'Sem registro de dependentes para este servidor!']), 400, ['Content-Type' => 'application/json']);
        }catch (\Exception $e){
            throw $e;
        }

    }

    #[Route(path: '/import/ferias', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar as férias do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de férias importada com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importFerias(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::FERIAS, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/dados-funcionais', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os dados funcionais do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de dados funcionais importado com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importDadosFuncionais(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::DADOS_FUNCIONAIS, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    #[Route(path: '/import/afastamentos', methods: ['POST'])]
    #[Security("is_granted('IS_AUTHENTICATED_FULLY')")]
    #[RestApiDoc]
    #[OA\Post]
    #[OA\RequestBody(
        description: 'Objeto contendo CPF que deseja importar os afastamentos do SIGEPE',
        required: true,
        content: [
            new OA\MediaType(
                mediaType: 'application/json',
                schema: new OA\Schema(
                    type: 'object',
                    example: [
                        'cpf' => '00000000000',
                    ]
                )
            ),
        ]
    )]
    #[OA\Response(response: 200, description: 'Confirmação de afastamentos importados com sucesso!')]
    #[OA\Response(
        response: 400,
        description: 'Bad Request',
        content: new OA\MediaType(
            mediaType: 'application/json',
            schema: new OA\Schema(
                properties: [
                    new OA\Property(property: 'code', description: 'Error code', type: 'integer'),
                    new OA\Property(property: 'message', description: 'Error description', type: 'string'),
                ],
                type: 'object',
                example: [
                    'code' => 004,
                    'message' => 'Servidor não cadastrado',
                ]
            )
        )
    )]
    public function importAfastamentos(Request $request): Response
    {
        $input = $request->toArray();


        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $input['cpf']]);

        if(!$servidor){
            return new Response(json_encode(['code' => 004, 'message' => 'Servidor não cadastrado!']), 400, ['Content-Type' => 'application/json']);
        }

        $objImportSigepe = new ImportSigepe(EtapasImportacaoSigepe::AFASTAMENTOS, $servidor, $this->entityManager);
        $objImportSigepe->importar();

        return new Response(json_encode(['status' => true]), 201, ['Content-Type' => 'application/json']);
    }

    // Traits
    use AbstractFormMethods;
    use AbstractGenericMethods;

    /**
     * Generic 'createMethod' method for REST resources.
     *
     * @param string[]|null $allowedHttpMethods
     *
     * @throws LogicException
     * @throws Throwable
     * @throws HttpException
     * @throws MethodNotAllowedHttpException
     */
    public function _createMethod(
        Request $request,
        FormFactoryInterface $formFactory,
        ?array $allowedHttpMethods = null
    ): Response {

        $allowedHttpMethods ??= ['POST'];

        // Make sure that we have everything we need to make this work
        $this->validateRestMethod($request, $allowedHttpMethods);

        $context = RequestHandler::getContext($request);
        dd('deu bom', $this->processFormMapper($request, self::METHOD_CREATE));
        try {
            $transactionId = $this->transactionManager->begin();

            foreach ($context as $name => $value) {
                $this->transactionManager->addContext(
                    new Context($name, $value),
                    $transactionId
                );
            }

            $data = $this
                ->getResource()
                ->create($this->processFormMapper($request, self::METHOD_CREATE), $transactionId, true);

            $this->transactionManager->commit($transactionId);

            $populate = RequestHandler::getPopulate($request, $this->getResource());

            if ([] !== $populate) {
                $data = $this->getResource()->findOne($data->getId(), $populate);
            }

            return $this
                ->getResponseHandler()
                ->createResponse($request, $data, Response::HTTP_CREATED);
        } catch (Throwable $exception) {
            throw $this->handleRestMethodException($exception);
        }
    }

}
