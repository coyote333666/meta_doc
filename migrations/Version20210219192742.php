<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219192742 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT fk_456bd2312a86559f');
        $this->addSql('DROP INDEX idx_456bd2312a86559f');
        $this->addSql('ALTER TABLE classification DROP classification_id');
        $this->addSql('ALTER TABLE classification ALTER description TYPE TEXT');
        $this->addSql('ALTER TABLE classification ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE classification ALTER description TYPE TEXT');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification ADD classification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ALTER title DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lft DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lvl DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER rgt DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER description TYPE VARCHAR(4000)');
        $this->addSql('ALTER TABLE classification ALTER description DROP DEFAULT');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT fk_456bd2312a86559f FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_456bd2312a86559f ON classification (classification_id)');
    }
}
