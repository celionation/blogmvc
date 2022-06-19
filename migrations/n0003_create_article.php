<?php

declare(strict_types=1);

/**
 * Class n0003_create_article
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

class n0003_create_article
{
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE articles (
            id INT NOT NULL AUTO_INCREMENT ,
            `article_id` VARCHAR(60) NULL,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            updated_at DATETIME NULL ,
            `user_id` VARCHAR(255) NULL,
            title VARCHAR(255) NULL ,
            body TEXT NULL ,
            img VARCHAR(255) NULL ,
            `status` ENUM('Public','Private') NULL DEFAULT 'Private' ,
            `category_id` INT NULL ,
            `region_id` INT NULL ,
            copyright VARCHAR(100) NULL ,
            PRIMARY KEY (`id`),
            UNIQUE `article_id` (`article_id`),
            INDEX `user_id` (`user_id`),
            INDEX `category_id` (`category_id`),
            INDEX `region_id` (`region_id`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE articles;";
        $db->_dbh->exec($SQL);
    }
}
