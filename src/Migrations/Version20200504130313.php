<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200504130313 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('ALTER TABLE question_historic ADD question_id INT NOT NULL');
        $this->addSql('ALTER TABLE question_historic ADD change_date TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL');
        $this->addSql('ALTER TABLE question_historic ADD field_name VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE question_historic ADD changed_from VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE question_historic ADD changed_to VARCHAR(255) NOT NULL');
        $this->addSql('ALTER TABLE question_historic DROP title');
        $this->addSql('ALTER TABLE question_historic DROP status');
        $this->addSql('ALTER TABLE question_historic DROP updated');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf('postgresql' !== $this->connection->getDatabasePlatform()->getName(), 'Migration can only be executed safely on \'postgresql\'.');

        $this->addSql('CREATE SCHEMA public');
        $this->addSql('ALTER TABLE question_historic ADD title VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question_historic ADD status VARCHAR(255) DEFAULT NULL');
        $this->addSql('ALTER TABLE question_historic ADD updated TIMESTAMP(0) WITHOUT TIME ZONE DEFAULT NULL');
        $this->addSql('ALTER TABLE question_historic DROP question_id');
        $this->addSql('ALTER TABLE question_historic DROP change_date');
        $this->addSql('ALTER TABLE question_historic DROP field_name');
        $this->addSql('ALTER TABLE question_historic DROP changed_from');
        $this->addSql('ALTER TABLE question_historic DROP changed_to');
    }
}
