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
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            updated_at DATETIME NULL ,
            `setting_id` VARCHAR(10) NULL, 
            `name` VARCHAR(100) NULL, 
            `value_one` VARCHAR(255) NULL, 
            `status_one` TINYINT(1) NOT NULL DEFAULT '0',
            `value_two` VARCHAR(255) NULL, 
            `status_two` TINYINT(1) NOT NULL DEFAULT '0',
            `value_three` VARCHAR(255) NULL, 
            `status_three` TINYINT(1) NOT NULL DEFAULT '0',
            `value_four` VARCHAR(255) NULL, 
            `status_four` TINYINT(1) NOT NULL DEFAULT '0',
            `value_five` VARCHAR(255) NULL, 
            `status_five` TINYINT(1) NOT NULL DEFAULT '0',
            `value_six` VARCHAR(255) NULL, 
            `status_six` TINYINT(1) NOT NULL DEFAULT '0', 
            PRIMARY KEY (`id`),
            INDEX `name` (`name`)
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
