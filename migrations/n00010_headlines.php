<?php

declare(strict_types=1);

/**
 * Class n00010_headlines
 *
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n00010_headlines
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE headlines ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NOT NULL , 
        `body` TEXT NOT NULL , 
        `status` TINYINT(1) NOT NULL DEFAULT '0' , 
        PRIMARY KEY (`id`)
        ) ENGINE = InnoDB";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE headlines;";
        $db->_dbh->exec($SQL);
    }
}