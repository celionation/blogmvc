<?php

declare(strict_types=1);

/**
 * Class n00011_adverts
 *
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n00011_adverts
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE adverts ( 
        `id` INT NOT NULL AUTO_INCREMENT , 
        `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP , 
        `updated_at` DATETIME NOT NULL ,
        `name` VARCHAR(100) NOT NULL ,
        `ads_id` VARCHAR(10) NOT NULL , 
        `ads_img` VARCHAR(100) NOT NULL , 
        `ads_img_link` VARCHAR(255) NOT NULL , 
        `ads_link` VARCHAR(255) NOT NULL , 
        `ads_label` VARCHAR(60) NOT NULL , 
        `status` VARCHAR(60) NOT NULL DEFAULT 'inactive',
        `expired_in` DATETIME NULL ,
        PRIMARY KEY (`id`)
        ) ENGINE = InnoDB";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE adverts;";
        $db->_dbh->exec($SQL);
    }
}