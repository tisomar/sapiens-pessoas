<?php
declare(strict_types=1);
/**
 * @author Advocacia-Geral da União <supp@agu.gov.br>
 */

namespace AguPessoas\Backend\Command\SIGEPE;

use AguPessoas\Backend\Entity\Documentacao;
use AguPessoas\Backend\Entity\Servidor;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Message\Command\CadastrarServidor;
use Doctrine\ORM\EntityManagerInterface;
use Doctrine\ORM\Exception\ORMException;
use Doctrine\ORM\OptimisticLockException;
use DomainException;
use Symfony\Component\Console\Attribute\AsCommand;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\MessageBusInterface;

// the name of the command is what users type after "php bin/console"
#[AsCommand(
    name: 'app:sigepe-cadastro-servidores',
    description: 'Cadastro inicial dos servidores existentes na base do AGU Pessoas',
    hidden: true
)]
class CadastroServidoresViaSigepeCommand extends Command
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
        $output->writeln('<info>Synchronizing Sigepe data</info>');

        $output->writeln('<info>Buscando servidores do banco AGU..</info>');

        $servidores = $this->entityManager->getRepository(Servidor::class)->findBy(
            ['status' => 1, 'dataImportacaoSP' => null, 'msgFalhaImportacaoSP' => null],
            null,
            100
        );
        $output->writeln('<info>'.count($servidores).' servidores encontrados:</info>');
        $output->writeln('');

        $i = 1;
        foreach ($servidores as $servidor)
        {
            $output->writeln('<info>'.$i.' - '.$servidor->getNome().' ID: '.$servidor->getId().'</info>');
            $output->writeln('<info>Buscando CPF....</info>');

            $docAguPessoas = $this->entityManager->getRepository(Documentacao::class)
                ->findOneBy(['servidor' => $servidor->getId(), 'tipo' => 1, 'dataExclusao' => null], ['id' => 'DESC']);

            if(!$docAguPessoas){
                $output->writeln('<info>CPF não localizado! Indo para o próximo servidor...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');
                continue;
            }

            $output->writeln('<info> CPF localizado: '.$docAguPessoas->getNumero().'</info>');
            $output->writeln('<info>Lançando comando de importação sigepe...</info>');


            try {
                $this->bus->dispatch(new CadastrarServidor($docAguPessoas->getNumero()));
                $output->writeln('<info>Comando finalizado, servidor importado!</info>');

                $servidorSigepe = $this->entityManager->getRepository(SPSigepeServidor::class)
                    ->findOneBy(['cpf' => $docAguPessoas->getNumero()]);

                if(!$servidorSigepe){
                    $output->writeln('<info>Ops, parece que houve um equivico... tem ninguem cadastrado aqui</info>');
                    $i++;
                    $output->writeln('');
                    $output->writeln('');
                    continue;
                }

                $output->writeln('<info> ID do servidor importado: '.$servidorSigepe->getId().', UUID: '.$servidorSigepe->getUuid().' MATRICULA: '.$servidorSigepe->getIdentificacaoUnica().'</info>');


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
                        $servidor->setMsgFalhaImportacaoSP('TENTATIVA FEITA DIA: '. (new \DateTime())->format('d/m/Y H:i') . ' FALHA: '. $tipo->getMessage());

                        break;
                    case SemRegistrosParaOCPFException::class:
                        $output->writeln('<info>DEU RUIM: Servidor não localizado na base do SIGEPE!</info>');
                        $servidor->setMsgFalhaImportacaoSP('TENTATIVA FEITA DIA: '. (new \DateTime())->format('d/m/Y H:i') . ' FALHA: Servidor não localizado na base do SIGEPE!');
                        break;
                    default:
                        $output->writeln('<info>DEU RUIM: '.$e->getMessage().'</info>');
                        $servidor->setMsgFalhaImportacaoSP('TENTATIVA FEITA DIA: '. (new \DateTime())->format('d/m/Y H:i') . ' FALHA: '. $e->getMessage());

                }

                $output->writeln('<info>Indo para o próximo servidor...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');

                $this->entityManager->persist($servidor);
                $this->entityManager->flush();
                continue;

            }catch (\Exception $e){
                $output->writeln('<info>DEU RUIM: '.$e->getMessage().'</info>');
                $output->writeln('<info>Indo para o próximo servidor...</info>');
                $i++;
                $output->writeln('');
                $output->writeln('');
                $servidor->setMsgFalhaImportacaoSP('TENTATIVA FEITA DIA: '. (new \DateTime())->format('d/m/Y H:i') . ' FALHA: '. $e->getMessage());
                $this->entityManager->persist($servidor);
                $this->entityManager->flush();
                continue;
            }

            $output->writeln('');
            $output->writeln('');
            $i++;
        }

        $output->writeln('<info>######## FIM DA IMPORTAÇÃO #########</info>');
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


}
