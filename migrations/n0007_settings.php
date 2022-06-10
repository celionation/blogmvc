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

class n0007_settings
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE settings ( 
            id INT NOT NULL AUTO_INCREMENT,
            `manager` VARCHAR(100) NULL, 
            `description` VARCHAR(255) NULL, 
            `keywords` VARCHAR(255) NULL, 
            `sitename` VARCHAR(60) NULL, 
            `copyright` VARCHAR(255) NULL, 
            `logo` VARCHAR(255) NULL, 
            `facebook` VARCHAR(255) NULL, 
            `twitter` VARCHAR(255) NULL, 
            `instagram` VARCHAR(255) NULL, 
            `sms` VARCHAR(20) NULL, 
            `whatsapp` VARCHAR(20) NULL, 
            `email_dsn` VARCHAR(255) NULL, 
            `email_host` VARCHAR(255) NULL, 
            `email_port` VARCHAR(255) NULL, 
            `email_user` VARCHAR(255) NULL, 
            `email_pass` VARCHAR(255) NULL,
            `last_user_id` VARCHAR(255) NULL,
            `about_us` TEXT NULL,
            `mission_aim` VARCHAR(255) NULL,
            `about_founder` TEXT NULL,
            PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE settings;";
        $db->_dbh->exec($SQL);
    }
}
