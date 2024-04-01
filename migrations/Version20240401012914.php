<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20240401012914 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE producto (id VARCHAR(36) NOT NULL, codigo VARCHAR(200) NOT NULL, nombre VARCHAR(255) NOT NULL, precio_i NUMERIC(10, 2) NOT NULL, precio_f NUMERIC(10, 2) NOT NULL, fecha_e TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, existencia INT NOT NULL, actualizado TIMESTAMP(0) WITHOUT TIME ZONE NOT NULL, PRIMARY KEY(id))');
        $this->addSql('CREATE INDEX cod_idx ON producto (codigo)');
        $this->addSql('CREATE INDEX name_idx ON producto (nombre)');
        $this->addSql('CREATE UNIQUE INDEX U_cod ON producto (codigo)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE SCHEMA public');
        $this->addSql('DROP TABLE producto');
    }
}
