<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190509155252 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billet ADD aeroport_depart_id INT NOT NULL, ADD aeroport_arrivee_id INT NOT NULL, ADD utilisateur_id INT NOT NULL, ADD vol_id INT NOT NULL, ADD date_depart DATETIME NOT NULL, ADD date_arrivee DATETIME NOT NULL, ADD prix NUMERIC(10, 2) NOT NULL');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6E3CBAF6E FOREIGN KEY (aeroport_depart_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6A1B96354 FOREIGN KEY (aeroport_arrivee_id) REFERENCES aeroport (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF6FB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE billet ADD CONSTRAINT FK_1F034AF69F2BFB7A FOREIGN KEY (vol_id) REFERENCES vol (id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6E3CBAF6E ON billet (aeroport_depart_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6A1B96354 ON billet (aeroport_arrivee_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF6FB88E14F ON billet (utilisateur_id)');
        $this->addSql('CREATE INDEX IDX_1F034AF69F2BFB7A ON billet (vol_id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6E3CBAF6E');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6A1B96354');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF6FB88E14F');
        $this->addSql('ALTER TABLE billet DROP FOREIGN KEY FK_1F034AF69F2BFB7A');
        $this->addSql('DROP INDEX IDX_1F034AF6E3CBAF6E ON billet');
        $this->addSql('DROP INDEX IDX_1F034AF6A1B96354 ON billet');
        $this->addSql('DROP INDEX IDX_1F034AF6FB88E14F ON billet');
        $this->addSql('DROP INDEX IDX_1F034AF69F2BFB7A ON billet');
        $this->addSql('ALTER TABLE billet DROP aeroport_depart_id, DROP aeroport_arrivee_id, DROP utilisateur_id, DROP vol_id, DROP date_depart, DROP date_arrivee, DROP prix');
    }
}
