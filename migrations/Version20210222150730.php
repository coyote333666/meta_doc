<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210222150730 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE INDEX lft_ix ON classification (lft)');
        $this->addSql('CREATE INDEX rgt_ix ON classification (rgt)');
        $this->addSql('CREATE INDEX lft_rgt_ix ON classification (lft, rgt)');
        $this->addSql('CREATE INDEX lvl_ix ON classification (lvl)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX lft_ix');
        $this->addSql('DROP INDEX rgt_ix');
        $this->addSql('DROP INDEX lft_rgt_ix');
        $this->addSql('DROP INDEX lvl_ix');
        $this->addSql('ALTER TABLE classification ALTER title DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lft DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lvl DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER rgt DROP NOT NULL');
    }
}
