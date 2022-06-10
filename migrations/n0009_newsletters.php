<?php

declare(strict_types=1);

/**
 * Class n0009_newsletters
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0009_newsletters
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE `newsletters` ( 
            `id` INT NOT NULL AUTO_INCREMENT, 
            `created_at` DATETIME NULL DEFAULT CURRENT_TIMESTAMP, 
            `updated_at` DATETIME NULL, 
            `newsletter_id` VARCHAR(60) NULL, 
            `email` VARCHAR(255) NULL, 
            PRIMARY KEY (`id`), 
            INDEX `newsletter_id` (`newsletter_id`), 
            UNIQUE `email` (`email`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE newsletters;";
        $db->_dbh->exec($SQL);
    }
}