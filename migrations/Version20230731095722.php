<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20230731095722 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE `admin` (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE anne (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, anne DATE NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE classe_search (id INT AUTO_INCREMENT NOT NULL, classe_id INT DEFAULT NULL, INDEX IDX_9CBB146D8F5EA509 (classe_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE directeur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, diplome VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE eleve (id INT NOT NULL, classe_id INT DEFAULT NULL, anne_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATE NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, description VARCHAR(1000) NOT NULL, sexe VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, INDEX IDX_ECA105F78F5EA509 (classe_id), INDEX IDX_ECA105F731A9243A (anne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE emploi_temps (id INT AUTO_INCREMENT NOT NULL, matiere_id INT DEFAULT NULL, professeur_id INT DEFAULT NULL, classe_id INT DEFAULT NULL, salle_id INT DEFAULT NULL, jour VARCHAR(255) NOT NULL, heure_debut TIME NOT NULL, heure_fin TIME NOT NULL, INDEX IDX_50D1B05EF46CD258 (matiere_id), INDEX IDX_50D1B05EBAB22EE9 (professeur_id), INDEX IDX_50D1B05E8F5EA509 (classe_id), INDEX IDX_50D1B05EDC304035 (salle_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE employer (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE matiere (id INT AUTO_INCREMENT NOT NULL, professeur_id INT DEFAULT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, INDEX IDX_9014574ABAB22EE9 (professeur_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE note (id INT AUTO_INCREMENT NOT NULL, eleve_id INT DEFAULT NULL, matiere_id INT DEFAULT NULL, classe_id INT DEFAULT NULL, anne_id INT DEFAULT NULL, type_evaluation VARCHAR(255) NOT NULL, note DOUBLE PRECISION NOT NULL, trimestre INT NOT NULL, coefficient INT NOT NULL, mention VARCHAR(255) NOT NULL, date DATETIME NOT NULL, date_miseajour DATETIME NOT NULL, INDEX IDX_CFBDFA14A6CC7B2 (eleve_id), INDEX IDX_CFBDFA14F46CD258 (matiere_id), INDEX IDX_CFBDFA148F5EA509 (classe_id), INDEX IDX_CFBDFA1431A9243A (anne_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE proffesseur (id INT NOT NULL, nom VARCHAR(255) NOT NULL, prenom VARCHAR(255) NOT NULL, date_naissance DATETIME NOT NULL, lieu_naissance VARCHAR(255) NOT NULL, numero VARCHAR(255) NOT NULL, adress VARCHAR(255) NOT NULL, domaine VARCHAR(255) NOT NULL, diplome VARCHAR(255) NOT NULL, sexe VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, security VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE salle (id INT AUTO_INCREMENT NOT NULL, code VARCHAR(255) NOT NULL, libelle VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE search (id INT AUTO_INCREMENT NOT NULL, recherche VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE `user` (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, fonction VARCHAR(255) NOT NULL, username VARCHAR(255) NOT NULL, confirm_password VARCHAR(255) DEFAULT NULL, image_name VARCHAR(255) DEFAULT NULL, updated_at DATETIME DEFAULT NULL, type VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE messenger_messages (id BIGINT AUTO_INCREMENT NOT NULL, body LONGTEXT NOT NULL, headers LONGTEXT NOT NULL, queue_name VARCHAR(190) NOT NULL, created_at DATETIME NOT NULL, available_at DATETIME NOT NULL, delivered_at DATETIME DEFAULT NULL, INDEX IDX_75EA56E0FB7336F0 (queue_name), INDEX IDX_75EA56E0E3BD61CE (available_at), INDEX IDX_75EA56E016BA31DB (delivered_at), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE `admin` ADD CONSTRAINT FK_880E0D76BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE classe_search ADD CONSTRAINT FK_9CBB146D8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE directeur ADD CONSTRAINT FK_937C8E43BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F78F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F731A9243A FOREIGN KEY (anne_id) REFERENCES anne (id)');
        $this->addSql('ALTER TABLE eleve ADD CONSTRAINT FK_ECA105F7BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE emploi_temps ADD CONSTRAINT FK_50D1B05EF46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE emploi_temps ADD CONSTRAINT FK_50D1B05EBAB22EE9 FOREIGN KEY (professeur_id) REFERENCES proffesseur (id)');
        $this->addSql('ALTER TABLE emploi_temps ADD CONSTRAINT FK_50D1B05E8F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE emploi_temps ADD CONSTRAINT FK_50D1B05EDC304035 FOREIGN KEY (salle_id) REFERENCES salle (id)');
        $this->addSql('ALTER TABLE employer ADD CONSTRAINT FK_DE4CF066BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE matiere ADD CONSTRAINT FK_9014574ABAB22EE9 FOREIGN KEY (professeur_id) REFERENCES proffesseur (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14A6CC7B2 FOREIGN KEY (eleve_id) REFERENCES eleve (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA14F46CD258 FOREIGN KEY (matiere_id) REFERENCES matiere (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA148F5EA509 FOREIGN KEY (classe_id) REFERENCES classe (id)');
        $this->addSql('ALTER TABLE note ADD CONSTRAINT FK_CFBDFA1431A9243A FOREIGN KEY (anne_id) REFERENCES anne (id)');
        $this->addSql('ALTER TABLE proffesseur ADD CONSTRAINT FK_27BFB7C0BF396750 FOREIGN KEY (id) REFERENCES `user` (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE `admin` DROP FOREIGN KEY FK_880E0D76BF396750');
        $this->addSql('ALTER TABLE classe_search DROP FOREIGN KEY FK_9CBB146D8F5EA509');
        $this->addSql('ALTER TABLE directeur DROP FOREIGN KEY FK_937C8E43BF396750');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F78F5EA509');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F731A9243A');
        $this->addSql('ALTER TABLE eleve DROP FOREIGN KEY FK_ECA105F7BF396750');
        $this->addSql('ALTER TABLE emploi_temps DROP FOREIGN KEY FK_50D1B05EF46CD258');
        $this->addSql('ALTER TABLE emploi_temps DROP FOREIGN KEY FK_50D1B05EBAB22EE9');
        $this->addSql('ALTER TABLE emploi_temps DROP FOREIGN KEY FK_50D1B05E8F5EA509');
        $this->addSql('ALTER TABLE emploi_temps DROP FOREIGN KEY FK_50D1B05EDC304035');
        $this->addSql('ALTER TABLE employer DROP FOREIGN KEY FK_DE4CF066BF396750');
        $this->addSql('ALTER TABLE matiere DROP FOREIGN KEY FK_9014574ABAB22EE9');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14A6CC7B2');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA14F46CD258');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA148F5EA509');
        $this->addSql('ALTER TABLE note DROP FOREIGN KEY FK_CFBDFA1431A9243A');
        $this->addSql('ALTER TABLE proffesseur DROP FOREIGN KEY FK_27BFB7C0BF396750');
        $this->addSql('DROP TABLE `admin`');
        $this->addSql('DROP TABLE anne');
        $this->addSql('DROP TABLE classe');
        $this->addSql('DROP TABLE classe_search');
        $this->addSql('DROP TABLE directeur');
        $this->addSql('DROP TABLE eleve');
        $this->addSql('DROP TABLE emploi_temps');
        $this->addSql('DROP TABLE employer');
        $this->addSql('DROP TABLE matiere');
        $this->addSql('DROP TABLE note');
        $this->addSql('DROP TABLE proffesseur');
        $this->addSql('DROP TABLE salle');
        $this->addSql('DROP TABLE search');
        $this->addSql('DROP TABLE `user`');
        $this->addSql('DROP TABLE messenger_messages');
    }
}
