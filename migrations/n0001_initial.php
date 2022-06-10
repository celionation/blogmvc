<?php

declare(strict_types=1);

/**
 * Class n0001_initial
 * 
 * @author Celio Natti <Celionatti@gmail.com>
 * @package Laraton Migrations
 * @version 1.0.0
 * @copyright 2022 Laraton
 */

 class n0001_initial
 {
    public function up()
    {
        $db = \core\Application::$app->db;
        $SQL = "CREATE TABLE users (
            id INT NOT NULL AUTO_INCREMENT ,
            created_at DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,
            updated_at DATETIME NULL ,
            username VARCHAR(100) NULL ,
            fname VARCHAR(60) NULL ,
            lname VARCHAR(60) NULL ,
            `user_id` VARCHAR(64) NULL ,
            email VARCHAR(174) NULL ,
            password VARCHAR(255) NULL ,
            img VARCHAR(255) NULL ,
            acl VARCHAR(20) NULL DEFAULT 'guests' ,
            gender VARCHAR(6) NULL ,
            ref_link VARCHAR(6) NULL ,
            `state` VARCHAR(60) NULL ,
            `country` VARCHAR(60) NULL ,
            `address` VARCHAR(100) NULL ,
            blocked TINYINT(1) NOT NULL DEFAULT '0' ,
            terms TINYINT(1) NOT NULL DEFAULT '0',
            verified TINYINT(1) NOT NULL DEFAULT '0' ,
            PRIMARY KEY (`id`),
            INDEX `email` (`email`)
            ) ENGINE = InnoDB;";
        $db->_dbh->exec($SQL);
    }

    public function down()
    {
        $db = \core\Application::$app->db;
        $SQL = "DROP TABLE users;";
        $db->_dbh->exec($SQL);
    }
 }