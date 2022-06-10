<?php

declare(strict_types=1);

/**
 * Class n0004_categories
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0004_categories
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE `categories` ( 
            `id` INT NOT NULL AUTO_INCREMENT ,
            `name` VARCHAR(70) NULL ,
            PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE categories;";
        $db->_dbh->exec($SQL);
    }
}
