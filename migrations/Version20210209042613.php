<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209042613 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_document ADD document_source_id INT NOT NULL');
        $this->addSql('ALTER TABLE document_document ADD document_target_id INT NOT NULL');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F870434C0 FOREIGN KEY (document_source_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F7B623C7 FOREIGN KEY (document_target_id) REFERENCES document (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_57A87B2F870434C0 ON document_document (document_source_id)');
        $this->addSql('CREATE INDEX IDX_57A87B2F7B623C7 ON document_document (document_target_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F870434C0');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F7B623C7');
        $this->addSql('DROP INDEX IDX_57A87B2F870434C0');
        $this->addSql('DROP INDEX IDX_57A87B2F7B623C7');
        $this->addSql('ALTER TABLE document_document DROP document_source_id');
        $this->addSql('ALTER TABLE document_document DROP document_target_id');
    }
}
