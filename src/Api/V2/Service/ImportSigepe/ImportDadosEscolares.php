<?php

namespace AguPessoas\Backend\Api\V2\Service\ImportSigepe;

use AguPessoas\Backend\Entity\SPSigepeCurso;
use AguPessoas\Backend\Entity\SPSigepeEscolaridade;
use AguPessoas\Backend\Entity\SPSigepeServidor;
use AguPessoas\Backend\Entity\SPSigepeTitulacao;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosCursoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosEscolaresOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosTitulacaoOutput;
use AguPessoas\Backend\Gateways\Sigep\SigepGateway;
use Doctrine\ORM\EntityManagerInterface;

class ImportDadosEscolares
{
    private $escolaridade;
    private $cursos = [];
    private $titulacoes = [];

    public function __construct(private SPSigepeServidor $servidor, private SigepGateway $gateway, private EntityManagerInterface $entityManager )
    {

    }
    public function importar()
    {
        $dados = $this->gateway->getDadosEscolares($this->servidor->getCpf());
        $this->importDadosAuxiliares($dados);

        $this->servidor->setEscolaridade($this->escolaridade);

        if($this->cursos){
            foreach ($this->cursos as $curso)
            {
               $this->servidor->addCurso($curso);
            }
        }

        if($this->titulacoes){
            foreach ($this->titulacoes as $titulacao)
            {
                $this->servidor->addTitulacao($titulacao);
            }
        }

        $this->entityManager->persist($this->servidor);

        $this->entityManager->flush();

        return $this->servidor;
    }

    private function importDadosAuxiliares(DadosEscolaresOutput $registro)
    {
        if($registro->codEscolaridade){
            $this->escolaridade = $this->importEscolaridade($registro);
        }

        if($registro->cursos){
            foreach ($registro->cursos as $curso)
            {
                $this->cursos[] = $this->importCurso($curso);
            }
        }

        if($registro->titulacoes){
            foreach ($registro->titulacoes as $titulacao)
            {
                $this->titulacoes[] = $this->importTitulacao($titulacao);
            }
        }


    }

    private function importEscolaridade(DadosEscolaresOutput $registro): SPSigepeEscolaridade
    {
        $escolaridade = $this->entityManager->getRepository(SPSigepeEscolaridade::class)->findOneBy(['codigoSigepe' => $registro->codEscolaridade]);

        if (!$escolaridade) {
            $escolaridade = new SPSigepeEscolaridade();
        }

        $escolaridade->setCodigoSigepe($registro->codEscolaridade);
        $escolaridade->setNome($registro->nomeEscolaridade);

        $this->entityManager->persist($escolaridade);

        return $escolaridade;
    }

    private function importCurso(DadosCursoOutput $registro): SPSigepeCurso
    {
        $curso = $this->entityManager->getRepository(SPSigepeCurso::class)->findOneBy(['codigoSigepe' => $registro->codCurso]);

        if (!$curso) {
            $curso = new SPSigepeCurso();
        }

        $curso->setCodigoSigepe($registro->codCurso);
        $curso->setNome($registro->nomeCurso);

        $this->entityManager->persist($curso);

        return $curso;
    }

    private function importTitulacao(DadosTitulacaoOutput $registro): SPSigepeTitulacao
    {
        $titulacao = $this->entityManager->getRepository(SPSigepeTitulacao::class)->findOneBy(['codigoSigepe' => $registro->codTitulacao]);

        if (!$titulacao) {
            $titulacao = new SPSigepeTitulacao();
        }

        $titulacao->setCodigoSigepe($registro->codTitulacao);
        $titulacao->setNome($registro->nomeTitulacao);

        $this->entityManager->persist($titulacao);


        return $titulacao;
    }
}