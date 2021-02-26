<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210218202418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE classification_admin (classification_id INT NOT NULL, admin_id INT NOT NULL, PRIMARY KEY(classification_id, admin_id))');
        $this->addSql('CREATE INDEX IDX_A45326F22A86559F ON classification_admin (classification_id)');
        $this->addSql('CREATE INDEX IDX_A45326F2642B8210 ON classification_admin (admin_id)');
        $this->addSql('ALTER TABLE classification_admin ADD CONSTRAINT FK_A45326F22A86559F FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_admin ADD CONSTRAINT FK_A45326F2642B8210 FOREIGN KEY (admin_id) REFERENCES admin (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE classification_user');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE classification_user (classification_id INT NOT NULL, user_id INT NOT NULL, PRIMARY KEY(classification_id, user_id))');
        $this->addSql('CREATE INDEX idx_926d9f72a86559f ON classification_user (classification_id)');
        $this->addSql('CREATE INDEX idx_926d9f7a76ed395 ON classification_user (user_id)');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT fk_926d9f72a86559f FOREIGN KEY (classification_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification_user ADD CONSTRAINT fk_926d9f7a76ed395 FOREIGN KEY (user_id) REFERENCES "user" (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('DROP TABLE classification_admin');
    }
}
