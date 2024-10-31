CREATE TABLE IF NOT EXISTS AFASTAMENTO
(
    ID_AFASTAMENTO            INT AUTO_INCREMENT PRIMARY KEY,
    ID_SERVIDOR               INT NULL,
    ID_TIPO_AFASTAMENTO       INT NULL,
    ID_NORMA                  INT NULL,
    DT_INICIO_AFASTAMENTO     DATETIME NOT NULL,
    DT_FIM_AFASTAMENTO        DATETIME NULL,
    NR_HORAS_AFASTAMENTO      DECIMAL(5) NULL,
    IN_CANCELADO              VARCHAR(1) NOT NULL,
    DS_CID_AFASTAMENTO        VARCHAR(100) NULL,
    DT_DESCONTO_AFASTAMENTO   DATETIME NULL,
    DS_OBSERVACAO_AFASTAMENTO VARCHAR(4000) NULL,
    DT_OPERACAO_INCLUSAO      DATETIME NOT NULL,
    DT_OPERACAO_ALTERACAO     DATETIME NOT NULL,
    NR_CPF_OPERADOR           VARCHAR(11) NOT NULL,
    DT_OPERACAO_EXCLUSAO      DATETIME NULL,
    ID_RH                     INT NULL,
    CONSTRAINT UK_AFASTAMENTO UNIQUE (ID_SERVIDOR, ID_TIPO_AFASTAMENTO, DT_INICIO_AFASTAMENTO, DT_FIM_AFASTAMENTO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_CANCELADO_AFASTAME
    on AFASTAMENTO (IN_CANCELADO);

create table if not exists AFASTAMENTOS_CONSIDERADOS
(
    ID_APURACAO           int          not null,
    ID_SERVIDOR           int          not null,
    IN_PERIODO            varchar(25)  not null,
    NR_CPF_SERVIDOR       varchar(11)  not null,
    NM_SERVIDOR           varchar(70)  not null,
    DT_INICIO_AFASTAMENTO datetime     not null,
    DT_FIM_AFASTAMENTO    datetime     not null,
    DT_REFERENCIA         datetime     not null,
    DT_EXERC_CARR_ATUAL   datetime     null,
    DT_CTG_CARR_ATUAL     datetime     null,
    DT_CTG_CARR_ANT       datetime     null,
    DT_VACANC_CARR_ANT    datetime     null,
    DS_TIPO_AFASTAMENTO   varchar(200) null,
    DT_INICIO_CONSIDERADO datetime     null,
    DT_FIM_CONSIDERADO    datetime     null,
    IN_AFETA_TSPF         varchar(1)   null,
    IN_AFETA_TFI          varchar(1)   null,
    QT_DIA_AFASTADO_TSPF  decimal(12)  null,
    QT_DIA_AFASTADO_TFI   decimal(12)  null,
    primary key (ID_APURACAO, ID_SERVIDOR, IN_PERIODO, DT_INICIO_AFASTAMENTO)
    );

create table if not exists AGENCIA
(
    ID_AGENCIA            int auto_increment
    primary key,
    ID_MUNICIPIO_AGENCIA  int          null,
    ID_BANCO              int          null,
    CD_AGENCIA            varchar(10)  not null,
    NR_DV_AGENCIA         varchar(10)  null,
    DS_AGENCIA            varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists APOSENTADORIA
(
    ID_SERVIDOR           int auto_increment
    primary key,
    ID_TIPO_APOSENTADORIA int          null,
    DT_APOSENTADORIA      datetime     null,
    DT_ISENCAO_IRRF       datetime     null,
    DS_PROPORCIONALIDADE  varchar(100) null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    ID_RH                 int          null
    );

create table if not exists APURACAO
(
    ID_APURACAO              int auto_increment
    primary key,
    ID_MODELO_APURACAO_USADO int           null,
    NM_MODELO_APURACAO_USADA varchar(200)  null,
    NR_CPF_AUTOR_MODELO      varchar(11)   null,
    DT_APURACAO              datetime      not null,
    NR_CPF_APURACAO          varchar(11)   null,
    IN_APURACAO_BLOQUEADA    decimal(12)   not null,
    SG_CARREIRA              varchar(5)    null,
    DS_LISTA_CPF             varchar(4000) null,
    SG_CATEGORIAS_SOLICITADA varchar(5)    null,
    DT_REFERENCIA            datetime      not null,
    NR_CONCURSO              double        null,
    DS_TITULO                varchar(200)  null,
    DS_SUBTITULO             varchar(200)  null
    );

create index CKC_IN_APURACAO_BLOQU_APURACAO
    on APURACAO (IN_APURACAO_BLOQUEADA);

create index CKC_SG_CARREIRA_APURACAO
    on APURACAO (SG_CARREIRA);

create table if not exists AREA_ATUACAO
(
    ID_AREA_ATUACAO       int auto_increment
    primary key,
    CD_AREA_ATUACAO       varchar(10)  null,
    DS_AREA_ATUACAO       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists AVERBACAO
(
    ID_AVERBACAO              int auto_increment
    primary key,
    ID_SERVIDOR               int          null,
    ID_CARGO_CONCURSO_ANT     int          null,
    ID_ORGAO_CONCURSO_ANT     int          null,
    ID_NORMA_CONCURSO_ANT     int          null,
    CD_AVERBACAO              varchar(10)  null,
    DS_CLASSE_PRECEDEU        varchar(100) null,
    NR_TEMPO_PRECEDEU         decimal(12)  null,
    NR_CONCURSO_ANTERIOR      decimal(12)  null,
    NR_ANO_CONCURSO_ANTERIOR  decimal(4)   null,
    NR_CLASSIFICACAO_ANTERIOR decimal(12)  null,
    DT_INI_CONC_EXER_ANT      datetime     null,
    DT_POSSE_ANTERIOR         datetime     null,
    DT_EXONERACAO_ANTERIOR    datetime     null,
    IN_CONCURSO_FEDERAL       varchar(1)   not null,
    NR_OUTRAS_CARREIRAS       decimal(12)  null,
    NR_TEMPO_MESARIO          decimal(12)  null,
    DT_OPERACAO_INCLUSAO      datetime     not null,
    DT_OPERACAO_ALTERACAO     datetime     not null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO      datetime     null
    );

create index CK_IN_ATIVO_VW_DADOS
    on AVERBACAO (IN_CONCURSO_FEDERAL);

create table if not exists BANCO
(
    ID_BANCO              int auto_increment
    primary key,
    CD_BANCO              varchar(4)   not null,
    DS_BANCO              varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists BASE_LEGAL
(
    ID_BASE_LEGAL         int auto_increment
    primary key,
    ID_FORMA_DOCUMENTO    int          null,
    CD_BASE_LEGAL         varchar(11)  null,
    DS_BASE_LEGAL         varchar(200) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists CARGO
(
    ID_CARGO              int auto_increment
    primary key,
    ID_NORMA              int           null,
    ID_TIPO_SALARIO       int           null,
    ID_NIVEL              int           null,
    ID_ORGAO              int           null,
    CD_CARGO_RH           varchar(10)   not null,
    DS_CARGO_RH           varchar(100)  null,
    QT_HORAS              decimal(5)    null,
    CD_CBO_OCUPACAO       varchar(7)    not null,
    DS_TCU                varchar(100)  null,
    QT_VAGAS              decimal(12)   null,
    QT_VAGAS_OCUPADAS     decimal(12)   null,
    DT_CRIACAO_CARGO      datetime      null,
    DT_EXTINCAO_CARGO     datetime      null,
    IN_CARGO              varchar(1)    not null,
    IN_CARGO_AGU          varchar(1)    not null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    ID_CARREIRA           int           null
    );

create index CK_IN_CARGO_AGU_CARGO
    on CARGO (IN_CARGO_AGU);

create index CK_IN_CARGO_CARGO
    on CARGO (IN_CARGO);

create table if not exists CARGO_EFETIVO
(
    ID_CARGO_EFETIVO          int auto_increment
    primary key,
    ID_SERVIDOR               int           null,
    ID_SERVIDOR_PROC_VAGA_SUB int           null,
    ID_CARGO                  int           null,
    ID_PROCEDENCIA_VAGA       int           null,
    ID_LOTACAO_ORIGEM         int           null,
    ID_LOTACAO_EXERCICIO      int           null,
    ID_TIPO_OCUPACAO          int           null,
    CD_VAGA_SIAPE             varchar(10)   null,
    IN_DIREITO_ADQUIRIDO      varchar(1)    not null,
    DT_INGRESSO_SERVIDOR      datetime      null,
    NR_CONCURSO               varchar(10)   null,
    NR_ANO_CONCURSO           decimal(4)    null,
    NR_CLASSIFICACAO_CONCURSO decimal(12)   null,
    DS_OBSERVACAO             varchar(4000) null,
    DT_OPERACAO_INCLUSAO      datetime      not null,
    DT_OPERACAO_ALTERACAO     datetime      not null,
    NR_CPF_OPERADOR           varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO      datetime      null,
    ID_RH                     int           null
    );

create index CK_IN_DIREITO_ADQUIR_CARGO_EF
    on CARGO_EFETIVO (IN_DIREITO_ADQUIRIDO);

create table if not exists CARGO_FUNCAO
(
    ID_CARGO_FUNCAO            int auto_increment
    primary key,
    ID_LOTACAO                 int           null,
    ID_FUNCAO_GRATIFICADA      int           null,
    ID_NORMA                   int           null,
    CD_CARGO_FUNCAO            varchar(10)   not null,
    SG_CARGO_FUNCAO            varchar(15)   null,
    DS_CARGO_FUNCAO            varchar(100)  not null,
    DT_CRIACAO_CARGO           datetime      null,
    DT_EXTINCAO_CARGO          datetime      null,
    ST_TIPO_CARGO              varchar(1)    not null,
    IN_OPCAO                   varchar(1)    not null,
    IN_SUBSTITUTO              varchar(1)    not null,
    IN_VANTAGEM                varchar(1)    not null,
    IN_PROGRESSAO              varchar(1)    not null,
    DS_OBSEVACAO               varchar(4000) null,
    DT_OPERACAO_INCLUSAO       datetime      not null,
    DT_OPERACAO_ALTERACAO      datetime      not null,
    NR_CPF_OPERADOR            varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO       datetime      null,
    ID_RH                      int           null,
    ID_COMISSAO_ESPECIFICA_RED int           null
    );

create index CK_IN_OPCAO_CARGO_FU
    on CARGO_FUNCAO (IN_OPCAO);

create index CK_IN_PROGRESSAO_CARGO_FU
    on CARGO_FUNCAO (IN_PROGRESSAO);

create index CK_IN_SUBSTITUTO_CARGO_FU
    on CARGO_FUNCAO (IN_SUBSTITUTO);

create index CK_IN_VANTAGEM_CARGO_FU
    on CARGO_FUNCAO (IN_VANTAGEM);

create index CK_ST_TIPO_CARGO_CARGO_FU
    on CARGO_FUNCAO (ST_TIPO_CARGO);

create table if not exists CARREIRA
(
    ID_CARREIRA           int auto_increment
    primary key,
    SG_CARREIRA           varchar(16)  not null,
    DS_CARREIRA           varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists CESSAO
(
    ID_CESSAO                  int auto_increment
    primary key,
    ID_SERVIDOR                int            null,
    ID_ORGAO_ORIGEM            int            null,
    ID_ORGAO_DESTINO           int            null,
    DT_INICIO_CESSAO           datetime       not null,
    DT_FIM_CESSAO              datetime       null,
    DS_CARGO_DESTINO           varchar(200)   null,
    ID_REGIME_JURIDICO_DESTINO int            null,
    ID_NORMA                   int            null,
    ST_ONUS                    varchar(1)     not null,
    IN_CANCELADO               varchar(1)     not null,
    VL_PREVIDENCIA             decimal(12, 2) null,
    VL_BENEFICIOS              decimal(12, 2) null,
    VL_REMUNERACAO             decimal(12, 2) null,
    VL_TETO_REMUNERACAO        decimal(12, 2) null,
    DS_OBSERVACAO              varchar(4000)  null,
    DT_OPERACAO_INCLUSAO       datetime       not null,
    DT_OPERACAO_ALTERACAO      datetime       not null,
    NR_CPF_OPERADOR            varchar(11)    not null,
    DT_OPERACAO_EXCLUSAO       datetime       null,
    ID_RH                      int            null,
    constraint UK_CESSAO
    unique (ID_SERVIDOR, DT_INICIO_CESSAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_CANCELADO_CESSAO
    on CESSAO (IN_CANCELADO);

create index CK_ST_ONUS_CESSAO
    on CESSAO (ST_ONUS);

create table if not exists CLASSE_CATEGORIAS
(
    ID_TIPO_CLASSE        int         not null,
    ID_CARGO              int         not null,
    DT_OPERACAO_INCLUSAO  datetime    not null,
    DT_OPERACAO_ALTERACAO datetime    not null,
    NR_CPF_OPERADOR       varchar(11) not null,
    DT_OPERACAO_EXCLUSAO  datetime    null,
    primary key (ID_TIPO_CLASSE, ID_CARGO)
    );

create table if not exists CLASSE_PADRAO
(
    ID_CLASSE_PADRAO      int auto_increment
    primary key,
    ID_NORMA              int           null,
    ID_TIPO_PROVIMENTO    int           null,
    ID_CARGO_EFETIVO      int           null,
    ID_TIPO_PADRAO        int           null,
    DT_CLASSE_PADRAO      datetime      null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    ID_RH                 int           null
    );

create table if not exists CLASSIFICACAO_TIPO_AFASTAMENTO
(
    ID_CLASS_TIPO_AFASTAMENTO int auto_increment
    primary key,
    DS_CLASS_TIPO_AFASTAMENTO varchar(100) not null
    );

create table if not exists COMISSAO_ESPECIFICA_REDUZIDA
(
    ID_COMISSAO_ESPECIFICA_RED int auto_increment
    primary key,
    NM_COMISSAO_ESPECIFICA_RED varchar(100) not null,
    DT_OPERACAO_INCLUSAO       datetime     not null,
    DT_OPERACAO_ALTERACAO      datetime     not null,
    NR_CPF_OPERADOR            varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO       datetime     null
    );

create table if not exists COMPROVANTE_FUNCIONAL_REC
(
    ID_COMPROVANTE_FUNCIONAL_REC int auto_increment
    primary key,
    ID_DADO_FUNCIONAL_REC        int        null,
    ID_MIDIA                     int        null,
    DT_INCLUSAO_COMPROVANTE      datetime   not null,
    IN_TIPO_COMPROVANTE          varchar(2) not null
    );

create index CK_IN_TIPO_COMPR_FUNCIONAL
    on COMPROVANTE_FUNCIONAL_REC (IN_TIPO_COMPROVANTE);

create table if not exists COMPROVANTE_PESSOAL_REC
(
    ID_COMPROVANTE_PESSOAL_REC int auto_increment
    primary key,
    ID_DADO_PESSOAL_REC        int        null,
    ID_MIDIA                   int        null,
    DT_INCLUSAO_COMPROVANTE    datetime   not null,
    IN_TIPO_COMPROVANTE        varchar(2) not null
    );

create index CK_IN_TIPO_COMPROVANTE
    on COMPROVANTE_PESSOAL_REC (IN_TIPO_COMPROVANTE);

create table if not exists CONCESSAO_FERIAS
(
    ID_CONCESSAO_FERIAS         int auto_increment
    primary key,
    ID_FERIAS                   int           null,
    ID_MOTIVO_INTERRUPCAO       int           null,
    ID_NORMA_AQUISICAO          int           null,
    ID_NORMA_INTERRUPCAO        int           null,
    IN_ADIANTAMENTO_REMUNERACAO varchar(1)    not null,
    NR_DEVOLUCAO_QTDEPARCELAS   decimal(2)    null,
    NR_AVISO                    decimal(2)    null,
    DT_INICIO_MARCACAO          datetime      null,
    DT_FIM_MARCACAO             datetime      null,
    DT_INICIO_INTERRUPCAO       datetime      null,
    DT_FIM_INTERRUPCAO          datetime      null,
    DT_PAGAMENTO                datetime      null,
    DS_OBSERVACAO_AQUISICAO     varchar(4000) null,
    DS_OBSERVACAO_INTERRUPCAO   varchar(4000) null,
    DT_OPERACAO_INCLUSAO        datetime      not null,
    DT_OPERACAO_ALTERACAO       datetime      not null,
    NR_CPF_OPERADOR             varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO        datetime      null,
    ID_RH                       int           null,
    IN_SITUACAO                 varchar(1)    null,
    DS_OBSERVACAO_REJEICAO      varchar(4000) null,
    constraint UK_CONCESSAO_FERIAS
    unique (ID_FERIAS, DT_INICIO_MARCACAO, DT_FIM_MARCACAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_ADIANTAMENTO_REMUNERACAO
    on CONCESSAO_FERIAS (IN_ADIANTAMENTO_REMUNERACAO);

create table if not exists CONTROLE_SERVIDOR
(
    ID_CONTROLE_SERVIDOR    int auto_increment
    primary key,
    ID_SERVIDOR             int         null,
    NR_ANO_ENTREGA          decimal(4)  null,
    DT_ENTREGA_TRANSCRICAO  datetime    not null,
    IN_TRANSCRICAO_ENTREGUE varchar(1)  not null,
    DT_OPERACAO_INCLUSAO    datetime    not null,
    DT_OPERACAO_ALTERACAO   datetime    not null,
    NR_CPF_OPERADOR         varchar(11) not null,
    DT_OPERACAO_EXCLUSAO    datetime    null,
    IN_AUTORIZACAO_ENTREGUE varchar(1)  not null
    );

create index CK_IN_AUTORIZACAO_ENTREGUE
    on CONTROLE_SERVIDOR (IN_AUTORIZACAO_ENTREGUE);

create index CK_IN_TRANSCRICAO_ENTREGUE
    on CONTROLE_SERVIDOR (IN_TRANSCRICAO_ENTREGUE);

create table if not exists COR
(
    ID_COR                int auto_increment
    primary key,
    CD_COR                varchar(10)  null,
    DS_COR                varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists DADO_BANCARIO
(
    ID_DADO_BANCARIO      int auto_increment
    primary key,
    ID_AGENCIA            int         null,
    ID_TIPO_CONTA         int         null,
    ID_SERVIDOR           int         null,
    DT_OPCAO              datetime    null,
    CD_OPERACAO           varchar(10) not null,
    NR_CONTA              varchar(12) not null,
    IN_CONTA              varchar(1)  not null,
    NR_DV_CONTA           varchar(10) null,
    DT_OPERACAO_INCLUSAO  datetime    not null,
    DT_OPERACAO_ALTERACAO datetime    not null,
    NR_CPF_OPERADOR       varchar(11) not null,
    DT_OPERACAO_EXCLUSAO  datetime    null,
    constraint UK_DADO_BANCARIO
    unique (ID_AGENCIA, ID_TIPO_CONTA, ID_SERVIDOR, NR_CONTA, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_CONTA_DADO_BAN
    on DADO_BANCARIO (IN_CONTA);

create table if not exists DADO_FINANCEIRO
(
    ID_SERVIDOR                int            null,
    ID_REGIME_PREV             int            null,
    ID_HORARIO                 int            null,
    IN_CALCULA_FOLHA_PAG       varchar(1)     not null,
    DT_ONUS_ORGAO              datetime       null,
    DT_SUSPENSAO_PAGAMENTO     datetime       null,
    NR_PERCENTUAL_TEMP_SERVICO decimal(5, 2)  null,
    NR_DEPENDENTE_SAL_FAMILIA  decimal(2)     null,
    NR_DEPENDENTE_IRRF         decimal(2)     null,
    VL_ABATIMENTO_IRRF         decimal(12, 2) null,
    NR_HORA_BASE_MENSAL        decimal(4)     null,
    DT_OPERACAO_INCLUSAO       datetime       not null,
    DT_OPERACAO_ALTERACAO      datetime       not null,
    NR_CPF_OPERADOR            varchar(11)    not null,
    ID_DADO_FINANCEIRO         int auto_increment
    primary key,
    ID_RH                      int            null,
    DT_OPERACAO_EXCLUSAO       datetime       null
    );

create index CK_IN_CALCULA_FOLHA__DADO_FIN
    on DADO_FINANCEIRO (IN_CALCULA_FOLHA_PAG);

create table if not exists DADO_FUNCIONAL
(
    ID_SERVIDOR                 int           null,
    ID_RESCISAO_RAIS            int           null,
    ID_TIPO_ADMISSAO            int           null,
    ID_SITUACAO_RAIS            int           null,
    ID_TIPO_SALARIO             int           null,
    ID_VINCULO_RAIS             int           null,
    ID_REGIME_JURIDICO          int           null,
    ID_AREA_ATUACAO             int           null,
    DT_INGRESSO_ORGAO           datetime      null,
    CD_MATRICULA_SIAPE          varchar(15)   null,
    DT_INGRESSO_REGIME_JURIDICO datetime      null,
    DS_OBSERVACAO               varchar(4000) null,
    DT_RESCISAO                 datetime      null,
    DT_OPERACAO_INCLUSAO        datetime      not null,
    DT_OPERACAO_ALTERACAO       datetime      not null,
    NR_CPF_OPERADOR             varchar(11)   not null,
    ID_DADO_FUNCIONAL           int auto_increment
    primary key,
    ID_RH                       int           null,
    DT_OPERACAO_EXCLUSAO        datetime      null,
    DT_INGRESSO_SERVICO_PUBLICO datetime      null
    );

create table if not exists DADO_FUNCIONAL_BKP41799
(
    ID_SERVIDOR                 int           null,
    ID_RESCISAO_RAIS            int           null,
    ID_TIPO_ADMISSAO            int           null,
    ID_SITUACAO_RAIS            int           null,
    ID_TIPO_SALARIO             int           null,
    ID_VINCULO_RAIS             int           null,
    ID_REGIME_JURIDICO          int           null,
    ID_AREA_ATUACAO             int           null,
    DT_INGRESSO_ORGAO           datetime      null,
    CD_MATRICULA_SIAPE          varchar(15)   null,
    DT_INGRESSO_REGIME_JURIDICO datetime      null,
    DS_OBSERVACAO               varchar(4000) null,
    DT_RESCISAO                 datetime      null,
    DT_OPERACAO_INCLUSAO        datetime      not null,
    DT_OPERACAO_ALTERACAO       datetime      not null,
    NR_CPF_OPERADOR             varchar(11)   not null,
    ID_DADO_FUNCIONAL           int           null,
    ID_RH                       int           null,
    DT_OPERACAO_EXCLUSAO        datetime      null,
    DT_INGRESSO_SERVICO_PUBLICO datetime      null
    );

create table if not exists DADO_FUNCIONAL_REC
(
    ID_DADO_FUNCIONAL_REC      int auto_increment
    primary key,
    ID_SERVIDOR                int         null,
    ID_TIPO_TELEFONE           int         null,
    NR_DDD                     varchar(2)  not null,
    NR_TELEFONE                varchar(30) not null,
    DT_OPERACAO_INCLUSAO       datetime    not null,
    NR_CPF_OPERADOR            varchar(11) not null,
    ST_DADO_FUNCIONAL_REC      varchar(1)  not null,
    DT_OPERACAO_DEVOLUCAO      datetime    null,
    NR_CPF_OPERADOR_DEVOLUCAO  varchar(11) null,
    DT_OPERACAO_MIGRACAO       datetime    null,
    NR_CPF_OPERADOR_MIGRACAO   varchar(11) null,
    PISPASEP                   varchar(50) null,
    DT_INGRESSO_ORGAO          datetime    null,
    NR_IDENTIDADE_FUNCIONAL    varchar(12) null,
    ST_REG_ATUALIZADO_DFR      varchar(1)  null,
    ID_LOTACAO                 int         null,
    DT_IMPRESSAO_FICHA         datetime    null,
    ST_INDICA_SERVIDOR_LISTADO varchar(1)  null
    );

create index CK_ST_DADO_FUNCIONAL_REC
    on DADO_FUNCIONAL_REC (ST_DADO_FUNCIONAL_REC);

create table if not exists DADO_PESSOAL_REC
(
    ID_DADO_PESSOAL_REC        int auto_increment
    primary key,
    ID_COR                     int          null,
    ID_ESTADO_CIVIL            int          null,
    ID_ESCOLARIDADE            int          null,
    ID_FORMACAO                int          null,
    ID_TIPO_TELEFONE           int          null,
    ID_SERVIDOR                int          null,
    NM_SERVIDOR                varchar(70)  not null,
    NM_CONJUGE                 varchar(70)  null,
    NM_EMAIL_PESSOAL           varchar(100) null,
    NR_DDD                     varchar(2)   null,
    NR_TELEFONE                varchar(30)  null,
    DT_OPERACAO_INCLUSAO       datetime     not null,
    NR_CPF_OPERADOR            varchar(11)  not null,
    ST_DADO_PESSOAL_REC        varchar(1)   not null,
    DT_OPERACAO_MIGRACAO       datetime     null,
    NR_CPF_OPERADOR_MIGRACAO   varchar(11)  null,
    DT_OPERACAO_DEVOLUCAO      datetime     null,
    NR_CPF_OPERADOR_DEVOLUCAO  varchar(11)  null,
    NM_PAI                     varchar(70)  null,
    NM_MAE                     varchar(70)  null,
    NR_DOCUMENTACAO            varchar(50)  null,
    DS_ORG_EXP_DOCUMENTACAO    varchar(100) null,
    DT_EXP_DOCUMENTACAO        datetime     null,
    ID_TIPO_SANGUINEO          int          null,
    ID_MUNICIPIO               int          null,
    DT_NASCIMENTO              datetime     null,
    RP_NR_DOCUMENTACAO         varchar(50)  null,
    RP_DS_ORG_EXP_DOCUMENTACAO varchar(100) null,
    RP_DT_EXP_DOCUMENTACAO     datetime     null,
    RP_ID_UF                   decimal(12)  null,
    DS_NACIONALIDADE           varchar(50)  null,
    RG_ID_UF                   decimal(12)  null,
    ST_REG_ATUALIZADO_DPR      varchar(1)   null
    );

create index CK_ST_DADO_PESSOAL_REC
    on DADO_PESSOAL_REC (ST_DADO_PESSOAL_REC);

create table if not exists DADO_PROMOCAO
(
    ID_DADO_PROMOCAO         int auto_increment
    primary key,
    ID_SERVIDOR              int            null,
    QTD_CATEGORIA_FUNCIONAL  decimal(5)     null,
    QTD_SERVICO_CARREIRA     decimal(5)     null,
    QTD_SERVICO_PUBLICO      decimal(5)     null,
    QTD_SERVICO_MESARIO      decimal(5)     null,
    DT_OPERACAO_INCLUSAO     datetime       not null,
    DT_OPERACAO_ALTERACAO    datetime       not null,
    NR_CPF_OPERADOR          varchar(11)    not null,
    DT_OPERACAO_EXCLUSAO     datetime       null,
    ID_TIPO_PADRAO           int            null,
    NR_CLASSIFICACAO_PNE     decimal(12, 2) null,
    ID_RH                    int            null,
    DT_INGRESSO_CARREIRA     datetime       null,
    IN_ESTAGIO_CONFIRMATORIO varchar(1)     null,
    IN_TEMPO_EMPRESA_PUBLICA varchar(1)     null,
    IN_SUBJUDICE             varchar(1)     null,
    IN_ELEGIVEL              varchar(1)     null,
    DT_CARREIRA_PRECEDENTE   datetime       null
    );

create index CK_IN_ELEGIVEL
    on DADO_PROMOCAO (IN_ELEGIVEL);

create index CK_IN_ESTAGIO_CONFIRMATORIO
    on DADO_PROMOCAO (IN_ESTAGIO_CONFIRMATORIO);

create index CK_IN_SUBJUDICE
    on DADO_PROMOCAO (IN_SUBJUDICE);

create index CK_IN_TEMPO_EMPRESA_PUBLICA
    on DADO_PROMOCAO (IN_TEMPO_EMPRESA_PUBLICA);

create table if not exists DADO_PROMOCAO_VW
(
    NR_CPF_CANDIDATO        varchar(11)  not null,
    NM_CANDIDATO            varchar(100) not null,
    NR_MATRICULA_SIAPE      double       null,
    DS_CLASSE_PRECEDEU      varchar(100) null,
    NR_TEMPO_PRECEDEU       double       null,
    NR_OUTRAS_CARREIRAS     double       null,
    NR_SERV_PUBLICO_FEDERAL double       null,
    NR_CLASS_DEFICIENCIA    decimal(3)   null,
    NR_TEMPO_MESARIO        double       null,
    DT_PRI_ESP              datetime     null,
    DT_SEG_PRI              datetime     null,
    DT_INGRESSO_CARREIRA    datetime     null
    );

create table if not exists DADO_PROM_BKP20111117
(
    ID_DADO_PROMOCAO         int            null,
    ID_SERVIDOR              int            null,
    QTD_CATEGORIA_FUNCIONAL  decimal(5)     null,
    QTD_SERVICO_CARREIRA     decimal(5)     null,
    QTD_SERVICO_PUBLICO      decimal(5)     null,
    QTD_SERVICO_MESARIO      decimal(5)     null,
    DT_OPERACAO_INCLUSAO     datetime       not null,
    DT_OPERACAO_ALTERACAO    datetime       not null,
    NR_CPF_OPERADOR          varchar(11)    not null,
    DT_OPERACAO_EXCLUSAO     datetime       null,
    ID_TIPO_PADRAO           int            null,
    NR_CLASSIFICACAO_PNE     decimal(12, 2) null,
    ID_RH                    int            null,
    DT_INGRESSO_CARREIRA     datetime       null,
    IN_ESTAGIO_CONFIRMATORIO varchar(1)     null,
    IN_TEMPO_EMPRESA_PUBLICA varchar(1)     null,
    IN_SUBJUDICE             varchar(1)     null,
    IN_ELEGIVEL              varchar(1)     null,
    DT_CARREIRA_PRECEDENTE   datetime       null
    );

create table if not exists DEPENDENTE
(
    ID_DEPENDENTE          int auto_increment
    primary key,
    ID_SERVIDOR            int           null,
    ID_MUNICIPIO_CERTIDAO  int           null,
    ID_TIPO_SANGUINEO      int           null,
    ID_TIPO_PARENTESCO     int           null,
    NM_DEPENDENTE          varchar(70)   not null,
    DT_NASCIMENTO          datetime      not null,
    CD_SEXO                varchar(1)    not null,
    NR_CPF                 varchar(11)   null,
    DT_CASAMENTO           datetime      null,
    NM_PAI_DEPENDENTE      varchar(70)   null,
    NM_MAE_DEPENDENTE      varchar(70)   null,
    DT_INICIO_DEPENDENTE   datetime      null,
    DT_FIM_DEPENDENTE      datetime      null,
    DS_MOTIVO              varchar(100)  null,
    DT_CERTIDAO_NASCIMENTO datetime      null,
    NR_CERTIDAO_NASCIMENTO varchar(50)   null,
    DS_LIVRO_CERTIDAO      varchar(100)  null,
    DS_FOLHA_CERTIDAO      varchar(100)  null,
    DS_CARTORIO_CERTIDAO   varchar(100)  null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null
    );

create index CK_CD_SEXO_DEPENDEN
    on DEPENDENTE (CD_SEXO);

create table if not exists DEPENDENTE_REC
(
    ID_DEPENDENTE_REC              int auto_increment
    primary key,
    ID_SERVIDOR                    int           null,
    ID_TIPO_PARENTESCO             int           null,
    NM_DEPENDENTE                  varchar(70)   not null,
    DT_NASCIMENTO                  datetime      not null,
    CD_SEXO                        varchar(1)    not null,
    NR_CPF                         varchar(11)   null,
    NR_RG                          decimal       null,
    DT_EXPEDICAO_RG                datetime      null,
    DS_ORGAO_EXPEDIDOR_RG          varchar(100)  null,
    ID_UF_EXPEDIDOR_RG             int           null,
    ID_MIDIA_COMPROVANTE           int           null,
    ID_DEPENDENTE                  int           null,
    DS_JUSTIFICATIVA               varchar(4000) null,
    DT_OPERACAO_INCLUSAO           datetime      null,
    NR_CPF_OPERADOR_INCLUSAO       varchar(11)   null,
    DT_OPERACAO_ALTERACAO          datetime      null,
    NR_CPF_OPERADOR_ALTERACAO      varchar(11)   null,
    DT_OPERACAO_EXCLUSAO           datetime      null,
    NR_CPF_OPERADOR_EXCLUSAO       varchar(11)   null,
    IN_REGISTRO_IRPF               varchar(1)    not null,
    IN_DOC_COMPROB_PASTA_FUNCIONAL varchar(1)    not null,
    ID_MUNICIPIO_CERTIDAO          int           null,
    NM_PAI_DEPENDENTE              varchar(70)   null,
    NM_MAE_DEPENDENTE              varchar(70)   null,
    DT_INICIO_DEPENDENTE           datetime      null,
    DT_FIM_DEPENDENTE              datetime      null,
    DS_MOTIVO                      varchar(100)  null,
    DT_CERTIDAO_NASCIMENTO         datetime      null,
    NR_CERTIDAO_NASCIMENTO         varchar(50)   null,
    DS_LIVRO_CERTIDAO              varchar(100)  null,
    DS_FOLHA_CERTIDAO              varchar(100)  null,
    DS_MATRICULA_CERTIDAO          varchar(50)   null,
    DS_CARTORIO_CERTIDAO           varchar(100)  null,
    ST_DEPENDENTE_REC              varchar(1)    not null,
    DT_OPERACAO_DEVOLUCAO          datetime      null,
    NR_CPF_OPERADOR_DEVOLUCAO      varchar(11)   null,
    DT_OPERACAO_MIGRACAO           datetime      null,
    NR_CPF_OPERADOR_MIGRACAO       varchar(11)   null
    );

create index CK_CD_SEXO_DEPENDENTE
    on DEPENDENTE_REC (CD_SEXO);

create index CK_IN_DOC_PASTA_FUNCIONAL
    on DEPENDENTE_REC (IN_DOC_COMPROB_PASTA_FUNCIONAL);

create index CK_IN_REGISTRO_IRPF
    on DEPENDENTE_REC (IN_REGISTRO_IRPF);

create index CK_ST_DEPENDENTE_REC
    on DEPENDENTE_REC (ST_DEPENDENTE_REC);

create table if not exists DOCUMENTACAO
(
    ID_DOCUMENTACAO           int auto_increment
    primary key,
    ID_SERVIDOR               int          null,
    ID_UF_DOCUMENTACAO        int          null,
    ID_TIPO_DOCUMENTACAO      int          null,
    IN_SITUACAO_DOCUMENTACAO  varchar(1)   not null,
    NR_DOCUMENTACAO           varchar(50)  not null,
    DS_ORG_EXP_DOCUMENTACAO   varchar(100) null,
    DT_EXP_DOCUMENTACAO       datetime     null,
    DT_VALIDADE_DOCUMENTACAO  datetime     null,
    DS_CATEGORIA_DOCUMENTACAO varchar(100) null,
    DS_ZONA_DOCUMENTACAO      varchar(100) null,
    DS_SERIE_DOCUMENTACAO     varchar(100) null,
    DS_SECAO_DOCUMENTACAO     varchar(100) null,
    DS_ENTIDADE_CLASSE        varchar(100) null,
    DS_REGIAO                 varchar(100) null,
    NR_REGISTRO               varchar(50)  null,
    DT_OPERACAO_INCLUSAO      datetime     not null,
    DT_OPERACAO_ALTERACAO     datetime     not null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO      datetime     null,
    constraint UK_DOCUMENTACAO
    unique (ID_SERVIDOR, ID_TIPO_DOCUMENTACAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_SITUACAO_DOCUM_DOCUMENT
    on DOCUMENTACAO (IN_SITUACAO_DOCUMENTACAO);

create table if not exists DOCUMENTACAO_05082010_BKP
(
    ID_DOCUMENTACAO           int          null,
    ID_SERVIDOR               int          null,
    ID_UF_DOCUMENTACAO        int          null,
    ID_TIPO_DOCUMENTACAO      int          null,
    IN_SITUACAO_DOCUMENTACAO  varchar(1)   not null,
    NR_DOCUMENTACAO           varchar(50)  not null,
    DS_ORG_EXP_DOCUMENTACAO   varchar(100) null,
    DT_EXP_DOCUMENTACAO       datetime     null,
    DT_VALIDADE_DOCUMENTACAO  datetime     null,
    DS_CATEGORIA_DOCUMENTACAO varchar(100) null,
    DS_ZONA_DOCUMENTACAO      varchar(100) null,
    DS_SERIE_DOCUMENTACAO     varchar(100) null,
    DS_SECAO_DOCUMENTACAO     varchar(100) null,
    DS_ENTIDADE_CLASSE        varchar(100) null,
    DS_REGIAO                 varchar(100) null,
    NR_REGISTRO               varchar(50)  null,
    DT_OPERACAO_INCLUSAO      datetime     not null,
    DT_OPERACAO_ALTERACAO     datetime     not null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO      datetime     null
    );

create table if not exists DOC_CORRECAO
(
    ID_SERVIDOR     int         null,
    NR_DOCUMENTACAO varchar(50) not null,
    QTD             double      null
    );

create table if not exists DOC_PRE_REQUISICAO
(
    ID_DOC_PREREQUISICAO      int auto_increment
    primary key,
    ID_PRE_REQUISICAO         int           null,
    ID_FORMA_DOCUMENTO        int           null,
    DT_DOCUMENTO              datetime      null,
    DS_DOCUMENTO              varchar(255)  null,
    IN_RESPOSTA               varchar(1)    null,
    IN_AUT_REDISTRIBUICAO     varchar(1)    null,
    DS_AUTORIZACAO            varchar(255)  null,
    DT_AUTORIZACAO            datetime      null,
    DT_OPERACAO_INCLUSAO      datetime      not null,
    DT_OPERACAO_ALTERACAO     datetime      not null,
    NR_CPF_OPERADOR           varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO      datetime      null,
    DS_AVISO_REDISTRIBUICAO   varchar(100)  null,
    IN_TIPO_REDISTRIBUICAO    varchar(1)    null,
    IN_PERIODO_REDISTRIBUICAO varchar(1)    null,
    NR_QTD_PERIODO            decimal       null,
    IN_TIPO_DOCUMENTO         varchar(1)    null,
    DS_TEXTO_APRESENTACAO     varchar(4000) null,
    ID_MIDIA                  int           null
    );

create index CK_IN_AUT_REDISTRIBUICAO
    on DOC_PRE_REQUISICAO (IN_AUT_REDISTRIBUICAO);

create index CK_IN_PERIODO_REDISTRIBUICAO
    on DOC_PRE_REQUISICAO (IN_PERIODO_REDISTRIBUICAO);

create index CK_IN_RESPOSTA
    on DOC_PRE_REQUISICAO (IN_RESPOSTA);

create index CK_IN_TIPO_DOCUMENTO
    on DOC_PRE_REQUISICAO (IN_TIPO_DOCUMENTO);

create index CK_IN_TIPO_REDISTRIBUICAO
    on DOC_PRE_REQUISICAO (IN_TIPO_REDISTRIBUICAO);

create table if not exists ENDERECO
(
    ID_ENDERECO           int auto_increment
    primary key,
    ID_SERVIDOR           int          null,
    ID_MUNICIPIO          int          null,
    ID_UF_ENDERECO        int          null,
    ID_TIPO_ENDERECO      int          null,
    DS_ENDERECO           varchar(100) null,
    DS_COMPLEMENTO        varchar(100) null,
    NM_BAIRRO             varchar(70)  null,
    NR_CEP                varchar(8)   null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists ENDERECO_REC
(
    ID_ENDERECO_REC           int auto_increment
    primary key,
    ID_SERVIDOR               int          null,
    ID_MUNICIPIO              int          null,
    ID_TIPO_ENDERECO          int          null,
    ID_MIDIA_COMPROVANTE      int          null,
    DS_LOGRADOURO             varchar(100) not null,
    DS_COMPLEMENTO            varchar(100) null,
    NM_BAIRRO                 varchar(70)  not null,
    NR_CEP                    varchar(8)   null,
    DT_OPERACAO_INCLUSAO      datetime     not null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    ST_ENDERECO_REC           varchar(1)   not null,
    DT_OPERACAO_DEVOLUCAO     datetime     null,
    NR_CPF_OPERADOR_DEVOLUCAO varchar(11)  null,
    DT_OPERACAO_MIGRACAO      datetime     null,
    NR_CPF_OPERADOR_MIGRACAO  varchar(11)  null,
    ST_REG_ATUALIZADO_END     varchar(1)   null
    );

create index CK_ST_ENDERECO_REC
    on ENDERECO_REC (ST_ENDERECO_REC);

create table if not exists ESCOLARIDADE
(
    ID_ESCOLARIDADE       int auto_increment
    primary key,
    CD_ESCOLARIDADE       varchar(10)  null,
    DS_ESCOLARIDADE       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists ESTADO_CIVIL
(
    ID_ESTADO_CIVIL       int auto_increment
    primary key,
    CD_ESTADO_CIVIL       varchar(10)  null,
    DS_ESTADO_CIVIL       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists ETNIA
(
    ID_ETNIA              int auto_increment
    primary key,
    CD_ETNIA              varchar(10)  null,
    DS_ETNIA              varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists FAILED_JOBS
(
    ID         int auto_increment
    primary key,
    CONNECTION longtext not null,
    QUEUE      longtext not null,
    PAYLOAD    longtext not null,
    EXCEPTION  longtext not null,
    FAILED_AT  datetime not null
);

create table if not exists FERIAS
(
    ID_FERIAS             int auto_increment
    primary key,
    ID_SERVIDOR           int           null,
    ID_FERIAS_PARAMETRO   int           null,
    ID_NORMA              int           null,
    NR_ANO_EXERCICIO      varchar(4)    not null,
    DT_INICIO_AQUISICAO   datetime      null,
    DT_FIM_AQUISICAO      datetime      null,
    QT_DIAS_SOLICITADO    decimal(5)    null,
    IN_ABONO              varchar(1)    not null,
    IN_DECIMO_TER_SALARIO varchar(1)    not null,
    NR_PROTOCOLO          decimal(12)   null,
    DT_PAG_CONSTITUCIONAL datetime      null,
    DT_PAG_GR_NATAL       datetime      null,
    DT_PAG_ABONO          datetime      null,
    DT_PROTOCOLO          datetime      null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_INICIAL_ABONO      datetime      null,
    DT_FIM_ABONO          datetime      null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    ID_RH                 int           null
    );

create index CK_IN_ABONO_FERIAS
    on FERIAS (IN_ABONO);

create index CK_IN_DECIMO_TER_SAL_FERIAS
    on FERIAS (IN_DECIMO_TER_SALARIO);

create table if not exists FERIAS_PARAMETRO
(
    ID_FERIAS_PARAMETRO   int auto_increment
    primary key,
    CD_FERIAS_PARAMETRO   varchar(10)  null,
    DS_FERIAS_PARAMETRO   varchar(100) not null,
    DS_FERIAS_QTD_DIAS    varchar(3)   null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists FINALIDADE_NORMA
(
    ID_FINALIDADE_NORMA   int auto_increment
    primary key,
    CD_FINALIDADE_NORMA   varchar(11)  null,
    DS_FINALIDADE_NORMA   varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists FORMACAO_PROFISSIONAL
(
    ID_FORMACAO           int auto_increment
    primary key,
    CD_FORMACAO           varchar(10)  null,
    DS_FORMACAO           varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    CD_SIAPE              varchar(10)  null
    );

create table if not exists FORMA_DOCUMENTO
(
    ID_FORMA_DOCUMENTO    int auto_increment
    primary key,
    ID_FINALIDADE_NORMA   int          null,
    CD_FORMA_DOCUMENTO    varchar(11)  null,
    DS_FORMA_DOCUMENTO    varchar(100) not null,
    SG_FORMA_DOCUMENTO    varchar(10)  null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists FUNCAO
(
    ID_FUNCAO_COMISSIONADA int           null,
    ID_SERVIDOR            int           null,
    ID_TIPO_OPCAO          int           null,
    ID_CARGO_FUNCAO        int           null,
    ID_NORMA_NOMEACAO      int           null,
    ID_NORMA_OPCAO         int           null,
    ID_NORMA_EXONERACAO    int           null,
    ID_TIPO_OCUPACAO       int           null,
    IN_DIREITO_ADQUIRIDO   varchar(1)    not null,
    DT_NOMEACAO            datetime      null,
    DT_POSSE               datetime      null,
    DT_EXERCICIO           datetime      null,
    DT_EXONERACAO          datetime      null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null
    );

create table if not exists FUNCAO_COMISSIONADA
(
    ID_FUNCAO_COMISSIONADA int auto_increment
    primary key,
    ID_SERVIDOR            int           null,
    ID_TIPO_OPCAO          int           null,
    ID_CARGO_FUNCAO        int           null,
    ID_NORMA_NOMEACAO      int           null,
    ID_NORMA_OPCAO         int           null,
    ID_NORMA_EXONERACAO    int           null,
    ID_TIPO_OCUPACAO       int           null,
    IN_DIREITO_ADQUIRIDO   varchar(1)    not null,
    DT_NOMEACAO            datetime      null,
    DT_POSSE               datetime      null,
    DT_EXERCICIO           datetime      null,
    DT_EXONERACAO          datetime      null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null,
    ID_RH                  int           null,
    constraint UK_FUNCAO_COMISSIONADA
    unique (ID_SERVIDOR, ID_CARGO_FUNCAO, DT_NOMEACAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_DIREITO_ADQUIR_FUNCAO_C
    on FUNCAO_COMISSIONADA (IN_DIREITO_ADQUIRIDO);

create table if not exists FUNCAO_COMISSIONADA_SUBST
(
    ID_FUNCAO_COMISSIONADA_SUBST int auto_increment
    primary key,
    ID_CARGO_FUNCAO              int           null,
    ID_SERVIDOR_SUBSTITUTO       int           null,
    ID_TIPO_OCUPACAO             int           null,
    ID_NORMA_INICIO_SUBST        int           null,
    ID_NORMA_FIM_SUBST           int           null,
    DT_INICIO_SUBSTITUICAO       datetime      not null,
    DT_FINAL_SUBSTITUICAO        datetime      null,
    DS_OBSERVACAO                varchar(4000) null,
    DT_OPERACAO_INCLUSAO         datetime      not null,
    DT_OPERACAO_ALTERACAO        datetime      not null,
    NR_CPF_OPERADOR              varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO         datetime      null,
    ID_RH                        int           null
    );

create table if not exists FUNCAO_GRATIFICADA
(
    ID_FUNCAO_GRATIFICADA      int auto_increment
    primary key,
    CD_FUNCAO_GRATIFICADA      varchar(10)    not null,
    DS_FUNCAO_GRATIFICADA      varchar(100)   not null,
    DT_OPERACAO_INCLUSAO       datetime       not null,
    DT_OPERACAO_ALTERACAO      datetime       not null,
    NR_CPF_OPERADOR            varchar(11)    not null,
    DT_OPERACAO_EXCLUSAO       datetime       null,
    NR_NIVEL_COMISSAO_NACIONAL decimal(12)    null,
    NR_NIVEL_COMISSAO_INTERNAC decimal(12)    null,
    VL_REMUNERACAO             decimal(12, 2) null
    );

create table if not exists HISTORICO_FUNCIONAL
(
    ID_HISTORICO_FUNCIONAL int auto_increment
    primary key,
    ID_NORMA               int           null,
    ID_SERVIDOR            int           null,
    ID_NATUREZA_HISTORICO  int           null,
    DT_HISTORICO_FUNCIONAL datetime      not null,
    DS_HISTORICO_FUNCIONAL varchar(4000) not null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null,
    ID_RH                  int           null
    );

create table if not exists HORARIO
(
    ID_HORARIO            int auto_increment
    primary key,
    CD_HORARIO            varchar(10)  null,
    DS_HORARIO            varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    CD_SIAPE              varchar(10)  null
    );

create table if not exists IMPDP_STATS
(
    STATID  varchar(128)  null,
    TYPE    varchar(1)    null,
    VERSION double        null,
    FLAGS   double        null,
    C1      varchar(128)  null,
    C2      varchar(128)  null,
    C3      varchar(128)  null,
    C4      varchar(128)  null,
    C5      varchar(128)  null,
    C6      varchar(128)  null,
    N1      double        null,
    N2      double        null,
    N3      double        null,
    N4      double        null,
    N5      double        null,
    N6      double        null,
    N7      double        null,
    N8      double        null,
    N9      double        null,
    N10     double        null,
    N11     double        null,
    N12     double        null,
    N13     double        null,
    D1      datetime      null,
    T1      datetime      null,
    R1      blob          null,
    R2      blob          null,
    R3      blob          null,
    CH1     varchar(1000) null,
    CL1     longtext      null
    );

create table if not exists LISTA_APURACAO
(
    ID_APURACAO                   int          not null,
    NR_CPF_SERVIDOR               varchar(11)  not null,
    ID_SERVIDOR                   int          null,
    NR_SIAPE                      varchar(15)  null,
    NM_SERVIDOR                   varchar(70)  null,
    ID_CARGO_EFETIVO              int          null,
    CD_CARGO_EFETIVO              varchar(10)  null,
    DS_CARGO_EFETIVO_RH           varchar(100) null,
    NM_CARR_ATUAL                 varchar(50)  null,
    NR_CONCURSO                   varchar(50)  null,
    NR_ANO_CONCURSO               decimal(12)  null,
    NR_CLASSIFICACAO_CONCURSO     decimal(12)  null,
    DT_EXERC_CARR_ATUAL           datetime     null,
    QT_DIA_AFST_CARR_ATUAL_TSPF   decimal(12)  null,
    QT_DIA_AFST_CARR_ATUAL_TFI    decimal(12)  null,
    QT_DIA_CARREIRA_DESC_AFST     decimal(12)  null,
    DT_CTG_ATUAL                  datetime     null,
    CD_CTG_ATUAL_TP_PADRAO        varchar(10)  null,
    CD_CTG_ATUAL_TP_CLASSE        decimal(12)  null,
    SG_CTG_ATUAL                  varchar(10)  null,
    DS_CTG_ATUAL                  varchar(30)  null,
    VL_CTG_ATUAL                  decimal(12)  null,
    QT_DIA_AFST_CTG_ATUAL_TSPF    decimal(12)  null,
    QT_DIA_AFST_CTG_ATUAL_TFI     decimal(12)  null,
    QT_DIA_CTG_DESC_AFST          decimal(12)  null,
    ID_CARGO_EFETIVO_CARR_ANT     int          null,
    ID_CARGO_CARR_ANT             int          null,
    DS_CARGO_CARR_ANT             varchar(100) null,
    ID_PROVIM_CARR_ANT            int          null,
    SG_CTG_CARR_ANT               varchar(100) null,
    DS_CTG_CARR_ANT               varchar(30)  null,
    VL_CTG_CARR_ANT               decimal(12)  null,
    SG_PADR_CARR_ANT              varchar(10)  null,
    DS_PADR_CARR_ANT              varchar(100) null,
    VL_PADR_CARR_ANT              decimal(12)  null,
    DT_EXERC_CARR_ANT             datetime     null,
    DT_CLASSE_CARR_ANT            datetime     null,
    DT_VACANC_CARR_ANT            datetime     null,
    QT_DIA_AFST_CTG_CARR_ANT_TSPF decimal(12)  null,
    QT_DIA_AFST_CTG_CARR_ANT_TFI  decimal(12)  null,
    QT_DIA_CTG_CARR_ANT_DESC_AFST decimal(12)  null,
    QT_DIA_CARGO_BCH_DIR          decimal(12)  null,
    QT_DIA_TSPF                   decimal(12)  null,
    QT_DIA_TSPF_AGU               decimal(12)  null,
    QT_DIA_MESARIO                decimal(12)  null,
    DT_NASCIMENTO                 datetime     null,
    QT_DIA_IDADE                  decimal(12)  null,
    QT_DIAS_UDP                   decimal(12)  null,
    QT_DIA_AFAST_UDP              decimal(12)  null,
    SN_2ANOS_UDP                  varchar(3)   null,
    SN_3ANOS_UDP                  varchar(3)   null,
    NR_ORDEM_CLASSE_PADRAO        decimal(12)  null,
    primary key (ID_APURACAO, NR_CPF_SERVIDOR)
    );

create table if not exists LOG_SERVICO_ANTIGUIDADE
(
    ID_LOG_SERVICO_ANTIGUIDADE int auto_increment
    primary key,
    DS_XML_CLIENTE             longtext     null,
    DS_XML_SERVICO             longtext     null,
    DT_INCLUSAO                datetime     not null,
    DS_LOG_SERVICO_ANTIGUIDADE varchar(200) null
    );

create table if not exists LOG_UPDATE_NORMA
(
    TABELA  varchar(30)   null,
    ID      decimal(12)   null,
    CAMPO   varchar(30)   null,
    COMANDO varchar(1000) null
    );

create table if not exists LOTACAO
(
    ID_LOTACAO             int auto_increment
    primary key,
    ID_LOTACAO_PAI         int          null,
    ID_SERVIDOR_TITULAR    int          null,
    ID_SERVIDOR_SUBSTITUTO int          null,
    ID_TELEFONE            int          null,
    ID_ENDERECO            int          null,
    ID_TIPO_LOTACAO        int          null,
    CD_LOTACAO             varchar(20)  null,
    SG_LOTACAO             varchar(30)  not null,
    DS_LOTACAO             varchar(200) not null,
    IN_ATIVO               varchar(1)   not null,
    DT_CRIACAO_LOTACAO     datetime     null,
    DT_EXTINCAO_LOTACAO    datetime     null,
    NM_EMAIL_LOTACAO       varchar(100) null,
    DT_OPERACAO_INCLUSAO   datetime     not null,
    DT_OPERACAO_ALTERACAO  datetime     not null,
    NR_CPF_OPERADOR        varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO   datetime     null,
    CD_UORG                decimal(12)  null,
    ID_RH                  int          null,
    IN_DIFICIL_PROVIMENTO  varchar(1)   null,
    DT_INICIO_UDP          datetime     null,
    DT_EXPIRACAO_UDP       datetime     null,
    IN_DIRECAO_SUPERIOR    varchar(1)   null,
    CD_SIORG               varchar(50)  null,
    IN_TIPO_NORMA_UDP      varchar(1)   null,
    IN_TIPO_NORMA_ODS      varchar(1)   null
    );

create index CK_IN_ATIVO_LOTACAO
    on LOTACAO (IN_ATIVO);

create table if not exists LOTACAO_DIFICIL_PROVIMENTO
(
    ID_LOTACAO_DIFICIL_PROVIMENTO int auto_increment
    primary key,
    ID_LOTACAO                    int      null,
    DT_INICIO                     datetime null,
    DT_FIM                        datetime null
);

create table if not exists LOTACAO_IDEAL
(
    ID_LOTACAO_IDEAL      int auto_increment
    primary key,
    ID_LOTACAO            int         null,
    NR_LOTACAO_IDEAL      decimal(12) not null,
    DT_OPERACAO_INCLUSAO  datetime    not null,
    DT_OPERACAO_ALTERACAO datetime    not null,
    NR_CPF_OPERADOR       varchar(11) not null,
    DT_OPERACAO_EXCLUSAO  datetime    null
    );

create table if not exists LOTACAO_MENTORH_ROBO
(
    T135_ID_UNIDADE     varchar(12)  null,
    T135_NOME_UNIDADE   varchar(105) null,
    T135_ID_TITULAR     varchar(20)  null,
    T135_ID_SUBSTITUTO  varchar(20)  null,
    T135_ENDERECO       varchar(100) null,
    T135_BAIRRO         varchar(50)  null,
    T135_CIDADE         varchar(50)  null,
    T135_UF             varchar(2)   null,
    T135_CEP            varchar(8)   null,
    T135_SIGLA_UNIDADE  varchar(30)  null,
    T135_LOTACAO_ATIVA  varchar(3)   null,
    T135_ID_LOTACAO     varchar(9)   null,
    T135_COD_SIAPE      varchar(9)   null,
    T135_TIPO_UNIDADE   varchar(2)   null,
    T135_DT_IMPORTACAO  datetime     null,
    T135_COD_SEVERIDADE decimal(12)  null
    );

create table if not exists LOTACAO_SITUACAO_REQUISICAO
(
    ID_LOTACAO_SITUACAO_REQUISICAO int auto_increment
    primary key,
    ID_SITUACAO_REQUISICAO         int null,
    ID_LOTACAO                     int null
);

create table if not exists MIGRATIONS
(
    ID        int auto_increment
    primary key,
    MIGRATION varchar(255) not null,
    BATCH     decimal      not null
    );

create table if not exists MODELO_APURACAO
(
    ID_MODELO_APURACAO  int auto_increment
    primary key,
    NM_MODELO_APURACAO  varchar(200) not null,
    NR_CPF_OPERADOR     varchar(11)  not null,
    IN_MODELO_BLOQUEADO decimal(12)  null
    );

create index CKC_IN_MODELO_BLOQUEA_MODELO_A
    on MODELO_APURACAO (IN_MODELO_BLOQUEADO);

create table if not exists MODELO_APURACAO_QUESITO
(
    ID_MODELO_APURACAO_QUESITO int auto_increment
    primary key,
    ID_MODELO_APURACAO         int         null,
    ID_QUESITO                 int         null,
    NR_ORDEM                   decimal(12) not null,
    TP_ORDEM_AD                varchar(1)  not null,
    NR_CPF_OPERADOR            varchar(11) not null
    );

create index CK_TP_ORDEM_AD_MODELO_A
    on MODELO_APURACAO_QUESITO (TP_ORDEM_AD);

create table if not exists MOTIVO_DEVOLUCAO_REC
(
    ID_MOTIVO_DEVOLUCAO_REC  int auto_increment
    primary key,
    ID_SERVIDOR              int           null,
    DS_MOTIVO_DEVOLUCAO_REC  varchar(4000) not null,
    NM_EMAIL_DEVOLUCAO_REC   varchar(100)  not null,
    DT_OPERACAO_INCLUSAO     datetime      not null,
    NR_CPF_OPERADOR_INCLUSAO varchar(11)   not null
    );

create table if not exists MOTIVO_INTERRUPCAO
(
    ID_MOTIVO_INTERRUPCAO int auto_increment
    primary key,
    CD_MOTIVO_INTERRUPCAO varchar(10)  null,
    DS_MOTIVO_INTERRUPCAO varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists MOVIMENTACAO
(
    ID_MOVIMENTACAO        int auto_increment
    primary key,
    ID_SERVIDOR            int           null,
    ID_ORGAO_MOVIMENTACAO  int           null,
    ID_TIPO_MOVIMENTACAO   int           null,
    ID_NORMA               int           null,
    ID_LOTACAO_ORIGEM      int           null,
    ID_LOTACAO_EXERCICIO   int           null,
    DT_INICIO_MOVIMENTACAO datetime      not null,
    DT_FINAL_MOVIMENTACAO  datetime      null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null,
    ID_RH                  int           null,
    ID_LOTACAO_LOCALIZACAO int           null,
    IN_LOTACAO_UDP         varchar(1)    not null,
    constraint UK_MOVIMENTACAO
    unique (ID_SERVIDOR, ID_TIPO_MOVIMENTACAO, DT_INICIO_MOVIMENTACAO, DT_FINAL_MOVIMENTACAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_LOTACAO_UDP_MOVIMENTACAO
    on MOVIMENTACAO (IN_LOTACAO_UDP);

create table if not exists MUNICIPIO
(
    ID_MUNICIPIO          int auto_increment
    primary key,
    CD_MUNICIPIO          varchar(10)  not null,
    ID_UF                 int          null,
    NM_MUNICIPIO          varchar(100) not null,
    IN_CAPITAL            varchar(1)   not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    constraint UK_MUNICIPIO
    unique (CD_MUNICIPIO)
    );

create index CK_IN_CAPITAL_MUNICIPI
    on MUNICIPIO (IN_CAPITAL);

create table if not exists MVCS_AFAST_CARR_ANT
(
    ID_SERVIDOR               int          null,
    T34_COD_SERVIDOR          decimal(20)  not null,
    T34_DT_INICIO_AFASTAMENTO datetime     not null,
    T34_DT_FIM_AFASTAMENTO    datetime     null,
    DT_EXERCICIO              datetime     null,
    DT_INGRESSO_SERVIDOR      datetime     null,
    DS_TIPO_AFASTAMENTO       varchar(100) not null,
    INICIO_CONSIDERADO        datetime     null,
    FIM_CONSIDERADO           datetime     null,
    QTD_DIAS_AFASTADO         double       null
    );

create table if not exists MVCS_AFAST_CARR_ATUAL_FI
(
    ID_SERVIDOR               int          null,
    T34_COD_SERVIDOR          decimal(20)  not null,
    T34_DT_INICIO_AFASTAMENTO datetime     not null,
    T34_DT_FIM_AFASTAMENTO    datetime     null,
    DT_REFERENCIA             datetime     null,
    DT_INGRESSO_SERVIDOR      datetime     null,
    DS_TIPO_AFASTAMENTO       varchar(100) not null,
    INICIO_CONSIDERADO        datetime     null,
    FIM_CONSIDERADO           datetime     null,
    QTD_DIAS_AFASTADO         double       null
    );

create table if not exists MVCS_AFAST_CARR_ATUAL_FI_CONS
(
    ID_SERVIDOR             int    null,
    TOTAL_AFAST_CONSIDERADO double null
);

create table if not exists MVCS_AFAST_CARR_ATUAL_TSP
(
    ID_SERVIDOR               int          null,
    T34_COD_SERVIDOR          decimal(20)  not null,
    T34_DT_INICIO_AFASTAMENTO datetime     not null,
    T34_DT_FIM_AFASTAMENTO    datetime     null,
    DT_REFERENCIA             datetime     null,
    DT_INGRESSO_SERVIDOR      datetime     null,
    DS_TIPO_AFASTAMENTO       varchar(100) not null,
    INICIO_CONSIDERADO        datetime     null,
    FIM_CONSIDERADO           datetime     null,
    QTD_DIAS_AFASTADO         double       null
    );

create table if not exists MVCS_AFAST_CARR_ATUAL_TSP_CONS
(
    ID_SERVIDOR             int    null,
    TOTAL_AFAST_CONSIDERADO double null
);

create table if not exists MVCS_AFAST_CAT_ATUAL_TSP
(
    ID_SERVIDOR               int          null,
    T34_COD_SERVIDOR          decimal(20)  not null,
    T34_DT_INICIO_AFASTAMENTO datetime     not null,
    T34_DT_FIM_AFASTAMENTO    datetime     null,
    DT_REFERENCIA             datetime     null,
    DT_CLASSE_ATUAL           datetime     null,
    DS_TIPO_AFASTAMENTO       varchar(100) not null,
    INICIO_CONSIDERADO        datetime     null,
    FIM_CONSIDERADO           datetime     null,
    QTD_DIAS_AFASTADO         double       null
    );

create table if not exists MVCS_AFAST_CAT_ATUAL_TSP_CONS
(
    ID_SERVIDOR             int    null,
    TOTAL_AFAST_CONSIDERADO double null
);

create table if not exists MVCS_DIAS_DIF_PROV
(
    ID_SERVIDOR int        null,
    TOT_DIAS    double     null,
    SN_2ANOS    varchar(3) null
    );

create table if not exists MVCS_INGRESSO_1A_CATEGORIA
(
    ID_SERVIDOR      int         null,
    ID_CARGO_EFETIVO int         null,
    DT_CLASSE_PADRAO datetime    null,
    CD_TIPO_PADRAO   varchar(10) null
    );

create table if not exists MVCS_PERIODOS_DIF_PROV
(
    ID_SERVIDOR            int          null,
    NM_SERVIDOR            varchar(70)  null,
    ID_LOTACAO_EXERCICIO   int          null,
    DT_INICIO_MOVIMENTACAO datetime     null,
    DT_FINAL_MOVIMENTACAO  datetime     null,
    INIC_AJUSTADO          datetime     null,
    FIM_AJUSTADO           datetime     null,
    QTD_DIAS               double       null,
    SG_LOTACAO             varchar(30)  null,
    DS_LOTACAO             varchar(200) null
    );

create table if not exists MVCS_SERVIDOR
(
    ID_SERVIDOR               int          null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    NR_DOCUMENTACAO           varchar(50)  not null,
    CD_MATRICULA_SIAPE        varchar(15)  null,
    NM_SERVIDOR               varchar(70)  not null,
    DS_TIPO_SERVIDOR          varchar(100) not null,
    CD_CARGO_RH               varchar(10)  null,
    DS_CARGO_RH               varchar(100) null,
    DS_NIVEL                  varchar(100) null,
    DT_INGRESSO_SERVIDOR      datetime     null,
    NR_CONCURSO               varchar(10)  null,
    NR_ANO_CONCURSO           decimal(4)   null,
    NR_CLASSIFICACAO_CONCURSO decimal(12)  null,
    DS_TIPO_CLASSE            varchar(100) null,
    CD_TIPO_PADRAO            varchar(10)  null,
    DS_TIPO_PADRAO            varchar(100) null,
    DT_CLASSE_PADRAO          datetime     null,
    CD_CARGO_FUNCAO           varchar(10)  null,
    DS_CARGO_FUNCAO           varchar(100) null,
    CD_FUNCAO_GRATIFICADA     varchar(10)  null,
    DT_EXERCICIO              datetime     null,
    DT_EXONERACAO             datetime     null,
    UNIDADE_EXERCICIO         varchar(200) null,
    UNIDADE_LOTACAO           varchar(200) null,
    DT_NASCIMENTO             datetime     not null,
    IDADE_DIAS                double       null,
    IN_STATUS_SERVIDOR        varchar(1)   not null,
    DT_REFERENCIA             datetime     null
    );

create table if not exists MVCS_SERVIDOR_PROMOCAO
(
    NM_SERVIDOR        varchar(70)  not null,
    NR_CPF             varchar(50)  not null,
    CD_MATRICULA_SIAPE varchar(15)  null,
    DS_CLASSE          varchar(100) null,
    DS_TIPO_PADRAO     varchar(100) null,
    ART_3_II           double       null,
    ART_3_III          double       null,
    CLASSE_ANTERIOR    varchar(100) null,
    PADRAO_ANTERIOR    varchar(10)  null,
    ART_3_IV           double       null,
    ART_3_V            double       null,
    ART_3_VI           double       null,
    ART_3_VII          double       null,
    ART_3_VIII         double       null
    );

create table if not exists MVCS_SERVIDOR_REMOCAO
(
    NR_DOCUMENTACAO            varchar(50)  not null,
    NM_SERVIDOR                varchar(70)  not null,
    CD_CARGO_RH                varchar(10)  null,
    DS_CARGO_RH                varchar(100) null,
    DS_TIPO_CLASSE             varchar(100) null,
    DT_INGRESSO_SERVIDOR       datetime     null,
    UNIDADE_EXERCICIO          varchar(200) null,
    UNIDADE_LOTACAO            varchar(200) null,
    QTD_DIA_CARREIRA_SEM_AFAST double       null,
    QTD_DIA_CARREIRA_COM_AFAST double       null,
    NR_ANO_CONCURSO            decimal(4)   null,
    NR_CLASSIFICACAO_CONCURSO  decimal(12)  null,
    DT_NASCIMENTO              datetime     not null,
    IDADE_DIAS                 double       null,
    TOT_DIAS                   double       null,
    SN_2ANOS                   varchar(3)   null
    );

create table if not exists MVCS_SERV_PROV_CATEG_ANTER
(
    ID_SERVIDOR                int          null,
    DT_EXERCICIO_ATUAL         datetime     null,
    DS_CARGO_RH_ATUAL          varchar(100) null,
    DT_INGRESSO_SERVIDOR_ATUAL datetime     null,
    DT_EXERCICIO_ANTERIOR      datetime     null,
    DT_VACANCIA_PROV_ANTERIOR  datetime     null,
    DT_CLASSE_PADRAO           datetime     null,
    ID_CARGO_ANTERIOR          int          null,
    DS_CARGO_ANTERIOR          varchar(100) null,
    ID_PROVIMENTO_ANTERIOR     int          null,
    DS_CLASSE_CATEGORIA        varchar(100) null,
    CD_PADRAO_NIVEL            varchar(10)  null
    );

create table if not exists MVCS_SERV_PROV_CAT_IMED_ANT
(
    ID_SERVIDOR                int          null,
    DT_EXERCICIO_ATUAL         datetime     null,
    DS_CARGO_RH_ATUAL          varchar(100) null,
    DT_INGRESSO_SERVIDOR_ATUAL datetime     null,
    DT_EXERCICIO_ANTERIOR      datetime     null,
    DT_VACANCIA_PROV_ANTERIOR  datetime     null,
    DT_CLASSE_PADRAO           datetime     null,
    ID_CARGO_ANTERIOR          int          null,
    DS_CARGO_ANTERIOR          varchar(100) null,
    ID_PROVIMENTO_ANTERIOR     int          null,
    DS_CLASSE_CATEGORIA        varchar(100) null,
    CD_PADRAO_NIVEL            varchar(10)  null,
    NR_GRAU_PROGR_FUNCIONAL    double       null,
    TMP_CARR_ANTER_SEM_AFAST   double       null
    );

create table if not exists MVCS_SERV_TEMPO_CATEG_ATUAL
(
    ID_SERVIDOR            int          null,
    CD_CARGO_RH            varchar(10)  not null,
    DS_CARGO_RH            varchar(100) null,
    CARREIRA               varchar(30)  null,
    CD_TIPO_PADRAO         varchar(10)  null,
    DS_TIPO_PADRAO         varchar(100) not null,
    DT_CLASSE_ATUAL        datetime     null,
    QT_DIAS_CLASSE_ATUAL   double       null,
    DT_CLASSE_PADRAO_ATUAL datetime     null
    );

create table if not exists MVCS_SERV_TEMPO_CATEG_TMP
(
    ID_SERVIDOR            int          null,
    CD_CARGO_RH            varchar(10)  not null,
    DS_CARGO_RH            varchar(100) null,
    CARREIRA               varchar(30)  null,
    CD_TIPO_PADRAO         varchar(10)  null,
    DS_TIPO_PADRAO         varchar(100) not null,
    DT_CLASSE_ATUAL        datetime     null,
    QT_DIAS_CLASSE_ATUAL   double       null,
    DT_CLASSE_PADRAO_ATUAL datetime     null
    );

create table if not exists NATUREZA_HISTORICO
(
    ID_NATUREZA_HISTORICO int auto_increment
    primary key,
    CD_NATUREZA_HISTORICO decimal(12)  null,
    DS_NATUREZA_HISTORICO varchar(100) null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists NATUREZA_PENSAOCIVIL
(
    ID_NATUREZA_PENSAO    int auto_increment
    primary key,
    CD_NATUREZA_PENSAO    varchar(10)  null,
    DS_NATUREZA_PENSAO    varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists NIVEL
(
    ID_NIVEL              int auto_increment
    primary key,
    CD_NIVEL              varchar(10)  null,
    DS_NIVEL              varchar(100) not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null
    );

create table if not exists NORMA
(
    ID_NORMA              int auto_increment
    primary key,
    ID_TIPO_PUBLICACAO    int           null,
    ID_TIPO_AUTORIDADE    int           null,
    ID_BASE_LEGAL         int           null,
    ID_SISTEMA            int           null,
    CD_NORMA              varchar(11)   null,
    NR_DOCUMENTO_NORMA    varchar(50)   null,
    DT_DOCUMENTO_NORMA    datetime      null,
    NR_PUBLICACAO_NORMA   varchar(50)   null,
    DT_PUBLICACAO_NORMA   datetime      null,
    DS_PROCESSO_NORMA     varchar(100)  null,
    DT_PROCESSO_NORMA     datetime      null,
    DS_OBSERVACAO_NORMA   varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    IN_TIPO_NORMA         varchar(1)    null
    );

create table if not exists ORGAO
(
    ID_ORGAO              int auto_increment
    primary key,
    CD_ORGAO              varchar(10)  not null,
    SG_ORGAO              varchar(20)  not null,
    DS_ORGAO              varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists PAGINA
(
    ID_PAGINA int auto_increment
    primary key,
    NM_PAGINA varchar(100) not null
    );

create table if not exists PAIS
(
    ID_PAIS               int auto_increment
    primary key,
    CD_PAIS               varchar(4)   not null,
    DS_PAIS               varchar(100) not null,
    DS_NACIONALIDADE      varchar(100) null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists PASSWORD_RESETS
(
    EMAIL      varchar(255) not null,
    TOKEN      varchar(255) not null,
    CREATED_AT datetime     null
    );

create table if not exists PENSAO_ALIMENTICIA
(
    ID_PENSAO_ALIMENTICIA     int auto_increment
    primary key,
    ID_SERVIDOR               int           null,
    ID_MUNICIPIO_BENEFICIARIO int           null,
    ID_UF_EXP_RG              int           null,
    ID_AGENCIA                int           null,
    NM_BENEFICIARIO           varchar(70)   not null,
    DT_NASC_BENEFICIARIO      datetime      not null,
    DT_INICIO_PENSAO          datetime      null,
    DT_FIM_PENSAO             datetime      null,
    CD_SEXO                   varchar(1)    not null,
    CD_OPERACAO               varchar(10)   null,
    NR_CONTA                  varchar(10)   null,
    NR_DV_CONTA               varchar(10)   null,
    NR_CPF                    varchar(11)   null,
    NR_IDENTIDADE             varchar(30)   null,
    DS_ORG_EXP_IDENT          varchar(100)  null,
    DT_EXP_IDENTIDADE         datetime      null,
    DS_OFICIO_JUIZ            varchar(100)  null,
    DS_ENDERECO_RESIDENCIA    varchar(100)  null,
    NM_BAIRRO_RESIDENCIA      varchar(100)  null,
    NM_CIDADE_RESIDENCIA      varchar(100)  null,
    NR_CEP_RESIDENCIA         varchar(8)    null,
    NR_TELEFONE_RESIDENCIA    varchar(15)   null,
    NM_EMAIL                  varchar(100)  null,
    DS_VARA                   varchar(100)  null,
    DS_CIRCUNSCRICAO          varchar(100)  null,
    NR_PERCENTUAL_PENSAO      decimal(5, 2) null,
    DS_OBSERVACAO_PENSAO      varchar(4000) null,
    DT_OPERACAO_INCLUSAO      datetime      not null,
    DT_OPERACAO_ALTERACAO     datetime      not null,
    NR_CPF_OPERADOR           varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO      datetime      null,
    constraint UK_PENSAO_ALIMENTICIA
    unique (NM_BENEFICIARIO, DT_NASC_BENEFICIARIO)
    );

create index CK_CD_SEXO_PENSAO_A
    on PENSAO_ALIMENTICIA (CD_SEXO);

create table if not exists PENSAO_CIVIL
(
    ID_PENSAO_CIVIL          int auto_increment
    primary key,
    ID_SERVIDOR              int           null,
    ID_SERVIDOR_BENEFICIARIO int           null,
    ID_UF_CARTORIO           int           null,
    ID_TIPO_PARENTESCO       int           null,
    ID_NATUREZA_PENSAO       int           null,
    ID_NORMA                 int           null,
    ID_REPRESENTANTE_LEGAL   int           null,
    NR_PERCENTUAL_PENSAO     decimal(7, 2) null,
    DT_INICIO_PENSAO         datetime      null,
    DT_CESSACAO              datetime      null,
    DS_ATO                   varchar(100)  null,
    DT_ATO                   datetime      null,
    NM_REPRES_LEGAL          varchar(70)   null,
    DS_CARTORIO              varchar(100)  null,
    DS_LIVRO_REG_CARTORIO    varchar(100)  null,
    DS_FOLHA_REG_CARTORIO    varchar(100)  null,
    DT_INICIO_PROCURACAO     datetime      null,
    DT_FIM_PROCURACAO        datetime      null,
    DT_OPERACAO_INCLUSAO     datetime      not null,
    DT_OPERACAO_ALTERACAO    datetime      not null,
    NR_CPF_OPERADOR          varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO     datetime      null,
    ID_RH                    int           null,
    constraint UK_PENSAO_CIVIL
    unique (ID_SERVIDOR, ID_SERVIDOR_BENEFICIARIO, DT_OPERACAO_EXCLUSAO)
    );

create table if not exists PERFIL_RH
(
    ID_RH     int not null,
    ID_PERFIL int not null,
    primary key (ID_RH, ID_PERFIL)
    );

create table if not exists PERIODOS_UDP
(
    ID_APURACAO            int          not null,
    ID_SERVIDOR            int          not null,
    NM_SERVIDOR            varchar(70)  not null,
    ID_LOTACAO_EXERCICIO   int          null,
    SG_LOTACAO_EXERCICIO   varchar(30)  null,
    DS_LOTACAO_EXERCICIO   varchar(100) null,
    DT_INICIO_MOVIMENTACAO datetime     not null,
    DT_FINAL_MOVIMENTACAO  datetime     null,
    DT_INICIO_AJUSTADO     datetime     null,
    DT_FINAL_AJUSTADO      datetime     null,
    QT_DIAS                decimal(12)  null,
    primary key (ID_APURACAO, ID_SERVIDOR, DT_INICIO_MOVIMENTACAO)
    );

create table if not exists PESSOA_FISICA_BLACKLIST
(
    ID_PESSOA_FISICA_BLACKLIST int auto_increment
    primary key,
    ID_SERVIDOR                int          null,
    FG_DELETADO                varchar(1)   null,
    DS_IP                      varchar(30)  null,
    DT_RETIRADA                datetime     null,
    DT_INSERCAO                datetime     null,
    DS_NOME_LOG                varchar(200) null,
    DS_UNIDADE_LOG             varchar(200) null,
    DS_EMAIL_LOG               varchar(200) null,
    DT_LOGIN_LOG               datetime     null,
    DS_EMAIL_AGU_LOG           varchar(200) null,
    DS_NOME_LOG_DEL            varchar(200) null,
    DS_UNIDADE_LOG_DEL         varchar(200) null,
    DS_EMAIL_LOG_DEL           varchar(200) null,
    DT_LOGIN_LOG_DEL           datetime     null,
    DS_EMAIL_AGU_LOG_DEL       varchar(200) null
    );

create table if not exists PRE_REQUISICAO
(
    ID_PRE_REQUISICAO             int auto_increment
    primary key,
    ID_LOTACAO                    int          null,
    ID_FUNCAO_GRATIFICADA         int          null,
    ID_ORGAO_ORIGEM               int          null,
    ID_CARGO_ATUAL                int          null,
    ID_SITUACAO_REQUISICAO        int          null,
    NM_CANDIDATO_REQUISICAO       varchar(100) null,
    NR_SIAPE_CANDIDATO_REQUISICAO varchar(12)  null,
    NR_CPF_CANDIDATO_REQUISICAO   varchar(11)  null,
    DT_PRE_REQUISICAO             datetime     null,
    IN_PERMANENCIA                varchar(1)   null,
    IN_STATUS_PREREQUISICAO       varchar(1)   not null,
    DS_AVISO_PREREQUISICAO        varchar(100) null,
    DT_AVISO_PREREQUISICAO        datetime     null,
    DT_OPERACAO_INCLUSAO          datetime     not null,
    DT_OPERACAO_ALTERACAO         datetime     not null,
    NR_CPF_OPERADOR               varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO          datetime     null,
    NR_PROCESSO_REQUISICAO        varchar(20)  null,
    IDSERVIDOR                    decimal(12)  null,
    ID_CARGO_PRETENDIDO           int          null
    );

create index CK_IN_PERMANENCIA
    on PRE_REQUISICAO (IN_PERMANENCIA);

create index CK_IN_STATUS_PREREQUISICAO
    on PRE_REQUISICAO (IN_STATUS_PREREQUISICAO);

create table if not exists PROCEDENCIA_VAGA
(
    ID_PROCEDENCIA_VAGA   int auto_increment
    primary key,
    CD_PROCEDENCIA_VAGA   varchar(10)  null,
    DS_PROCEDENCIA_VAGA   varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists PROVIMENTO
(
    ID_PROVIMENTO            int auto_increment
    primary key,
    ID_TIPO_PROVIMENTO       int           null,
    ID_NORMA                 int           null,
    ID_CARGO_EFETIVO         int           null,
    DT_NOMEACAO_PROVIMENTO   datetime      not null,
    DT_POSSE_PROVIMENTO      datetime      null,
    DT_EXERCICIO_PROVIMENTO  datetime      null,
    DS_OBSERVACAO_PROVIMENTO varchar(4000) null,
    DT_OPERACAO_INCLUSAO     datetime      not null,
    DT_OPERACAO_ALTERACAO    datetime      not null,
    NR_CPF_OPERADOR          varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO     datetime      null,
    constraint UK_PROVIMENTO
    unique (ID_CARGO_EFETIVO, DT_NOMEACAO_PROVIMENTO, DT_OPERACAO_EXCLUSAO)
    );

create table if not exists QUESITO
(
    ID_QUESITO             int auto_increment
    primary key,
    NM_QUESITO             varchar(200) not null,
    NM_COLUNA_APRESENTACAO varchar(30)  not null,
    NM_COLUNA_ORDENACAO    varchar(30)  not null,
    NM_ALIAS_APRESENTACAO  varchar(30)  null
    );

create table if not exists QUESITO_UTILIZADO
(
    ID_QUESITO_UTILIZADO int auto_increment
    primary key,
    ID_APURACAO          int         null,
    ID_QUESITO           int         null,
    NR_ORDEM             decimal(12) not null,
    TP_ORDEM_AD          varchar(1)  not null,
    NR_CPF_AUTOR         varchar(11) not null
    );

create index CKC_TP_ORDEM_AD_QUESITO_
    on QUESITO_UTILIZADO (TP_ORDEM_AD);

create table if not exists REGIAO
(
    ID_REGIAO             int auto_increment
    primary key,
    CD_REGIAO             varchar(10)  not null,
    SG_REGIAO             varchar(2)   not null,
    DS_REGIAO             varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists REGIAO_ADMINISTRATIVA
(
    ID_REGIAO_ADMINISTRATIVA int auto_increment
    primary key,
    CD_REGIAO_ADMINISTRATIVA varchar(10)  not null,
    SG_REGIAO_ADMINISTRATIVA varchar(10)  not null,
    DS_REGIAO_ADMINISTRATIVA varchar(100) not null,
    CD_UNID_REPRESENT_ADM    varchar(4)   null,
    DT_OPERACAO_INCLUSAO     datetime     not null,
    DT_OPERACAO_ALTERACAO    datetime     not null,
    NR_CPF_OPERADOR          varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO     datetime     null
    );

create table if not exists REGIAO_JURIDICA
(
    ID_REGIAO_JURIDICA    int auto_increment
    primary key,
    CD_REGIAO_JURIDICA    varchar(10)  not null,
    SG_REGIAO_JURIDICA    varchar(10)  not null,
    DS_REGIAO_JURIDICA    varchar(100) not null,
    CD_UNID_REPRESENT_JUR varchar(4)   null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists REGIME_JURIDICO
(
    ID_REGIME_JURIDICO    int auto_increment
    primary key,
    CD_REGIME_JURIDICO    varchar(10)  null,
    DS_REGIME_JURIDICO    varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists REGIME_PREVIDENCIARIO
(
    ID_REGIME_PREV        int auto_increment
    primary key,
    CD_REGIME_PREV        varchar(10)  null,
    SG_REGIME_PREV        varchar(10)  not null,
    DS_REGIME_PREV        varchar(100) not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null
    );

create table if not exists RELATORIO
(
    ID_RELATORIO          int auto_increment
    primary key,
    ID_RH                 int           null,
    DS_RELATORIO          varchar(200)  null,
    DS_TITULO             varchar(200)  null,
    DS_TABELA             varchar(4000) null,
    DS_COLUNA             varchar(4000) null,
    DS_CONDICAO           varchar(4000) null,
    DS_ORDENACAO          longtext      null,
    DS_COLUNA_FORMATADA   longtext      null,
    DS_TABELA_PRINCIPAL   longtext      null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null
    );

create table if not exists RELATORIO_TAB_APOIO
(
    NM_TABELA    varchar(30)  not null,
    NM_COLUNA_ID varchar(30)  not null,
    NM_COLUNA_DS varchar(100) not null
    );

create table if not exists REPRESENTANTE_LEGAL
(
    ID_REPRESENTANTE_LEGAL int auto_increment
    primary key,
    CD_REPRESENTANTE_LEGAL varchar(10)  null,
    DS_REPRESENTANTE_LEGAL varchar(100) not null,
    DT_OPERACAO_INCLUSAO   datetime     not null,
    DT_OPERACAO_ALTERACAO  datetime     not null,
    NR_CPF_OPERADOR        varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO   datetime     null
    );

create table if not exists REQUISICAO
(
    ID_REQUISICAO         int auto_increment
    primary key,
    ID_SERVIDOR           int            null,
    ID_NORMA              int            null,
    ID_ORGAO_DESTINO      int            null,
    ID_ORGAO_ORIGEM       int            null,
    ID_REGIME_JURIDICO    int            null,
    ID_CARGO              int            null,
    ID_TIPO_PADRAO        int            null,
    DT_INICIO_REQUISICAO  datetime       null,
    DT_FIM_REQUISICAO     datetime       null,
    ST_ONUS               varchar(1)     not null,
    DS_MATRICULA_ORIGEM   varchar(100)   null,
    IN_CANCELADO          varchar(1)     not null,
    VL_PREVIDENCIA        decimal(12, 2) null,
    VL_REMUNERACAO        decimal(12, 2) null,
    VL_BENEFICIO          decimal(12, 2) null,
    VL_TETO_REMUNERACAO   decimal(12, 2) null,
    DS_OBSERVACAO         varchar(4000)  null,
    DT_OPERACAO_INCLUSAO  datetime       not null,
    DT_OPERACAO_ALTERACAO datetime       not null,
    NR_CPF_OPERADOR       varchar(11)    not null,
    DT_OPERACAO_EXCLUSAO  datetime       null,
    ID_RH                 int            null,
    constraint UK_REQUISICAO
    unique (ID_SERVIDOR, ID_CARGO, DT_INICIO_REQUISICAO, DT_OPERACAO_EXCLUSAO)
    );

create index CK_IN_CANCELADO_REQUISIC
    on REQUISICAO (IN_CANCELADO);

create index CK_ST_ONUS_REQUISIC
    on REQUISICAO (ST_ONUS);

create table if not exists RESCISAO_RAIS
(
    ID_RESCISAO_RAIS      int auto_increment
    primary key,
    CD_RESCISAO_RAIS      varchar(10)  null,
    DS_RESCISAO_RAIS      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists REVERSAO_APOSENTADORIA
(
    ID_SERVIDOR_REVERSAO int auto_increment
    primary key
);

create table if not exists RH
(
    ID_RH                 int auto_increment
    primary key,
    DS_RH                 varchar(100) null,
    DT_OPERACAO_INCLUSAO  datetime     null,
    DT_OPERACAO_ALTERACAO datetime     null,
    NR_CPF_OPERADOR       varchar(11)  null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists RH_SERVIDOR
(
    ID_RH_SERVIDOR        int auto_increment
    primary key,
    ID_SERVIDOR           int         null,
    ID_RH                 int         null,
    DT_INICIO_RHSERVIDOR  datetime    null,
    DT_FIM_RHSERVIDOR     datetime    null,
    DT_OPERACAO_INCLUSAO  datetime    null,
    DT_OPERACAO_ALTERACAO datetime    null,
    NR_CPF_OPERADOR       varchar(11) null,
    DT_OPERACAO_EXCLUSAO  datetime    null
    );

create table if not exists SERVIDOR
(
    ID_SERVIDOR            int auto_increment
    primary key,
    ID_MUNICIPIO           int          null,
    ID_COR                 int          null,
    ID_FORMACAO            int          null,
    ID_TIPO_SANGUINEO      int          null,
    ID_ETNIA               int          null,
    ID_ESTADO_CIVIL        int          null,
    ID_TIPO_SERVIDOR       int          null,
    ID_ESCOLARIDADE        int          null,
    CD_SERVIDOR            varchar(20)  not null,
    CD_SEXO                varchar(1)   not null,
    IN_STATUS_SERVIDOR     varchar(1)   not null,
    NM_SERVIDOR            varchar(70)  not null,
    NM_SERVIDOR_FORMAT     varchar(70)  null,
    DT_NASCIMENTO          datetime     not null,
    DT_CADASTRO_SERVIDOR   datetime     null,
    DT_OBITO               datetime     null,
    NM_GUERRA              varchar(70)  null,
    NM_EMAIL               varchar(100) null,
    NM_PAI                 varchar(70)  null,
    NM_MAE                 varchar(70)  null,
    NM_CONJUGE             varchar(70)  null,
    IN_PORTADOR_NECESS_ESP varchar(1)   not null,
    DS_PORTADOR_NECESS_ESP varchar(100) null,
    IN_DOADOR              varchar(1)   not null,
    DT_CHEGADA_PAIS        datetime     null,
    DT_OPERACAO_INCLUSAO   datetime     not null,
    DT_OPERACAO_ALTERACAO  datetime     not null,
    NR_CPF_OPERADOR        varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO   datetime     null,
    ID_RH                  int          null,
    NM_EMAIL_INSTITUCIONAL varchar(100) null,
    constraint UK_SERVIDOR
    unique (CD_SERVIDOR)
    );

create index CK_CD_SEXO_SERVIDOR
    on SERVIDOR (CD_SEXO);

create index CK_IN_DOADOR_SERVIDOR
    on SERVIDOR (IN_DOADOR);

create index CK_IN_PORTADOR_NECESS_ESP
    on SERVIDOR (IN_PORTADOR_NECESS_ESP);

create index CK_IN_STATUS_SERVIDO_SERVIDOR
    on SERVIDOR (IN_STATUS_SERVIDOR);

create table if not exists SITUACAO_RAIS
(
    ID_SITUACAO_RAIS      int auto_increment
    primary key,
    CD_SITUACAO_RAIS      varchar(10)  null,
    DS_SITUACAO_RAIS      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists SITUACAO_REQUISICAO
(
    ID_SITUACAO_REQUISICAO int auto_increment
    primary key,
    DS_SITUACAO_REQUISICAO varchar(100) not null,
    DT_OPERACAO_INCLUSAO   datetime     not null,
    DT_OPERACAO_ALTERACAO  datetime     not null,
    NR_CPF_OPERADOR        varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO   datetime     null
    );

create table if not exists SYS_EXPORT_SCHEMA_07
(
    ABORT_STEP              double        null,
    ANCESTOR_PROCESS_ORDER  double        null,
    BASE_OBJECT_NAME        varchar(30)   null,
    BASE_OBJECT_SCHEMA      varchar(30)   null,
    BASE_OBJECT_TYPE        varchar(30)   null,
    BASE_PROCESS_ORDER      double        null,
    BLOCK_SIZE              double        null,
    CLUSTER_OK              double        null,
    COMPLETED_BYTES         double        null,
    COMPLETED_ROWS          double        null,
    COMPLETION_TIME         datetime      null,
    CONTROL_QUEUE           varchar(30)   null,
    CREATION_LEVEL          double        null,
    CUMULATIVE_TIME         double        null,
    DATA_BUFFER_SIZE        double        null,
    DATA_IO                 double        null,
    DATAOBJ_NUM             double        null,
    DB_VERSION              varchar(60)   null,
    DEGREE                  double        null,
    DOMAIN_PROCESS_ORDER    double        null,
    DUMP_ALLOCATION         double        null,
    DUMP_FILEID             double        null,
    DUMP_LENGTH             double        null,
    DUMP_ORIG_LENGTH        double        null,
    DUMP_POSITION           double        null,
    DUPLICATE               double        null,
    ELAPSED_TIME            double        null,
    ERROR_COUNT             double        null,
    EXTEND_SIZE             double        null,
    FILE_MAX_SIZE           double        null,
    FILE_NAME               varchar(4000) null,
    FILE_TYPE               double        null,
    FLAGS                   double        null,
    GRANTOR                 varchar(30)   null,
    GRANULES                double        null,
    GUID                    varbinary(16) null,
    IN_PROGRESS             varchar(1)    null,
    INSTANCE                varchar(60)   null,
    INSTANCE_ID             double        null,
    IS_DEFAULT              double        null,
    JOB_MODE                varchar(21)   null,
    JOB_VERSION             varchar(60)   null,
    LAST_FILE               double        null,
    LAST_UPDATE             datetime      null,
    LOAD_METHOD             double        null,
    METADATA_BUFFER_SIZE    double        null,
    METADATA_IO             double        null,
    NAME                    varchar(30)   null,
    OBJECT_INT_OID          varchar(32)   null,
    OBJECT_LONG_NAME        varchar(4000) null,
    OBJECT_NAME             varchar(200)  null,
    OBJECT_NUMBER           double        null,
    OBJECT_PATH_SEQNO       double        null,
    OBJECT_ROW              double        null,
    OBJECT_SCHEMA           varchar(30)   null,
    OBJECT_TABLESPACE       varchar(30)   null,
    OBJECT_TYPE             varchar(30)   null,
    OBJECT_TYPE_PATH        varchar(200)  null,
    OLD_VALUE               varchar(4000) null,
    OPERATION               varchar(8)    null,
    OPTION_TAG              varchar(30)   null,
    ORIG_BASE_OBJECT_SCHEMA varchar(30)   null,
    ORIGINAL_OBJECT_NAME    varchar(128)  null,
    ORIGINAL_OBJECT_SCHEMA  varchar(30)   null,
    PACKET_NUMBER           double        null,
    PARALLELIZATION         double        null,
    PARENT_PROCESS_ORDER    double        null,
    PARTITION_NAME          varchar(30)   null,
    PHASE                   double        null,
    PLATFORM                varchar(101)  null,
    PROCESS_NAME            varchar(30)   null,
    PROCESS_ORDER           double        null,
    PROCESSING_STATE        varchar(1)    null,
    PROCESSING_STATUS       varchar(1)    null,
    PROPERTY                double        null,
    QUEUE_TABNUM            double        null,
    REMOTE_LINK             varchar(128)  null,
    SCN                     double        null,
    SEED                    double        null,
    SERVICE_NAME            varchar(64)   null,
    SIZE_ESTIMATE           double        null,
    START_TIME              datetime      null,
    STATE                   varchar(12)   null,
    STATUS_QUEUE            varchar(30)   null,
    SUBPARTITION_NAME       varchar(30)   null,
    TARGET_XML_CLOB         longtext      null,
    TDE_REWRAPPED_KEY       blob          null,
    TEMPLATE_TABLE          varchar(30)   null,
    TIMEZONE                varchar(64)   null,
    TOTAL_BYTES             double        null,
    TRIGFLAG                double        null,
    UNLOAD_METHOD           double        null,
    USER_DIRECTORY          longtext      null,
    USER_FILE_NAME          longtext      null,
    USER_NAME               varchar(30)   null,
    VALUE_N                 double        null,
    VALUE_T                 longtext      null,
    VERSION                 double        null,
    WORK_ITEM               varchar(21)   null,
    XML_CLOB                longtext      null
    );

create table if not exists TB47502_DEPENDENTE_BKP
(
    ID_DEPENDENTE          int           null,
    ID_SERVIDOR            int           null,
    ID_MUNICIPIO_CERTIDAO  int           null,
    ID_TIPO_SANGUINEO      int           null,
    ID_TIPO_PARENTESCO     int           null,
    NM_DEPENDENTE          varchar(70)   not null,
    DT_NASCIMENTO          datetime      not null,
    CD_SEXO                varchar(1)    not null,
    NR_CPF                 varchar(11)   null,
    DT_CASAMENTO           datetime      null,
    NM_PAI_DEPENDENTE      varchar(70)   null,
    NM_MAE_DEPENDENTE      varchar(70)   null,
    DT_INICIO_DEPENDENTE   datetime      null,
    DT_FIM_DEPENDENTE      datetime      null,
    DS_MOTIVO              varchar(100)  null,
    DT_CERTIDAO_NASCIMENTO datetime      null,
    NR_CERTIDAO_NASCIMENTO varchar(50)   null,
    DS_LIVRO_CERTIDAO      varchar(100)  null,
    DS_FOLHA_CERTIDAO      varchar(100)  null,
    DS_CARTORIO_CERTIDAO   varchar(100)  null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null
    );

create table if not exists TBCARGO
(
    CARGO varchar(55) null
    );

create table if not exists TBDOCUMENTO_REQUISICAO
(
    IDSERVIDOR        varchar(20) null,
    DOC_REQUISICAO    varchar(75) null,
    DT_DOC_REQUISICAO datetime    null,
    TIPODEDOUMENTO    varchar(12) null
    );

create table if not exists TBFUNCAO_COMISSIONADASUBST_OLD
(
    ID_FUNCAO_COMISSIONADA_SUBST int           null,
    ID_CARGO_FUNCAO              int           null,
    ID_SERVIDOR_SUBSTITUTO       int           null,
    ID_TIPO_OCUPACAO             int           null,
    ID_NORMA_INICIO_SUBST        int           null,
    ID_NORMA_FIM_SUBST           int           null,
    DT_INICIO_SUBSTITUICAO       datetime      not null,
    DT_FINAL_SUBSTITUICAO        datetime      null,
    DS_OBSERVACAO                varchar(4000) null,
    DT_OPERACAO_INCLUSAO         datetime      not null,
    DT_OPERACAO_ALTERACAO        datetime      not null,
    NR_CPF_OPERADOR              varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO         datetime      null,
    ID_RH                        int           null
    );

create table if not exists TBFUNCAO_COMISSIONADA_OLD
(
    ID_FUNCAO_COMISSIONADA int           null,
    ID_SERVIDOR            int           null,
    ID_TIPO_OPCAO          int           null,
    ID_CARGO_FUNCAO        int           null,
    ID_NORMA_NOMEACAO      int           null,
    ID_NORMA_OPCAO         int           null,
    ID_NORMA_EXONERACAO    int           null,
    ID_TIPO_OCUPACAO       int           null,
    IN_DIREITO_ADQUIRIDO   varchar(1)    not null,
    DT_NOMEACAO            datetime      null,
    DT_POSSE               datetime      null,
    DT_EXERCICIO           datetime      null,
    DT_EXONERACAO          datetime      null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null,
    ID_RH                  int           null
    );

create table if not exists TBORGAO_ORIGEM
(
    IDORIGEM          varchar(20) null,
    CODIGOORIGEM      varchar(20) null,
    DESCRICAO_ORIGEM  varchar(70) null,
    SIGLA             varchar(15) null,
    ORGAOSUPERIOR     varchar(70) null,
    DIRIGENTESUPERIOR varchar(80) null,
    VINCULO           varchar(5)  null
    );

create table if not exists TBPRAZO_PERMANENCIA
(
    IDSERVIDOR         varchar(20) null,
    PRAZO              datetime    null,
    DOCREAFIRMACAOAGU  varchar(50) null,
    DOCRESOORIGEM      varchar(50) null,
    DATADOCREAFIRMACAO varchar(50) null,
    RESPOSTAORIGEM     varchar(5)  null
    );

create table if not exists TBREDISTRIBUICAO
(
    IDSERVIDOR            varchar(20) null,
    ORIGEM_REDISTRIBUICAO varchar(20) null,
    PORTARIA_DOU          varchar(50) null,
    AVISO_AGU             varchar(50) null,
    AUTORIZADO            varchar(5)  null,
    DOC_AUTORIZA          varchar(50) null,
    DT_DOC_AUTORIZA       datetime    null
    );

create table if not exists TBREQUISITADO
(
    IDSERVIDOR             varchar(20)  null,
    DT_REQUISICAO          datetime     null,
    SIAPE                  varchar(7)   null,
    CPF                    varchar(11)  null,
    NOME                   varchar(50)  null,
    ORIGEM                 varchar(20)  null,
    CARGO_ORIGEM           varchar(50)  null,
    ANTIGAHIERQUNID        varchar(15)  null,
    NOVAHIERQUNID          varchar(15)  null,
    HIERQUNID              varchar(20)  null,
    HIERQUNID1             varchar(15)  null,
    HIERQUNIDCPO           varchar(15)  null,
    COMISSAO               varchar(18)  null,
    SITUACAO_REQUISICAO    varchar(80)  null,
    AVISO                  varchar(50)  null,
    DT_AVISO               datetime     null,
    DT_PUBLIC_DOU_CESSAO   datetime     null,
    PORTARIA_DESIGNACAO    varchar(30)  null,
    DT_PORTARIA_DESIGNACAO datetime     null,
    ENCERRADO              varchar(5)   null,
    COMPLEM_ENCERRADO      varchar(100) null,
    TIPO_PERMANENCIA       varchar(13)  null,
    REDISTRIBUIDO          varchar(5)   null
    );

create table if not exists TBSITUACAO
(
    SITUACOES varchar(80) null
    );

create table if not exists TBUNID
(
    HIERQUNID             varchar(20) null,
    HIERQUNID_CPO_OUT2000 varchar(15) null,
    HIERQUNID2            varchar(15) null,
    HIERQUNIDNOVO         varchar(50) null,
    CPO1                  varchar(5)  null,
    INTERNET              varchar(1)  null,
    HIERARQUIA            varchar(15) null,
    REGIMENTAL            varchar(50) null,
    SENAPRO               varchar(13) null,
    DESCUNID              varchar(80) null,
    SIGLA                 varchar(15) null,
    END1                  varchar(80) null,
    CMPLEND               varchar(50) null,
    BAIRRO                varchar(50) null,
    CIDADE                varchar(25) null,
    UF                    varchar(2)  null,
    CEP                   varchar(9)  null,
    NOVOCEP               varchar(20) null,
    DDD                   varchar(8)  null,
    REGIAO                varchar(10) null,
    EMAILUNID             varchar(50) null,
    WWWUNID               varchar(50) null,
    CPFTIT                varchar(18) null,
    FUNC                  varchar(50) null,
    CODFUNC               varchar(15) null,
    CPFSUBST              varchar(18) null,
    JUNCAO                varchar(50) null,
    TRAT                  varchar(20) null,
    VOCAT                 varchar(20) null,
    FECHO                 varchar(20) null,
    NATUREZA              varchar(20) null
    );

create table if not exists TB_20090828_CLASSE_PADRAO
(
    ID_CLASSE_PADRAO      int           null,
    ID_NORMA              int           null,
    ID_TIPO_PROVIMENTO    int           null,
    ID_CARGO_EFETIVO      int           null,
    ID_TIPO_PADRAO        int           null,
    DT_CLASSE_PADRAO      datetime      null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    ID_RH                 int           null
    );

create table if not exists TB_20100226_TK16039_PRFZN
(
    NR_CLASSIFICACAO double       null,
    NOME             varchar(200) null,
    DT_INGRESSO      datetime     null,
    DS_CONCURSO      varchar(25)  null,
    NR_CONCURSO      double       null,
    ANO_CONCURSO     double       null,
    COD_SIAPE        decimal(12)  null,
    DS_CATEGORIA     varchar(25)  null,
    CD_CATEGORIA_12S varchar(1)   null,
    NR_CPF           varchar(11)  null,
    COD_SEXO_MF      varchar(1)   null
    );

create table if not exists TB_41799_MIGRACAO_08112011
(
    MATRICULA                   varchar(15)  null,
    NOME                        varchar(150) null,
    DT_INGRESSO_SERVICO_PUBLICO datetime     null
    );

create table if not exists TB_47317_ATUALIZA_COR
(
    ID_SERVIDOR   int          null,
    MATRICULA     varchar(20)  null,
    NOME          varchar(100) null,
    CPF           varchar(11)  null,
    COR           varchar(50)  null,
    AVALIACAO_DTI varchar(100) null
    );

create table if not exists TB_47318_ATUALIZA_END
(
    ID_SERVIDOR int          null,
    MATRICULA   varchar(20)  null,
    ID_ENDERECO int          null,
    DESCRICAO   varchar(100) null,
    COMPLEMENTO varchar(100) null,
    BAIRRO      varchar(50)  null,
    CEP         varchar(20)  null,
    UF          varchar(2)   null,
    CIDADE      varchar(50)  null
    );

create table if not exists TB_47318_ATUALIZA_TEL
(
    ID_TELEFONE      int          null,
    ID_TIPO_TELEFONE int          null,
    DDD              varchar(2)   null,
    TELEFONE         varchar(30)  null,
    OBSERVACAO       varchar(100) null
    );

create table if not exists TB_47318_INCLUI_END
(
    ID_SERVIDOR int          null,
    MATRICULA   varchar(20)  null,
    ID_ENDERECO int          null,
    DESCRICAO   varchar(100) null,
    COMPLEMENTO varchar(100) null,
    BAIRRO      varchar(50)  null,
    CEP         varchar(20)  null,
    UF          varchar(2)   null,
    CIDADE      varchar(50)  null
    );

create table if not exists TB_47318_INCLUI_TEL
(
    ID_SERVIDOR      int          null,
    ID_TELEFONE      int          null,
    ID_TIPO_TELEFONE int          null,
    DDD              varchar(2)   null,
    TELEFONE         varchar(30)  null,
    OBSERVACAO       varchar(100) null
    );

create table if not exists TB_47502_DEPENDENTE
(
    ID_SERVIDOR        int          null,
    NOME_SERVIDOR      varchar(100) null,
    SIAPE_SERVIDOR     varchar(100) null,
    CPF_SERVIDOR       varchar(20)  null,
    CPF_FORMATADO      varchar(11)  null,
    NOME_DEPENDENTE    varchar(100) null,
    TIPO_PARENTESCO    varchar(100) null,
    DATA_NASC          datetime     null,
    SEXO               varchar(1)   null,
    NR_CPF_DEP         varchar(100) null,
    NR_CPF_FORMAT      varchar(11)  null,
    NM_PAI             varchar(100) null,
    NM_MAE             varchar(100) null,
    DT_INICIO          datetime     null,
    DT_FIM             datetime     null,
    MOTIVO             varchar(100) null,
    DT_CERTIDAO        datetime     null,
    NR_CERTIDAO        varchar(100) null,
    LIVRO_CERTIDAO     varchar(100) null,
    FOLHA_CERTIDAO     varchar(100) null,
    CARTORIO_CERTIDAO  varchar(100) null,
    MINICIPIO_CARTORIO varchar(100) null,
    NR_MATR_CERTIDAO   varchar(50)  null
    );

create table if not exists TB_DOCUMENTACAO_05082010
(
    ID_DOCUMENTACAO           int          null,
    ID_SERVIDOR               int          null,
    ID_UF_DOCUMENTACAO        int          null,
    ID_TIPO_DOCUMENTACAO      int          null,
    IN_SITUACAO_DOCUMENTACAO  varchar(1)   not null,
    NR_DOCUMENTACAO           varchar(50)  not null,
    DS_ORG_EXP_DOCUMENTACAO   varchar(100) null,
    DT_EXP_DOCUMENTACAO       datetime     null,
    DT_VALIDADE_DOCUMENTACAO  datetime     null,
    DS_CATEGORIA_DOCUMENTACAO varchar(100) null,
    DS_ZONA_DOCUMENTACAO      varchar(100) null,
    DS_SERIE_DOCUMENTACAO     varchar(100) null,
    DS_SECAO_DOCUMENTACAO     varchar(100) null,
    DS_ENTIDADE_CLASSE        varchar(100) null,
    DS_REGIAO                 varchar(100) null,
    NR_REGISTRO               varchar(50)  null,
    DT_OPERACAO_INCLUSAO      datetime     not null,
    DT_OPERACAO_ALTERACAO     datetime     not null,
    NR_CPF_OPERADOR           varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO      datetime     null
    );

create table if not exists TB_LOTACAO_NORMA
(
    CD_LOTACAO_NORMA  int auto_increment
    primary key,
    CD_LOTACAO        decimal(12)  not null,
    CD_NORMA_UDP      decimal(12)  null,
    CD_NORMA_ODS      decimal(12)  null,
    IN_TIPO_NORMA_UDP varchar(1)   null,
    IN_TIPO_NORMA_ODS varchar(1)   null,
    DS_NORMA          varchar(500) null,
    DT_UDP            datetime     null,
    DS_PUBLICACAO     varchar(500) null
    );

create table if not exists TB_MOVIMENTACAO_BKP_01062010
(
    ID_MOVIMENTACAO        int           null,
    ID_SERVIDOR            int           null,
    ID_ORGAO_MOVIMENTACAO  int           null,
    ID_TIPO_MOVIMENTACAO   int           null,
    ID_NORMA               int           null,
    ID_LOTACAO_ORIGEM      int           null,
    ID_LOTACAO_EXERCICIO   int           null,
    DT_INICIO_MOVIMENTACAO datetime      not null,
    DT_FINAL_MOVIMENTACAO  datetime      null,
    DS_OBSERVACAO          varchar(4000) null,
    DT_OPERACAO_INCLUSAO   datetime      not null,
    DT_OPERACAO_ALTERACAO  datetime      not null,
    NR_CPF_OPERADOR        varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO   datetime      null,
    ID_RH                  int           null
    );

create table if not exists TB_MOVIMENTACAO_DIF
(
    ID_SERVIDOR     int      null,
    ID_MOVIMENTACAO int      null,
    DT_INICIO       datetime null,
    DT_FIM          datetime null
);

create table if not exists TB_TEMP_SERVIDORES_RECAD
(
    ID_SERVIDOR int         null,
    CPF         varchar(11) null
    );

create table if not exists TB_UNID_REL_NOMINAL
(
    ID_UNID_REL_NOMINAL int auto_increment
    primary key,
    CD_LOTACAO          varchar(20)  not null,
    DS_UF               varchar(100) not null
    );

create table if not exists TB_USUARIO_SERVICO
(
    CD_USUARIO_SERVICO decimal(12)   not null,
    NM_USUARIO         varchar(32)   not null,
    TX_SENHA           varchar(60)   not null,
    DS_APPNAME         varchar(100)  not null,
    IN_ATIVO           varchar(1)    not null,
    TX_TOKEN           varchar(4000) null
    );

create table if not exists TELEFONE
(
    ID_TELEFONE           int auto_increment
    primary key,
    ID_SERVIDOR           int           null,
    ID_TIPO_TELEFONE      int           null,
    ID_PAIS               int           null,
    NR_DDD                varchar(2)    not null,
    NR_TELEFONE           varchar(30)   not null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null,
    constraint UK_TELEFONE
    unique (ID_SERVIDOR, ID_TIPO_TELEFONE, NR_DDD, NR_TELEFONE, DT_OPERACAO_EXCLUSAO)
    );

create table if not exists TEXTO_PADRAO
(
    ID_TEXTO_PADRAO       int auto_increment
    primary key,
    ID_TIPO_ASSUNTO       int           null,
    DS_TEXTO_PADRAO       varchar(4000) not null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null
    );

create table if not exists TIPO_ADMISSAO
(
    ID_TIPO_ADMISSAO      int auto_increment
    primary key,
    CD_TIPO_ADMISSAO      varchar(10)  null,
    DS_TIPO_ADMISSAO      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_AFASTAMENTO
(
    ID_TIPO_AFASTAMENTO        int auto_increment
    primary key,
    CD_TIPO_AFASTAMENTO        varchar(10)  null,
    DS_TIPO_AFASTAMENTO        varchar(100) not null,
    DT_OPERACAO_INCLUSAO       datetime     not null,
    DT_OPERACAO_ALTERACAO      datetime     not null,
    NR_CPF_OPERADOR            varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO       datetime     null,
    DESCONT_TMPO_SV_PBL_FED_SN varchar(1)   not null,
    DESCON_TMPO_EXE_F_INST_SN  varchar(1)   not null,
    DESCON_COMO_FALTA_INJUS_SN varchar(1)   not null,
    ID_CLASS_TIPO_AFASTAMENTO  int          null,
    IN_NECESSITA_HOMOLOGACAO   varchar(1)   not null
    );

create table if not exists TIPO_APOSENTADORIA
(
    ID_TIPO_APOSENTADORIA int auto_increment
    primary key,
    CD_TIPO_APOSENTADORIA varchar(10)  null,
    DS_TIPO_APOSENTADORIA varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    UUID                  varchar(255) null
    );

create table if not exists TIPO_ASSUNTO
(
    ID_TIPO_ASSUNTO int auto_increment
    primary key,
    DS_TIPO_ASSUNTO varchar(200) not null
    );

create table if not exists TIPO_AUTORIDADE
(
    ID_TIPO_AUTORIDADE    int auto_increment
    primary key,
    CD_TIPO_AUTORIDADE    varchar(10)  null,
    DS_TIPO_AUTORIDADE    varchar(100) not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null
    );

create table if not exists TIPO_CLASSE
(
    ID_TIPO_CLASSE        int auto_increment
    primary key,
    CD_TIPO_CLASSE        varchar(10)  null,
    DS_TIPO_CLASSE        varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    ID_RH                 int          null
    );

create table if not exists TIPO_CONTA
(
    ID_TIPO_CONTA         int auto_increment
    primary key,
    CD_TIPO_CONTA         varchar(10)  null,
    DS_TIPO_CONTA         varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_DOCUMENTACAO
(
    ID_TIPO_DOCUMENTACAO  int auto_increment
    primary key,
    CD_TIPO_DOCUMENTACAO  varchar(10)  null,
    DS_TIPO_DOCUMENTACAO  varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_ENDERECO
(
    ID_TIPO_ENDERECO      int auto_increment
    primary key,
    CD_TIPO_ENDERECO      varchar(10)  null,
    DS_TIPO_ENDERECO      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_LOTACAO
(
    ID_TIPO_LOTACAO       int auto_increment
    primary key,
    CD_TIPO_LOTACAO       varchar(10)  null,
    DS_TIPO_LOTACAO       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_MOVIMENTACAO
(
    ID_TIPO_MOVIMENTACAO  int auto_increment
    primary key,
    CD_TIPO_MOVIMENTACAO  varchar(10)  null,
    DS_TIPO_MOVIMENTACAO  varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_OCUPACAO
(
    ID_TIPO_OCUPACAO      int auto_increment
    primary key,
    CD_TIPO_OCUPACAO      varchar(10)  null,
    DS_TIPO_OCUPACAO      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_OPCAO
(
    ID_TIPO_OPCAO         int auto_increment
    primary key,
    CD_TIPO_OPCAO         varchar(10)  null,
    DS_TIPO_OPCAO         varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_PADRAO
(
    ID_TIPO_PADRAO        int auto_increment
    primary key,
    ID_TIPO_CLASSE        int          null,
    CD_TIPO_PADRAO        varchar(10)  null,
    DS_TIPO_PADRAO        varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    ID_RH                 int          null
    );

create table if not exists TIPO_PARENTESCO
(
    ID_TIPO_PARENTESCO    int auto_increment
    primary key,
    CD_TIPO_PARENTESCO    varchar(10)  null,
    DS_TIPO_PARENTESCO    varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_PROVIMENTO
(
    ID_TIPO_PROVIMENTO    int auto_increment
    primary key,
    CD_TIPO_PROVIMENTO    varchar(10)  null,
    DS_TIPO_PROVIMENTO    varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    CD_SIAPE              varchar(10)  null
    );

create table if not exists TIPO_PUBLICACAO
(
    ID_TIPO_PUBLICACAO    int auto_increment
    primary key,
    CD_TIPO_PUBLICACAO    varchar(10)  null,
    DS_TIPO_PUBLICACAO    varchar(100) not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null
    );

create table if not exists TIPO_SALARIO
(
    ID_TIPO_SALARIO       int auto_increment
    primary key,
    CD_TIPO_SALARIO       varchar(10)  null,
    DS_TIPO_SALARIO       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_SANGUINEO
(
    ID_TIPO_SANGUINEO     int auto_increment
    primary key,
    CD_TIPO_SANGUINEO     varchar(10)  null,
    DS_TIPO_SANGUINEO     varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_SERVIDOR
(
    ID_TIPO_SERVIDOR      int auto_increment
    primary key,
    CD_TIPO_SERVIDOR      varchar(10)  null,
    DS_TIPO_SERVIDOR      varchar(100) not null,
    DT_OPERACAO_EXCLUSAO  datetime     null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null
    );

create table if not exists TIPO_TELEFONE
(
    ID_TIPO_TELEFONE      int auto_increment
    primary key,
    CD_TIPO_TELEFONE      varchar(10)  null,
    DS_TIPO_TELEFONE      varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TIPO_VACANCIA
(
    ID_TIPO_VACANCIA      int auto_increment
    primary key,
    CD_TIPO_VACANCIA      varchar(10)  null,
    DS_TIPO_VACANCIA      varchar(100) not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create table if not exists TMP_41257_PF
(
    CPF            varchar(14) null,
    K              datetime    null,
    N              varchar(10) null,
    O              varchar(25) null,
    S              datetime    null,
    W              decimal(6)  null,
    X              datetime    null,
    ID_TIPO_PADRAO int         null
    );

create table if not exists TMP_CARGA_51194
(
    CPF                       varchar(11) null,
    NR_CLASSIFICACAO_CONCURSO decimal(6)  null,
    NR_ANO_CONCURSO           decimal(6)  null
    );

create table if not exists TMP_CARGA_PGF_05092011
(
    NOME               varchar(100) null,
    SIAPE              varchar(20)  null,
    CPF                varchar(14)  null,
    OBS_CARGO          varchar(30)  null,
    CLASSIFICACAO      varchar(10)  null,
    TIPO_PADRAO        varchar(100) null,
    MOTIVO_EVOLUCAO    varchar(100) null,
    DT_EFEITO          datetime     null,
    FINALIDADE         varchar(100) null,
    AUTORIDADE         varchar(100) null,
    TIPO_DOC           varchar(100) null,
    NR_DOC             varchar(20)  null,
    DT_DOC             datetime     null,
    DS_PUBLICACAO      varchar(100) null,
    NR_PUBLICACAO      varchar(20)  null,
    DT_PUBLICACAO      datetime     null,
    DS_OBSERVACAO      varchar(200) null,
    QT_REGISTROS       varchar(20)  null,
    CD_OBS_CARGO       decimal(12)  null,
    CD_CLASSIFICACAO   decimal(12)  null,
    CD_TIPO_PADRAO     decimal(12)  null,
    CD_MOTIVO_EVOLUCAO decimal(12)  null,
    ID_NORMA           int          null,
    NR_CONCURSO        varchar(10)  null,
    ID_SERVIDOR        int          null,
    ID_CARGO_EFETIVO   int          null
    );

create table if not exists TRANSACAO_INTERNA
(
    ID_TRANSACAO_INTERNA int auto_increment
    primary key,
    ID_PAGINA            int          null,
    SG_TRANSACAO_INTERNA varchar(100) not null,
    NM_TRANSACAO_INTERNA varchar(100) not null
    );

create table if not exists TRANSACAO_INTERNA_PERFIL
(
    ID_TRANSACAO_INTERNA_PERFIL int auto_increment
    primary key,
    ID_TRANSACAO_INTERNA        int        null,
    ID_TRANSACAO                int        null,
    IN_TIPO_PERMISSAO           varchar(1) not null
    );

create table if not exists UF
(
    ID_UF                    int auto_increment
    primary key,
    CD_UF                    varchar(4)   not null,
    ID_PAIS                  int          null,
    ID_REGIAO                int          null,
    ID_REGIAO_JURIDICA       int          null,
    ID_REGIAO_ADMINISTRATIVA int          null,
    SG_UF                    varchar(2)   not null,
    DS_UF                    varchar(100) not null,
    DT_OPERACAO_INCLUSAO     datetime     not null,
    DT_OPERACAO_ALTERACAO    datetime     not null,
    NR_CPF_OPERADOR          varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO     datetime     null,
    DS_NATURALIDADE          varchar(30)  null
    );

create table if not exists USERS
(
    ID                int auto_increment
    primary key,
    NAME              varchar(255) not null,
    EMAIL             varchar(255) not null,
    EMAIL_VERIFIED_AT datetime     null,
    PASSWORD          varchar(255) not null,
    REMEMBER_TOKEN    varchar(100) null,
    CREATED_AT        datetime     null,
    UPDATED_AT        datetime     null,
    constraint USERS_EMAIL_UK
    unique (EMAIL)
    );

create table if not exists VACANCIA
(
    ID_VACANCIA           int auto_increment
    primary key,
    ID_TIPO_VACANCIA      int           null,
    ID_PROVIMENTO         int           null,
    ID_NORMA              int           null,
    DT_VACANCIA           datetime      not null,
    DS_OBSERVACAO         varchar(4000) null,
    DT_OPERACAO_INCLUSAO  datetime      not null,
    DT_OPERACAO_ALTERACAO datetime      not null,
    NR_CPF_OPERADOR       varchar(11)   not null,
    DT_OPERACAO_EXCLUSAO  datetime      null
    );

create table if not exists VINCULO_RAIS
(
    ID_VINCULO_RAIS       int auto_increment
    primary key,
    CD_VINCULO_RAIS       varchar(10)  null,
    DS_VINCULO_RAIS       varchar(100) not null,
    DT_OPERACAO_INCLUSAO  datetime     not null,
    DT_OPERACAO_ALTERACAO datetime     not null,
    NR_CPF_OPERADOR       varchar(11)  not null,
    DT_OPERACAO_EXCLUSAO  datetime     null
    );

create
definer = root@`%` procedure AlterarPrimaryKeyAutoIncrement()
BEGIN
    DECLARE done INT DEFAULT 0;
    DECLARE tableName VARCHAR(255);
    DECLARE columnName VARCHAR(255);

    DECLARE cur CURSOR FOR
SELECT
    table_name, column_name
FROM
    INFORMATION_SCHEMA.KEY_COLUMN_USAGE
WHERE
        CONSTRAINT_SCHEMA = 'sapienspessoas' AND
        CONSTRAINT_NAME = 'PRIMARY' AND
        TABLE_NAME NOT IN (
        SELECT
            TABLE_NAME
        FROM
            INFORMATION_SCHEMA.KEY_COLUMN_USAGE
        WHERE
                CONSTRAINT_SCHEMA = 'sapienspessoas' AND
                CONSTRAINT_NAME = 'PRIMARY'
        GROUP BY
            TABLE_NAME
        HAVING
                COUNT(*) > 1
    );


DECLARE CONTINUE HANDLER FOR NOT FOUND SET done = 1;

OPEN cur;

read_loop: LOOP
        FETCH cur INTO tableName, columnName;

        IF done THEN
            LEAVE read_loop;
END IF;

        SET @alterStmt = CONCAT('ALTER TABLE ', tableName, ' MODIFY ', columnName, ' int auto_increment;');

PREPARE stmt FROM @alterStmt;
EXECUTE stmt;
DEALLOCATE PREPARE stmt;

END LOOP;

CLOSE cur;

END;

