<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210215030744 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX document_uk');
        $this->addSql('ALTER TABLE document RENAME COLUMN code TO slug');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (slug)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX document_uk');
        $this->addSql('ALTER TABLE document RENAME COLUMN slug TO code');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (code)');
    }
}
