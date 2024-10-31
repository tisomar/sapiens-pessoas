<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Endereco;
use AguPessoas\Backend\Entity\SPEndereco;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Entity\SPSigepeDocumentacao;
use AguPessoas\Backend\Entity\SPSigepeMunicipio;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPTelefone;
use AguPessoas\Backend\Entity\Telefone;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DocumentacaoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\EnderecoResidencialOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDocumentacao
{
    private $documentacao;

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getDadosDocumentacao($this->sigepeServidor->getCpf());
        $this->importDocumentacao($dados);

        $this->entityManager->persist($this->sigepeServidor);

        $this->entityManager->flush();

        return $this->sigepeServidor;
    }

    private function importDocumentacao(DocumentacaoOutput $registro): SPSigepeDocumentacao
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeDocumentacao::class)->findOneBy(['sigepeServidor' => $this->sigepeServidor]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeDocumentacao();
        }

        $registroAuxiliar->setCpf($registro->numCPF);
        $registroAuxiliar->setPassaporte($registro->passaporte);
        $registroAuxiliar->setPisPasep($registro->numPisPasep);
        $registroAuxiliar->setCiNumero($registro->numeroCarteiraIdentidade);
        $registroAuxiliar->setCiDataExpedicao(ImportSigepe::convertDataSigepeToDateTime($registro->dataCarteiraIdentidade));
        $registroAuxiliar->setCiOrgaoExpedidor($registro->orgaoCarteiraIdentidade);
        $registroAuxiliar->setCiUf($registro->ufCarteiraIdentidade);
        $registroAuxiliar->setCnhNumero($registro->numeroCarteiraMotorista);
        $registroAuxiliar->setCnhCategoria($registro->categoriaCarteiraMotorista);
        $registroAuxiliar->setCnhRegistro($registro->registroCarteiraMotorista);
        $registroAuxiliar->setCnhDataExpedicao(ImportSigepe::convertDataSigepeToDateTime($registro->dataExpedicaoCarteiraMotorista));
        $registroAuxiliar->setCnhDataPrimeiraExpedicao(ImportSigepe::convertDataSigepeToDateTime($registro->dataPrimExpedCarteiraMotorista));
        $registroAuxiliar->setCnhValidade(ImportSigepe::convertDataSigepeToDateTime($registro->dataValidadeCarteiraMotorista));
        $registroAuxiliar->setCnhUf($registro->ufCarteiraMotorista);
        $registroAuxiliar->setTeNumero($registro->numeroTituloEleitor);
        $registroAuxiliar->setTeZona($registro->zonaTituloEleitor);
        $registroAuxiliar->setTeSecao($registro->secaoTituloEleitor);
        $registroAuxiliar->setTeUf($registro->ufTituloEleitor);
        $registroAuxiliar->setTeDataExpedicao(ImportSigepe::convertDataSigepeToDateTime($registro->dataTituloEleitor));
        $registroAuxiliar->setCmNumero($registro->numeroComprovanteMilitar);
        $registroAuxiliar->setCmSerie($registro->serieComprovanteMilitar);
        $registroAuxiliar->setCmDataExpedicao(ImportSigepe::convertDataSigepeToDateTime($registro->dataComprovanteMilitar));
        $registroAuxiliar->setCmOrgaoExpedidor($registro->orgaoComprovanteMilitar);
        $registroAuxiliar->setCtNumero($registro->numeroCarteiraTrabalho);
        $registroAuxiliar->setCtSerie($registro->serieCarteiraTrabalho);
        $registroAuxiliar->setCtUf($registro->ufCarteiraTrabalho);

        $registroAuxiliar->setSigepeServidor($this->sigepeServidor);

        $this->documentacao = $registroAuxiliar;

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }


}