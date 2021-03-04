<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210302164225 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX dublin_core_uk');
        $this->addSql('ALTER TABLE dublin_core RENAME COLUMN code TO element');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_uk ON dublin_core (element)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX dublin_core_uk');
        $this->addSql('ALTER TABLE dublin_core RENAME COLUMN element TO code');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_uk ON dublin_core (code)');
    }
}
