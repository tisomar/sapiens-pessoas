<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240829120731 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE sp_certidao_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE SEQUENCE sp_tipo_certidao_id_seq START WITH 1 MINVALUE 1 INCREMENT BY 1');
        $this->addSql('CREATE TABLE sp_certidao (id NUMBER(10) NOT NULL, tipo_id NUMBER(10) DEFAULT NULL NULL, sigepe_servidor_id NUMBER(10) NOT NULL, nup_numero VARCHAR2(255) DEFAULT NULL NULL, data_solicitacao DATE DEFAULT NULL NULL, justificativa_solicitacao VARCHAR2(4000) DEFAULT NULL NULL, info_adicionais CLOB DEFAULT NULL NULL, data_avaliacao DATE DEFAULT NULL NULL, resultado_avaliacao VARCHAR2(4000) DEFAULT NULL NULL, status VARCHAR2(3) DEFAULT NULL NULL, nup_data_criacao_tarefa DATE DEFAULT NULL NULL, nup_data_anexo_certidao DATE DEFAULT NULL NULL, nup_log CLOB DEFAULT NULL NULL, uuid CHAR(36) NOT NULL, criado_em TIMESTAMP(0) DEFAULT NULL NULL, atualizado_em TIMESTAMP(0) DEFAULT NULL NULL, apagado_em TIMESTAMP(0) DEFAULT NULL NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_633549A4D17F50A6 ON sp_certidao (uuid)');
        $this->addSql('CREATE INDEX IDX_633549A4A9276E6C ON sp_certidao (tipo_id)');
        $this->addSql('CREATE INDEX IDX_633549A47E809C0A ON sp_certidao (sigepe_servidor_id)');
        $this->addSql('COMMENT ON COLUMN sp_certidao.info_adicionais IS \'(DC2Type:json)\'');
        $this->addSql('COMMENT ON COLUMN sp_certidao.nup_log IS \'(DC2Type:json)\'');
        $this->addSql('COMMENT ON COLUMN sp_certidao.uuid IS \'(DC2Type:guid)\'');
        $this->addSql('CREATE TABLE sp_tipo_certidao (id NUMBER(10) NOT NULL, ativo NUMBER(1) NOT NULL, requer_nup NUMBER(1) NOT NULL, uuid CHAR(36) NOT NULL, nome VARCHAR2(255) NOT NULL, descricao VARCHAR2(255) NOT NULL, criado_em TIMESTAMP(0) DEFAULT NULL NULL, atualizado_em TIMESTAMP(0) DEFAULT NULL NULL, apagado_em TIMESTAMP(0) DEFAULT NULL NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_D3637122D17F50A6 ON sp_tipo_certidao (uuid)');
        $this->addSql('COMMENT ON COLUMN sp_tipo_certidao.uuid IS \'(DC2Type:guid)\'');
        $this->addSql('ALTER TABLE sp_certidao ADD CONSTRAINT FK_633549A4A9276E6C FOREIGN KEY (tipo_id) REFERENCES sp_tipo_certidao (id)');
        $this->addSql('ALTER TABLE sp_certidao ADD CONSTRAINT FK_633549A47E809C0A FOREIGN KEY (sigepe_servidor_id) REFERENCES sp_sigepe_servidor (id)');

    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs

        $this->addSql('DROP SEQUENCE sp_certidao_id_seq');
        $this->addSql('DROP SEQUENCE sp_tipo_certidao_id_seq');

        $this->addSql('ALTER TABLE sp_certidao DROP CONSTRAINT FK_633549A4A9276E6C');
        $this->addSql('ALTER TABLE sp_certidao DROP CONSTRAINT FK_633549A47E809C0A');
        $this->addSql('DROP TABLE sp_certidao');
        $this->addSql('DROP TABLE sp_tipo_certidao');

    }
}
