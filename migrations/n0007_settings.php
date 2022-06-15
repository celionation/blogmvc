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
            `name` VARCHAR(100) NULL, 
            `value` TEXT NULL, 
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
