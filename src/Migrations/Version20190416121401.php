<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416121401 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE avion (id INT AUTO_INCREMENT NOT NULL, modele VARCHAR(255) NOT NULL, motorisation VARCHAR(255) NOT NULL, capacite SMALLINT NOT NULL, nb_places_premium SMALLINT NOT NULL, nb_places_business SMALLINT NOT NULL, nb_places_eco SMALLINT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vol (id INT AUTO_INCREMENT NOT NULL, avion_id INT DEFAULT NULL, aeroport_depart_id INT NOT NULL, aeroport_arrivee_id INT NOT NULL, depart_theorique DATETIME NOT NULL, depart_reel DATETIME NOT NULL, arrivee_theorique DATETIME NOT NULL, INDEX IDX_95C97EB80BBB841 (avion_id), INDEX IDX_95C97EBE3CBAF6E (aeroport_depart_id), INDEX IDX_95C97EBA1B96354 (aeroport_arrivee_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EB80BBB841 FOREIGN KEY (avion_id) REFERENCES avion (id)');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EBE3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE vol ADD CONSTRAINT FK_95C97EBA1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroport (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE vol DROP FOREIGN KEY FK_95C97EB80BBB841');
        $this->addSql('DROP TABLE avion');
        $this->addSql('DROP TABLE vol');
    }
}
