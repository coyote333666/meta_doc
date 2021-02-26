<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210225022748 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT fk_456bd231a977936c');
        $this->addSql('ALTER TABLE classification DROP CONSTRAINT fk_456bd231727aca70');
        $this->addSql('DROP INDEX lft_rgt_ix');
        $this->addSql('DROP INDEX lvl_ix');
        $this->addSql('DROP INDEX lft_ix');
        $this->addSql('DROP INDEX idx_456bd231a977936c');
        $this->addSql('DROP INDEX idx_456bd231727aca70');
        $this->addSql('DROP INDEX rgt_ix');
        $this->addSql('ALTER TABLE classification DROP tree_root');
        $this->addSql('ALTER TABLE classification DROP parent_id');
        $this->addSql('ALTER TABLE classification DROP lft');
        $this->addSql('ALTER TABLE classification DROP lvl');
        $this->addSql('ALTER TABLE classification DROP rgt');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE classification ADD tree_root INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD parent_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE classification ADD lft INT NOT NULL');
        $this->addSql('ALTER TABLE classification ADD lvl INT NOT NULL');
        $this->addSql('ALTER TABLE classification ADD rgt INT NOT NULL');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT fk_456bd231a977936c FOREIGN KEY (tree_root) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('ALTER TABLE classification ADD CONSTRAINT fk_456bd231727aca70 FOREIGN KEY (parent_id) REFERENCES classification (id) ON DELETE CASCADE NOT DEFERRABLE INITIALLY IMMEDIATE');
        $this->addSql('CREATE INDEX lft_rgt_ix ON classification (lft, rgt)');
        $this->addSql('CREATE INDEX lvl_ix ON classification (lvl)');
        $this->addSql('CREATE INDEX lft_ix ON classification (lft)');
        $this->addSql('CREATE INDEX idx_456bd231a977936c ON classification (tree_root)');
        $this->addSql('CREATE INDEX idx_456bd231727aca70 ON classification (parent_id)');
        $this->addSql('CREATE INDEX rgt_ix ON classification (rgt)');
    }
}
