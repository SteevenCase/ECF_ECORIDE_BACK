<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20250715171617 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE avis (id INT AUTO_INCREMENT NOT NULL, users_fk_id INT DEFAULT NULL, commentaires VARCHAR(255) NOT NULL, notes INT NOT NULL, INDEX IDX_8F91ABF04200BD99 (users_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE covoiturage (id INT AUTO_INCREMENT NOT NULL, owner_id INT DEFAULT NULL, vehicules_id_id INT DEFAULT NULL, places_restantes SMALLINT NOT NULL, prix DOUBLE PRECISION NOT NULL, lieu_depart VARCHAR(255) NOT NULL, lieu_arrivee VARCHAR(255) NOT NULL, date_depart DATE NOT NULL, date_arrivee DATE NOT NULL, heure_depart DATETIME NOT NULL, heure_arrivee DATETIME NOT NULL, ecologique VARCHAR(255) NOT NULL, INDEX IDX_28C79E897E3C61F9 (owner_id), INDEX IDX_28C79E897834C803 (vehicules_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_IDENTIFIER_EMAIL (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vehicule (id INT AUTO_INCREMENT NOT NULL, users_fk_id INT DEFAULT NULL, immatriculation VARCHAR(255) NOT NULL, date_immatriculation DATE NOT NULL, modele VARCHAR(255) NOT NULL, marque VARCHAR(255) NOT NULL, couleur VARCHAR(255) NOT NULL, places_disponibles SMALLINT NOT NULL, preferences VARCHAR(255) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', updated_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_292FFF1D4200BD99 (users_fk_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', available_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', delivered_at DATETIME DEFAULT NULL COMMENT \'(DC2Type:datetime_immutable)\', INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE avis ADD CONSTRAINT FK_8F91ABF04200BD99 FOREIGN KEY (users_fk_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE covoiturage ADD CONSTRAINT FK_28C79E897E3C61F9 FOREIGN KEY (owner_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE covoiturage ADD CONSTRAINT FK_28C79E897834C803 FOREIGN KEY (vehicules_id_id) REFERENCES vehicule (id)');
        $this->addSql('ALTER TABLE vehicule ADD CONSTRAINT FK_292FFF1D4200BD99 FOREIGN KEY (users_fk_id) REFERENCES user (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE avis DROP FOREIGN KEY FK_8F91ABF04200BD99');
        $this->addSql('ALTER TABLE covoiturage DROP FOREIGN KEY FK_28C79E897E3C61F9');
        $this->addSql('ALTER TABLE covoiturage DROP FOREIGN KEY FK_28C79E897834C803');
        $this->addSql('ALTER TABLE vehicule DROP FOREIGN KEY FK_292FFF1D4200BD99');
        $this->addSql('DROP TABLE avis');
        $this->addSql('DROP TABLE covoiturage');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vehicule');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
