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
            `option` VARCHAR(100) NULL, 
            `value` VARCHAR(255) NULL,
            blocked VARCHAR(10) NOT NULL DEFAULT 'Activate' ,
            PRIMARY KEY (`id`),
            INDEX `option` (`option`)
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
