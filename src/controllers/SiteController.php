<?php

namespace src\controllers;

use core\Controller;
use core\helpers\CoreHelpers;
use core\View;
use Exception;
use src\models\Articles;
use src\models\Users;

class SiteController extends Controller
{
    public function onConstruct()
    {
        $this->setLayout('blog');
    }

    /**
     * @throws Exception
     */
    public function index(): View
    {
        $latestParams = [
            'columns' => "article_id, title, img",
            'conditions' => "status = :status",
            'bind' => ['status' => 'public'],
            'limit' => '9',
            'order' => 'created_at DESC'
        ];

        $sportsParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'sports'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '1',
        ];

        $politicsParams = [
            'columns' => "articles.article_id, articles.title, articles.img, categories.name as category",
            'conditions' => "articles.status = :status AND categories.name = :category",
            'bind' => ['status' => 'public', 'category' => 'politics'],
            'joins' => [
                ['categories', 'articles.category_id = categories.id', 'categories', 'LEFT'],
            ],
            'limit' => '1',
        ];

        $view = [
            'latestArticles' => Articles::find($latestParams),
            'sportsArticle' => Articles::findFirst($sportsParams),
            'politicsArticle' => Articles::findFirst($politicsParams),
        ];

        return View::make('blog/home', $view);
    }

}