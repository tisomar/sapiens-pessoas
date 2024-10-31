<?php

namespace AguPessoas\Backend\Gateways\Sigep;

use AguPessoas\Backend\Gateways\Sigep\Exceptions\CPFInvalidoException;
use AguPessoas\Backend\Gateways\Sigep\Exceptions\SemRegistrosParaOCPFException;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosAfastamentoHistoricoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosAfastamentoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosBancariosOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosCurriculoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosDependentesOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosEscolaresOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosFinanceiroOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosFuncionaisOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosPessoaisOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosUorgOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DadosVinculosOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\DocumentacaoOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\EnderecoResidencialOutput;
use AguPessoas\Backend\Gateways\Sigep\Outputs\PensionistaOutput;

class SigepGateway
{
    private \SoapClient $client;

    const COD_ERROR_RETORNO_SEM_DADOS = '0030';
    const COD_ERROR_FALHA_SERVIDOR = 'soap:Server';
    const COD_ERROR_CPF_INVALIDO = '0001';
    const COD_ERROR_SERVIDOR_NAO_LOCALIZADO = '0002';

    public function __construct(
        protected string $siglaSistema = "AGU_SAPIENS",
        protected string $nomeSistema = "SISTEMA DE INTELIGENCIA JURIDICA",
        protected string $senha = "8YMMSK6"
    )
    {
        $this->client = new \SoapClient('https://www1.siapenet.gov.br/WSSiapenet/services/ConsultaSIAPE?wsdl', [
            "classmap" => [
                "DadosDocumentacao" => DocumentacaoOutput::class,
                "DadosPessoais" => DadosPessoaisOutput::class,
                "DadosEnderecoResidencial" => EnderecoResidencialOutput::class,
                "DadosEscolares" => DadosEscolaresOutput::class,
                "ArrayDadosFuncionais" => DadosFuncionaisOutput::class,
                "ArrayDadosFinanceiros" => DadosFinanceiroOutput::class,
                "ArrayDadosBancarios" => DadosBancariosOutput::class,
                "DadosCurriculo" => DadosCurriculoOutput::class,
                "ArrayDadosAfastamento" => DadosAfastamentoOutput::class,
                "ArrayDadosUorg" => DadosUorgOutput::class,
                "ArrayDadosDependentes" => DadosDependentesOutput::class,
                "ArrayDadosVinculo" => DadosVinculosOutput::class,
                "Pensionista" => PensionistaOutput::class
            ]
        ]);
    }

    public function getDadosDocumentacao(string $cpf): DocumentacaoOutput
    {
        return $this->client->__soapCall('consultaDadosDocumentacao', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",

        ]);
    }

    public function getDadosPessoais(string $cpf): DadosPessoaisOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosPessoais', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                case self::COD_ERROR_SERVIDOR_NAO_LOCALIZADO:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }
    }

    public function getEnderecoResidencial(string $cpf): EnderecoResidencialOutput
    {
        return $this->client->__soapCall('consultaDadosEnderecoResidencial', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",
        ]);
    }

    public function getDadosEscolares(string $cpf): DadosEscolaresOutput
    {
        return $this->client->__soapCall('consultaDadosEscolares', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",
        ]);
    }

    public function getDadosFuncionais(string $cpf): DadosFuncionaisOutput
    {
        return $this->client->__soapCall('consultaDadosFuncionais', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",
        ]);
    }

    public function getDadosFinanceiros(string $cpf): DadosFinanceiroOutput
    {
        return $this->client->__soapCall('consultaDadosFinanceiros', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",
        ]);
    }

    public function getDadosBancarios(string $cpf): DadosBancariosOutput
    {
        return $this->client->__soapCall('consultaDadosBancarios', [
            "siglaSistema" => $this->siglaSistema,
            "nomeSistema" => $this->nomeSistema,
            "senha" =>  $this->senha,
            "cpf" => $cpf,
            "codOrgao" =>  "40116",
            "parmExistPag" =>  "b",
            "parmTipoVinculo" =>  "c",
        ]);
    }

    /**
     * Método não finalizado, os cenarios de retorno ainda não foram todos mapeados
     * @param string $cpf
     * @return DadosCurriculoOutput
     * @throws SemRegistrosParaOCPFException|\SoapFault
     */
    public function getDadosCurriculo(string $cpf): DadosCurriculoOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosCurriculo', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                break;
                default:
                    throw $e;
            }

        }

    }

    /**
     * Método não finalizado, os cenarios de retorno ainda não foram todos mapeados
     * @param string $cpf
     * @return DadosAfastamentoOutput
     * @throws SemRegistrosParaOCPFException| CPFInvalidoException| \SoapFault
     */
    public function getDadosAfastamento(string $cpf, $codOrgao = ''): DadosAfastamentoOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosAfastamento', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  $codOrgao,
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }

    /**
     * Método não finalizado, os cenarios de retorno ainda não foram todos mapeados
     * @param string $cpf
     * @param array $arrPeriodo
     * @return DadosAfastamentoOutput
     * @throws SemRegistrosParaOCPFException| CPFInvalidoException| \SoapFault
     */
    public function getDadosAfastamentoHistorico(string $cpf, $arrPeriodo): DadosAfastamentoOutput
    {
        try {
            $result = $this->client->__soapCall('consultaDadosAfastamentoHistorico', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
                "anoInicial" => $arrPeriodo['anoInicial'],
                "mesInicial" => $arrPeriodo['mesInicial'],
                "anoFinal" => $arrPeriodo['anoFinal'],
                "mesFinal" => $arrPeriodo['mesFinal']
            ]);

            return $result->ArrayDadosAfastamento;
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }


    /**
     * Método não finalizado, os cenarios de retorno ainda não foram todos mapeados
     * @param string $cpf
     * @return DadosAfastamentoOutput
     * @throws SemRegistrosParaOCPFException| CPFInvalidoException| \SoapFault
     */
    public function getDadosFerias(string $cpf): DadosAfastamentoOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosAfastamento', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }

    /**
     * Método não finalizado, os cenarios de retorno ainda não foram todos mapeados
     * @param string $cpf
     * @return DadosUorgOutput
     * @throws SemRegistrosParaOCPFException| CPFInvalidoException| \SoapFault
     */
    public function getDadosUorg(string $cpf): DadosUorgOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosUorg', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "40106",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }

    public function getDependentes(string $cpf): DadosDependentesOutput
    {
        try {
            return $this->client->__soapCall('consultaDadosDependentes', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }

    public function getVinculos(string $cpf): DadosVinculosOutput
    {
        try {
            return $this->client->__soapCall('verificaVinculo', [
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
                "cpf" => $cpf,
                "codOrgao" =>  "40106",
                "parmExistPag" =>  "b",
                "parmTipoVinculo" =>  "c",
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }

    public function getPensionista(string $cpfServidor, string $cpfPensionista): PensionistaOutput
    {
        try {
            return $this->client->__soapCall('getPensionista', [
                "cpfPensionista" => "52063143668",
                "cpf" => "00128910615",
                "siglaSistema" => $this->siglaSistema,
                "nomeSistema" => $this->nomeSistema,
                "senha" =>  $this->senha,
            ]);
        }catch (\SoapFault $e){
            switch ($e->faultcode){
                case self::COD_ERROR_RETORNO_SEM_DADOS:
                    throw new SemRegistrosParaOCPFException($e->getMessage());
                    break;
                case self::COD_ERROR_CPF_INVALIDO:
                    throw new CPFInvalidoException($e->getMessage());
                    break;
                default:
                    throw $e;
            }

        }

    }


}