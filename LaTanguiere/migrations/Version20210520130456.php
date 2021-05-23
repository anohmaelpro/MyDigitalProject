<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20210520130456 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('CREATE TABLE activity (id INT AUTO_INCREMENT NOT NULL, activity_name VARCHAR(255) NOT NULL, activity_description VARCHAR(255) NOT NULL, activity_picture VARCHAR(255) DEFAULT NULL, activity_address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE comment (id INT AUTO_INCREMENT NOT NULL, comment_room_id INT DEFAULT NULL, comment_last_reservation_num INT DEFAULT NULL, comment_user_name VARCHAR(255) DEFAULT NULL, comment_content VARCHAR(255) DEFAULT NULL, comment_room_cleanliness INT DEFAULT NULL, comment_room_location INT DEFAULT NULL, comment_room_quality_price INT DEFAULT NULL, comment_room_services INT DEFAULT NULL, INDEX IDX_9474526CA7641283 (comment_room_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE data_website (id INT AUTO_INCREMENT NOT NULL, home_picture VARCHAR(255) DEFAULT NULL, hotel_address VARCHAR(255) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE equipment (id INT AUTO_INCREMENT NOT NULL, equipment_name VARCHAR(50) NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE picture (id INT AUTO_INCREMENT NOT NULL, picture_name VARCHAR(255) NOT NULL, picture_link VARCHAR(255) NOT NULL, pricture_description VARCHAR(255) DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE reservation (id INT AUTO_INCREMENT NOT NULL, reservation_room_id INT DEFAULT NULL, user_id INT DEFAULT NULL, reservation_start_date VARCHAR(50) NOT NULL, reservation_end_date VARCHAR(50) NOT NULL, reservation_num INT NOT NULL, INDEX IDX_42C849553382CB16 (reservation_room_id), INDEX IDX_42C84955A76ED395 (user_id), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room (id INT AUTO_INCREMENT NOT NULL, room_name VARCHAR(50) NOT NULL, room_picture VARCHAR(255) DEFAULT NULL, room_description VARCHAR(255) DEFAULT NULL, room_mini_description VARCHAR(255) DEFAULT NULL, room_note INT DEFAULT NULL, room_price DOUBLE PRECISION NOT NULL, room_in_reservation TINYINT(1) NOT NULL, room_last_num_reservation INT DEFAULT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE room_equipment (room_id INT NOT NULL, equipment_id INT NOT NULL, INDEX IDX_4F9135EA54177093 (room_id), INDEX IDX_4F9135EA517FE9FE (equipment_id), PRIMARY KEY(room_id, equipment_id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE statistics (id INT AUTO_INCREMENT NOT NULL, nbr_reservation INT NOT NULL, PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('CREATE TABLE user (id INT AUTO_INCREMENT NOT NULL, email VARCHAR(180) NOT NULL, roles LONGTEXT NOT NULL COMMENT \'(DC2Type:json)\', password VARCHAR(255) NOT NULL, user_name VARCHAR(255) NOT NULL, user_lastname VARCHAR(255) NOT NULL, user_statut VARCHAR(10) NOT NULL, user_is_old_customer TINYINT(1) NOT NULL, user_last_reservation_num INT DEFAULT NULL, UNIQUE INDEX UNIQ_8D93D649E7927C74 (email), PRIMARY KEY(id)) DEFAULT CHARACTER SET utf8mb4 COLLATE `utf8mb4_unicode_ci` ENGINE = InnoDB');
        $this->addSql('ALTER TABLE comment ADD CONSTRAINT FK_9474526CA7641283 FOREIGN KEY (comment_room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C849553382CB16 FOREIGN KEY (reservation_room_id) REFERENCES room (id)');
        $this->addSql('ALTER TABLE reservation ADD CONSTRAINT FK_42C84955A76ED395 FOREIGN KEY (user_id) REFERENCES user (id)');
        $this->addSql('ALTER TABLE room_equipment ADD CONSTRAINT FK_4F9135EA54177093 FOREIGN KEY (room_id) REFERENCES room (id) ON DELETE CASCADE');
        $this->addSql('ALTER TABLE room_equipment ADD CONSTRAINT FK_4F9135EA517FE9FE FOREIGN KEY (equipment_id) REFERENCES equipment (id) ON DELETE CASCADE');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE room_equipment DROP FOREIGN KEY FK_4F9135EA517FE9FE');
        $this->addSql('ALTER TABLE comment DROP FOREIGN KEY FK_9474526CA7641283');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C849553382CB16');
        $this->addSql('ALTER TABLE room_equipment DROP FOREIGN KEY FK_4F9135EA54177093');
        $this->addSql('ALTER TABLE reservation DROP FOREIGN KEY FK_42C84955A76ED395');
        $this->addSql('DROP TABLE activity');
        $this->addSql('DROP TABLE comment');
        $this->addSql('DROP TABLE data_website');
        $this->addSql('DROP TABLE equipment');
        $this->addSql('DROP TABLE picture');
        $this->addSql('DROP TABLE reservation');
        $this->addSql('DROP TABLE room');
        $this->addSql('DROP TABLE room_equipment');
        $this->addSql('DROP TABLE statistics');
        $this->addSql('DROP TABLE user');
    }
}
