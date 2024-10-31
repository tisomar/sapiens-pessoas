<?php

namespace AguPessoas\Backend\Api\V1\Service;

use AguPessoas\Backend\Api\V1\Enums\TipoPDFServidor;
use AguPessoas\Backend\Api\V1\Resource\ServidorResource;
use AguPessoas\Backend\Api\V1\Resource\DadoFuncionalResource;
use AguPessoas\Backend\Api\V1\Resource\CargoEfetivoResource;
use AguPessoas\Backend\Api\V1\Resource\DocumentacaoResource;
use AguPessoas\Backend\Api\V1\Resource\EnderecoResource;
use AguPessoas\Backend\Api\V1\Resource\TelefoneResource;
use AguPessoas\Backend\Api\V1\Resource\DadoBancarioResource;
use AguPessoas\Backend\Api\V1\Resource\DadoFinanceiroResource;
use AguPessoas\Backend\Api\V1\Resource\DadoPromocaoResource;
use AguPessoas\Backend\Api\V1\Resource\ClassePadraoResource;
use AguPessoas\Backend\Api\V1\Resource\FuncaoComissionadaResource;
use AguPessoas\Backend\Api\V1\Resource\AposentadoriaResource;
use Knp\Bundle\SnappyBundle\Snappy\Response\PdfResponse;
use Knp\Snappy\Pdf;
use Twig\Environment;

class RelatorioServidorService
{
    private $servidor = null;
    private $dadoFuncional = null;
    private $cargoEfetivo = null;
    private $classePadrao = null;
    private $funcaoComissionada = null;
    private $aposentadoria= null;
    private $documentacao = null;
    private $dadoBancario = null;
    private $dadoFinanceiro = null;
    private $dadoPromocao = null;
    private $enderecos = null;
    private $telefones = null;

    private $tipos = [];
    public function __construct(private Pdf $pdfManager,
                                private Environment $twig,
                                private ServidorResource $resource,
                                private DadoFuncionalResource      $dadoFuncionalResource,
                                private CargoEfetivoResource       $cargoEfetivoResource,
                                private DocumentacaoResource       $documentacaoResource,
                                private EnderecoResource           $enderecoResource,
                                private TelefoneResource           $telefoneResource,
                                private DadoBancarioResource       $dadoBancarioResource,
                                private DadoFinanceiroResource     $dadoFinanceiroResource,
                                private DadoPromocaoResource       $dadoPromocaoResource,
                                private ClassePadraoResource       $classePadraoResource,
                                private FuncaoComissionadaResource $funcaoComissionadaResource,
                                private AposentadoriaResource      $aposentadoriaResource)
    {

    }

    public function gerar()
    {
        if(!$this->servidor)
            throw new \DomainException('Servidor não definido');

        $html = $this->twig->render('relatorios/servidor/header.html.twig', ['servidor' => $this->servidor]);

        foreach ($this->tipos as $tipo)
        {
            $html .= match($tipo){
                TipoPDFServidor::DADOS_PESSOAIS => $this->getHtmlDadosPessoais(),
                TipoPDFServidor::ENDERECO => $this->getHtmlEnderecos(),
                TipoPDFServidor::TELEFONES => $this->getHtmlTelefones(),
                TipoPDFServidor::DOCUMENTACAO => $this->getHtmlDocumentos(),
                TipoPDFServidor::DADOS_FUNCIONAL => ($this->getHtmlDadosFuncionais()),
                TipoPDFServidor::DADOS_FINANCEIROS => $this->getHtmlDadosFinanceiros(),
                TipoPDFServidor::DADOS_BANCARIOS => $this->getHtmlDadosBancarios(),
                TipoPDFServidor::DADOS_CONCURSO => $this->getHtmlDadosConcurso(),
                default => ''
            };
        }

        $html .= $this->twig->render('relatorios/servidor/footer.html.twig');

        $fileName = 'Relatorio-Servidor-'. date('Y-m-d-H-i') . '.pdf';

        return new PdfResponse(
            $this->pdfManager->getOutputFromHtml($html),
            $fileName
        );

    }

    public function setServidor($idServidor)
    {
        $this->servidor = $this->resource->findOne($idServidor, ["municipioNascimento"]);
        return $this;
    }

    public function addTipo(TipoPDFServidor $tipo)
    {
        $this->tipos[] = $tipo;
        return $this;
    }

