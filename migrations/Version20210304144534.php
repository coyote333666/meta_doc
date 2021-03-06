<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210304144534 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE document_relation DROP CONSTRAINT fk_ed48b6101df597a7');
        $this->addSql('DROP INDEX idx_ed48b6101df597a7');
        $this->addSql('DROP INDEX document_relation_uk');
        $this->addSql('ALTER TABLE document_relation RENAME COLUMN dublin_core_id TO dublin_core_relation_id');
        $this->addSql('CREATE UNIQUE INDEX document_relation_uk ON document_relation (document_source_id, document_target_id, dublin_core_relation_id)');
        $this->addSql('ALTER INDEX idx_4f1434141df597a7 RENAME TO IDX_4F143414E2021F97');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX document_relation_uk');
        $this->addSql('ALTER TABLE document_relation RENAME COLUMN dublin_core_relation_id TO dublin_core_id');
        $this->addSql('ALTER TABLE document_relation ADD CONSTRAINT fk_ed48b6101df597a7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_relation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX idx_ed48b6101df597a7 ON document_relation (dublin_core_id)');
        $this->addSql('CREATE UNIQUE INDEX document_relation_uk ON document_relation (document_source_id, document_target_id, dublin_core_id)');
        $this->addSql('ALTER INDEX idx_4f143414e2021f97 RENAME TO idx_4f1434141df597a7');
    }
}
