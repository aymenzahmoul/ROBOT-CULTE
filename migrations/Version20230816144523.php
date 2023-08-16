<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230816144523 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE contribution (id INT AUTO_INCREMENT NOT NULL, id_projet_id INT DEFAULT NULL, montant DOUBLE PRECISION NOT NULL, date DATE NOT NULL, type_de_contribution VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, INDEX IDX_EA351E1580F43E55 (id_projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE donateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE information (id INT AUTO_INCREMENT NOT NULL, maison_de_culte_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, INDEX IDX_29791883681021BB (maison_de_culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE maison_de_culte (id INT AUTO_INCREMENT NOT NULL, idmaison_de_culte_id INT DEFAULT NULL, responsable_maison_de_culte_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, responsable VARCHAR(255) NOT NULL, INDEX IDX_C6A8300C5582FF4C (idmaison_de_culte_id), INDEX IDX_C6A8300CA091A39C (responsable_maison_de_culte_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE projet (id INT AUTO_INCREMENT NOT NULL, id_maison_de_culte_id INT DEFAULT NULL, id_statut_id INT DEFAULT NULL, id_donateur_id INT DEFAULT NULL, titre VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, montant DOUBLE PRECISION NOT NULL, date_debut DATE NOT NULL, date_fin DATE NOT NULL, statut VARCHAR(255) NOT NULL, INDEX IDX_50159CA9EB329314 (id_maison_de_culte_id), UNIQUE INDEX UNIQ_50159CA976158423 (id_statut_id), INDEX IDX_50159CA9128E4D14 (id_donateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE role (id INT AUTO_INCREMENT NOT NULL, utilisateur_id INT DEFAULT NULL, visiteur VARCHAR(255) NOT NULL, admins VARCHAR(255) NOT NULL, donateur VARCHAR(255) NOT NULL, INDEX IDX_57698A6AFB88E14F (utilisateur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statut (id INT AUTO_INCREMENT NOT NULL, projet_id INT DEFAULT NULL, statistique VARCHAR(255) NOT NULL, en_cours VARCHAR(255) NOT NULL, terminer VARCHAR(255) NOT NULL, suspendu VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_E564F0BFC18272 (projet_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE utilisateur (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, adresse VARCHAR(255) NOT NULL, email VARCHAR(255) NOT NULL, role VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE contribution ADD CONSTRAINT FK_EA351E1580F43E55 FOREIGN KEY (id_projet_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE information ADD CONSTRAINT FK_29791883681021BB FOREIGN KEY (maison_de_culte_id) REFERENCES maison_de_culte (id)');
        $this->addSql('ALTER TABLE maison_de_culte ADD CONSTRAINT FK_C6A8300C5582FF4C FOREIGN KEY (idmaison_de_culte_id) REFERENCES maison_de_culte (id)');
        $this->addSql('ALTER TABLE maison_de_culte ADD CONSTRAINT FK_C6A8300CA091A39C FOREIGN KEY (responsable_maison_de_culte_id) REFERENCES `admin` (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9EB329314 FOREIGN KEY (id_maison_de_culte_id) REFERENCES maison_de_culte (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA976158423 FOREIGN KEY (id_statut_id) REFERENCES projet (id)');
        $this->addSql('ALTER TABLE projet ADD CONSTRAINT FK_50159CA9128E4D14 FOREIGN KEY (id_donateur_id) REFERENCES donateur (id)');
        $this->addSql('ALTER TABLE role ADD CONSTRAINT FK_57698A6AFB88E14F FOREIGN KEY (utilisateur_id) REFERENCES utilisateur (id)');
        $this->addSql('ALTER TABLE statut ADD CONSTRAINT FK_E564F0BFC18272 FOREIGN KEY (projet_id) REFERENCES projet (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE contribution DROP FOREIGN KEY FK_EA351E1580F43E55');
        $this->addSql('ALTER TABLE information DROP FOREIGN KEY FK_29791883681021BB');
        $this->addSql('ALTER TABLE maison_de_culte DROP FOREIGN KEY FK_C6A8300C5582FF4C');
        $this->addSql('ALTER TABLE maison_de_culte DROP FOREIGN KEY FK_C6A8300CA091A39C');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9EB329314');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA976158423');
        $this->addSql('ALTER TABLE projet DROP FOREIGN KEY FK_50159CA9128E4D14');
        $this->addSql('ALTER TABLE role DROP FOREIGN KEY FK_57698A6AFB88E14F');
        $this->addSql('ALTER TABLE statut DROP FOREIGN KEY FK_E564F0BFC18272');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE contribution');
        $this->addSql('DROP TABLE donateur');
        $this->addSql('DROP TABLE information');
        $this->addSql('DROP TABLE maison_de_culte');
        $this->addSql('DROP TABLE projet');
        $this->addSql('DROP TABLE role');
        $this->addSql('DROP TABLE statut');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE utilisateur');
    }
}