    private function setDadoFuncional()
    {
        if($this->dadoFuncional) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->dadoFuncionalResource->getRepository()->findOneBy($criteria))){
            $this->dadoFuncional = $this->dadoFuncionalResource->getRepository()->findOneBy($criteria);
        }
        return $this;
    }

    private function setCargoEfetivo()
    {
        if($this->cargoEfetivo) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->cargoEfetivoResource->getRepository()->findOneBy($criteria))){
            $this->cargoEfetivo = $this->cargoEfetivoResource->getRepository()->findOneBy($criteria);
        }
        return $this;
    }

    private function setClassePadrao()
    {
        if($this->classePadrao) return $this;

        $this->setCargoEfetivo();
        if(!is_null($this->cargoEfetivo)) {
            $criteria = array('cargoEfetivo' => $this->cargoEfetivo->getId());
            $order = array('id' => 'DESC');
            if (!empty($this->classePadraoResource->getRepository()->findOneBy($criteria, $order))) {
                $this->classePadrao = $this->classePadraoResource->getRepository()->findOneBy($criteria, $order);
            }
        }else{
            $this->classePadrao = null;
        }
        return $this;
    }

    private function setFuncaoComissionada()
    {
        if($this->funcaoComissionada) return $this;

        $criteria = array('servidor' => $this->servidor->getId(), 'dataExoneracao' => null);
        if(!empty($this->funcaoComissionadaResource->getRepository()->findBy($criteria)[0])){
            $this->funcaoComissionada = $this->funcaoComissionadaResource->getRepository()->findBy($criteria)[0];
        }
        return $this;
    }

    private function setDocumentacao()
    {
        if($this->documentacao) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->documentacaoResource->getRepository()->findBy($criteria))){
            $this->documentacao = $this->documentacaoResource->getRepository()->findBy($criteria);
        }
        return $this;
    }

    private function setEndereco()
    {
        if($this->enderecos) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->enderecoResource->getRepository()->findBy($criteria))){
            $this->enderecos = $this->enderecoResource->getRepository()->findBy($criteria);
        }
        return $this;
    }

    private function setTelefone()
    {
        if($this->telefones) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->telefoneResource->getRepository()->findBy($criteria))){
            $this->telefones = $this->telefoneResource->getRepository()->findBy($criteria);
        }
        return $this;
    }

    private function setDadoBancario()
    {
        if($this->dadoBancario) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->dadoBancarioResource->getRepository()->findBy($criteria)[0])){
            $this->dadoBancario = $this->dadoBancarioResource->getRepository()->findBy($criteria)[0];
        }
        return $this;
    }

    private function setDadoFinanceiro()
    {
        if($this->dadoFinanceiro) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->dadoFinanceiroResource->getRepository()->findBy($criteria)[0])){
            $this->dadoFinanceiro = $this->dadoFinanceiroResource->getRepository()->findBy($criteria)[0];
        }
        return $this;
    }

    private function setAposentadoria()
    {
        if($this->aposentadoria) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->aposentadoriaResource->getRepository()->findBy($criteria)[0])){
            $this->aposentadoria = $this->aposentadoriaResource->getRepository()->findBy($criteria)[0];
        }
        return $this;
    }

    private function setDadoPromocao()
    {

        if($this->dadoPromocao) return $this;

        $criteria = array('servidor' => $this->servidor->getId());
        if(!empty($this->dadoPromocaoResource->getRepository()->findBy($criteria)[0])){
            $this->dadoPromocao = $this->dadoPromocaoResource->getRepository()->findBy($criteria)[0];
        }
        return $this;
    }

    private function getHtmlDadosPessoais()
    {
        $this->setDadoFuncional();

        return $this->twig->render('relatorios/servidor/dados-pessoais.html.twig', array(
            'servidor' => $this->servidor,
            'dadoFuncional' => $this->dadoFuncional,
        ));
    }

    private function getHtmlTelefones()
    {
        $this->setTelefone();

        return $this->twig->render('relatorios/servidor/telefones.html.twig', array(
            'servidor' => $this->servidor,
            'telefones' => $this->telefones
        ));

    }

    private function getHtmlEnderecos()
    {
        $this->setEndereco();

        return $this->twig->render('relatorios/servidor/enderecos.html.twig', array(
            'enderecos' => $this->enderecos
        ));

    }

    private function getHtmlDadosFuncionais()
    {
        $this->setDadoFuncional()->setCargoEfetivo()->setClassePadrao()->setFuncaoComissionada();

        return $this->twig->render('relatorios/servidor/dados-funcionais.html.twig', array(
            'servidor' => $this->servidor,
            'dadoFuncional' => $this->dadoFuncional,
            'cargoEfetivo' => $this->cargoEfetivo,
            'classePadrao' => $this->classePadrao,
            'funcaoComissionada' => $this->funcaoComissionada
        ));

    }

    private function getHtmlDocumentos()
    {
        $this->setDocumentacao();

        return $this->twig->render('relatorios/servidor/documentos.html.twig', array(
            'servidor' => $this->servidor,
            'documentacao' => $this->documentacao
        ));

    }

    private function getHtmlDadosFinanceiros()
    {
        $this->setDadoFinanceiro()->setAposentadoria();

        return $this->twig->render('relatorios/servidor/dados-financeiros.html.twig', array(
            'dadoFinanceiro' => $this->dadoFinanceiro,
            'aposentadoria' => $this->aposentadoria
        ));

    }

    private function getHtmlDadosConcurso()
    {
        $this->setDadoPromocao()->setClassePadrao();

        return $this->twig->render('relatorios/servidor/dados-concurso.html.twig', array(
            'servidor' => $this->servidor,
            'dadoPromocao' => $this->dadoPromocao,
            'cargoEfetivo' => $this->cargoEfetivo,
            'classePadrao' => $this->classePadrao,
        ));

    }

    private function getHtmlDadosBancarios()
    {
        $this->setDadoBancario();

        return $this->twig->render('relatorios/servidor/dados-bancarios.html.twig', array(
            'dadoBancario' => $this->dadoBancario
        ));

    }

}