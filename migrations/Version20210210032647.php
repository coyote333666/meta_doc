<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210032647 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE classification_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE document_document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE dublin_core_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE metadata_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE SEQUENCE "user_id_seq" INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE classification (id INT NOT NULL, classification_id INT DEFAULT NULL, code VARCHAR(50) NOT NULL, descrip VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_456BD2312A86559F ON classification (classification_id)');
        $this->addSql('CREATE UNIQUE INDEX classification_uk ON classification (code, classification_id)');
        $this->addSql('CREATE TABLE classification_user (classification_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(classification_id, user_id))');
        $this->addSql('CREATE INDEX IDX_926D9F72A86559F ON classification_user (classification_id)');
        $this->addSql('CREATE INDEX IDX_926D9F7A76ED395 ON classification_user (user_id)');
        $this->addSql('CREATE TABLE document (id INT NOT NULL, classification_id INT DEFAULT NULL, text TEXT DEFAULT NULL, label VARCHAR(255) NOT NULL, start_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, end_date TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL, state VARCHAR(255) DEFAULT NULL, uri VARCHAR(4000) DEFAULT NULL, version VARCHAR(20) DEFAULT NULL, code VARCHAR(50) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_D8698A762A86559F ON document (classification_id)');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (label, classification_id)');
        $this->addSql('CREATE TABLE document_metadata (document_id INT NOT NULL, metadata_id INT NOT NULL, PRIMARY KEY(document_id, metadata_id))');
        $this->addSql('CREATE INDEX IDX_C0D5C54DC33F7837 ON document_metadata (document_id)');
        $this->addSql('CREATE INDEX IDX_C0D5C54DDC9EE959 ON document_metadata (metadata_id)');
        $this->addSql('CREATE TABLE document_document (id INT NOT NULL, dublin_core_id INT DEFAULT NULL, document_source_id INT NOT NULL, document_target_id INT NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_57A87B2F1DF597A7 ON document_document (dublin_core_id)');
        $this->addSql('CREATE INDEX IDX_57A87B2F870434C0 ON document_document (document_source_id)');
        $this->addSql('CREATE INDEX IDX_57A87B2F7B623C7 ON document_document (document_target_id)');
        $this->addSql('CREATE TABLE dublin_core (id INT NOT NULL, code VARCHAR(50) NOT NULL, is_relation BOOLEAN NOT NULL, descrip VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_uk ON dublin_core (code)');
        $this->addSql('CREATE TABLE metadata (id INT NOT NULL, dublin_core_id INT DEFAULT NULL, code VARCHAR(50) NOT NULL, descrip VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_4F1434141DF597A7 ON metadata (dublin_core_id)');
        $this->addSql('CREATE UNIQUE INDEX metadata_uk ON metadata (code)');
        $this->addSql('CREATE TABLE metadata_classification (metadata_id INT NOT NULL, classification_id INT NOT NULL, PRIMARY KEY(metadata_id, classification_id))');
        $this->addSql('CREATE INDEX IDX_D33F5AF0DC9EE959 ON metadata_classification (metadata_id)');
        $this->addSql('CREATE INDEX IDX_D33F5AF02A86559F ON metadata_classification (classification_id)');
        $this->addSql('CREATE TABLE "user" (id INT NOT NULL, ldap_id VARCHAR(255) DEFAULT NULL, first_name VARCHAR(255) DEFAULT NULL, last_name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX user_uk ON "user" (ldap_id)');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD2312A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT FK_926D9F72A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT FK_926D9F7A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT FK_D8698A762A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DDC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F1DF597A7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F870434C0 FOREIGN KEY (document_source_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F7B623C7 FOREIGN KEY (document_target_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE metadata ADD CONSTRAINT FK_4F1434141DF597A7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE metadata_classification ADD CONSTRAINT FK_D33F5AF0DC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE metadata_classification ADD CONSTRAINT FK_D33F5AF02A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT FK_456BD2312A86559F');
        $this->addSql('ALTER TABLE classification_user DROP CONSTRAINT FK_926D9F72A86559F');
        $this->addSql('ALTER TABLE document DROP CONSTRAINT FK_D8698A762A86559F');
        $this->addSql('ALTER TABLE metadata_classification DROP CONSTRAINT FK_D33F5AF02A86559F');
        $this->addSql('ALTER TABLE document_metadata DROP CONSTRAINT FK_C0D5C54DC33F7837');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F870434C0');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F7B623C7');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F1DF597A7');
        $this->addSql('ALTER TABLE metadata DROP CONSTRAINT FK_4F1434141DF597A7');
        $this->addSql('ALTER TABLE document_metadata DROP CONSTRAINT FK_C0D5C54DDC9EE959');
        $this->addSql('ALTER TABLE metadata_classification DROP CONSTRAINT FK_D33F5AF0DC9EE959');
        $this->addSql('ALTER TABLE classification_user DROP CONSTRAINT FK_926D9F7A76ED395');
        $this->addSql('DROP SEQUENCE classification_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE document_document_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE dublin_core_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE metadata_id_seq CASCADE');
        $this->addSql('DROP SEQUENCE "user_id_seq" CASCADE');
        $this->addSql('DROP TABLE classification');
        $this->addSql('DROP TABLE classification_user');
        $this->addSql('DROP TABLE document');
        $this->addSql('DROP TABLE document_metadata');
        $this->addSql('DROP TABLE document_document');
        $this->addSql('DROP TABLE dublin_core');
        $this->addSql('DROP TABLE metadata');
        $this->addSql('DROP TABLE metadata_classification');
        $this->addSql('DROP TABLE "user"');
    }
}
