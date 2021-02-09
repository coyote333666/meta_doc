<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208162139 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE metadata_classification (metadata_id INT NOT NULL, classification_id INT NOT NULL, PRIMARY KEY(metadata_id, classification_id))');
        $this->addSql('CREATE INDEX IDX_D33F5AF0DC9EE959 ON metadata_classification (metadata_id)');
        $this->addSql('CREATE INDEX IDX_D33F5AF02A86559F ON metadata_classification (classification_id)');
        $this->addSql('ALTER TABLE metadata_classification ADD CONSTRAINT FK_D33F5AF0DC9EE959 FOREIGN KEY (metadata_id) REFERENCES metadata (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE metadata_classification ADD CONSTRAINT FK_D33F5AF02A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE metadata_classification');
    }
}
