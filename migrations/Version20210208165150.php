<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210208165150 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification_user (classification_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(classification_id, user_id))');
        $this->addSql('CREATE INDEX IDX_926D9F72A86559F ON classification_user (classification_id)');
        $this->addSql('CREATE INDEX IDX_926D9F7A76ED395 ON classification_user (user_id)');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT FK_926D9F72A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT FK_926D9F7A76ED395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE classification_user');
    }
}
