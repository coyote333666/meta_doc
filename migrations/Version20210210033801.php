<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210210033801 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE UNIQUE INDEX classification_uk ON classification (code, classification_id)');
        $this->addSql('ALTER TABLE document ALTER code TYPE VARCHAR(50)');
        $this->addSql('ALTER TABLE document ALTER start_date TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE document ALTER start_date DROP DEFAULT');
        $this->addSql('ALTER TABLE document ALTER end_date TYPE TIMESTAMP(0) WITHOUT TIME ZONE');
        $this->addSql('ALTER TABLE document ALTER end_date DROP DEFAULT');
        $this->addSql('CREATE UNIQUE INDEX document_uk ON document (label, classification_id)');
        $this->addSql('CREATE UNIQUE INDEX dublin_core_uk ON dublin_core (code)');
        $this->addSql('CREATE UNIQUE INDEX user_uk ON "user" (ldap_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX document_uk');
        $this->addSql('ALTER TABLE document ALTER start_date TYPE DATE');
        $this->addSql('ALTER TABLE document ALTER start_date DROP DEFAULT');
        $this->addSql('ALTER TABLE document ALTER end_date TYPE DATE');
        $this->addSql('ALTER TABLE document ALTER end_date DROP DEFAULT');
        $this->addSql('ALTER TABLE document ALTER code TYPE VARCHAR(10)');
        $this->addSql('DROP INDEX classification_uk');
        $this->addSql('DROP INDEX user_uk');
        $this->addSql('DROP INDEX dublin_core_uk');
    }
}
