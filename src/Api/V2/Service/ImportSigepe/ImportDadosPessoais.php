<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\SPSigepeCor;
use AguPessoas\Backend\Entity\SPSigepeDeficienciaFisica;
use AguPessoas\Backend\Entity\SPSigepeEstadoCivil;
use AguPessoas\Backend\Entity\SPSigepeNacionalidade;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPSigepeSexo;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosPessoaisOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDadosPessoais
{
    private $cor;
    private $deficiencia;
    private $estadoCivil;
    private $nacionalidade;
    private $sexo;

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getDadosPessoais($this->sigepeServidor->getCpf());
        $this->importDadosAuxiliares($dados);

        $this->sigepeServidor->setNome($dados->nome);
        $this->sigepeServidor->setDataNascimento(ImportSigepe::convertDataSigepeToDateTime($dados->dataNascimento));
        $this->sigepeServidor->setGrupoSaguineo($dados->grupoSanguineo);
        $this->sigepeServidor->setNomeMae($dados->nomeMae);
        $this->sigepeServidor->setNomePai($dados->nomePai);
        $this->sigepeServidor->setNomeMunicipioNascimento($dados->nomeMunicipNasc);
        $this->sigepeServidor->setNomeUfNascimento($dados->ufNascimento);
        $this->sigepeServidor->setNomePais($dados->nomePais);
        $this->sigepeServidor->setDataChegadaBrasil(ImportSigepe::convertDataSigepeToDateTime($dados->dataChegBrasil));
        $this->sigepeServidor->setPisPasep($dados->numPisPasep);

        $this->sigepeServidor->setCor($this->cor);
        $this->sigepeServidor->setDeficienciaFisica($this->deficiencia);
        $this->sigepeServidor->setEstadoCivil($this->estadoCivil);
        $this->sigepeServidor->setNacionalidade($this->nacionalidade);
        $this->sigepeServidor->setSexo($this->sexo);

        $this->entityManager->persist($this->sigepeServidor);

        $this->importDadosComplementaresAGUPessoas();

        $this->entityManager->flush();

        return $this->sigepeServidor;
    }

    private function importDadosAuxiliares(DadosPessoaisOutput $registro)
    {
        if($registro->codCor){
            $this->cor = $this->importCor($registro);
        }

        if($registro->codDefFisica){
            $this->deficiencia = $this->importDeficiencia($registro);
        }

        if($registro->codEstadoCivil){
            $this->estadoCivil = $this->importEstadoCivil($registro);
        }

        if($registro->codNacionalidade){
            $this->nacionalidade = $this->importNacionalidade($registro);
        }

        if($registro->codSexo){
            $this->sexo = $this->importSexo($registro);
        }

    }

    private function importDadosComplementaresAGUPessoas()
    {
        $dadosComplementares = $this->entityManager->getRepository(SPServidor::class)->findOneBy(['sigepeServidor' => $this->sigepeServidor->getId()]);

        if(!$dadosComplementares){
            $dadosComplementares = new SPServidor();
            $dadosComplementares->setSigepeServidor($this->sigepeServidor);

            $docAguPessoas = $this->entityManager->getRepository(Documentacao::class)
                ->findOneBy(['numero' => $this->sigepeServidor->getCpf(), 'tipo' => 1, 'dataExclusao' => null], ['id' => 'DESC']);

            if($docAguPessoas){

                $servidorAGUPessoas = $docAguPessoas->getServidor();

                $dadosComplementares->setCodigoServidorAguPessoas($servidorAGUPessoas->getCodigo());
                $dadosComplementares->setIdServidorAguPessoas($servidorAGUPessoas->getId());
                $dadosComplementares->setApelido($servidorAGUPessoas->getApelido());
                $dadosComplementares->setDataObito($servidorAGUPessoas->getDataObito());
                $dadosComplementares->setEtnia($servidorAGUPessoas->getEtnia());
                $dadosComplementares->setDoadorOrgaos($servidorAGUPessoas->getInDoador());
                $dadosComplementares->setTipoServidor($servidorAGUPessoas->getTipoServidor());
                $dadosComplementares->setEmailParticular($servidorAGUPessoas->getEmail());
                $dadosComplementares->setStatus($servidorAGUPessoas->getStatus());
                $dadosComplementares->setNomeConjuge($servidorAGUPessoas->getNomeConjuge());
                $dadosComplementares->setPortadorNecessidadeEspecial($servidorAGUPessoas->getInPortadorNecessidadeEspecial());
                $dadosComplementares->setNomeNecessidadeEspecial($servidorAGUPessoas->getNomeNecessidadeEspecial());
                $dadosComplementares->setTipoSanguineo($servidorAGUPessoas->getTipoSanguineo());

                $servidorAGUPessoas->setDataImportacaoSP(new \DateTime());
                $this->entityManager->persist($servidorAGUPessoas);

            }

        }


        $this->entityManager->persist($dadosComplementares);
    }

    private function importCor(DadosPessoaisOutput $registro): SPSigepeCor
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeCor::class)->findOneBy(['codigoSigepe' => $registro->codCor]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeCor();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codCor);
        $registroAuxiliar->setNome($registro->nomeCor);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importDeficiencia(DadosPessoaisOutput $registro): SPSigepeDeficienciaFisica
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeDeficienciaFisica::class)->findOneBy(['codigoSigepe' => $registro->codDefFisica]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeDeficienciaFisica();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codDefFisica);
        $registroAuxiliar->setNome($registro->nomeDefFisica);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importEstadoCivil(DadosPessoaisOutput $registro): SPSigepeEstadoCivil
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeEstadoCivil::class)->findOneBy(['codigoSigepe' => $registro->codEstadoCivil]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeEstadoCivil();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codEstadoCivil);
        $registroAuxiliar->setNome($registro->nomeEstadoCivil);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importNacionalidade(DadosPessoaisOutput $registro): SPSigepeNacionalidade
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeNacionalidade::class)->findOneBy(['codigoSigepe' => $registro->codNacionalidade]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeNacionalidade();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codNacionalidade);
        $registroAuxiliar->setNome($registro->nomeNacionalidade);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importSexo(DadosPessoaisOutput $registro): SPSigepeSexo
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeSexo::class)->findOneBy(['codigoSigepe' => $registro->codSexo]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeSexo();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codSexo);
        $registroAuxiliar->setNome($registro->nomeSexo);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }


}