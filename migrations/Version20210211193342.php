<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211193342 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification RENAME COLUMN descrip TO description');
        $this->addSql('ALTER TABLE dublin_core RENAME COLUMN descrip TO description');
        $this->addSql('ALTER TABLE metadata RENAME COLUMN descrip TO description');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification RENAME COLUMN description TO descrip');
        $this->addSql('ALTER TABLE metadata RENAME COLUMN description TO descrip');
        $this->addSql('ALTER TABLE dublin_core RENAME COLUMN description TO descrip');
    }
}
