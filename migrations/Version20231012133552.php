<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20231012133552 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE label (id INT AUTO_INCREMENT NOT NULL, album_id INT DEFAULT NULL, nom VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, annee_creation INT NOT NULL, type_label VARCHAR(255) NOT NULL, logo VARCHAR(255) DEFAULT NULL, INDEX IDX_EA750E81137ABCF (album_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE labell (id INT AUTO_INCREMENT NOT NULL, nom VARCHAR(255) NOT NULL, description VARCHAR(255) NOT NULL, annee_creation INT NOT NULL, type VARCHAR(255) NOT NULL, logo VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE label ADD CONSTRAINT FK_EA750E81137ABCF FOREIGN KEY (album_id) REFERENCES album (id)');
        $this->addSql('ALTER TABLE album ADD labell_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE album ADD CONSTRAINT FK_39986E43B03DCBCB FOREIGN KEY (labell_id) REFERENCES labell (id)');
        $this->addSql('CREATE INDEX IDX_39986E43B03DCBCB ON album (labell_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE album DROP FOREIGN KEY FK_39986E43B03DCBCB');
        $this->addSql('ALTER TABLE label DROP FOREIGN KEY FK_EA750E81137ABCF');
        $this->addSql('DROP TABLE label');
        $this->addSql('DROP TABLE labell');
        $this->addSql('DROP INDEX IDX_39986E43B03DCBCB ON album');
        $this->addSql('ALTER TABLE album DROP labell_id');
    }
}
