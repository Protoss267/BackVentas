<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240330072942 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE users (id VARCHAR(36) NOT NULL, "user" VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, created_on TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_on TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX IDX_1483A5E98D93D649 ON users ("user")');
        $this->addSql('CREATE UNIQUE INDEX search_idx ON users ("user")');
        $this->addSql('DROP TABLE "user"');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('CREATE TABLE "user" (id VARCHAR(36) NOT NULL, "user" VARCHAR(255) NOT NULL, password VARCHAR(255) NOT NULL, name VARCHAR(255) NOT NULL, created_on TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, update_on TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE UNIQUE INDEX u_user ON "user" ("user")');
        $this->addSql('CREATE INDEX idx_user ON "user" ("user")');
        $this->addSql('DROP TABLE users');
    }
}
