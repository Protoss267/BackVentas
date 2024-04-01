<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240331051946 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('DROP INDEX idx_1483a5e98d93d649');
        $this->addSql('DROP INDEX search_idx');
        $this->addSql('ALTER TABLE users RENAME COLUMN "user" TO nickname');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON users (nickname)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP INDEX search_idx');
        $this->addSql('ALTER TABLE users RENAME COLUMN nickname TO "user"');
        $this->addSql('CREATE INDEX idx_1483a5e98d93d649 ON users ("user")');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON users ("user")');
    }
}
