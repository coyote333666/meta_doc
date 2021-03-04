<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302223549 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX metadata_uk');
        $this->addSql('ALTER TABLE metadata RENAME COLUMN code TO term');
        $this->addSql('CREATE UNIQUE INDEX metadata_uk ON metadata (term)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX metadata_uk');
        $this->addSql('ALTER TABLE metadata RENAME COLUMN term TO code');
        $this->addSql('CREATE UNIQUE INDEX metadata_uk ON metadata (code)');
    }
}
