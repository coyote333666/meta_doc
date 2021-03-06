<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304143223 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE metadata DROP CONSTRAINT fk_4f1434141df597a7');
        $this->addSql('DROP INDEX idx_4f1434141df597a7');
        $this->addSql('ALTER TABLE metadata ADD dublin_core_element_id INT NOT NULL');
        $this->addSql('ALTER TABLE metadata DROP dublin_core_id');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE metadata ADD dublin_core_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE metadata DROP dublin_core_element_id');
        $this->addSql('ALTER TABLE metadata ADD CONSTRAINT fk_4f1434141df597a7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_element (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_4f1434141df597a7 ON metadata (dublin_core_id)');
    }
}
