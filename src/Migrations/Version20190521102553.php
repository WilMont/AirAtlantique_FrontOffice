<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190521102553 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('DROP TABLE vol_favori');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE vol_favori (id INT AUTO_INCREMENT NOT NULL, id_utilisateur_id INT NOT NULL, id_vol_id INT NOT NULL, INDEX IDX_9799FC19C6EE5C49 (id_utilisateur_id), UNIQUE INDEX UNIQ_9799FC19B91C4E97 (id_vol_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB COMMENT = \'\' ');
        $this->addSql('ALTER TABLE vol_favori ADD CONSTRAINT FK_9799FC19B91C4E97 FOREIGN KEY (id_vol_id) REFERENCES vol (id)');
        $this->addSql('ALTER TABLE vol_favori ADD CONSTRAINT FK_9799FC19C6EE5C49 FOREIGN KEY (id_utilisateur_id) REFERENCES utilisateur (id)');
    }
}
