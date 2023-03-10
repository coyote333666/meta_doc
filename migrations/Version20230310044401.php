<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230310044401 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE admin_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE classification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE document_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dublin_core_element_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dublin_core_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE metadata_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE admin (id INT NOT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_880E0D76F85E0677 ON admin (username)');
        $this->addSql('CREATE TABLE classification (id INT NOT NULL, title VARCHAR(500) NOT NULL, code VARCHAR(50) NOT NULL, description TEXT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX classification_uk ON classification (code)');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, classification_id INT NOT NULL, text TEXT DEFAULT NULL, title VARCHAR(255) NOT NULL, start_date DATE NOT NULL, end_date DATE DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, version VARCHAR(20) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A762A86559F ON document (classification_id)');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (title, start_date, version, classification_id)');
        $this->addSql('CREATE TABLE document_metadata (document_id INT NOT NULL, metadata_id INT NOT NULL, PRIMARY KEY(document_id, metadata_id))');
        $this->addSql('CREATE INDEX IDX_C0D5C54DC33F7837 ON document_metadata (document_id)');
        $this->addSql('CREATE INDEX IDX_C0D5C54DDC9EE959 ON document_metadata (metadata_id)');
        $this->addSql('CREATE TABLE document_relation (id INT NOT NULL, dublin_core_relation_id INT DEFAULT NULL, document_source_id INT NOT NULL, document_target_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_ED48B61060C36E58 ON document_relation (dublin_core_relation_id)');
        $this->addSql('CREATE INDEX IDX_ED48B610870434C0 ON document_relation (document_source_id)');
        $this->addSql('CREATE INDEX IDX_ED48B6107B623C7 ON document_relation (document_target_id)');
        $this->addSql('CREATE UNIQUE INDEX document_relation_uk ON document_relation (document_source_id, document_target_id, dublin_core_relation_id)');
        $this->addSql('CREATE TABLE dublin_core_element (id INT NOT NULL, element VARCHAR(50) NOT NULL, definition VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_element_uk ON dublin_core_element (element)');
        $this->addSql('CREATE TABLE dublin_core_relation (id INT NOT NULL, relation VARCHAR(50) NOT NULL, definition VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_relation_uk ON dublin_core_relation (relation)');
        $this->addSql('CREATE TABLE metadata (id INT NOT NULL, dublin_core_element_id INT DEFAULT NULL, term VARCHAR(50) NOT NULL, description VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4F143414E2021F97 ON metadata (dublin_core_element_id)');
        $this->addSql('CREATE UNIQUE INDEX metadata_uk ON metadata (term, dublin_core_element_id)');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A762A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DDC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B61060C36E58 FOREIGN KEY (dublin_core_relation_id) REFERENCES dublin_core_relation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B610870434C0 FOREIGN KEY (document_source_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT FK_ED48B6107B623C7 FOREIGN KEY (document_target_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE metadata ADD CONSTRAINT FK_4F143414E2021F97 FOREIGN KEY (dublin_core_element_id) REFERENCES dublin_core_element (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP SEQUENCE admin_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE classification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE document_relation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dublin_core_element_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dublin_core_relation_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE metadata_id_seq CASCADE');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A762A86559F');
        $this->addSql('ALTER TABLE document_metadata DROP CONSTRAINT FK_C0D5C54DC33F7837');
        $this->addSql('ALTER TABLE document_metadata DROP CONSTRAINT FK_C0D5C54DDC9EE959');
        $this->addSql('ALTER TABLE document_relation DROP CONSTRAINT FK_ED48B61060C36E58');
        $this->addSql('ALTER TABLE document_relation DROP CONSTRAINT FK_ED48B610870434C0');
        $this->addSql('ALTER TABLE document_relation DROP CONSTRAINT FK_ED48B6107B623C7');
        $this->addSql('ALTER TABLE metadata DROP CONSTRAINT FK_4F143414E2021F97');
        $this->addSql('DROP TABLE admin');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_metadata');
        $this->addSql('DROP TABLE document_relation');
        $this->addSql('DROP TABLE dublin_core_element');
        $this->addSql('DROP TABLE dublin_core_relation');
        $this->addSql('DROP TABLE metadata');
    }
}
