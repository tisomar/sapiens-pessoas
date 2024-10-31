<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\SPSigepeFerias;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Gateways\Sigep\Outputs\InfoFeriasOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportFerias
{

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getDadosFerias($this->sigepeServidor->getCpf());


        foreach ($dados->afastamentosPorMatricula as $matricula){

            $arrFerias = $matricula->arrFerias;

            foreach ($arrFerias as $ferias)
            {
                $hash = $this->makeHash($ferias, $matricula->grMatricula);

                $registroAuxiliar = $this->entityManager->getRepository(SPSigepeFerias::class)->findOneBy(['hash' => $hash]);

                if (!$registroAuxiliar) {
                    $registroAuxiliar = new SPSigepeFerias();
                    $registroAuxiliar->setSigepeServidor($this->sigepeServidor);
                    $registroAuxiliar->setHash($hash);
                }

                $registroAuxiliar->setAnoExercicio($ferias->anoExercicio);
                $registroAuxiliar->setMatricula($matricula->grMatricula);
                $registroAuxiliar->setDataInicio(ImportSigepe::convertDataSigepeToDateTime($ferias->dataIni));
                $registroAuxiliar->setDataFim(ImportSigepe::convertDataSigepeToDateTime($ferias->dataFim));
                $registroAuxiliar->setDataInicioAquisicao(ImportSigepe::convertDataSigepeToDateTime($ferias->dataInicioAquisicao));
                $registroAuxiliar->setDataFimAquisicao(ImportSigepe::convertDataSigepeToDateTime($ferias->dataFimAquisicao));
                $registroAuxiliar->setNumeroParcela($ferias->numeroDaParcela);
                $registroAuxiliar->setQtdDias((int) $ferias->qtdeDias);
                $registroAuxiliar->setParcelaInterrompida(!(($ferias->parcelaInterrompida === 'N')));
                $registroAuxiliar->setDiasRestantes($ferias->diasRestantes);
                $registroAuxiliar->setParcelaContinuacaoInterrupcao(!(($ferias->parcelaContinuacaoInterrupcao === 'N')));
                $registroAuxiliar->setDataInicioFeriasInterrompidas((!empty($ferias->anoExercicio)) ? ImportSigepe::convertDataSigepeToDateTime($ferias->dataInicioFeriasInterrompidas) : null);
                $registroAuxiliar->setAdiantamentoSalarioFerias(!(($ferias->adiantamentoSalarioFerias === 'N')));
                $registroAuxiliar->setGratificacaoNatalina(!(($ferias->gratificacaoNatalina === 'N')));

                $this->entityManager->persist($registroAuxiliar);



            }
        }

        $this->entityManager->flush();

        return $this->sigepeServidor;
    }

    public function makeHash(InfoFeriasOutput $infoFerias, $matricula)
    {
        return md5($this->sigepeServidor->getId() . $matricula . $infoFerias->dataIni . $infoFerias->dataFim);
    }

}