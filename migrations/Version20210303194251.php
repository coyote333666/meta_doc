<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210303194251 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP SEQUENCE dublin_core_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE dublin_core_element_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dublin_core_element (id INT NOT NULL, element VARCHAR(50) NOT NULL, definition VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_element_uk ON dublin_core_element (element)');
        $this->addSql('DROP TABLE dublin_core CASCADE');
        $this->addSql('ALTER TABLE metadata ADD CONSTRAINT FK_4F1434141DF597A7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core_element (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE metadata DROP CONSTRAINT FK_4F1434141DF597A7');
        $this->addSql('DROP SEQUENCE dublin_core_element_id_seq CASCADE');
        $this->addSql('CREATE SEQUENCE dublin_core_id_seq INCREMENT BY 1 MINVALUE 1 START 1');
        $this->addSql('CREATE TABLE dublin_core (id INT NOT NULL, element VARCHAR(50) NOT NULL, definition VARCHAR(4000) DEFAULT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_uk ON dublin_core (element)');
        $this->addSql('DROP TABLE dublin_core_element');
        $this->addSql('ALTER TABLE metadata DROP CONSTRAINT fk_4f1434141df597a7');
        $this->addSql('ALTER TABLE metadata ADD CONSTRAINT fk_4f1434141df597a7 FOREIGN KEY (dublin_core_id) REFERENCES dublin_core (id) NOT DEFERRABLE INITIALLY IMMEDIATE');
    }
}
