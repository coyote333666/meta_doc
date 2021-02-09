<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208170216 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification ADD classification_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD2312A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_456BD2312A86559F ON classification (classification_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT FK_456BD2312A86559F');
        $this->addSql('DROP INDEX IDX_456BD2312A86559F');
        $this->addSql('ALTER TABLE classification DROP classification_id');
    }
}
