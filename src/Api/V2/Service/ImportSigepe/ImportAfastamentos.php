<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\SPSigepeAfastamento;
use AguPessoas\Backend\Entity\SPSigepeDadoFuncional;
use AguPessoas\Backend\Entity\SPSigepeFerias;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPSigepeTipoDiplomaAfastamento;
use AguPessoas\Backend\Entity\SPSigepeTipoOcorrenciaAfastamento;
use AguPessoas\Backend\Gateways\Sigep\Outputs\InfoFeriasOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportAfastamentos
{
    private $tipoOcorrencia = null;
    private $tipoDiploma = null;

    public function __construct(
        private SPSigepeServidor $sigepeServidor,
        private SigepGateway $gateway,
        private EntityManagerInterface $entityManager,
        private bool $isHistorico = false
    )
    {

    }
    public function importar()
    {
        if($this->isHistorico){
            $dadosFuncionais = $this->entityManager->getRepository(SPSigepeDadoFuncional::class)->findBy(
                ['sigepeServidor' => $this->sigepeServidor->getId()],
                ['dataIngressoServicoPublico' => 'asc'],
                1
            );

            if(!count($dadosFuncionais)){
                throw new \DomainException('Sem registro funcional cadastrado para este servidor', 3);
            }

            $dtIngresso = $dadosFuncionais[0]->getDataIngressoServicoPublico();

            $dados = $this->gateway->getDadosAfastamentoHistorico($this->sigepeServidor->getCpf(),
            [
                'anoInicial' => $dtIngresso->format('Y'),
                'mesInicial' => $dtIngresso->format('m'),
                'anoFinal' => (new \DateTime())->format('Y'),
                'mesFinal' => (new \DateTime())->format('m')
            ]);

        }else{
            $dados = $this->gateway->getDadosAfastamento($this->sigepeServidor->getCpf());
        }

        foreach ($dados->afastamentosPorMatricula as $matricula){

            $ocorrencias = $matricula->ocorrencias->DadosOcorrencias ?? [];

            if(is_array($ocorrencias)){
                foreach ($ocorrencias as $ocorrencia)
                {
                    $this->importOcorrencia($ocorrencia, $matricula->grMatricula);

                }
            }else{
                $this->importOcorrencia($ocorrencias, $matricula->grMatricula);
            }

        }



        return $this->sigepeServidor;
    }

    private function importOcorrencia($ocorrencia, $matricula)
    {
        $this->importDadosAuxiliares($ocorrencia);

        $hash = $this->makeHash($ocorrencia, $matricula);

        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeAfastamento::class)->findOneBy(['hash' => $hash]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeAfastamento();
            $registroAuxiliar->setSigepeServidor($this->sigepeServidor);
            $registroAuxiliar->setHash($hash);
        }

        $registroAuxiliar->setMatricula($matricula);
        $registroAuxiliar->setTipo($this->tipoOcorrencia);
        $registroAuxiliar->setTipoDiploma($this->tipoDiploma);
        $registroAuxiliar->setDataInicio(ImportSigepe::convertDataSigepeToDateTime($ocorrencia->dataIni));
        $registroAuxiliar->setDataFim(ImportSigepe::convertDataSigepeToDateTime($ocorrencia->dataFim));

        $this->entityManager->persist($registroAuxiliar);
        $this->entityManager->flush();
    }

    private function importDadosAuxiliares($registro)
    {
        if ($registro->codOcorrencia) {
            $this->tipoOcorrencia = $this->importTipoOcorrencia($registro);
        }

        if ($registro->codDiplomaAfastamento) {
            $this->tipoDiploma = $this->importTipoDiploma($registro);
        }
    }

    private function importTipoOcorrencia($registro): SPSigepeTipoOcorrenciaAfastamento
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoOcorrenciaAfastamento::class)->findOneBy(['codigoSigepe' => $registro->codOcorrencia]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoOcorrenciaAfastamento();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codOcorrencia);
        $registroAuxiliar->setNome($registro->descOcorrencia);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTipoDiploma($registro): SPSigepeTipoDiplomaAfastamento
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoDiplomaAfastamento::class)->findOneBy(['codigoSigepe' => $registro->codDiplomaAfastamento]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoDiplomaAfastamento();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codDiplomaAfastamento);
        $registroAuxiliar->setNome($registro->descDiplomaAfastamento);
        $registroAuxiliar->setDataPublicacao(ImportSigepe::convertDataSigepeToDateTime($registro->dataPublicacaoAfastamento, true));
        $registroAuxiliar->setNumeroDiploma($registro->numeroDiplomaAfastamento);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    public function makeHash($infoOcorrencia, $matricula)
    {
        return md5($this->sigepeServidor->getId() . $matricula . $infoOcorrencia->codOcorrencia . $infoOcorrencia->dataIni . $infoOcorrencia->dataFim);
    }

}