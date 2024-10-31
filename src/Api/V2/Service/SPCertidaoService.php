<?php

namespace AguPessoas\Backend\Api\V2\Service;

use AguPessoas\Backend\Api\V1\Resource\CargoEfetivoResource;
use AguPessoas\Backend\Api\V1\Resource\DadoFuncionalResource;
use AguPessoas\Backend\Api\V1\Resource\DadoPromocaoResource;
use AguPessoas\Backend\Api\V2\Enums\Certidao;
use AguPessoas\Backend\Api\V2\Resource\FeriasResource;
use AguPessoas\Backend\Api\V2\Resource\ServidorResource;
use AguPessoas\Backend\Api\V2\Resource\SPServidorResource;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Entity\SPStatusImportacaoSigepe;
use AguPessoas\Backend\Transaction\TransactionManager;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use Exception;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Symfony\Contracts\HttpClient\HttpClientInterface;
use Twig\Environment;
use Symfony\Component\HttpFoundation\Request;
use AguPessoas\Backend\Entity\SPCertidao as SPCertidaoEntity;
use AguPessoas\Backend\Api\V2\Resource\SPCertidaoResource;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\JsonResponse;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

class SPCertidaoService
{

    private $servidor = null;
    private SPServidor|null $spServidor = null;
    private $dadoFuncional = null;
    private $dadoPromocao = null;
    private $ferias = null;
    private $dadosFerias = array();
    private $cargoEfetivo = null;
    private $idServidor = null;
    private $certidao = null;
    private $certidoes = [];
    private $dadosRequisicaoCertidao = [];

    public function __construct(private readonly Pdf                   $pdfManager,
                                private readonly Environment           $twig,
                                private readonly ServidorResource      $resource,
                                private readonly DadoFuncionalResource $dadoFuncionalResource,
                                private readonly DadoPromocaoResource  $dadoPromocaoResource,
                                private readonly FeriasResource        $feriasResource,
                                private readonly CargoEfetivoResource  $cargoEfetivoResource,
                                private readonly SPCertidaoResource    $spCertidaoResource,
                                private readonly SPServidorResource    $spServidorResource,
                                private EntityManagerInterface         $entityManager,
                                protected HttpClientInterface          $httpClient,
                                protected TransactionManager           $transactionManager)
    {

    }

    /**
     * @throws RuntimeError
     * @throws LoaderError
     * @throws SyntaxError
     */
    public function gerar($dadosRequisicaoCertidao): PdfResponse
    {

        $this->dadosRequisicaoCertidao = empty($dadosRequisicaoCertidao) ? [] : $dadosRequisicaoCertidao;

        if (!$this->spServidor)
            throw new \DomainException('Servidor não definido');

        $html = $this->twig->render('certidoes/header.html.twig', ['servidor' => $this->servidor]);

        if (!$this->certidoes)
            throw new \DomainException('Certidão não definida');

        foreach ($this->certidoes as $certidao) {
            $html .= match ($certidao) {
                Certidao::DECLARACAO_LICENCA_CAPACITACAO => $this->getHtmlDeclaracaoLicencaCapacitacao(),
                Certidao::DECLARACAO_LICENCA_POS_GRADUACAO_EXTERIOR => $this->getHtmlDeclaracaoLicencaPosGraduacaoExterior(),
                Certidao::DECLARACAO_JUNTO_INSS => $this->getHtmlDeclaracaoJuntoInss(),
                Certidao::DECLARACAO_NAO_RECEBIMENTO_ASSISTENCIA_SAUDE_SUPLEMENTAR => $this->getHtmlDeclaracaoNaoRecebimentoAssistenciaSaudeSuplementar(),
                Certidao::DECLARACAO_SIMPLES_BASE => $this->getHtmlDeclaracaoSimplesBase(),
                default => ''
            };
        }

        $html .= $this->twig->render('certidoes/footer.html.twig');


        $fileName = 'SPCertidao-' . date('Y-m-d-H-i') . '.pdf';

        $pdfContent = $this->pdfManager->getOutputFromHtml($html);

        if (!in_array($certidao->value, ["DSB"])) {
            $pdfContent = base64_encode($pdfContent);
        }

        return new PdfResponse(
            $pdfContent,
            $fileName
        );

    }

