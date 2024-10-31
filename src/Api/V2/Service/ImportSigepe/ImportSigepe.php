<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPEtapaImportacaoSigepe;
use AguPessoas\Backend\Entity\SPStatusImportacaoSigepe;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportSigepe
{
    private $importador;

    public function __construct(
        private EtapasImportacaoSigepe $tipo,
        private SPSigepeServidor       $sigepeServidor,
        private EntityManagerInterface $entityManager,
        private SigepGateway           $gateway = new SigepGateway(),
        private array                  $arrParams = []
        )
    {
        switch ($tipo){
            case EtapasImportacaoSigepe::DADOS_PESSOAIS:
                $this->importador = new ImportDadosPessoais($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::DADOS_ESCOLARES:
                $this->importador = new ImportDadosEscolares($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::ENDERECO_TELEFONE:
                $this->importador = new ImportEnderecoTelefone($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::DOCUMENTACAO:
                $this->importador = new ImportDocumentacao($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::DADOS_BANCARIOS:
                $this->importador = new ImportDadosBancarios($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::DEPENDENTES:
                $this->importador = new ImportDependentes($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::FERIAS:
                $this->importador = new ImportFerias($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::DADOS_FUNCIONAIS:
                $this->importador = new ImportDadosFuncionais($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::AFASTAMENTOS:
                $this->importador = new ImportAfastamentos($this->sigepeServidor, $this->gateway, $this->entityManager);
                break;
            case EtapasImportacaoSigepe::AFASTAMENTOS_HISTORICO:
                $this->importador = new ImportAfastamentos($this->sigepeServidor, $this->gateway, $this->entityManager, true);
                break;

        }
    }

    public function importar()
    {
        $this->importador->importar();
        $this->updateStatusImportacao();
        return $this->sigepeServidor;
    }

    protected function updateStatusImportacao(): void
    {
        $etapaImportacao = $this->entityManager->getRepository(SPEtapaImportacaoSigepe::class)->findOneBy(['codigo' => $this->tipo]);
        $statusImportacao = $this->entityManager->getRepository(SPStatusImportacaoSigepe::class)
            ->findOneBy(['etapaImportacao' => $etapaImportacao->getId(), 'sigepeServidor' => $this->sigepeServidor->getId()]);

        if (!$statusImportacao) {
            $statusImportacao = new SPStatusImportacaoSigepe();
            $statusImportacao->setEtapaImportacao($etapaImportacao);

            $statusImportacao->setSigepeServidor($this->sigepeServidor);
        } else {
            $statusImportacao->setAtualizadoEm(new \DateTime('now'));
        }

        $this->entityManager->persist($statusImportacao);
        $this->entityManager->flush();
    }

    public static function convertDataSigepeToDateTime($strDataSigepe, $tipoOcorrenciaAfastamento = false)
    {
        if(!$strDataSigepe)
            return null;
        if($strDataSigepe == '00000000')
            return null;
        if($strDataSigepe == '0')
            return null;
        if($tipoOcorrenciaAfastamento){
            return new \DateTime($strDataSigepe);
        }

        return new \DateTime(sprintf("%s-%s-%s.",
                substr($strDataSigepe, -4),
                substr($strDataSigepe, -6, 2),
                substr($strDataSigepe, -8, 2))
        );
    }
}