<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20200430004235 extends AbstractMigration
{
    public function getDescription() : string
    {
        return '';
    }

    public function up(Schema $schema) : void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('CREATE TABLE semester (id INT AUTO_INCREMENT NOT NULL, start_date DATE NOT NULL, end_date DATE NOT NULL, name VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE week (id INT AUTO_INCREMENT NOT NULL, type INT NOT NULL, monday DATETIME NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE day (id INT AUTO_INCREMENT NOT NULL, number INT NOT NULL, name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, students_group_id INT DEFAULT NULL, username VARCHAR(180) NOT NULL, roles JSON NOT NULL, password VARCHAR(255) NOT NULL, UNIQUE INDEX UNIQ_8D93D649F85E0677 (username), INDEX IDX_8D93D649E29BBEF9 (students_group_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE content (id INT AUTO_INCREMENT NOT NULL, title VARCHAR(100) NOT NULL, text LONGTEXT DEFAULT NULL, type INT NOT NULL, image VARCHAR(255) DEFAULT NULL, files LONGTEXT DEFAULT NULL COMMENT \'(DC2Type:array)\', link VARCHAR(255) DEFAULT NULL, slug VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE lesson (id INT AUTO_INCREMENT NOT NULL, student_group_id INT NOT NULL, semester_id INT NOT NULL, day_of_week_id INT NOT NULL, subject LONGTEXT NOT NULL, teacher VARCHAR(255) DEFAULT NULL, auditory VARCHAR(255) DEFAULT NULL, type INT NOT NULL, type_of_week INT NOT NULL, INDEX IDX_F87474F34DDF95DC (student_group_id), INDEX IDX_F87474F34A798B6F (semester_id), INDEX IDX_F87474F3139A4A41 (day_of_week_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE faculty (id INT AUTO_INCREMENT NOT NULL, name VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE students_group (id INT AUTO_INCREMENT NOT NULL, faculty_id INT NOT NULL, name VARCHAR(255) NOT NULL, course INT NOT NULL, number INT NOT NULL, INDEX IDX_61D32331680CAB68 (faculty_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE user ADD CONSTRAINT FK_8D93D649E29BBEF9 FOREIGN KEY (students_group_id) REFERENCES students_group (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F34DDF95DC FOREIGN KEY (student_group_id) REFERENCES students_group (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F34A798B6F FOREIGN KEY (semester_id) REFERENCES semester (id)');
        $this->addSql('ALTER TABLE lesson ADD CONSTRAINT FK_F87474F3139A4A41 FOREIGN KEY (day_of_week_id) REFERENCES day (id)');
        $this->addSql('ALTER TABLE students_group ADD CONSTRAINT FK_61D32331680CAB68 FOREIGN KEY (faculty_id) REFERENCES faculty (id)');
    }

    public function down(Schema $schema) : void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->abortIf($this->connection->getDatabasePlatform()->getName() !== 'mysql', 'Migration can only be executed safely on \'mysql\'.');

        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F34A798B6F');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F3139A4A41');
        $this->addSql('ALTER TABLE students_group DROP FOREIGN KEY FK_61D32331680CAB68');
        $this->addSql('ALTER TABLE user DROP FOREIGN KEY FK_8D93D649E29BBEF9');
        $this->addSql('ALTER TABLE lesson DROP FOREIGN KEY FK_F87474F34DDF95DC');
        $this->addSql('DROP TABLE semester');
        $this->addSql('DROP TABLE week');
        $this->addSql('DROP TABLE day');
        $this->addSql('DROP TABLE user');
        $this->addSql('DROP TABLE content');
        $this->addSql('DROP TABLE lesson');
        $this->addSql('DROP TABLE faculty');
        $this->addSql('DROP TABLE students_group');
    }
}
