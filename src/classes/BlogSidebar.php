<?php

namespace src\classes;

use core\helpers\CoreHelpers;
use Exception;
use src\models\Articles;

class BlogSidebar
{
    /**
     * @throws Exception
     */
    public static function mostRead()
    {
        $params = [
            'columns' => "title, article_id, views",
            'conditions' => "status = :status AND views > '0'",
            'bind' => ['status' => 'public'],
            'limit' => '6',
            'order' => 'views DESC'
        ];

        return Articles::find($params);
    }

    /**
     * @throws Exception
     */
    public static function sideNews()
    {
        $params = [
            'columns' => "title, img, article_id",
            'conditions' => "status = :status",
            'bind' => ['status' => 'public'],
            'limit' => '3',
            'order' => 'created_at DESC'
        ];

        return Articles::find($params);
    }
}