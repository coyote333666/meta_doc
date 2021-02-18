<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210216201118 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document DROP CONSTRAINT fk_d8698a762a86559f');
        $this->addSql('DROP INDEX idx_d8698a762a86559f');
        $this->addSql('ALTER TABLE document ADD classification VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE document DROP classification_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document ADD classification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE document DROP classification');
        $this->addSql('ALTER TABLE document ADD CONSTRAINT fk_d8698a762a86559f FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_d8698a762a86559f ON document (classification_id)');
    }
}
