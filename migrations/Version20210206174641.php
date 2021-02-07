<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210206174641 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE metadata_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document_metadata (document_id INT NOT NULL, metadata_id INT NOT NULL, PRIMARY KEY(document_id, metadata_id))');
        $this->addSql('CREATE INDEX IDX_C0D5C54DC33F7837 ON document_metadata (document_id)');
        $this->addSql('CREATE INDEX IDX_C0D5C54DDC9EE959 ON document_metadata (metadata_id)');
        $this->addSql('CREATE TABLE metadata (id INT NOT NULL, code VARCHAR(50) NOT NULL, descrip VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DC33F7837 FOREIGN KEY (document_id) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_metadata ADD CONSTRAINT FK_C0D5C54DDC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document_metadata DROP CONSTRAINT FK_C0D5C54DDC9EE959');
        $this->addSql('DROP SEQUENCE metadata_id_seq CASCADE');
        $this->addSql('DROP TABLE document_metadata');
        $this->addSql('DROP TABLE metadata');
    }
}
