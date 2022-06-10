<?php

declare(strict_types=1);

/**
 * Class n0005_regions
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0005_regions
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE `regions` ( 
            `id` INT NOT NULL AUTO_INCREMENT ,
            `name` VARCHAR(70) NULL ,
            PRIMARY KEY (`id`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE regions;";
        $db->_dbh->exec($SQL);
    }
}
