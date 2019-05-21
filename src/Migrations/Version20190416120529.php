<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190416120529 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avion ADD nb_places_premium SMALLINT NOT NULL, ADD nb_places_business SMALLINT NOT NULL, ADD nb_places_eco SMALLINT NOT NULL, DROP nbPlacesPremium, DROP nbPlacesBusiness, DROP nbPlacesEco');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE avion ADD nbPlacesPremium SMALLINT NOT NULL, ADD nbPlacesBusiness SMALLINT NOT NULL, ADD nbPlacesEco SMALLINT NOT NULL, DROP nb_places_premium, DROP nb_places_business, DROP nb_places_eco');
    }
}
