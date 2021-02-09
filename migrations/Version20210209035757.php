<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210209035757 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE document_document_id_seq CASCADE');
        $this->addSql('DROP TABLE document_document');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE SEQUENCE document_document_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE document_document (id INT NOT NULL, dublin_cores_id INT DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX idx_57a87b2fafde7ef9 ON document_document (dublin_cores_id)');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT fk_57a87b2fafde7ef9 FOREIGN KEY (dublin_cores_id) REFERENCES dublin_core (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
