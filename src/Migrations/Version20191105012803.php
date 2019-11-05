<?php

declare(strict_types=1);

namespace DoctrineMigrations;

use Doctrine\DBAL\Schema\Schema;
use Doctrine\DBAL\Types\Types;
use Doctrine\Migrations\AbstractMigration;

/**
 * Migration: Modify table Users
 */
final class Version20191105012803 extends AbstractMigration
{
    /**
     * @return string
     */
    public function getDescription() : string
    {
        return 'Modify table Users. Add ObjectValue of UserInvoice';
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\DBALException
     */
    public function up(Schema $schema) : void
    {
        $table = $schema->getTable('users');
        $table->addColumn(
            'user_invoice_account',
            Types::STRING,
            ['length' => 255, 'default' => '', 'notnull' => true]
        );
        $table->addColumn(
            'user_invoice_owner',
            Types::STRING,
            ['length' => 255, 'default' => '', 'notnull' => true]
        );
    }

    /**
     * @param Schema $schema
     * @throws \Doctrine\DBAL\DBALException
     */
    public function down(Schema $schema) : void
    {
        $table = $schema->getTable('users');
        $table->dropColumn('user_invoice_account');
        $table->dropColumn('user_invoice_owner');
    }
}
