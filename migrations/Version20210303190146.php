<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303190146 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SEQUENCE dublin_core_relation_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dublin_core_relation (id INT NOT NULL, relation VARCHAR(50) NOT NULL, definition VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_relation_uk ON dublin_core_relation (relation)');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F1DF597A7');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT FK_57A87B2F1DF597A7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_relation (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE dublin_core DROP is_related');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT FK_57A87B2F1DF597A7');
        $this->addSql('DROP SEQUENCE dublin_core_relation_id_seq CASCADE');
        $this->addSql('DROP TABLE dublin_core_relation');
        $this->addSql('ALTER TABLE dublin_core ADD is_related BOOLEAN NOT NULL');
        $this->addSql('ALTER TABLE document_document DROP CONSTRAINT fk_57a87b2f1df597a7');
        $this->addSql('ALTER TABLE document_document ADD CONSTRAINT fk_57a87b2f1df597a7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
