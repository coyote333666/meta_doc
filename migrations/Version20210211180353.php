<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210211180353 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX document_uk');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (code)');
        $this->addSql('CREATE UNIQUE INDEX document_document_uk ON document_document (document_source_id, document_target_id, dublin_core_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX document_uk');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (label, start_date, version)');
        $this->addSql('DROP INDEX document_document_uk');
    }
}
