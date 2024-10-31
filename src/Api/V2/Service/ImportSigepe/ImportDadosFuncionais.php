<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\CargoEfetivo;
use AguPessoas\Backend\Entity\DadoFuncional;
use AguPessoas\Backend\Entity\Orgao;
use AguPessoas\Backend\Entity\SPDadoFuncionalDadosComplementares;
use AguPessoas\Backend\Entity\SPSigepeAtividadeFuncional;
use AguPessoas\Backend\Entity\SPSigepeCargo;
use AguPessoas\Backend\Entity\SPSigepeClasse;
use AguPessoas\Backend\Entity\SPSigepeDadoFuncional;
use AguPessoas\Backend\Entity\SPSigepeFuncao;
use AguPessoas\Backend\Entity\SPSigepeJornada;
use AguPessoas\Backend\Entity\SPSigepeOrgao;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPSigepeSituacaoFuncional;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAposentadoria;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaExclusao;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoOrgao;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIngressoServicoPublico;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaIsencaoIr;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaPss;
use AguPessoas\Backend\Entity\SPSigepeUorg;
use AguPessoas\Backend\Entity\SPSigepeUpag;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosFuncionaisOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\FuncaoOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDadosFuncionais
{
    private $atividadeFuncional = null;
    private $cargo = null;
    private $classe = null;
    private $funcao = null;
    private $jornada = null;
    private $tipoAposentadoria = null;
    private $tipoExclusao = null;
    private $tipoIngressoOrgao = null;
    private $tipoIngressoServicoPublico = null;
    private $tipoIsencaoIr = null;
    private $tipoPss = null;
    private $orgao = null;
    private $orgaoOrigem = null;
    private $situacaoFuncional = null;
    private $uorgExercicio = null;
    private $uorgLotacao = null;
    private $upag = null;

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dadosFuncionais = $this->gateway->getDadosFuncionais($this->sigepeServidor->getCpf());

        $this->importDadosComplementaresAGUPessoas();

        foreach ($dadosFuncionais->dados as $dadoFuncional) {

            $this->importDadosAuxiliares($dadoFuncional);

            $hash = $this->makeHash($dadoFuncional);

            $registroPrincipal = $this->entityManager->getRepository(SPSigepeDadoFuncional::class)->findOneBy(['hash' => $hash]);

            if (!$registroPrincipal) {
                $registroPrincipal = new SPSigepeDadoFuncional();
                $registroPrincipal->setSigepeServidor($this->sigepeServidor);
                $registroPrincipal->setHash($hash);
            }

            $registroPrincipal->setOrgao($this->orgao);
            $registroPrincipal->setMatricula($dadoFuncional->matriculaSiape);
            $registroPrincipal->setAtividadeFuncional($this->atividadeFuncional);
            $registroPrincipal->setSigepeCargo($this->cargo);
            $registroPrincipal->setSigepeClasse($this->classe);
            $registroPrincipal->setSigepeFuncao($this->funcao);
            $registroPrincipal->setJornada($this->jornada);
            $registroPrincipal->setOcorrenciaAposentadoria($this->tipoAposentadoria);
            $registroPrincipal->setDataAposentadoria(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataOcorrAposentadoria));
            $registroPrincipal->setOcorrenciaExclusao($this->tipoExclusao);
            $registroPrincipal->setDataExclusao(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataOcorrExclusao));
            $registroPrincipal->setOcorrenciaIngressoOrgao($this->tipoIngressoOrgao);
            $registroPrincipal->setDataIngressoOrgao(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataOcorrIngressoOrgao));
            $registroPrincipal->setOcorrenciaIngressoServicoPublico($this->tipoIngressoServicoPublico);
            $registroPrincipal->setDataIngressoServicoPublico(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataOcorrIngressoServPublico));
            $registroPrincipal->setOcorrenciaIsencaoIr($this->tipoIsencaoIr);
            $registroPrincipal->setDataInicioIsencaoIR(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataIniOcorrIsencaoIR));
            $registroPrincipal->setDataFimIsencaoIR(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataFimOcorrIsencaoIR));
            $registroPrincipal->setOcorrenciaPss($this->tipoPss);
            $registroPrincipal->setDataInicioPSS(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataIniOcorrPSS));
            $registroPrincipal->setDataFimPSS(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataFimOcorrPSS));
            $registroPrincipal->setCodigoPadrao($dadoFuncional->codPadrao);
            $registroPrincipal->setSituacaoFuncional($this->situacaoFuncional);
            $registroPrincipal->setUorgExercicio($this->uorgExercicio);
            $registroPrincipal->setUorgLotacao($this->uorgLotacao);
            $registroPrincipal->setUpag($this->upag);
            $registroPrincipal->setValeTransporteCodigo($dadoFuncional->codValeTransporte);
            $registroPrincipal->setValeTransporteValor($dadoFuncional->valorValeTransporte);
            $registroPrincipal->setValeArTipo($dadoFuncional->tipoValeAR);
            $registroPrincipal->setValeArDataInicio(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataIniValeAR));
            $registroPrincipal->setValeArDataFim(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataFimValeAR));
            $registroPrincipal->setOrgaoOrigem($this->orgaoOrigem);
            $registroPrincipal->setChefiaImediataEmail($dadoFuncional->emailChefiaImediata);
            $registroPrincipal->setChefiaImediataCPF($dadoFuncional->cpfChefiaImediata);
            $registroPrincipal->setDataExercicioOrgao(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataExercicioNoOrgao));
            $registroPrincipal->setDataIngressoFuncao(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataIngressoFuncao));
            $registroPrincipal->setDataIngressoNovaFuncao(ImportSigepe::convertDataSigepeToDateTime($dadoFuncional->dataIngressoNovaFuncao));
            $registroPrincipal->setPercentualTS($dadoFuncional->percentualTS);
            $registroPrincipal->setPontuacaoDesempenho($dadoFuncional->pontuacaoDesempenho);
            $registroPrincipal->setNivelCargoSigla($dadoFuncional->siglaNivelCargo);

            $this->entityManager->persist($registroPrincipal);
            $this->entityManager->flush();

            $this->resetDadosAuxiliares();

        }

        if($dadoFuncional){
            $this->sigepeServidor->setIdentificacaoUnica($dadoFuncional->identUnica);
            $this->sigepeServidor->setEmailInstitucional($dadoFuncional->emailInstitucional);
            $this->entityManager->persist($this->sigepeServidor);
            $this->entityManager->flush();
        }


        return $this->sigepeServidor;
    }

    private function importDadosAuxiliares(FuncaoOutput $registro)
    {
        if($registro->codAtivFun){
            $this->atividadeFuncional = $this->importAtividadeFuncional($registro);
        }

        if($registro->codCargo){
            $this->cargo = $this->importCargo($registro);
        }

        if($registro->codClasse){
            $this->classe = $this->importClasse($registro);
        }

        if($registro->codFuncao){
            $this->funcao = $this->importFuncao($registro);
        }

        if($registro->codJornada){
            $this->jornada = $this->importJornada($registro);
        }

        if($registro->codOcorrAposentadoria){
            $this->tipoAposentadoria = $this->importTipoAposentadoria($registro);
        }

        if($registro->codOcorrExclusao){
            $this->tipoExclusao = $this->importTipoExclusao($registro);
        }

        if($registro->codOcorrIngressoOrgao){
            $this->tipoIngressoOrgao = $this->importTipoIngressoOrgao($registro);
        }

        if($registro->codOcorrIngressoServPublico){
            $this->tipoIngressoServicoPublico = $this->importTipoIngressoServicoPublico($registro);
        }

        if($registro->codOcorrIsencaoIR){
            $this->tipoIsencaoIr = $this->importTipoIsencaoIr($registro);
        }

        if($registro->codOcorrPSS){
            $this->tipoPss = $this->importTipoPss($registro);
        }

        if($registro->codOrgao){
            $this->orgao = $this->importOrgao($registro);
        }

        if($registro->codigoOrgaoOrigem){
            $this->orgaoOrigem = $this->importOrgaoOrigem($registro);
        }

        if($registro->codSitFuncional){
            $this->situacaoFuncional = $this->importSituacaoFuncional($registro);
        }

        if($registro->codUorgExercicio){
            $this->uorgExercicio = $this->importUorgExercicio($registro);
        }

        if($registro->codUorgLotacao){
            $this->uorgLotacao = $this->importUorgLotacao($registro);
        }

        if($registro->codUpag){
            $this->upag = $this->importUpag($registro);
        }

    }

    private function resetDadosAuxiliares()
    {
        $this->atividadeFuncional = null;
        $this->cargo = null;
        $this->classe = null;
        $this->funcao = null;
        $this->jornada = null;
        $this->tipoAposentadoria = null;
        $this->tipoExclusao = null;
        $this->tipoIngressoOrgao = null;
        $this->tipoIngressoServicoPublico = null;
        $this->tipoIsencaoIr = null;
        $this->tipoPss = null;
        $this->orgao = null;
        $this->orgaoOrigem = null;
        $this->situacaoFuncional = null;
        $this->uorgExercicio = null;
        $this->uorgLotacao = null;
        $this->upag = null;
    }

    private function importDadosComplementaresAGUPessoas()
    {
        $dadosComplementaresServidor = $this->sigepeServidor->getServidor();

        $dadosAGU = $this->entityManager->getRepository(DadoFuncional::class)->findOneBy(['servidor' => $dadosComplementaresServidor->getIdServidorAguPessoas()]);

        $dadosComplementares = $this->entityManager->getRepository(SPDadoFuncionalDadosComplementares::class)->findOneBy(
            ['sigepeServidor' => $this->sigepeServidor->getId()]
        );

        if(!$dadosComplementares){

            $dadosComplementaresDadoFuncional = new SPDadoFuncionalDadosComplementares();
            $dadosComplementaresDadoFuncional->setSigepeServidor($this->sigepeServidor);

            if($dadosAGU){
                $dadosComplementaresDadoFuncional->setRescisaoRais($dadosAGU->getRescisaoRais());
                $dadosComplementaresDadoFuncional->setSituacaoRais($dadosAGU->getSituacaoRais());
                $dadosComplementaresDadoFuncional->setVinculoRais($dadosAGU->getVinculoRais());
                $dadosComplementaresDadoFuncional->setTipoAdmissao($dadosAGU->getTipoAdmissao());
                $dadosComplementaresDadoFuncional->setTipoSalario($dadosAGU->getTipoSalario());
                $dadosComplementaresDadoFuncional->setAreaAtuacao($dadosAGU->getAreaAtuacao());
                $dadosComplementaresDadoFuncional->setDataRescisao($dadosAGU->getDataRescisao());

                $cargoEfetivo = $this->entityManager->getRepository(CargoEfetivo::class)->findOneBy(['servidor' => $dadosComplementaresServidor->getIdServidorAguPessoas()]);

                if($cargoEfetivo){
                    $dadosComplementaresDadoFuncional->setLotacaoOrigem($cargoEfetivo->getLotacaoOrigem());
                    $dadosComplementaresDadoFuncional->setLotacaoExercicio($cargoEfetivo->getLotacaoExercicio());
                }
            }

            $this->entityManager->persist($dadosComplementaresDadoFuncional);
        }


    }


    private function importAtividadeFuncional(FuncaoOutput $registro): SPSigepeAtividadeFuncional
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeAtividadeFuncional::class)->findOneBy(['codigoSigepe' => $registro->codAtivFun]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeAtividadeFuncional();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codAtivFun);
        $registroAuxiliar->setNome($registro->nomeAtivFun);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importCargo(FuncaoOutput $registro): SPSigepeCargo
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeCargo::class)->findOneBy(['codigoSigepe' => $registro->codCargo]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeCargo();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codCargo);
        $registroAuxiliar->setNome($registro->nomeCargo);
        $registroAuxiliar->setNome($registro->nomeCargo);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importClasse(FuncaoOutput $registro): SPSigepeClasse
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeClasse::class)->findOneBy(['codigoSigepe' => $registro->codClasse]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeClasse();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codClasse);
        $registroAuxiliar->setNome($registro->nomeClasse);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importFuncao(FuncaoOutput $registro): SPSigepeFuncao
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeFuncao::class)->findOneBy(['codigoSigepe' => $registro->codFuncao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeFuncao();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codFuncao);
        $registroAuxiliar->setNome($registro->nomeFuncao);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importJornada(FuncaoOutput $registro): SPSigepeJornada
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeJornada::class)->findOneBy(['codigoSigepe' => $registro->codJornada]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeJornada();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codJornada);
        $registroAuxiliar->setNome($registro->nomeJornada);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoAposentadoria(FuncaoOutput $registro): SPSigepeTipoOcorrenciaAposentadoria
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaAposentadoria::class)->findOneBy(['codigoSigepe' => $registro->codOcorrAposentadoria]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaAposentadoria();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrAposentadoria);
        $registroAuxiliar->setNome($registro->nomeOcorrAposentadoria);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoExclusao(FuncaoOutput $registro): SPSigepeTipoOcorrenciaExclusao
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaExclusao::class)->findOneBy(['codigoSigepe' => $registro->codOcorrExclusao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaExclusao();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrExclusao);
        $registroAuxiliar->setNome($registro->nomeOcorrExclusao);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoIngressoOrgao(FuncaoOutput $registro): SPSigepeTipoOcorrenciaIngressoOrgao
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaIngressoOrgao::class)->findOneBy(['codigoSigepe' => $registro->codOcorrIngressoOrgao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaIngressoOrgao();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrIngressoOrgao);
        $registroAuxiliar->setNome($registro->nomeOcorrIngressoOrgao);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoIngressoServicoPublico(FuncaoOutput $registro): SPSigepeTipoOcorrenciaIngressoServicoPublico
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaIngressoServicoPublico::class)->findOneBy(['codigoSigepe' => $registro->codOcorrIngressoServPublico]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaIngressoServicoPublico();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrIngressoServPublico);
        $registroAuxiliar->setNome((empty($registro->nomeOcorrIngressoServPublico)) ? 'NAODFD' : $registro->nomeOcorrIngressoServPublico);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoIsencaoIr(FuncaoOutput $registro): SPSigepeTipoOcorrenciaIsencaoIr
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaIsencaoIr::class)->findOneBy(['codigoSigepe' => $registro->codOcorrIsencaoIR]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaIsencaoIr();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrIsencaoIR);
        $registroAuxiliar->setNome($registro->nomeOcorrIsencaoIR);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoPss(FuncaoOutput $registro): SPSigepeTipoOcorrenciaPss
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaPss::class)->findOneBy(['codigoSigepe' => $registro->codOcorrPSS]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaPss();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrPSS);
        $registroAuxiliar->setNome($registro->nomeOcorrPSS);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importOrgao(FuncaoOutput $registro): Orgao
    {
        $registroAuxiliar = $this->entityManager->getRepository(Orgao::class)->findOneBy(['codigo' => $registro->codOrgao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new Orgao();
        }

        $registroAuxiliar->setCodigo($registro->codOrgao);
        $registroAuxiliar->setDescricao((empty($registro->nomeOrgao)) ? 'NAODFD' : $registro->nomeOrgao);
        $registroAuxiliar->setSigla((empty($registro->siglaOrgao)) ? 'NAODFD' : $registro->siglaOrgao);


        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importOrgaoOrigem(FuncaoOutput $registro): Orgao
    {
        $registroAuxiliar = $this->entityManager->getRepository(Orgao::class)->findOneBy(['codigo' => $registro->codigoOrgaoOrigem]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new Orgao();
        }

        $registroAuxiliar->setCodigo($registro->codigoOrgaoOrigem);
        $registroAuxiliar->setDescricao('NOME NAO DEFINIDO');
        $registroAuxiliar->setSigla((empty($registro->siglaOrgaoOrigem)) ? 'NAODFD' : $registro->siglaOrgaoOrigem);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importSituacaoFuncional(FuncaoOutput $registro): SPSigepeSituacaoFuncional
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeSituacaoFuncional::class)->findOneBy(['codigoSigepe' => $registro->codSitFuncional]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeSituacaoFuncional();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codSitFuncional);
        $registroAuxiliar->setNome($registro->nomeSitFuncional);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importUorgExercicio(FuncaoOutput $registro): SPSigepeUorg
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeUorg::class)->findOneBy(['codigoSigepe' => $registro->codUorgExercicio]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeUorg();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codUorgExercicio);
        $registroAuxiliar->setNome(empty($registro->nomeUorgExercicio) ? 'NAODFD' : $registro->nomeUorgExercicio);
        $registroAuxiliar->setSigla(empty($registro->siglaUorgExercicio) ? 'NAODFD' : $registro->siglaUorgExercicio);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importUorgLotacao(FuncaoOutput $registro): SPSigepeUorg
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeUorg::class)->findOneBy(['codigoSigepe' => $registro->codUorgLotacao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeUorg();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codUorgLotacao);
        $registroAuxiliar->setNome(empty($registro->nomeUorgLotacao) ? 'NAODFD' : $registro->nomeUorgLotacao);
        $registroAuxiliar->setSigla(empty($registro->siglaUorgLotacao) ? 'NAODFD' : $registro->siglaUorgLotacao);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importUpag(FuncaoOutput $registro): SPSigepeUpag
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeUpag::class)->findOneBy(['codigoSigepe' => $registro->codUpag]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeUpag();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codUpag);
        $registroAuxiliar->setNome((empty($registro->nomeUpag)) ? 'NAODFD' : $registro->nomeUpag);
        $registroAuxiliar->setSigla((empty($registro->siglaUpag)) ? 'NAODFD' : $registro->siglaUpag);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    public function makeHash(FuncaoOutput $infoDadoFuncional): string
    {
        return md5($this->sigepeServidor->getId() . $infoDadoFuncional->codOrgao . $infoDadoFuncional->matriculaSiape);
    }


}