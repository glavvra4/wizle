<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

final class Version20231217204759 extends AbstractMigration
{
    public function getDescription(): string
    {
        return 'Create customers table';
    }

    public function up(Schema $schema): void
    {
        $this->addSql(<<<SQL
CREATE SEQUENCE "customer_id_seq" INCREMENT BY 1 MINVALUE 1 START 1;
SQL);
        $this->addSql(<<<SQL
CREATE TABLE "customer"
(
    id INT NOT NULL,
    telegram_id INT NOT NULL,
    current_place VARCHAR(255) NOT NULL,
    PRIMARY KEY(id)
);
SQL);
    }

    public function down(Schema $schema): void
    {
        $this->addSql(<<<SQL
CREATE SCHEMA public;
SQL);
        $this->addSql(<<<SQL
DROP SEQUENCE "customer_id_seq" CASCADE;
SQL);
        $this->addSql(<<<SQL
DROP TABLE "customer";
SQL);
    }
}
