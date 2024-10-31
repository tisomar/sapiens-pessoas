<?php
declare(strict_types=1);
/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Command\SIGEPE;

use AguPessoas\Backend\Api\V2\Enums\EtapasImportacaoSigepe;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Message\Command\AtualizarDadosServidor;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use DomainException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'app:sigepe-atualizacao-servidores',
    description: 'Sincronizar um tipo de dado específico do SIGEPE de TODOS os Servidores'
)]
class SynchronizeSigepeDataCommand extends Command
{
    public function __construct(
        readonly private EntityManagerInterface $entityManager,
        private MessageBusInterface $bus,
        string $name = null,
    ) {
        parent::__construct($name);
    }

    /**
     * @throws OptimisticLockException
     * @throws ORMException
     * @throws \Exception
     */
    protected function execute(InputInterface $input, OutputInterface $output): int
    {
        $tipoInfo = EtapasImportacaoSigepe::from(strtoupper($input->getArgument('tipoInformacao')));

        $output->writeln('<info>Sincronizando informações de '.$tipoInfo->name.' do Sigepe data</info>');

        $output->writeln('<info>Buscando servidores do banco AGU..</info>');

        $servidores = $this->entityManager->getRepository(SPSigepeServidor::class)->findAll();

        $output->writeln('<info>'.count($servidores).' servidores encontrados:</info>');
        $output->writeln('');

        $i = 1;
        foreach ($servidores as $servidor)
        {
            $output->writeln('<info>'.$i.' - '.$servidor->getNome().' CPF: '.$servidor->getCpf().' ID UNICO SIAPE: '.$servidor->getIdentificacaoUnica().'</info>');
            $output->writeln('<info>Lançando comando de importação sigepe...</info>');

            if (empty($servidor->getCpf())) {
                continue;
            }

            try {
                $this->bus->dispatch(new AtualizarDadosServidor($servidor->getCpf(), $tipoInfo->value));

                $output->writeln('<info>Solicitação enviada para a fila!</info>');
            }catch (HandlerFailedException  $e) {

                $tipo = $e->getPrevious();

                if(!is_object($tipo)){
                    $output->writeln('<info>Indo para o próximo servidor...</info>');
                    $i++;
                    $output->writeln('');
                    $output->writeln('');
                    continue;
                }

                switch ($tipo::class) {
                    case DomainException::class:
                        $output->writeln('<info>DEU RUIM: '.$tipo->getMessage().'</info>');
                        break;
                    case SemRegistrosParaOCPFException::class:
                        $output->writeln('<info>DEU RUIM: Servidor não localizado na base do SIGEPE!</info>');
                        break;
                    default:
                        $output->writeln('<info>DEU RUIM: '.$e->getMessage().'</info>');

                }

                $output->writeln('<info>Indo para o próximo servidor...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');
                continue;

            }catch (\Exception $e){
                $output->writeln('<info>DEU RUIM: '.$e->getMessage().'</info>');
                $output->writeln('<info>Indo para o próximo servidor...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');
                continue;
            }

            $output->writeln('');
            $output->writeln('');
            $i++;
        }

        $output->writeln('<info>######## FIM DA SOLICITACÃO IMPORTAÇÃO #########</info>');
        /*
        $transactionId = $this->transactionManager->begin();
        $cor = new SPSigepeCor();
        $cor->setNome('Cor 1');
        $cor->setCodigoSigepe('01234');
        $this->corResource->create($cor, $transactionId);
        $this->transactionManager->commit();
        */

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $arrTipos = EtapasImportacaoSigepe::cases();
        $tipos = '';
        foreach ($arrTipos as $tipo){
            $tipos .= $tipo->value . " - ". $tipo->name. "\n\n";
        }
        $this
            // configure an argument
            ->addArgument("tipoInformacao", InputArgument::REQUIRED, "Tipo de informação que deseja atualizar: \n\n". $tipos)
            // ...
        ;
    }
}