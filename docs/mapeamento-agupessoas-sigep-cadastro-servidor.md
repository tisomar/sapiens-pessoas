# Cadastro Servidor

## Dados Pessoais

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Nome do Servidor | SIM |  |
| CPF | SIM |  |
| Matrícula* | TALVEZ | Não existe atributo com esse nome exatamente, mas há ‘identUnica’ e ‘matriculaSiape’ e ta vinculado a a função que pode ser +1 |
| Nome Personalizado | SIM |  |
| Data Nascimento | SIM |  |
| Sexo | SIM |  |
| Estado Civil | SIM | Tanto nome, como código |
| Nome do Pai | SIM |  |
| Nome da Mae | SIM |  |
| Nome do Conjuge | NAO |  |
| Escolaridade | SIM | Pode haver +1 de no SIGEP |
| Formação | SIM | Pode haver +1 de no SIGEP |
| Situação Funcional | SIM | Pode haver +1 de no SIGEP |
| Ingresso | SIM | Pode haver +1 de no SIGEP (vinculado a dado funcional) |
| Recisão | TALVEZ | Não existe com esse termo, mas ha ‘dataExclusao’
Pode haver +1 de no SIGEP (vinculado a dado funcional) |
| Aposentadoria | SIM | Pode haver +1 de no SIGEP (vinculado a dado funcional) |
| Óbito | NAO |  |
| Email | SIM | Pode haver +1 de no SIGEP (vinculado a dado funcional) |
| Email institucional | SIM | Pode haver +1 de no SIGEP (vinculado a dado funcional) |
| Etinia | NAO |  |
| Cor | SIM |  |
| Tipo Sanguineo | SIM |  |
| Doador | NAO |  |
| Naturalidade | SIM |  |
| Portador de necessidades especiais (sim/nao) | TALVEZ | Retorna o nome da deficiencia fisica |
| Status do Servidor (ativo/inativo) | SIM | Pode haver +1 de no SIGEP |

## Endereço e Telefones

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Descrição (logradouro provavelmente) | SIM |  |
| Complemento | SIM |  |
| Bairro | SIM |  |
| CEP | SIM |  |
| UF | SIM |  |
| Cidade | SIM |  |
| Telefone - Tipo | NAO |  |
| Telefone - DDD | SIM | Tem apenas 1 |
| Telefone - Numero | SIM | Tem apenas 1 |
|  |  |  |

## Documentação

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Tipo (No momento não da para saber quais são os tipos disponíveis no formulário) | SIM | No sigep há os tipos (CNH, CPF, PISPASEP, RG,TITULO ELEITOR,MILITAR,PASSAPORTE) |
| Numero | SIM |  |
| UF | SIM | Mas não para todos os tipos |
| Orgão Expedidor | SIM | Mas não para todos os tipos |
| Data Exp | SIM | Mas não para todos os tipos |

## Dado Funcional

No sistema parece permitir apenas um, e no SIGEP pode ser retornado mais de um.

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Ingresso Orgao de Origem | SIM |  |
| SIAPE | SIM |  |
| Regime Juridico | SIM |  |
| Situação Funcional | SIM |  |
| Ingresso Serviço Público | TALVEZ | Há informações de: DataIngresso, CodOcorrenciaIngresso, NomeOcorrenciaIngresso |
| Ingresso | TALVEZ | Há informações de: DataIngresso, CodOcorrenciaIngresso, NomeOcorrenciaIngresso |
| Cargo Efetivo | TALVEZ | Há informação de Codigo e Nome do cargo, mas não sei se a mesma informação esperada no form de cadastro |
| Descrição do Cargo | TALVEZ | Há informação de Codigo e Nome do cargo, mas não sei se a mesma informação esperada no form de cadastro |
| Classe | SIM |  |
| Ingreso | TALVEZ | Ha informação de código e data de ingresso no orgão, mas não sei se a mesma informação esperada no form de cadastro |
| Padrão | TALVEZ | Há um codigo apenas |
| Ingresso |  | Não entendi do que se trata este campo |
| Cargo/Função Comissionada | NAO |  |
| Descrição da Função Comissionada | NAO |  |
| Função | SIM |  |
| Opção  | NAO |  |
| Descrição da Opção | NAO |  |
| Orgão | SIM |  |
| Descrição do Órgao | SIM | Há código e Sigla |
| Lotação Origem | SIM |  |
| Descrição Lotação | NAO |  |
| Lotação Exercício | SIM |  |
| Descrição Lotação Exercicio | SIM |  |
| Area de Atuação | TALVEZ | Existe a informação de ‘Cargo’ |
| Data Rescisão | TALVEZ | Há informação de ‘Exclusão’ |
| Obito | NAO |  |
| RAIS - Tipo de Salário | NAO |  |
| RAIS - Vinculo | NAO |  |
| RAIS - Situação | NAO |  |
| RAIS - Desligamento | NAO |  |
| Observação | NAO |  |

## Dado Financeiro

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Calcula Folha de Pagamento (sim/nao) |  |  |
| Regime Previdenciário |  |  |
| Data de Onus para o orgao |  |  |
| Hora Base Mensal |  |  |
| Data Suspensão Pgto |  |  |
| Horário de Trabalho |  |  |
| Adicional Tempo Serviço |  |  |
| Valor Abatimento IRRF |  |  |
| Dependentes SF |  |  |
| Dependentes IRRF |  |  |
|  |  |  |
| Aposentadoria - Data da Aposentadoria |  |  |
| Aposentadoria - Natureza |  |  |
| Aposentadoria - Proporcionalidade |  |  |

## Dados Bancários

| Propriedade do form de cadastro | Presente no SIGEP? | Obs |
| --- | --- | --- |
| Tipo de conta | NAO |  |
| Cod Banco | SIM |  |
| Banco | NAO |  |
| Cod Agencia | SIM |  |
| Agencia | NAO |  |
| Operação | NAO |  |
| Conta | SIM |  |
| Conta DV | NAO |  |
| Data da Opção | NAO |  |
| Conta Ativa/Principal (sim/nao) | NAO |  |