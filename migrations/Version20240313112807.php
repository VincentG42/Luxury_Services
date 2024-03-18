<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240313112807 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471D583E641');
        $this->addSql('DROP INDEX UNIQ_6AB5B471D583E641 ON candidat');
        $this->addSql('ALTER TABLE candidat CHANGE profil_picture_id picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471EE45BDBF FOREIGN KEY (picture_id) REFERENCES media (id)');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471EE45BDBF ON candidat (picture_id)');
        $this->addSql('ALTER TABLE media ADD filename VARCHAR(255) NOT NULL, DROP url, DROP name');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE media ADD name VARCHAR(255) NOT NULL, CHANGE filename url VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE candidat DROP FOREIGN KEY FK_6AB5B471EE45BDBF');
        $this->addSql('DROP INDEX UNIQ_6AB5B471EE45BDBF ON candidat');
        $this->addSql('ALTER TABLE candidat CHANGE picture_id profil_picture_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE candidat ADD CONSTRAINT FK_6AB5B471D583E641 FOREIGN KEY (profil_picture_id) REFERENCES media (id) ON UPDATE NO ACTION ON DELETE NO ACTION');
        $this->addSql('CREATE UNIQUE INDEX UNIQ_6AB5B471D583E641 ON candidat (profil_picture_id)');
    }
}
