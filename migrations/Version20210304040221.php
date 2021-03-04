<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304040221 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE document_document_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE document_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document_relation (id INT NOT NULL, dublin_core_id INT DEFAULT NULL, document_source_id INT NOT NULL, document_target_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_ED48B6101DF597A7 ON document_relation (dublin_core_id)');
        $this->addSql('CREATE INDEX IDX_ED48B610870434C0 ON document_relation (document_source_id)');
        $this->addSql('CREATE INDEX IDX_ED48B6107B623C7 ON document_relation (document_target_id)');
        $this->addSql('CREATE UNIQUE INDEX document_relation_uk ON document_relation (document_source_id, document_target_id, dublin_core_id)');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B6101DF597A7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_relation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B610870434C0 FOREIGN KEY (document_source_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B6107B623C7 FOREIGN KEY (document_target_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE document_document');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE document_relation_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE document_document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document_document (id INT NOT NULL, dublin_core_id INT DEFAULT NULL, document_source_id INT NOT NULL, document_target_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_57a87b2f1df597a7 ON document_document (dublin_core_id)');
        $this->addSql('CREATE INDEX idx_57a87b2f870434c0 ON document_document (document_source_id)');
        $this->addSql('CREATE UNIQUE INDEX document_document_uk ON document_document (document_source_id, document_target_id, dublin_core_id)');
        $this->addSql('CREATE INDEX idx_57a87b2f7b623c7 ON document_document (document_target_id)');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT fk_57a87b2f870434c0 FOREIGN KEY (document_source_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT fk_57a87b2f7b623c7 FOREIGN KEY (document_target_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT fk_57a87b2f1df597a7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_relation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE document_relation');
    }
}
