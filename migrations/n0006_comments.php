<?php

declare(strict_types=1);

/**
 * Class n0006_comments
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0006_comments
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE comments ( 
            id INT NOT NULL AUTO_INCREMENT, 
            `comment_id` VARCHAR(60) NULL, 
            `article_id` VARCHAR(60) NULL, 
            `name` VARCHAR(100) NULL DEFAULT 'anonymous', 
            `comment` VARCHAR(255) NULL, 
            `created_at` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP, 
            `updated_at` DATETIME NOT NULL,
            PRIMARY KEY (`id`), 
            UNIQUE `comment_id` (`comment_id`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE comments;";
        $db->_dbh->exec($SQL);
    }
}