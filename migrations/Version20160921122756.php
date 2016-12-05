<?php

namespace App\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20160921122756 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE howdo_document (id INT AUTO_INCREMENT NOT NULL, title LONGTEXT NOT NULL, document LONGTEXT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE howdo_index (id INT AUTO_INCREMENT NOT NULL, document_id INT DEFAULT NULL, key_phrase LONGTEXT NOT NULL, INDEX IDX_A7688F03C33F7837 (document_id), FULLTEXT INDEX IDX_A7688F03A9720750 (key_phrase), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('CREATE TABLE howdo_request (id INT AUTO_INCREMENT NOT NULL, searched_query LONGTEXT NOT NULL, description LONGTEXT NOT NULL, votes INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE howdo_index ADD CONSTRAINT FK_A7688F03C33F7837 FOREIGN KEY (document_id) REFERENCES howdo_document (id)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE howdo_index DROP FOREIGN KEY FK_A7688F03C33F7837');
        $this->addSql('DROP TABLE howdo_document');
        $this->addSql('DROP TABLE howdo_index');
        $this->addSql('DROP TABLE howdo_request');
    }
}
