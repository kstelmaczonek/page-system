<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20201206123642 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE page (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(255) NOT NULL, url VARCHAR(255) NOT NULL, content LONGTEXT NOT NULL, discr VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_140AB620F47645AE (url), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_article (id INT NOT NULL, publish_data DATETIME NOT NULL, image VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE page_static (id INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE page_article ADD CONSTRAINT FK_F85AE5F3BF396750 FOREIGN KEY (id) REFERENCES page (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE page_static ADD CONSTRAINT FK_EF16DE3BBF396750 FOREIGN KEY (id) REFERENCES page (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE page_article DROP FOREIGN KEY FK_F85AE5F3BF396750');
        $this->addSql('ALTER TABLE page_static DROP FOREIGN KEY FK_EF16DE3BBF396750');
        $this->addSql('DROP TABLE page');
        $this->addSql('DROP TABLE page_article');
        $this->addSql('DROP TABLE page_static');
    }
}
