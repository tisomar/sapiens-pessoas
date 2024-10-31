<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\Dependente;
use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Orgao;
use AguPessoas\Backend\Entity\SPDependenteDadosComplementares;
use AguPessoas\Backend\Entity\SPSigepeBeneficio;
use AguPessoas\Backend\Entity\SPSigepeCondicaoDependente;
use AguPessoas\Backend\Entity\SPSigepeDependente;
use AguPessoas\Backend\Entity\SPSigepeDependenteOrgao;
use AguPessoas\Backend\Entity\SPSigepeGrauParentesco;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Entity\SPSigepeTipoBeneficio;
use AguPessoas\Backend\Gateways\Sigep\Outputs\BeneficioDependenteOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DependenteOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDependentes
{
    private $condicao;
    private $grauParentesco;
    private $orgao;
    private $tipoBeneficios = [];

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getDependentes($this->sigepeServidor->getCpf());

        foreach ($dados->dados as $dadosDependente) {


            $this->importDadosAuxiliares($dadosDependente);
            #dd(['cpf' => $dadosDependente->cpf]);
            $dependente = $this->entityManager->getRepository(SPSigepeDependente::class)->findOneBy(
                ['nome' => $dadosDependente->nome, 'sigepeServidor' => $this->sigepeServidor->getId()]
            );

            if(!$dependente){
                $dependente = new SPSigepeDependente();
                $dependente->setSigepeServidor($this->sigepeServidor);
                $dependente->setCpf($dadosDependente->cpf);

                $dependenteOrgao = new SPSigepeDependenteOrgao();
                $dependenteOrgao->setSigepeDependente($dependente);
                $dependenteOrgao->setOrgao($this->orgao);

                $this->importDadosComplementaresAGUPessoas($dependente);
            }else{
                $dependenteOrgao = $this->entityManager->getRepository(SPSigepeDependenteOrgao::class)->findOneBy(
                    ['sigepeDependente' => $dependente->getId(), 'orgao' => $this->orgao->getId()]
                );

                if(!$dependenteOrgao){
                    $dependenteOrgao = new SPSigepeDependenteOrgao();
                    $dependenteOrgao->setSigepeDependente($dependente);
                    $dependenteOrgao->setOrgao($this->orgao);
                }
            }

            $dependente->setCpf($dadosDependente->cpf);
            $dependente->setNome($dadosDependente->nome);

            $dependenteOrgao->setMatricula($dadosDependente->matricula);
            $dependenteOrgao->setParentesco($this->grauParentesco);
            $dependenteOrgao->setCondicao($this->condicao);

            $this->entityManager->persist($dependente);
            $this->entityManager->persist($dependenteOrgao);
            $this->entityManager->flush();

            foreach ($dadosDependente->beneficios as $dadosBeneficio){
                if($dadosBeneficio->codBeneficio){
                    $tipo = $this->entityManager->getRepository(SPSigepeTipoBeneficio::class)->findOneBy(['codigoSigepe' => $dadosBeneficio->codBeneficio]);

                    if($tipo){
                        $beneficio = $this->entityManager->getRepository(SPSigepeBeneficio::class)->findOneBy(
                            [
                                'tipo' => $tipo->getId(),
                                'dependenteOrgao' => $dependenteOrgao->getId(),
                                'dataInicio'    => ImportSigepe::convertDataSigepeToDateTime($dadosBeneficio->dataInicio)
                            ]
                        );

                        if(!$beneficio){
                            $beneficio = new SPSigepeBeneficio();
                            $beneficio->setDependenteOrgao($dependenteOrgao);
                            $beneficio->setTipo($tipo);
                        }

                        $beneficio->setDataInicio(ImportSigepe::convertDataSigepeToDateTime($dadosBeneficio->dataInicio));
                        $beneficio->setDataFim(ImportSigepe::convertDataSigepeToDateTime($dadosBeneficio->dataFim));

                        $this->entityManager->persist($beneficio);
                        $this->entityManager->flush();
                    }
                }
            }

            #$this->entityManager->flush();

        }
        #$this->entityManager->flush();


        return $this->sigepeServidor;
    }

    private function importDadosAuxiliares(DependenteOutput $registro)
    {
        if($registro->codCondicao){
            $this->condicao = $this->importCondicao($registro);
        }

        if($registro->codGrauParentesco){
            $this->grauParentesco = $this->importGrauParentesco($registro);
        }

        if($registro->codOrgao){
            $this->orgao = $this->importOrgao($registro);
        }

        $this->tipoBeneficios = [];

        foreach ($registro->beneficios as $beneficio){
            if($beneficio->codBeneficio){
                $this->tipoBeneficios[] = $this->importTipoBeneficio($beneficio);
            }
        }



    }

    private function importDadosComplementaresAGUPessoas(SPSigepeDependente $dependente)
    {
        $dadosAGU = $this->entityManager->getRepository(Dependente::class)->findOneBy(['cpfDependente' => $dependente->getCpf()]);

        $dadosComplementares = $this->entityManager->getRepository(SPDependenteDadosComplementares::class)->findOneBy(
            ['sigepeDependente' => $dependente->getId()]
        );

        if(!$dadosComplementares){

            $dadosComplementaresDependente = new SPDependenteDadosComplementares();
            $dadosComplementaresDependente->setSigepeDependente($dependente);


            if($dadosAGU){
                $dadosComplementaresDependente->setDataNascimento($dadosAGU->getDataNascimento());
                $dadosComplementaresDependente->setSexo($dadosAGU->getSexo());
                $dadosComplementaresDependente->setNomePai($dadosAGU->getPai());
                $dadosComplementaresDependente->setNomeMae($dadosAGU->getMae());
                $dadosComplementaresDependente->setDataCasamento($dadosAGU->getDataCasamento());
                $dadosComplementaresDependente->setCnDataRegistro($dadosAGU->getDataCertidaoNascimento());
                $dadosComplementaresDependente->setCnNumero($dadosAGU->getNumeroCertidaoNascimento());
                $dadosComplementaresDependente->setCnLivro($dadosAGU->getLivroCertidaoNascimento());
                $dadosComplementaresDependente->setCnFolha($dadosAGU->getFolhaCertidaoNascimento());
                $dadosComplementaresDependente->setCnCartorio($dadosAGU->getCartorioCertidaoNascimento());
                $dadosComplementaresDependente->setDataInicioAssistencia($dadosAGU->getDataInicio());
                $dadosComplementaresDependente->setDataFimAssistencia($dadosAGU->getDataFim());
                $dadosComplementaresDependente->setMotivoFimAssistencia($dadosAGU->getMotivoFim());
                $dadosComplementaresDependente->setObservacao("Importado do AGU PESSOAS. \n\n Obs original: \n\n " . $dadosAGU->getObservacao());
            }

            $this->entityManager->persist($dadosComplementaresDependente);
        }


    }

    private function importCondicao(DependenteOutput $registro): SPSigepeCondicaoDependente
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeCondicaoDependente::class)->findOneBy(['codigoSigepe' => $registro->codCondicao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeCondicaoDependente();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codCondicao);
        $registroAuxiliar->setNome($registro->nomeCondicao);

        $this->entityManager->persist($registroAuxiliar);
        #$this->entityManager->flush();

        return $registroAuxiliar;
    }

    private function importGrauParentesco(DependenteOutput $registro): SPSigepeGrauParentesco
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeGrauParentesco::class)->findOneBy(['codigoSigepe' => $registro->codGrauParentesco]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeGrauParentesco();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codGrauParentesco);
        $registroAuxiliar->setNome($registro->nomeGrauParentesco);

        $this->entityManager->persist($registroAuxiliar);
        #$this->entityManager->flush();

        return $registroAuxiliar;
    }

    private function importOrgao(DependenteOutput $registro): Orgao
    {
        $registroAuxiliar = $this->entityManager->getRepository(Orgao::class)->findOneBy(['codigo' => $registro->codOrgao]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new Orgao();
        }

        $registroAuxiliar->setCodigo($registro->codOrgao);
        $registroAuxiliar->setDescricao('Não definido, precisa editar');
        $registroAuxiliar->setSigla('NAODEFINIDO');
        $registroAuxiliar->setCpfOperador('00000000000');

        $this->entityManager->persist($registroAuxiliar);
        #$this->entityManager->flush();

        return $registroAuxiliar;
    }

    private function importTipoBeneficio(BeneficioDependenteOutput $registro): SPSigepeTipoBeneficio
    {
        foreach ($this->tipoBeneficios as $tipo){
            if($tipo->getCodigoSigepe() == $registro->codBeneficio){
                return $tipo;
            }
        }

        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeTipoBeneficio::class)->findOneBy(['codigoSigepe' => $registro->codBeneficio]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeTipoBeneficio();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codBeneficio);
        $registroAuxiliar->setNome($registro->nomeBeneficio);

        $this->entityManager->persist($registroAuxiliar);
        #$this->entityManager->flush();

        return $registroAuxiliar;
    }

}