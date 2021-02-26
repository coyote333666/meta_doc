<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210224201307 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification ALTER title SET NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lft SET NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lvl SET NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER rgt SET NOT NULL');
        $this->addSql('ALTER TABLE document RENAME COLUMN label TO title');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document RENAME COLUMN title TO label');
        $this->addSql('ALTER TABLE classification ALTER title DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lft DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER lvl DROP NOT NULL');
        $this->addSql('ALTER TABLE classification ALTER rgt DROP NOT NULL');
    }
}
