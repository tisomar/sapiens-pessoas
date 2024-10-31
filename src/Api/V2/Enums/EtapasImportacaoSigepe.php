<?php

namespace AguPessoas\Backend\Api\V2\Enums;

enum EtapasImportacaoSigepe: string
{
    case DADOS_PESSOAIS = 'DP';
    case DADOS_ESCOLARES = 'DE';
    case ENDERECO_TELEFONE = 'END_TEL';
    case DOCUMENTACAO = 'DOC';
    case DADOS_BANCARIOS = 'DBA';
    case DEPENDENTES = 'DEP';
    case FERIAS = 'FER';
    case DADOS_FUNCIONAIS = 'DF';
    case AFASTAMENTOS = 'AF';
    case AFASTAMENTOS_HISTORICO = 'AF_HIS';
    case FERIAS_HISTORICO = 'FER_HIS';
}
