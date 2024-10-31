<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Endereco;
use AguPessoas\Backend\Entity\SPEndereco;
use AguPessoas\Backend\Entity\SPServidor;
use AguPessoas\Backend\Entity\SPSigepeMunicipio;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPTelefone;
use AguPessoas\Backend\Entity\Telefone;
use AguPessoas\Backend\Gateways\Sigep\Outputs\EnderecoResidencialOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportEnderecoTelefone
{
    private $municipio;
    private $endereco;
    private $telefone;

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getEnderecoResidencial($this->sigepeServidor->getCpf());
        $this->importDadosAuxiliares($dados);
        $this->importEndereco($dados);
        $this->importTelefone($dados);

        $this->importTelefonesAGUPessoas();

        $this->entityManager->persist($this->sigepeServidor);

        $this->entityManager->flush();

        return $this->sigepeServidor;
    }

    private function importDadosAuxiliares(EnderecoResidencialOutput $registro)
    {
        if($registro->codMunicipio){
            $this->municipio = $this->importMunicipio($registro);
        }

    }

    private function importMunicipio(EnderecoResidencialOutput $registro): SPSigepeMunicipio
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPSigepeMunicipio::class)->findOneBy(['codigoSigepe' => $registro->codMunicipio]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPSigepeMunicipio();
        }

        $registroAuxiliar->setCodigoSigepe($registro->codMunicipio);
        $registroAuxiliar->setNome($registro->nomeMunicipio);
        $registroAuxiliar->setUf($registro->uf);

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importEndereco(EnderecoResidencialOutput $registro): SPEndereco
    {
        $registroAuxiliar = $this->entityManager->getRepository(SPEndereco::class)->findOneBy(['origemSigepe' => true, 'sigepeServidor' => $this->sigepeServidor]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPEndereco();
        }

        $registroAuxiliar->setOrigemSigepe(true);
        $registroAuxiliar->setCep($registro->cep);
        $registroAuxiliar->setLogradouro($registro->logradouro);
        $registroAuxiliar->setNumero($registro->numero);
        $registroAuxiliar->setComplemento($registro->complemento);
        $registroAuxiliar->setBairro($registro->bairro);
        $registroAuxiliar->setMunicipio($this->municipio);
        $registroAuxiliar->setUf($registro->uf);
        $registroAuxiliar->setSigepeServidor($this->sigepeServidor);

        $this->endereco = $registroAuxiliar;

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importTelefone(EnderecoResidencialOutput $registro): ?SPTelefone
    {

        if(!$registro->dddTelefone)
            return null;

        $registroAuxiliar = $this->entityManager->getRepository(SPTelefone::class)->findOneBy(['origemSigepe' => true, 'sigepeServidor' => $this->sigepeServidor]);

        if (!$registroAuxiliar) {
            $registroAuxiliar = new SPTelefone();
        }

        $registroAuxiliar->setOrigemSigepe(true);
        $registroAuxiliar->setDdd((int) $registro->dddTelefone);
        $registroAuxiliar->setNumero($registro->numTelefone);
        $registroAuxiliar->setSigepeServidor($this->sigepeServidor);

        $this->telefone = $registroAuxiliar;

        $this->entityManager->persist($registroAuxiliar);

        return $registroAuxiliar;
    }

    private function importEnderecosAGUPessoas()
    {

        return; //TODO metodo nao implementado, dependendo da definição de negócio sobre a possibilidade do servidor poder possuir ou nao +1 de endereço
        $enderecos = $this->entityManager->getRepository(Endereco::class)
            ->findBy(['servidor' => $this->sigepeServidor->getServidor()->getIdServidorAguPessoas(), 'dataExclusao' => null], ['id' => 'DESC']);


        if($enderecos){

            foreach ($enderecos as $end)
            {
                $spEndereco = new SPEndereco();
                $spEndereco->setOrigemSigepe(false);
                $spEndereco->setCep($end->getCep());
                $spEndereco->setLogradouro($end->getLogradouro());
                $spEndereco->setComplemento($end->getComplemento());
                $spEndereco->setBairro($end->getBairro());

                $spEndereco->setMunicipio($end->municipio);
                $spEndereco->setUf($end->uf);

                $spEndereco->setSigepeServidor($this->sigepeServidor);
                $this->entityManager->persist($spEndereco);
            }



        }


    }

    private function importTelefonesAGUPessoas()
    {

        $telefones = $this->entityManager->getRepository(Telefone::class)
            ->findBy(['servidor' => $this->sigepeServidor->getServidor()->getIdServidorAguPessoas(), 'dataExclusao' => null], ['id' => 'DESC']);

        if ($telefones) {

            foreach ($telefones as $tel) {

                $spTelefone = new SPTelefone();
                $spTelefone->setOrigemSigepe(false);
                $spTelefone->setDdd($tel->getDdd());
                $spTelefone->setNumero($tel->getNumero());
                $spTelefone->setTipo($tel->getTipoTelefone());
                $spTelefone->setSigepeServidor($this->sigepeServidor);

                $this->entityManager->persist($spTelefone);
            }
        }
    }

}