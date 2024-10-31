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
    name: 'app:sigepe-atualizacao-servidor',
    description: 'Sincronizar dados do SIGEPE de um servidor especifico'
)]
class AtualizacaoServidorViaSigepeCommand extends Command
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
        $cpf = $input->getArgument('cpf');

        $servidor = $this->entityManager->getRepository(SPSigepeServidor::class)->findOneBy(['cpf' => $cpf]);

        if(!$servidor){
            $output->writeln('<info>CPF não localizado!</info>');
            return Command::INVALID;
        }

        $output->writeln('<info>Sincronizando informações do(a) Servidor(a):</info>');
        $output->writeln('<info>'.$servidor->getNome().' CPF: '.$servidor->getCpf().' ID UNICO SIAPE: '.$servidor->getIdentificacaoUnica().'</info>');

        $arrTipos = EtapasImportacaoSigepe::cases();
        $i = 1;
        foreach ($arrTipos as $tipoInfo)
        {
            $output->writeln("\n <info>Lançando comando de importação dos dados de ".$tipoInfo->name."...</info>");

            try {
                $this->bus->dispatch(new AtualizarDadosServidor($servidor->getCpf(), $tipoInfo->value));

                $output->writeln('<info>Solicitação enviada para a fila!</info>');
            }catch (HandlerFailedException  $e) {

                $tipo = $e->getPrevious();

                if(!is_object($tipo)){
                    $output->writeln('<info>Indo para o próximo tipo de informação...</info>');
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

                $output->writeln('<info>Indo para o próximo tipo de informação...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');
                continue;

            }catch (\Exception $e){
                $output->writeln('<info>DEU RUIM: '.$e->getMessage().'</info>');
                $output->writeln('<info>Indo para o próximo tipo de informação...</info>');
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

        return Command::SUCCESS;
    }

    protected function configure(): void
    {
        $this
            // configure an argument
            ->addArgument("cpf", InputArgument::REQUIRED, "CPF do servidor")
            // ...
        ;
    }
}
