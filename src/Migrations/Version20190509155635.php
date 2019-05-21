<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509155635 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6A1B96354');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6E3CBAF6E');
        $this->addSql('DROP INDEX IDX_1F034AF6A1B96354 ON billet');
        $this->addSql('DROP INDEX IDX_1F034AF6E3CBAF6E ON billet');
        $this->addSql('ALTER TABLE billet DROP aeroport_depart_id, DROP aeroport_arrivee_id, DROP date_depart, DROP date_arrivee');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billet ADD aeroport_depart_id INT NOT NULL, ADD aeroport_arrivee_id INT NOT NULL, ADD date_depart DATETIME NOT NULL, ADD date_arrivee DATETIME NOT NULL');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6A1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6E3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroport (id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6A1B96354 ON billet (aeroport_arrivee_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6E3CBAF6E ON billet (aeroport_depart_id)');
    }
}
