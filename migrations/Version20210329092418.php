<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329092418 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE animales (id INT AUTO_INCREMENT NOT NULL, adoptador_id INT DEFAULT NULL, especie VARCHAR(30) NOT NULL, raza VARCHAR(30) NOT NULL, tamano VARCHAR(30) NOT NULL, edad INT NOT NULL, sexo VARCHAR(30) NOT NULL, nombre_a VARCHAR(30) NOT NULL, INDEX IDX_FF62B8DC2D8A9E44 (adoptador_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, username VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE animales ADD CONSTRAINT FK_FF62B8DC2D8A9E44 FOREIGN KEY (adoptador_id) REFERENCES user (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE animales DROP FOREIGN KEY FK_FF62B8DC2D8A9E44');
        $this->addSql('DROP TABLE animales');
        $this->addSql('DROP TABLE user');
    }
}
