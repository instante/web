<?php

namespace App\Doctrine\Migrations;

use Doctrine\DBAL\Migrations\AbstractMigration;
use Doctrine\DBAL\Schema\Schema;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
class Version20170106110825 extends AbstractMigration
{
    /**
     * @param Schema $schema
     */
    public function up(Schema $schema)
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE howdo_keyword (id INT AUTO_INCREMENT NOT NULL, document_id INT DEFAULT NULL, keyword VARCHAR(255) NOT NULL, INDEX IDX_C6745EE8C33F7837 (document_id), FULLTEXT INDEX IDX_C6745EE85A93713B (keyword), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE howdo_keyword ADD CONSTRAINT FK_C6745EE8C33F7837 FOREIGN KEY (document_id) REFERENCES howdo_document (id)');
        $this->addSql('DROP TABLE howdo_index');
        $this->addSql('ALTER TABLE howdo_document CHANGE title title VARCHAR(255) NOT NULL');
        $this->addSql('CREATE FULLTEXT INDEX IDX_C72FEE372B36786B ON howdo_document (title)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_C72FEE37D8698A76 ON howdo_document (document)');
        $this->addSql('ALTER TABLE howdo_request ADD title VARCHAR(255) NOT NULL, DROP searched_query');
        $this->addSql('CREATE FULLTEXT INDEX IDX_A770A04C6DE44026 ON howdo_request (description)');
        $this->addSql('CREATE FULLTEXT INDEX IDX_A770A04C2B36786B ON howdo_request (title)');
    }

    /**
     * @param Schema $schema
     */
    public function down(Schema $schema)
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() != 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE howdo_index (id INT AUTO_INCREMENT NOT NULL, document_id INT DEFAULT NULL, key_phrase LONGTEXT NOT NULL COLLATE utf8_unicode_ci, INDEX IDX_A7688F03C33F7837 (document_id), FULLTEXT INDEX IDX_A7688F03A9720750 (key_phrase), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE = InnoDB');
        $this->addSql('ALTER TABLE howdo_index ADD CONSTRAINT FK_A7688F03C33F7837 FOREIGN KEY (document_id) REFERENCES howdo_document (id)');
        $this->addSql('DROP TABLE howdo_keyword');
        $this->addSql('DROP INDEX IDX_C72FEE372B36786B ON howdo_document');
        $this->addSql('DROP INDEX IDX_C72FEE37D8698A76 ON howdo_document');
        $this->addSql('ALTER TABLE howdo_document CHANGE title title LONGTEXT NOT NULL COLLATE utf8_unicode_ci');
        $this->addSql('DROP INDEX IDX_A770A04C6DE44026 ON howdo_request');
        $this->addSql('DROP INDEX IDX_A770A04C2B36786B ON howdo_request');
        $this->addSql('ALTER TABLE howdo_request ADD searched_query LONGTEXT NOT NULL COLLATE utf8_unicode_ci, DROP title');
    }
}