    public function setSPServidor($idServidor): static
    {

        $this->idServidor = $idServidor;

        $criteria = array('idServidorAguPessoas' => $this->idServidor);
        if (!empty($this->resource->getRepository()->findOneBy($criteria))) {

            $this->spServidor = $this->spServidorResource->getRepository()->findOneBy($criteria);


        }

        return $this;

    }

    private function setDadoFuncional(): void
    {
        if ($this->dadoFuncional) {
            return;
        }

        $criteria = array('servidor' => $this->spServidor->getIdServidorAguPessoas());
        if (!empty($this->dadoFuncionalResource->getRepository()->findOneBy($criteria))) {
            $this->dadoFuncional = $this->dadoFuncionalResource->getRepository()->findOneBy($criteria);
        }
    }

    public function setCertidao($idCertidao): static
    {

        if ($this->certidao) return $this;

        $criteria = array('id' => $idCertidao);
        if (!empty($this->spCertidaoResource->getRepository()->findOneBy($criteria))) {
            $this->certidao = $this->spCertidaoResource->getRepository()->findOneBy($criteria);
        }

        return $this;
    }

    private function setCargoEfetivo(): void
    {
        if ($this->cargoEfetivo) {
            return;
        }

        $criteria = array('servidor' => $this->idServidor);
        if (!empty($this->cargoEfetivoResource->getRepository()->findOneBy($criteria))) {
            $this->cargoEfetivo = $this->cargoEfetivoResource->getRepository()->findOneBy($criteria);
        }
    }

    private function setDadoPromocao(): void
    {

        if ($this->dadoPromocao) {
            return;
        }

        $criteria = array('servidor' => $this->spServidor->getIdServidorAguPessoas());
        if (!empty($this->dadoPromocaoResource->getRepository()->findBy($criteria)[0])) {
            $this->dadoPromocao = $this->dadoPromocaoResource->getRepository()->findBy($criteria)[0];
        }
    }

    private function setFerias(): void
    {

        if ($this->ferias) {
            return;
        }

        $criteria = array('sigepeServidor' => $this->spServidor->getId());

        if (!empty($this->feriasResource->getRepository()->findBy($criteria))) {
            $this->ferias = $this->feriasResource->getRepository()->findBy($criteria);
        }
    }

