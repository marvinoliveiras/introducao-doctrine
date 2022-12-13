<?php

declare(strict_types=1);

namespace MyProject\Migrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221213211404 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        //$this->addSql('CREATE TABLE test (id INTEGER PRIMARY KEY, test_column VARCHAR(255), PRIMARY KEY (id)');
        $table = $schema->createTable('test');
        $table->addColumn('id', 'integer')
            ->setAutoincrement(true);
        $table->setPrimaryKey(['id']);
        $table->addColumn('test_column', 'string');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $schema->dropTable('test');
    }
}
