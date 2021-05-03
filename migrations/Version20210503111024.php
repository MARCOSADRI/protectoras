<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210503111024 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animales (id INT AUTO_INCREMENT NOT NULL, especie_id INT NOT NULL, raza_id INT NOT NULL, tamano_id INT NOT NULL, ficha_id INT NOT NULL, adoptador_id INT DEFAULT NULL, sexo VARCHAR(20) NOT NULL, edad INT NOT NULL, nombre_a VARCHAR(50) NOT NULL, foto VARCHAR(255) DEFAULT NULL, INDEX IDX_FF62B8DCE70ED95B (especie_id), INDEX IDX_FF62B8DC8CCBB6A9 (raza_id), INDEX IDX_FF62B8DCA289E5D3 (tamano_id), UNIQUE INDEX UNIQ_FF62B8DC5030B25F (ficha_id), INDEX IDX_FF62B8DC2D8A9E44 (adoptador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE enfermedades (id INT AUTO_INCREMENT NOT NULL, ficha_id INT NOT NULL, enfermedad VARCHAR(50) NOT NULL, INDEX IDX_2ED668C75030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE especies (id INT AUTO_INCREMENT NOT NULL, especie VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE fichas (id INT AUTO_INCREMENT NOT NULL, esterilizado TINYINT(1) NOT NULL, fallecido TINYINT(1) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE razas (id INT AUTO_INCREMENT NOT NULL, raza VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revisiones (id INT AUTO_INCREMENT NOT NULL, ficha_id INT NOT NULL, fecha DATE NOT NULL, diagnostico VARCHAR(255) NOT NULL, INDEX IDX_9ACDBC515030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE tamanos (id INT AUTO_INCREMENT NOT NULL, tamano VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacunas (id INT AUTO_INCREMENT NOT NULL, ficha_id INT NOT NULL, nombre_v VARCHAR(50) NOT NULL, previene VARCHAR(50) NOT NULL, fabricante VARCHAR(50) NOT NULL, INDEX IDX_A4AC27E95030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DCE70ED95B FOREIGN KEY (especie_id) REFERENCES especies (id)');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DC8CCBB6A9 FOREIGN KEY (raza_id) REFERENCES razas (id)');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DCA289E5D3 FOREIGN KEY (tamano_id) REFERENCES tamanos (id)');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DC5030B25F FOREIGN KEY (ficha_id) REFERENCES fichas (id)');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DC2D8A9E44 FOREIGN KEY (adoptador_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE enfermedades ADD CONSTRAINT FK_2ED668C75030B25F FOREIGN KEY (ficha_id) REFERENCES fichas (id)');
        $this->addSql('ALTER TABLE revisiones ADD CONSTRAINT FK_9ACDBC515030B25F FOREIGN KEY (ficha_id) REFERENCES fichas (id)');
        $this->addSql('ALTER TABLE vacunas ADD CONSTRAINT FK_A4AC27E95030B25F FOREIGN KEY (ficha_id) REFERENCES fichas (id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DCE70ED95B');
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DC5030B25F');
        $this->addSql('ALTER TABLE enfermedades DROP FOREIGN KEY FK_2ED668C75030B25F');
        $this->addSql('ALTER TABLE revisiones DROP FOREIGN KEY FK_9ACDBC515030B25F');
        $this->addSql('ALTER TABLE vacunas DROP FOREIGN KEY FK_A4AC27E95030B25F');
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DC8CCBB6A9');
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DCA289E5D3');
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DC2D8A9E44');
        $this->addSql('DROP TABLE animales');
        $this->addSql('DROP TABLE enfermedades');
        $this->addSql('DROP TABLE especies');
        $this->addSql('DROP TABLE fichas');
        $this->addSql('DROP TABLE razas');
        $this->addSql('DROP TABLE revisiones');
        $this->addSql('DROP TABLE tamanos');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE vacunas');
    }
}