    private function getHtmlDeclaracaoLicencaCapacitacao(): string
    {

        $this->setDadoFuncional();
        $this->setDadoPromocao();
        $this->setCargoEfetivo();
        $this->setFerias();

        $ferias = $this->getFerias();

        setlocale(LC_TIME, 'pt_BR.utf-8');
        $dataAtual = new \DateTime();

        $periodoDias = $this->dadosRequisicaoCertidao['infoAdicionais']['periodoDias'];
        $quinquenioInicio = $this->dadosRequisicaoCertidao['infoAdicionais']['quinquenioInicio'];
        $quinquenioFim = $this->dadosRequisicaoCertidao['infoAdicionais']['quinquenioFim'];
        $inicioUsufruto = $this->dadosRequisicaoCertidao['infoAdicionais']['inicioUsufruto'];

        return $this->twig->render('certidoes/declaracao-licenca-capacitacao.html.twig', array(
            'solicitante' => $this->spServidor->getApelido() ?? '',
            'cargo' => $this->cargoEfetivo->getCargo()->getDescricao() ?? '',
            'matriculaSiape' => $this->dadoFuncional->getMatriculaSiape() ?? '',
            'unidadeLotacao' => $this->cargoEfetivo->getLotacaoExercicio() ? $this->cargoEfetivo->getLotacaoExercicio()->getDescricao() : '',
            'ingressoServicoPublico' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'ingressoAgu' => $this->dadoFuncional->getDataIngressoOrgao() ? $this->dadoFuncional->getDataIngressoOrgao()->format("d/m/Y") : '',
            'tempoServicoPublicoAnos' => $dataAtual->diff($this->dadoFuncional->getDataIngressoServicoPublico())->y ?? 0,
            'tempoServicoPublicoMeses' => $dataAtual->diff($this->dadoFuncional->getDataIngressoServicoPublico())->m ?? 0,
            'tempoServicoPublicoDias' => $dataAtual->diff($this->dadoFuncional->getDataIngressoServicoPublico())->d ?? 0,
            'tempoExercicioCargoAnos' => $dataAtual->diff($this->dadoFuncional->getDataIngressoOrgao())->y ?? 0,
            'tempoExercicioCargoMeses' => $dataAtual->diff($this->dadoFuncional->getDataIngressoOrgao())->m ?? 0,
            'tempoExercicioCargoDias' => $dataAtual->diff($this->dadoFuncional->getDataIngressoOrgao())->d ?? 0,
            'estagioProbatorioSim' => ($this->dadoPromocao && $this->dadoPromocao->getInEstagioConfirmatorio() === 'S') ? 'x' : '',
            'estagioProbatorioNao' => ($this->dadoPromocao && $this->dadoPromocao->getInEstagioConfirmatorio() === 'N') ? 'x' : '',
            'periodoDias' => $periodoDias,
            'quinquenioInicio' => $quinquenioInicio,
            'quinquenioFim' => $quinquenioFim,
            'inicioUsufruto' => $inicioUsufruto,
            'ferias' => $ferias,
            'dataAtual' => $dataAtual->format('d \d\e F \d\e Y')
        ));
    }


    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    private function getHtmlDeclaracaoLicencaPosGraduacaoExterior(): string
    {

        $this->setDadoFuncional();
        $this->setDadoPromocao();
        $this->setCargoEfetivo();
        $this->setFerias();

        $ferias = $this->getFerias();

        $exercicio = "Brasília";
        $dataAtual = new \DateTime();
        $ingressoServicoPublicoFormatado = $dataAtual->diff($this->dadoFuncional->getDataIngressoServicoPublico());
        $periodoInicio = $this->dadosRequisicaoCertidao['infoAdicionais']['periodoInicio'];
        $periodoFim = $this->dadosRequisicaoCertidao['infoAdicionais']['periodoFim'];
        $diasPeriodo = $this->dadosRequisicaoCertidao['infoAdicionais']['diasPeriodo'];
        $anosPeriodo = $this->dadosRequisicaoCertidao['infoAdicionais']['anosPeriodo'];
        $mesesPeriodo = $this->dadosRequisicaoCertidao['infoAdicionais']['mesesPeriodo'];
        $cargoAludido = $this->dadosRequisicaoCertidao['infoAdicionais']['cargoAludido'];
        $NUP = $this->dadosRequisicaoCertidao['infoAdicionais']['nupNumero'];

        return $this->twig->render('certidoes/declaracao-licenca-pos-graduacao-exterior.html.twig', array(
            'solicitante' => $this->spServidor->getApelido() ?? '',
            'cargo' => $this->cargoEfetivo->getCargo()->getDescricao() ?? '',
            'matriculaSiape' => $this->dadoFuncional->getMatriculaSiape() ?? '',
            'unidadeLotacao' => $this->cargoEfetivo->getLotacaoExercicio() ? $this->cargoEfetivo->getLotacaoExercicio()->getDescricao() : '',
            'exercicio' => $exercicio ?? '',
            'ingressoServicoPublico' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'posseExercicio' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'anosServico' => $ingressoServicoPublicoFormatado->y ?? 0,
            'mesesServico' => $ingressoServicoPublicoFormatado->m ?? 0,
            'diasServico' => $ingressoServicoPublicoFormatado->d ?? 0,
            'periodoInicio' => $periodoInicio ?? '',
            'periodoFim' => $periodoFim ?? '',
            'diasPeriodo' => $diasPeriodo ?? 0,
            'anosPeriodo' => $anosPeriodo ?? 0,
            'mesesPeriodo' => $mesesPeriodo ?? 0,
            'ferias' => $ferias ?? [],
            'cargoAludido' => $cargoAludido ?? '',
            'dataAtual' => $dataAtual->format('d \d\e F \d\e Y')
        ));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    private function getHtmlDeclaracaoJuntoInss(): string
    {

        $this->setDadoFuncional();
        $this->setDadoPromocao();
        $this->setCargoEfetivo();
        $this->setFerias();

        $dataAtual = new \DateTime();
        $dataIngressoFormatado = $dataAtual->diff($this->dadoFuncional->getDataIngressoServicoPublico());

        return $this->twig->render('certidoes/declaracao-junto-inss.html.twig', array(
            'nome' => $this->spServidor->getApelido() ?? '',
            'cpf' => $this->spServidor->getSigepeServidor()->getCPF() ?? '',
            'dataIngresso' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'dataPosse' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'cargoEfetivo' => $this->cargoEfetivo->getCargo()->getDescricao() ?? '',
            'matriculaSiape' => $this->dadoFuncional->getMatriculaSiape() ?? '',
            'totalDias' => $dataIngressoFormatado->days ?? 0,
            'totalAnos' => $dataIngressoFormatado->y ?? 0,
            'totalMeses' => $dataIngressoFormatado->m ?? 0,
            'totalDiasRestantes' => $dataIngressoFormatado->d ?? 0,
            'dataAtual' => $dataAtual->format('d \d\e F \d\e Y')
        ));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    private function getHtmlDeclaracaoNaoRecebimentoAssistenciaSaudeSuplementar(): string
    {

        $this->setDadoFuncional();
        $this->setDadoPromocao();
        $this->setCargoEfetivo();
        $this->setFerias();

        $dataCompetencia = $this->dadosRequisicaoCertidao['infoAdicionais']['dataCompetencia'];

        return $this->twig->render('certidoes/declaracao-nao-recebimento-assistencia-saude-suplementar.html.twig', array(
            'nome' => $this->spServidor->getApelido() ?? '',
            'cpf' => $this->spServidor->getSigepeServidor()->getCPF() ?? '',
            'cargoEfetivo' => $this->cargoEfetivo->getCargo()->getDescricao() ?? '',
            'matriculaSiape' => $this->dadoFuncional->getMatriculaSiape() ?? '',
            'dataPosseExercicio' => $this->dadoFuncional->getDataIngressoServicoPublico() ? $this->dadoFuncional->getDataIngressoServicoPublico()->format("d/m/Y") : '',
            'dataCompetencia' => $dataCompetencia ?? ''
        ));
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    private function getHtmlDeclaracaoSimplesBase(): string
    {
        $this->setDadoFuncional();
        $this->setDadoPromocao();
        $this->setCargoEfetivo();
        $this->setFerias();

        $dataAtual = new \DateTime();
        $ingressoServicoOrgao = $dataAtual->diff($this->dadoFuncional->getDataIngressoOrgao());
        $localTrabalho = $this->dadosRequisicaoCertidao['infoAdicionais']['localTrabalho'];

        return $this->twig->render('certidoes/declaracao-simples-base.html.twig', array(
            'nome' => $this->spServidor->getApelido() ?? '',
            'cpf' => $this->spServidor->getSigepeServidor()->getCPF() ?? '',
            'cargo' => $this->cargoEfetivo->getCargo()->getDescricao() ?? '',
            'matriculaSiape' => $this->dadoFuncional->getMatriculaSiape() ?? '',
            'dataIngresso' => $this->dadoFuncional->getDataIngressoOrgao() ? $this->dadoFuncional->getDataIngressoOrgao()->format("d/m/Y") : '',
            'dataQuadro' => $this->dadoFuncional->getDataIngressoOrgao() ? $this->dadoFuncional->getDataIngressoOrgao()->format("d/m/Y") : '',
            'totalDias' => $ingressoServicoOrgao->days ?? 0,
            'totalAnos' => $ingressoServicoOrgao->y ?? 0,
            'totalMeses' => $ingressoServicoOrgao->m ?? 0,
            'totalDiasRestantes' => $ingressoServicoOrgao->d ?? 0,
            'localTrabalho' => $localTrabalho ?? ''
        ));
    }

    public function addCertidao(Certidao $certidao): static
    {
        $this->certidoes[] = $certidao;
        return $this;
    }


    /**
     * @return array
     */
    private
    function getFerias(): array
    {
        $i = 0;
        if (!empty($this->ferias))
            foreach ($this->ferias as $ferias) {

                $this->dadosFerias[$i]['exercicio'] = $ferias->getAnoExercicio();
                $this->dadosFerias[$i]['dataInicio'] = $ferias->getDataInicio()->format('d/m/Y');
                $this->dadosFerias[$i]['dataFim'] = $ferias->getDataFim()->format('d/m/Y');
                $this->dadosFerias[$i]['qtdDias'] = $ferias->getQtdDias();
                $i++;
            } else {
            $this->dadosFerias = array();
        }
        return $this->dadosFerias;
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws Exception
     */
    public function salvaSolicitacaoCertidaoServidor(Request $request, $NUP, $processo, $tarefa, $dataNupDataCriacaoTarefa): Response
    {
        $dadosCertidao = $request->request->all();

        $spSolicitacaoCertidaoEntity = new SPCertidaoEntity();
        $spSolicitacaoCertidaoEntity->setSPServidor($this->spServidor);
        $spSolicitacaoCertidaoEntity->setNup($NUP);
        $spSolicitacaoCertidaoEntity->setTipoCertidao($dadosCertidao['tipoCertidao']);
        $spSolicitacaoCertidaoEntity->setDataSolicitacao(new \DateTime());
        $spSolicitacaoCertidaoEntity->setJustificativaSolicitacao($dadosCertidao['justificativaSolicitacao']);
        $spSolicitacaoCertidaoEntity->setInfoAdicionais($dadosCertidao['infoAdicionais']);
        $spSolicitacaoCertidaoEntity->setStatus("AA");
        $spSolicitacaoCertidaoEntity->setIdProcesso($processo);
        $spSolicitacaoCertidaoEntity->setIdTarefa($tarefa);
        $spSolicitacaoCertidaoEntity->setNupDataCriacaoTarefa($dataNupDataCriacaoTarefa);

        try {
            $this->entityManager->persist($spSolicitacaoCertidaoEntity);
            $this->entityManager->flush();
        } catch (\Exception $e) {

            error_log($e->getMessage());

            throw $e;
        }

        $data = [
            'response' => $spSolicitacaoCertidaoEntity->toArray(),
        ];

        return new JsonResponse($data, Response::HTTP_OK);

    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws Exception
     */
    public function atualizaSolicitacaoCertidao($certidao, Request $request, $nupDataAnexoCertidao = null): JsonResponse
    {

        $dadosCertidao = $request->request->all();

        $spSolicitacaoCertidaoEntity = $this->entityManager->getRepository(SPCertidaoEntity::class)
            ->findOneBy(['id' => $certidao->getId()]);

        $spSolicitacaoCertidaoEntity->setSPServidor($this->spServidor);
        $spSolicitacaoCertidaoEntity->setTipoCertidao($this->certidao->getTipoCertidao());
        $spSolicitacaoCertidaoEntity->setJustificativaSolicitacao($dadosCertidao['justificativaSolicitacao']);
        $spSolicitacaoCertidaoEntity->setInfoAdicionais($dadosCertidao['infoAdicionais']);
        $spSolicitacaoCertidaoEntity->setDataAvaliacao(new \DateTime());
        $spSolicitacaoCertidaoEntity->setResultadoAvaliacao($dadosCertidao['resultadoAvaliacao']);
        $spSolicitacaoCertidaoEntity->setStatus($dadosCertidao['statusCriacaoTarefa']);
        $spSolicitacaoCertidaoEntity->setNupDataAnexoCertidao($nupDataAnexoCertidao);
        $spSolicitacaoCertidaoEntity->setNuplog($dadosCertidao['nupLog']);


        try {
            $this->entityManager->persist($spSolicitacaoCertidaoEntity);
            $this->entityManager->flush();
        } catch (\Exception $e) {

            error_log($e->getMessage());

            throw $e;
        }

        $data = [
            'response' => $spSolicitacaoCertidaoEntity->toArray(),
        ];


        return new JsonResponse($data, Response::HTTP_OK);
    }

    public function listaCertidaoServidor($sigepeServidor, $status): JsonResponse
    {
        $criteria = array('id' => $sigepeServidor, 'status' => $status);
        $certidao = $this->spCertidaoResource->getRepository()->findOneBy($criteria);

        if ($certidao) {
            return new JsonResponse($certidao->toArray(), Response::HTTP_OK);
        } else {
            return new JsonResponse(['message' => 'Nenhum registro encontrado.'], Response::HTTP_OK);
        }
    }


}