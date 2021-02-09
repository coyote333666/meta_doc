<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208165349 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE document_document (document_source INT NOT NULL, document_target INT NOT NULL, PRIMARY KEY(document_source, document_target))');
        $this->addSql('CREATE INDEX IDX_57A87B2FE1E8CE15 ON document_document (document_source)');
        $this->addSql('CREATE INDEX IDX_57A87B2FF80D9E9A ON document_document (document_target)');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2FE1E8CE15 FOREIGN KEY (document_source) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2FF80D9E9A FOREIGN KEY (document_target) REFERENCES document (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE document_document');
    }
}
