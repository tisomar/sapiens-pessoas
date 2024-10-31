<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\Agencia;
use AguPessoas\Backend\Entity\Banco;
use AguPessoas\Backend\Entity\Municipio;
use AguPessoas\Backend\Entity\SPSigepeDadosBancarios;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Gateways\Sigep\Outputs\ContaBancariaOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosBancariosOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDadosBancarios
{
    private $banco;
    private $bancoOutrosPagamentos;
    private $agencia;
    private $agenciaOutrosPagamentos;

    public function __construct(private SPSigepeServidor $sigepeServidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        try {
            $dados = $this->gateway->getDadosBancarios($this->sigepeServidor->getCpf());
        }catch (SemRegistrosParaOCPFException){
            return $this->sigepeServidor;
        }


        foreach ($dados->contas as $conta) {
            $this->importDadosAuxiliares($conta);

            $dadosBancarios = $this->entityManager->getRepository(SPSigepeDadosBancarios::class)
                ->findOneBy(['sigepeServidor' => $this->sigepeServidor->getId(), 'matricula' => $conta->matricula]);

            if(!$dadosBancarios){
                $dadosBancarios = new SPSigepeDadosBancarios();
            }

            $dadosBancarios->setSigepeServidor($this->sigepeServidor);
            $dadosBancarios->setContaCorrente($conta->contaCorrente);
            $dadosBancarios->setContaCorrenteOutrosPgto($conta->contaCorrenteOutrosPagtos);
            $dadosBancarios->setMatricula($conta->matricula);
            $dadosBancarios->setAgencia($this->agencia);
            $dadosBancarios->setAgenciaOutrosPgto($this->agenciaOutrosPagamentos);
            $dadosBancarios->setCodBanco($conta->banco);
            $dadosBancarios->setNomeBanco($this->banco->getDescricao());
            $dadosBancarios->setCodBancoOutrosPgto($conta->bancoOutrosPagtos);
            $dadosBancarios->setNomeBancoOutrosPgto($this->bancoOutrosPagamentos->getDescricao());

            $this->entityManager->persist($dadosBancarios);
        }

        $this->entityManager->flush();

        return $this->sigepeServidor;
    }

    private function importDadosAuxiliares(ContaBancariaOutput $registro)
    {
        if($registro->banco){
            $this->banco = $this->importBanco($registro->banco);
        }

        if($registro->agencia){
            $this->agencia = $this->importAgencia($registro->agencia);
        }

        if($registro->bancoOutrosPagtos){
            $this->bancoOutrosPagamentos = $this->importBanco($registro->bancoOutrosPagtos);
        }

        if($registro->agenciaOutrosPagtos){
            $this->agenciaOutrosPagamentos = $this->importAgencia($registro->agenciaOutrosPagtos);
        }
    }

    private function importBanco(string|int $codBanco): ?Banco
    {
        $registroAuxiliar = $this->entityManager->getRepository(Banco::class)->findOneBy(['codigo' => (int) $codBanco]);

        if (!$registroAuxiliar) {
            return null;
        }

        return $registroAuxiliar;

    }

    private function importAgencia(string|int $agencia): Agencia
    {
        $dv = substr($agencia, -1);
        $arrCodigo = str_split((int) $agencia);

        if(strtoupper($dv) != 'X')
            array_pop($arrCodigo);

        $codigoSemDV = implode('', $arrCodigo);

        #dd(['original' => $agencia, 'banco' => $this->banco->getId(), 'codigo' => $codigoSemDV, 'digitoVerificador' => $dv]);

        /** Busca agencia utilizando digito **/
        $registroAuxiliar = $this->entityManager->getRepository(Agencia::class)->findOneBy(['banco' => $this->banco->getId(), 'codigo' => $codigoSemDV, 'digitoVerificador' => $dv]);
        if (!$registroAuxiliar) {

            /** Busca agencia sem utilizar digito **/
            $registroAuxiliar = $this->entityManager->getRepository(Agencia::class)->findOneBy(['banco' => $this->banco->getId(), 'codigo' => (int) $agencia, 'digitoVerificador' => null]);

            if(!$registroAuxiliar){
                $registroAuxiliar = new Agencia();
                $registroAuxiliar->setCodigo($codigoSemDV);
                $registroAuxiliar->setDescricao('AGENCIA COM DADOS INCOMPLETOS, NECESSITA DE EDICAO');
                $municipio = $this->entityManager->getRepository(Municipio::class)->find(753); //brasilia
                $registroAuxiliar->setMunicipio($municipio);
                $banco = $this->entityManager->getRepository(Banco::class)->find(1); //banco nao definido
                $registroAuxiliar->setBanco($banco);

                $this->entityManager->persist($registroAuxiliar);
            }
        }

        return $registroAuxiliar;
    }

}