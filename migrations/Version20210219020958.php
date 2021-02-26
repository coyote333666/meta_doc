<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210219020958 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification ADD tree_root INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD title VARCHAR(500)');
        $this->addSql('ALTER TABLE classification ADD lft INT');
        $this->addSql('ALTER TABLE classification ADD lvl INT');
        $this->addSql('ALTER TABLE classification ADD rgt INT');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD231A977936C FOREIGN KEY (tree_root) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT FK_456BD231727ACA70 FOREIGN KEY (parent_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX IDX_456BD231A977936C ON classification (tree_root)');
        $this->addSql('CREATE INDEX IDX_456BD231727ACA70 ON classification (parent_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT FK_456BD231A977936C');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT FK_456BD231727ACA70');
        $this->addSql('DROP INDEX IDX_456BD231A977936C');
        $this->addSql('DROP INDEX IDX_456BD231727ACA70');
        $this->addSql('ALTER TABLE classification DROP tree_root');
        $this->addSql('ALTER TABLE classification DROP parent_id');
        $this->addSql('ALTER TABLE classification DROP title');
        $this->addSql('ALTER TABLE classification DROP lft');
        $this->addSql('ALTER TABLE classification DROP lvl');
        $this->addSql('ALTER TABLE classification DROP rgt');
    }
}
