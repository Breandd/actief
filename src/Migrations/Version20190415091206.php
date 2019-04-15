<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20190415091206 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE cursus (id INT AUTO_INCREMENT NOT NULL, location_id INT DEFAULT NULL, leader_id INT DEFAULT NULL, name VARCHAR(255) NOT NULL, description LONGTEXT NOT NULL, min_participants INT NOT NULL, max_participants INT NOT NULL, price DOUBLE PRECISION NOT NULL, cursus_type VARCHAR(255) NOT NULL, INDEX IDX_255A0C364D218E (location_id), INDEX IDX_255A0C373154ED4 (leader_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE location (id INT AUTO_INCREMENT NOT NULL, adress VARCHAR(100) NOT NULL, number INT NOT NULL, max_people INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE ticket (id INT AUTO_INCREMENT NOT NULL, customer_id_id INT DEFAULT NULL, cursus_id_id INT DEFAULT NULL, amount INT NOT NULL, payed TINYINT(1) NOT NULL, INDEX IDX_97A0ADA3B171EB6C (customer_id_id), INDEX IDX_97A0ADA3ED70AAB9 (cursus_id_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE cursus ADD CONSTRAINT FK_255A0C364D218E FOREIGN KEY (location_id) REFERENCES location (id)');
        $this->addSql('ALTER TABLE cursus ADD CONSTRAINT FK_255A0C373154ED4 FOREIGN KEY (leader_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3B171EB6C FOREIGN KEY (customer_id_id) REFERENCES fos_user (id)');
        $this->addSql('ALTER TABLE ticket ADD CONSTRAINT FK_97A0ADA3ED70AAB9 FOREIGN KEY (cursus_id_id) REFERENCES cursus (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE ticket DROP FOREIGN KEY FK_97A0ADA3ED70AAB9');
        $this->addSql('ALTER TABLE cursus DROP FOREIGN KEY FK_255A0C364D218E');
        $this->addSql('DROP TABLE cursus');
        $this->addSql('DROP TABLE location');
        $this->addSql('DROP TABLE ticket');
    }
}
