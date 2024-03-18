<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240307102016 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apply ADD candidat_id INT DEFAULT NULL, ADD job_offer_id INT DEFAULT NULL, ADD status_id INT DEFAULT NULL, ADD created_at DATETIME NOT NULL COMMENT \'(DC2Type:datetime_immutable)\', ADD admin_note LONGTEXT DEFAULT NULL');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F8D0EB82 FOREIGN KEY (candidat_id) REFERENCES candidat (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F3481D195 FOREIGN KEY (job_offer_id) REFERENCES job_offer (id)');
        $this->addSql('ALTER TABLE apply ADD CONSTRAINT FK_BD2F8C1F6BF700BD FOREIGN KEY (status_id) REFERENCES status (id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F8D0EB82 ON apply (candidat_id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F3481D195 ON apply (job_offer_id)');
        $this->addSql('CREATE INDEX IDX_BD2F8C1F6BF700BD ON apply (status_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F8D0EB82');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F3481D195');
        $this->addSql('ALTER TABLE apply DROP FOREIGN KEY FK_BD2F8C1F6BF700BD');
        $this->addSql('DROP INDEX IDX_BD2F8C1F8D0EB82 ON apply');
        $this->addSql('DROP INDEX IDX_BD2F8C1F3481D195 ON apply');
        $this->addSql('DROP INDEX IDX_BD2F8C1F6BF700BD ON apply');
        $this->addSql('ALTER TABLE apply DROP candidat_id, DROP job_offer_id, DROP status_id, DROP created_at, DROP admin_note');
    }
}
