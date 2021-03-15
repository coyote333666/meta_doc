<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210315182640 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE classification_metadata');
        $this->addSql('DROP INDEX uniq_d8698a76989d9b62');
        $this->addSql('ALTER TABLE document DROP slug');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE classification_metadata (classification_id INT NOT NULL, metadata_id INT NOT NULL, PRIMARY KEY(classification_id, metadata_id))');
        $this->addSql('CREATE INDEX idx_ca8257442a86559f ON classification_metadata (classification_id)');
        $this->addSql('CREATE INDEX idx_ca825744dc9ee959 ON classification_metadata (metadata_id)');
        $this->addSql('ALTER TABLE classification_metadata ADD CONSTRAINT fk_ca8257442a86559f FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_metadata ADD CONSTRAINT fk_ca825744dc9ee959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE document ADD slug VARCHAR(500) NOT NULL');
        $this->addSql('CREATE UNIQUE INDEX uniq_d8698a76989d9b62 ON document (slug)');
    }
}
