<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\Migrations\AbstractMigration;

/**
 * Auto-generated Migration: Please modify to your needs!
 */
final class Version20221016181458 extends AbstractMigration
{
    public function getDescription(): string
    {
        return '';
    }

    public function up(Schema $schema): void
    {
        // this up() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permissions ADD users_id INT DEFAULT NULL, ADD structures_id INT DEFAULT NULL');
        $this->addSql('ALTER TABLE permissions ADD CONSTRAINT FK_2DEDCC6F67B3B43D FOREIGN KEY (users_id) REFERENCES users (id)');
        $this->addSql('ALTER TABLE permissions ADD CONSTRAINT FK_2DEDCC6F9D3ED38D FOREIGN KEY (structures_id) REFERENCES structures (id)');
        $this->addSql('CREATE INDEX IDX_2DEDCC6F67B3B43D ON permissions (users_id)');
        $this->addSql('CREATE INDEX IDX_2DEDCC6F9D3ED38D ON permissions (structures_id)');
    }

    public function down(Schema $schema): void
    {
        // this down() migration is auto-generated, please modify it to your needs
        $this->addSql('ALTER TABLE permissions DROP FOREIGN KEY FK_2DEDCC6F67B3B43D');
        $this->addSql('ALTER TABLE permissions DROP FOREIGN KEY FK_2DEDCC6F9D3ED38D');
        $this->addSql('DROP INDEX IDX_2DEDCC6F67B3B43D ON permissions');
        $this->addSql('DROP INDEX IDX_2DEDCC6F9D3ED38D ON permissions');
        $this->addSql('ALTER TABLE permissions DROP users_id, DROP structures_id');
    }
}
