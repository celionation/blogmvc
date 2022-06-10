<?php

declare(strict_types=1);

/**
 * Class n0007_settings
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0008_contact_messages
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE contact_messages ( 
            id INT NOT NULL AUTO_INCREMENT ,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            updated_at DATETIME NULL ,
            contact_id VARCHAR(60) NULL,
            fullname VARCHAR(100) NULL,
            `email` VARCHAR(255) NULL ,
            `subject` VARCHAR(100) NULL ,
            `message` TEXT NULL ,
            PRIMARY KEY (`id`),
            INDEX `email` (`email`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE contact_messages;";
        $db->_dbh->exec($SQL);
    }
}
