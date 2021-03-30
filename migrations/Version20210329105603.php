<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210329105603 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE enfermedad (id INT AUTO_INCREMENT NOT NULL, ficha_id INT DEFAULT NULL, nombre_e VARCHAR(30) NOT NULL, INDEX IDX_DDB8B3565030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE revisiones (id INT AUTO_INCREMENT NOT NULL, ficha_id INT DEFAULT NULL, fecha DATE NOT NULL, diagnostico VARCHAR(255) NOT NULL, INDEX IDX_9ACDBC515030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE vacunas (id INT AUTO_INCREMENT NOT NULL, ficha_id INT DEFAULT NULL, nombre_v VARCHAR(30) NOT NULL, previene VARCHAR(30) NOT NULL, fabricante VARCHAR(30) NOT NULL, INDEX IDX_A4AC27E95030B25F (ficha_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE enfermedad ADD CONSTRAINT FK_DDB8B3565030B25F FOREIGN KEY (ficha_id) REFERENCES ficha (id)');
        $this->addSql('ALTER TABLE revisiones ADD CONSTRAINT FK_9ACDBC515030B25F FOREIGN KEY (ficha_id) REFERENCES ficha (id)');
        $this->addSql('ALTER TABLE vacunas ADD CONSTRAINT FK_A4AC27E95030B25F FOREIGN KEY (ficha_id) REFERENCES ficha (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP TABLE enfermedad');
        $this->addSql('DROP TABLE revisiones');
        $this->addSql('DROP TABLE vacunas');
    }
}
