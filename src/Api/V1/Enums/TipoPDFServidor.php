<?php

namespace AguPessoas\Backend\Api\V1\Enums;

enum TipoPDFServidor: string
{
    case DADOS_PESSOAIS = 'DP';
    case ENDERECO = 'END';
    case TELEFONES = 'TEL';
    case DOCUMENTACAO = 'DOC';
    case DADOS_FUNCIONAL = 'DFU';
    case DADOS_FINANCEIROS = 'DFI';
    case DADOS_BANCARIOS = 'DBA';
    case DADOS_CONCURSO = 'DC';
}
