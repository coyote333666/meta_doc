<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210306170327 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification_metadata (classification_id INT NOT NULL, metadata_id INT NOT NULL, PRIMARY KEY(classification_id, metadata_id))');
        $this->addSql('CREATE INDEX IDX_CA8257442A86559F ON classification_metadata (classification_id)');
        $this->addSql('CREATE INDEX IDX_CA825744DC9EE959 ON classification_metadata (metadata_id)');
        $this->addSql('ALTER TABLE classification_metadata ADD CONSTRAINT FK_CA8257442A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_metadata ADD CONSTRAINT FK_CA825744DC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE classification_metadata');
    }
}
